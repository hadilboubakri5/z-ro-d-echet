<?php

namespace App\Http\Controllers;

use App\Models\ImpactAction;
use App\Models\Produit;
use App\Services\OpenFoodFactsService;
use App\Services\ProductBarcodeResolver;
use App\Services\ProductImpactEstimator;
use Illuminate\Http\Request;

class ScanController extends Controller
{
    public function __construct(
        protected OpenFoodFactsService $openFoodFacts,
        protected ProductBarcodeResolver $barcodeResolver,
        protected ProductImpactEstimator $impactEstimator,
    ) {}

    /**
     * Vue d’ensemble : entrée Scan (lien vers le scanner).
     */
    public function hub()
    {
        return view('scan');
    }

    /**
     * Scanner code-barres / saisie manuelle (recherche produit).
     */
    public function scanner()
    {
        return view('scanner');
    }

    /**
     * Recherche d’un produit par code-barres : base locale puis agrégation de bases ouvertes (OFF, etc.).
     */
    public function search(Request $request)
    {
        $request->validate([
            'code_barre' => 'required|string|max:255',
        ], [
            'code_barre.required' => 'Veuillez saisir un code barre.',
        ]);

        $digits = $this->openFoodFacts->normalizeBarcode($request->code_barre);
        if (! $this->openFoodFacts->isValidGtin($digits)) {
            return redirect()
                ->route('scanner')
                ->withInput()
                ->with('error', 'Code-barres invalide : utilisez entre 8 et 14 chiffres.');
        }

        $produit = Produit::with([
            'impact',
            'alternatives',
        ])
            ->where('code_barre', $digits)
            ->first();

        if ($produit) {
            $estimate = $this->impactEstimator->estimate([
                'emballage' => $produit->emballage,
                'nom' => $produit->nom,
                'score_zero_dechet' => $produit->score_zero_dechet,
            ]);

            ImpactAction::create([
                'user_id' => $request->user()->id,
                'type' => 'scan',
                'category' => $estimate['category'],
                'waste_kg' => $estimate['waste_kg'],
                'carbon_kg' => $estimate['carbon_kg'],
            ]);

            return view('scan-result', [
                'fromOpenFoodFacts' => false,
                'produit' => $produit,
                'impactLinesOff' => [],
                'offProduct' => [],
            ]);
        }

        $off = $this->barcodeResolver->resolve($digits);
        if (! $off) {
            return redirect()
                ->route('scanner')
                ->withInput()
                ->with('error', 'Produit introuvable après recherche multi-sources (Open Food Facts + autres bases ouvertes). Essayez un code d’exemple sur cette page, un produit déjà référencé sur openfoodfacts.org, ou ajoutez une fiche communautaire.');
        }

        $ecoLetter = ! empty($off['ecoscore_grade']) ? strtolower((string) $off['ecoscore_grade']) : '';
        $estimate = $this->impactEstimator->estimate([
            'emballage' => $off['packaging'] ?? null,
            'nom' => $off['nom'] ?? null,
            'eco_score' => $ecoLetter,
        ]);

        ImpactAction::create([
            'user_id' => $request->user()->id,
            'type' => 'scan',
            'category' => $estimate['category'],
            'waste_kg' => $estimate['waste_kg'],
            'carbon_kg' => $estimate['carbon_kg'],
        ]);

        return view('scan-result', [
            'fromOpenFoodFacts' => true,
            'produit' => null,
            'offProduct' => $off,
            'impactLinesOff' => $this->openFoodFacts->impactLinesFromPayload($off),
        ]);
    }
}
