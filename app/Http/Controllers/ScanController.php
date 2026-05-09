<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;

class ScanController extends Controller
{
    /**
     * Afficher la page de scan
     */
    public function index()
    {
        return view('scan');
    }

    /**
     * Recherche d’un produit par code barre
     */
    public function search(Request $request)
    {
        // Validation
        $request->validate([
            'code_barre' => 'required|string|max:255'
        ], [
            'code_barre.required' => 'Veuillez saisir un code barre.'
        ]);

        // Recherche produit avec relations
        $produit = Produit::with([
            'impact',
            'alternatives'
        ])
        ->where('code_barre', $request->code_barre)
        ->first();

        // Produit introuvable
        if (!$produit) {

            return redirect()
                ->route('scan')
                ->with('error', 'Aucun produit trouvé avec ce code barre.');
        }

        // Affichage résultat
        return view('scan-result', compact('produit'));
    }

    /**
     * API Scan (optionnel pour futur scanner mobile)
     */
    public function apiSearch($code_barre)
    {
        $produit = Produit::with([
            'impact',
            'alternatives'
        ])
        ->where('code_barre', $code_barre)
        ->first();

        if (!$produit) {

            return response()->json([
                'success' => false,
                'message' => 'Produit introuvable'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'produit' => $produit
        ]);
    }
}