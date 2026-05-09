@extends('layouts.admin')

@section('title', 'Gestion Produits')

@section('content')

@if(session('success'))
    <div class="alert">{{ session('success') }}</div>
@endif

<a href="{{ route('admin.produits.create') }}" class="btn">+ Ajouter produit</a>

<br><br>

<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Code barre</th>
            <th>Marque</th>
            <th>Score</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach($produits as $produit)
            <tr>
                <td>{{ $produit->nom }}</td>
                <td>{{ $produit->code_barre }}</td>
                <td>{{ $produit->marque }}</td>
                <td>{{ $produit->impact_score }}/100</td>
                <td>
                    <a href="{{ route('admin.produits.edit', $produit) }}" class="btn">Modifier</a>

                    <form action="{{ route('admin.produits.destroy', $produit) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('Supprimer ce produit ?')">
                            Supprimer
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<br>

{{ $produits->links() }}

@endsection