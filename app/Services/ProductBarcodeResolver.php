<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

/**
 * Interroge plusieurs bases gratuites pour maximiser les chances de trouver un code-barres
 * (aucune base ne couvre « tous » les produits du monde).
 */
class ProductBarcodeResolver
{
    public function __construct(
        protected OpenFoodFactsService $openFoodFacts,
    ) {}

    public function resolve(string $barcode): ?array
    {
        $code = $this->openFoodFacts->normalizeBarcode($barcode);
        if (! $this->openFoodFacts->isValidGtin($code)) {
            return null;
        }

        $ttl = (int) config('services.barcode_resolver.cache_ttl', 86400);
        $key = 'barcode.resolve.'.$code;

        if (Cache::has($key)) {
            return Cache::get($key);
        }

        $result = $this->resolveFresh($code);
        if ($result !== null) {
            Cache::put($key, $result, $ttl);
        }

        return $result;
    }

    /** @internal Tests */
    public function resolveFresh(string $code): ?array
    {
        $sources = [
            fn () => $this->openFoodFacts->fetchFromOpenFoodFactsV2($code),
            fn () => $this->openFoodFacts->fetchFromOpenFoodFactsV0($code),
            fn () => $this->openFoodFacts->fetchFromOpenFoodFactsSearch($code),
            fn () => $this->fetchFromUpcItemDb($code),
        ];

        foreach ($sources as $fetch) {
            $row = $fetch();
            if ($row !== null) {
                return $row;
            }
        }

        return null;
    }

    /**
     * @return array<string, mixed>|null
     */
    protected function fetchFromUpcItemDb(string $code): ?array
    {
        if (! config('services.upcitemdb.enabled', true)) {
            return null;
        }

        $base = rtrim((string) config('services.upcitemdb.base_url'), '/');

        $response = Http::withHeaders([
            'User-Agent' => (string) config('services.open_food_facts.user_agent'),
            'Accept' => 'application/json',
        ])
            ->timeout((int) config('services.upcitemdb.timeout', 12))
            ->get($base.'/prod/trial/lookup', ['upc' => $code]);

        if (! $response->successful()) {
            return null;
        }

        $json = $response->json();
        if (! is_array($json) || ($json['code'] ?? '') !== 'OK') {
            return null;
        }

        $items = $json['items'] ?? [];
        if (! is_array($items) || $items === []) {
            return null;
        }

        $item = $items[0];
        if (! is_array($item)) {
            return null;
        }

        return $this->mapUpcItemDbRow($code, $item);
    }

    /**
     * @param  array<string, mixed>  $item
     * @return array<string, mixed>
     */
    protected function mapUpcItemDbRow(string $code, array $item): array
    {
        $title = isset($item['title']) && is_string($item['title']) ? trim($item['title']) : '';
        $brand = isset($item['brand']) && is_string($item['brand']) ? trim($item['brand']) : '';
        $category = isset($item['category']) && is_string($item['category']) ? trim($item['category']) : '';
        $desc = isset($item['description']) && is_string($item['description']) ? trim($item['description']) : '';

        $img = null;
        foreach (['image', 'images'] as $key) {
            if (! isset($item[$key])) {
                continue;
            }
            if (is_string($item[$key]) && filter_var($item[$key], FILTER_VALIDATE_URL)) {
                $img = $item[$key];
                break;
            }
            if (is_array($item[$key])) {
                foreach ($item[$key] as $u) {
                    if (is_string($u) && filter_var($u, FILTER_VALIDATE_URL)) {
                        $img = $u;
                        break 2;
                    }
                }
            }
        }

        $about = 'Données UPCitemdb (complément hors Open Food Facts). Pas d’Eco-Score / Nutri-Score sur cette source.';

        return [
            'code_barre' => $code,
            'nom' => $title !== '' ? $title : 'Produit',
            'marque' => $brand !== '' ? $brand : null,
            'categorie' => $category !== '' ? $category : 'Non classé',
            'description' => trim(($desc !== '' ? $desc.' ' : '').$about),
            'image_url' => $img,
            'countries' => null,
            'sold_in_tunisia' => false,
            'ingredients_text' => null,
            'packaging' => null,
            'labels' => null,
            'ecoscore_grade' => null,
            'nutriscore_grade' => null,
            'impact_score' => 50,
            'source' => 'upcitemdb',
            'source_url' => 'https://www.upcitemdb.com/upc/'.$code,
        ];
    }
}
