@extends('layouts.admin')

@section('title', 'Modifier Produit')

@section('content')

<form action="{{ route('admin.produits.update', $produit) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nom</label>
    <input type="text" name="nom" value="{{ $produit->nom }}" required>

    <label>Code barre</label>
    <input type="text" name="code_barre" value="{{ $produit->code_barre }}" required>

    <label>Catégorie</label>
    <input type="text" name="categorie" value="{{ $produit->categorie }}">

    <label>Marque</label>
    <input type="text" name="marque" value="{{ $produit->marque }}">

    <label>Impact score</label>
    <input type="number" name="impact_score" value="{{ $produit->impact_score }}" min="0" max="100">

    <label>Image URL</label>
    <input type="text" name="image" value="{{ $produit->image }}">

    <label>Description</label>
    <textarea name="description" rows="5">{{ $produit->description }}</textarea>

    <button class="btn">Modifier</button>
</form>

@endsection