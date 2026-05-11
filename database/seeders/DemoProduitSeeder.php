<?php

namespace Database\Seeders;

use App\Models\Alternative;
use App\Models\Impact;
use App\Models\Produit;
use Illuminate\Database\Seeder;

class DemoProduitSeeder extends Seeder
{
    /**
     * Produit exemple pour tester le scan (barcode fictif mais stable).
     */
    public function run(): void
    {
        $p = Produit::query()->updateOrCreate(
            ['code_barre' => '1234567890123'],
            [
                'nom' => 'Pause fraîche BIO',
                'marque' => 'ÉcoSnack',
                'categorie' => 'Alimentation',
                'description' => 'Barre protéine emballage papier recyclable.',
                'impact_score' => 72,
                'emballage' => 'papier',
                'recyclable' => true,
                'score_zero_dechet' => 'B',
            ]
        );

        Impact::query()->updateOrCreate(
            ['produit_id' => $p->id],
            [
                'empreinte_carbone' => '0,35 kg CO₂ eq',
                'recyclable' => true,
                'composition' => 'Prix 80 % cacao, fibres végétales',
                'niveau_pollution' => 'faible',
                'consommation_eau' => '210',
                'temps_decomposition' => '90',
            ]
        );

        Alternative::query()->updateOrCreate(
            [
                'produit_id' => $p->id,
                'nom' => 'Barre fabrication maison',
            ],
            [
                'description' => 'Recettes bulk sans barquette plastique.',
                'impact_reduit' => '-40%',
                'prix' => null,
                'marque' => null,
                'disponible' => true,
            ]
        );
    }
}
