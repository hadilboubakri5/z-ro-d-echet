@extends('layouts.admin')

@section('title', 'Ajouter Produit')

@section('content')

<form action="{{ route('admin.produits.store') }}" method="POST">
    @csrf

    <label>Nom</label>
    <input type="text" name="nom" required>

    <label>Code barre</label>
    <input type="text" name="code_barre" required>

    <label>Catégorie</label>
    <input type="text" name="categorie">

    <label>Marque</label>
    <input type="text" name="marque">

    <label>Impact score</label>
    <input type="number" name="impact_score" min="0" max="100">

    <label>Image URL</label>
    <input type="text" name="image">

    <label>Description</label>
    <textarea name="description" rows="5"></textarea>

    <button class="btn">Enregistrer</button>
</form>

@endsection