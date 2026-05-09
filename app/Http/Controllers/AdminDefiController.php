<?php

namespace App\Http\Controllers;

use App\Models\Defi;
use Illuminate\Http\Request;

class AdminDefiController extends Controller
{
    public function index()
    {
        $defis = Defi::latest()->paginate(10);
        return view('admin.defis.index', compact('defis'));
    }

    public function create()
    {
        return view('admin.defis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'points' => 'required|integer|min:0',
            'image' => 'nullable|string',
        ]);

        Defi::create($request->all());

        return redirect()->route('admin.defis.index')->with('success', 'Défi ajouté avec succès.');
    }

    public function edit(Defi $defi)
    {
        return view('admin.defis.edit', compact('defi'));
    }

    public function update(Request $request, Defi $defi)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'points' => 'required|integer|min:0',
            'image' => 'nullable|string',
        ]);

        $defi->update($request->all());

        return redirect()->route('admin.defis.index')->with('success', 'Défi modifié avec succès.');
    }

    public function destroy(Defi $defi)
    {
        $defi->delete();

        return redirect()->route('admin.defis.index')->with('success', 'Défi supprimé avec succès.');
    }
}