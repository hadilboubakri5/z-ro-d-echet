<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ImpactAction;
use App\Models\Produit;
use App\Services\OpenFoodFactsService;
use App\Services\ProductBarcodeResolver;
use App\Services\ProductImpactEstimator;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function __construct(
        protected OpenFoodFactsService $openFoodFacts,
        protected ProductBarcodeResolver $barcodeResolver,
        protected ProductImpactEstimator $impactEstimator,
    ) {}

    /**
     * GET /api/produits/scan/{codeBarre} — base locale puis résolution multi-sources (OFF + autres).
     */
    public function scan(string $codeBarre)
    {
        $digits = $this->openFoodFacts->normalizeBarcode($codeBarre);
        if (! $this->openFoodFacts->isValidGtin($digits)) {
            return response()->json([
                'message' => 'Code-barres invalide (8 à 14 chiffres)',
            ], 422);
        }

        $produit = Produit::where('code_barre', $digits)->first();

        $sourceKey = 'base_locale';

        if ($produit) {
            $produitData = array_merge($produit->toArray(), [
                'sold_in_tunisia' => null,
                'impact_score_display' => $produit->impact_score,
                'source_detail' => 'base_locale',
            ]);
        } else {
            $off = $this->barcodeResolver->resolve($digits);
            if ($off === null) {
                return response()->json([
                    'message' => 'Produit non trouvé (base locale ni bases externes agrégées)',
                ], 404);
            }

            $sourceKey = (string) ($off['source'] ?? 'externe');

            $ecoLetter = $off['ecoscore_grade'] ? strtolower((string) $off['ecoscore_grade']) : '';

            $produitData = [
                'code_barre' => $off['code_barre'],
                'nom' => $off['nom'],
                'marque' => $off['marque'],
                'categorie' => $off['categorie'],
                'description' => $off['description'],
                'impact_score_display' => $off['impact_score'],
                'emballage' => $off['packaging'],
                'eco_score' => $ecoLetter !== '' ? $ecoLetter : null,
                'image' => $off['image_url'],
                'pays' => $off['countries'],
                'sold_in_tunisia' => $off['sold_in_tunisia'],
                'source_url_off' => $off['source_url'],
                'ecoscore_grade' => $off['ecoscore_grade'],
                'nutriscore_grade' => $off['nutriscore_grade'],
                'impact_hints' => $this->openFoodFacts->impactLinesFromPayload($off),
            ];
        }

        $impact = $this->impactEstimator->estimate($produitData);

        ImpactAction::create([
            'user_id' => auth()->id(),
            'type' => 'scan',
            'category' => $impact['category'],
            'waste_kg' => $impact['waste_kg'],
            'carbon_kg' => $impact['carbon_kg'],
        ]);

        return response()->json([
            'source' => $sourceKey,
            'produit' => $produitData,
            'impact' => $impact,
        ]);
    }

    public function store(Request $request)
    {
        $produit = Produit::create($request->validate([
            'code_barre' => 'required|unique:produits',
            'nom' => 'required',
            'marque' => 'nullable',
            'emballage' => 'nullable',
            'recyclable' => 'boolean',
            'score_zero_dechet' => 'nullable',
        ]));

        return response()->json($produit, 201);
    }
}
