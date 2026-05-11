<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class OpenFoodFactsService
{
    public function normalizeBarcode(string $raw): string
    {
        return preg_replace('/\D/', '', trim($raw)) ?? '';
    }

    public function isValidGtin(string $digits): bool
    {
        $len = strlen($digits);

        return $len >= 8 && $len <= 14;
    }

    /**
     * Récupère un produit via Open Food Facts (couverture internationale, y compris produits vendus en Tunisie).
     *
     * @return array<string, mixed>|null
     */
    public function fetchProduct(string $barcode): ?array
    {
        if (! config('services.open_food_facts.enabled', true)) {
            return null;
        }

        $code = $this->normalizeBarcode($barcode);
        if (! $this->isValidGtin($code)) {
            return null;
        }

        $cacheTtl = (int) config('services.open_food_facts.cache_ttl', 86400);
        $cacheKey = 'off.product.'.$code;

        return Cache::remember($cacheKey, $cacheTtl, function () use ($code) {
            return $this->fetchFromOpenFoodFactsV2($code);
        });
    }

    /** Sans cache — pour chaînage multi-sources. */
    public function fetchFromOpenFoodFactsV2(string $code): ?array
    {
        if (! config('services.open_food_facts.enabled', true)) {
            return null;
        }

        $base = rtrim((string) config('services.open_food_facts.base_url'), '/');
        $url = $base.'/api/v2/product/'.$code.'.json';

        return $this->requestOffProductEnvelope($url, $code, 'open_food_facts');
    }

    public function fetchFromOpenFoodFactsV0(string $code): ?array
    {
        if (! config('services.open_food_facts.enabled', true)) {
            return null;
        }

        $base = rtrim((string) config('services.open_food_facts.base_url'), '/');
        $url = $base.'/api/v0/product/'.$code.'.json';

        return $this->requestOffProductEnvelope($url, $code, 'open_food_facts_v0');
    }

    public function fetchFromOpenFoodFactsSearch(string $code): ?array
    {
        if (! config('services.open_food_facts.enabled', true)) {
            return null;
        }

        $base = rtrim((string) config('services.open_food_facts.base_url'), '/');
        $response = Http::withHeaders([
            'User-Agent' => (string) config('services.open_food_facts.user_agent'),
            'Accept' => 'application/json',
            'Accept-Language' => 'fr,en',
        ])
            ->timeout((int) config('services.open_food_facts.timeout', 15))
            ->get($base.'/cgi/search.pl', [
                'search_terms' => $code,
                'search_simple' => 1,
                'action' => 'process',
                'json' => 1,
                'page_size' => 15,
            ]);

        if (! $response->successful()) {
            return null;
        }

        $json = $response->json();
        if (! is_array($json)) {
            return null;
        }

        foreach ($json['products'] ?? [] as $prod) {
            if (! is_array($prod)) {
                continue;
            }
            $pc = isset($prod['code']) ? $this->normalizeBarcode((string) $prod['code']) : '';
            if ($pc !== $code) {
                continue;
            }

            return $this->mapProduct($code, $prod, 'open_food_facts_search');
        }

        return null;
    }

    /**
     * @return array<string, mixed>|null
     */
    protected function requestOffProductEnvelope(string $url, string $code, string $sourceKey): ?array
    {
        $response = Http::withHeaders([
            'User-Agent' => (string) config('services.open_food_facts.user_agent'),
            'Accept' => 'application/json',
            'Accept-Language' => 'fr,en',
        ])
            ->timeout((int) config('services.open_food_facts.timeout', 15))
            ->get($url);

        if (! $response->successful()) {
            return null;
        }

        $json = $response->json();
        if (! is_array($json)) {
            return null;
        }

        $status = $json['status'] ?? null;
        if ($status !== 1 && $status !== '1') {
            return null;
        }

        $p = $json['product'] ?? null;
        if (! is_array($p)) {
            return null;
        }

        return $this->mapProduct($code, $p, $sourceKey);
    }

    /**
     * @param  array<string, mixed>  $p
     * @return array<string, mixed>
     */
    protected function mapProduct(string $code, array $p, string $sourceKey = 'open_food_facts'): array
    {
        $countriesTags = [];
        foreach ($p['countries_tags'] ?? [] as $tag) {
            if (is_string($tag)) {
                $countriesTags[] = strtolower($tag);
            }
        }

        $soldInTunisia = collect($countriesTags)->contains(fn ($t) => str_contains($t, 'tunisia'));

        $nom = $p['product_name_fr']
            ?? $p['product_name_ar']
            ?? $p['product_name_en']
            ?? $p['generic_name_fr']
            ?? $p['product_name']
            ?? 'Produit (Open Food Facts)';

        $marque = isset($p['brands']) && is_string($p['brands']) ? trim($p['brands']) : null;
        if ($marque === '') {
            $marque = null;
        }

        $categorieStr = null;
        if (isset($p['categories']) && is_string($p['categories'])) {
            $parts = array_values(array_filter(array_map('trim', explode(',', $p['categories']))));
            $categorieStr = $parts !== [] ? (string) end($parts) : null;
        }

        $countries = isset($p['countries']) && is_string($p['countries']) ? $p['countries'] : null;

        $ingredients = $p['ingredients_text_fr'] ?? $p['ingredients_text'] ?? null;
        if (! is_string($ingredients)) {
            $ingredients = null;
        }

        $packagingParts = [];
        if (! empty($p['packaging_text_fr']) && is_string($p['packaging_text_fr'])) {
            $packagingParts[] = $p['packaging_text_fr'];
        }
        if (! empty($p['packaging']) && is_string($p['packaging'])) {
            $packagingParts[] = $p['packaging'];
        }
        $packaging = $packagingParts !== [] ? implode(' · ', $packagingParts) : null;

        $ecoRaw = strtolower((string) ($p['ecoscore_grade'] ?? ''));
        $nutriRaw = strtolower((string) ($p['nutriscore_grade'] ?? ''));

        $impactScore = $this->guessImpactScoreFromEcoscore($ecoRaw);

        $labels = isset($p['labels']) && is_string($p['labels']) ? trim($p['labels']) : null;

        $image = $p['image_front_url'] ?? $p['image_url'] ?? $p['image_front_small_url'] ?? null;

        $descriptionParts = [];
        if ($soldInTunisia) {
            $descriptionParts[] = 'Référencé comme vendu en Tunisie dans Open Food Facts.';
        }
        $descriptionParts[] = 'Données fournies par la communauté Open Food Facts (monde entier).';
        $description = implode(' ', $descriptionParts);

        $websiteBase = rtrim((string) config('services.open_food_facts.website_base'), '/');

        $ecoLetter = preg_match('/^[a-e]$/', $ecoRaw) ? strtoupper($ecoRaw) : null;
        $nutriLetter = preg_match('/^[a-e]$/', $nutriRaw) ? strtoupper($nutriRaw) : null;

        return [
            'code_barre' => $code,
            'nom' => $nom,
            'marque' => $marque,
            'categorie' => $categorieStr ?? 'Non classé',
            'description' => $description,
            'image_url' => is_string($image) ? $image : null,
            'countries' => $countries,
            'sold_in_tunisia' => $soldInTunisia,
            'ingredients_text' => $ingredients,
            'packaging' => $packaging,
            'labels' => $labels,
            'ecoscore_grade' => $ecoLetter,
            'nutriscore_grade' => $nutriLetter,
            'impact_score' => $impactScore,
            'source' => $sourceKey,
            'source_url' => $websiteBase.'/product/'.$code,
        ];
    }

    protected function guessImpactScoreFromEcoscore(string $grade): int
    {
        return match ($grade) {
            'a', 'a+' => 92,
            'b' => 78,
            'c' => 62,
            'd' => 42,
            'e' => 22,
            'unknown' => 50,
            default => 52,
        };
    }

    /**
     * @param  array<string, mixed>  $offPayload
     * @return list<array{label: string, value: string}>
     */
    public function impactLinesFromPayload(array $offPayload): array
    {
        $lines = [];

        $src = isset($offPayload['source']) && is_string($offPayload['source']) ? $offPayload['source'] : 'open_food_facts';
        $sourceLabels = [
            'open_food_facts' => 'Open Food Facts',
            'open_food_facts_v0' => 'Open Food Facts (API v0)',
            'open_food_facts_search' => 'Open Food Facts (recherche)',
            'upcitemdb' => 'UPCitemdb',
        ];
        if (isset($sourceLabels[$src])) {
            $lines[] = ['label' => 'Source des données', 'value' => $sourceLabels[$src]];
        }

        if (! empty($offPayload['ecoscore_grade'])) {
            $lines[] = ['label' => 'Eco-Score', 'value' => (string) $offPayload['ecoscore_grade']];
        }
        if (! empty($offPayload['nutriscore_grade'])) {
            $lines[] = ['label' => 'Nutri-Score', 'value' => (string) $offPayload['nutriscore_grade']];
        }
        $lines[] = ['label' => 'Vente Tunisie', 'value' => $offPayload['sold_in_tunisia'] ? 'Oui (d’après la fiche OFF)' : 'Non indiquée / autres pays'];
        if (! empty($offPayload['packaging'])) {
            $lines[] = ['label' => 'Emballage', 'value' => (string) $offPayload['packaging']];
        }
        if (! empty($offPayload['countries'])) {
            $lines[] = ['label' => 'Pays (fiche)', 'value' => (string) $offPayload['countries']];
        }
        if (! empty($offPayload['ingredients_text'])) {
            $preview = Str::limit((string) $offPayload['ingredients_text'], 320);
            $lines[] = ['label' => 'Ingrédients (extrait)', 'value' => $preview];
        }

        return $lines;
    }
}
