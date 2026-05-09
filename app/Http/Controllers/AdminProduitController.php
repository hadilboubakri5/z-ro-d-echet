<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class AdminProduitController extends Controller
{
    public function index()
    {
        $produits = Produit::latest()->paginate(10);
        return view('admin.produits.index', compact('produits'));
    }

    public function create()
    {
        return view('admin.produits.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'code_barre' => 'required|string|unique:produits,code_barre',
            'categorie' => 'nullable|string|max:255',
            'marque' => 'nullable|string|max:255',
            'impact_score' => 'nullable|integer|min:0|max:100',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
        ]);

        Produit::create($request->all());

        return redirect()->route('admin.produits.index')->with('success', 'Produit ajouté avec succès.');
    }

    public function edit(Produit $produit)
    {
        return view('admin.produits.edit', compact('produit'));
    }

    public function update(Request $request, Produit $produit)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'code_barre' => 'required|string|unique:produits,code_barre,' . $produit->id,
            'categorie' => 'nullable|string|max:255',
            'marque' => 'nullable|string|max:255',
            'impact_score' => 'nullable|integer|min:0|max:100',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
        ]);

        $produit->update($request->all());

        return redirect()->route('admin.produits.index')->with('success', 'Produit modifié avec succès.');
    }

    public function destroy(Produit $produit)
    {
        $produit->delete();

        return redirect()->route('admin.produits.index')->with('success', 'Produit supprimé avec succès.');
    }
}