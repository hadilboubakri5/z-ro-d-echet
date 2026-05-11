<?php

namespace App\Services;

/**
 * Estime déchet / CO₂ à partir d’un produit scanné (même logique que l’API).
 */
class ProductImpactEstimator
{
    /** @param  array<string, mixed>  $produitData */
    public function estimate(array $produitData): array
    {
        $category = $this->mapCategory($produitData['emballage'] ?? null, $produitData['nom'] ?? null);
        $ecoScore = strtolower((string) ($produitData['score_zero_dechet'] ?? $produitData['eco_score'] ?? ''));

        $baseWaste = 1.0;
        $baseCarbon = 0.8;

        switch ($category) {
            case 'plastic':
                $baseWaste = 1.4;
                $baseCarbon = 1.2;
                break;
            case 'glass':
                $baseWaste = 0.9;
                $baseCarbon = 0.7;
                break;
            case 'paper':
                $baseWaste = 0.8;
                $baseCarbon = 0.4;
                break;
            case 'food':
                $baseWaste = 0.6;
                $baseCarbon = 0.3;
                break;
            default:
                $baseWaste = 1.1;
                $baseCarbon = 0.9;
                break;
        }

        if (in_array($ecoScore, ['a', 'aa'])) {
            $baseWaste *= 0.5;
            $baseCarbon *= 0.5;
        } elseif ($ecoScore === 'b') {
            $baseWaste *= 0.75;
            $baseCarbon *= 0.8;
        } elseif ($ecoScore === 'c') {
            $baseWaste *= 0.95;
            $baseCarbon *= 0.95;
        } elseif (in_array($ecoScore, ['d', 'e'])) {
            $baseWaste *= 1.2;
            $baseCarbon *= 1.3;
        }

        $label = 'Impact modéré';
        if ($baseWaste < 0.7 && $baseCarbon < 0.6) {
            $label = 'Très faible';
        } elseif ($baseWaste < 1.0 && $baseCarbon < 1.0) {
            $label = 'Faible';
        } elseif ($baseWaste <= 1.2 && $baseCarbon <= 1.2) {
            $label = 'Modéré';
        } else {
            $label = 'Élevé';
        }

        return [
            'category' => $category,
            'waste_kg' => round($baseWaste, 2),
            'carbon_kg' => round($baseCarbon, 2),
            'label' => $label,
        ];
    }

    private function mapCategory(?string $packaging, ?string $nom): string
    {
        $value = strtolower($packaging ?? $nom ?? '');

        if (str_contains($value, 'plastic') || str_contains($value, 'bottle') || str_contains($value, 'film')) {
            return 'plastic';
        }

        if (str_contains($value, 'glass') || str_contains($value, 'bocal') || str_contains($value, 'verre')) {
            return 'glass';
        }

        if (str_contains($value, 'paper') || str_contains($value, 'cardboard') || str_contains($value, 'carton')) {
            return 'paper';
        }

        if (str_contains($value, 'food') || str_contains($value, 'can') || str_contains($value, 'canned') || str_contains($value, 'aliment')) {
            return 'food';
        }

        return 'other';
    }
}
