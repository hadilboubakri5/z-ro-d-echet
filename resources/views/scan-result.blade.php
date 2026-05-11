@extends('layouts.app')

@section('title', 'Résultat du scan')

@section('content')
    <div class="section-header">
        <h1>Résultat du scan</h1>
    </div>

    <div class="section-card">

        @if(! empty($fromOpenFoodFacts))

            @if(! empty($offProduct['sold_in_tunisia']))
                <p style="background:#ecfdf5;padding:12px 16px;border-radius:14px;color:#065f46;font-weight:700;margin-bottom:20px;">
                    🇹🇳 Fiche OFF : présence « Tunisie » indiquée sur le produit
                </p>
            @endif

            @if(! empty($offProduct['image_url']))
                <div style="margin-bottom:18px;text-align:center;">
                    <img src="{{ $offProduct['image_url'] }}" alt="" style="max-height:220px;border-radius:16px;">
                </div>
            @endif

            <h2>{{ $offProduct['nom'] }}</h2>
            <p><strong>Marque :</strong> {{ $offProduct['marque'] ?: 'Non renseignée' }}</p>
            <p><strong>Code-barres :</strong> {{ $offProduct['code_barre'] }}</p>
            <p><strong>Catégorie :</strong> {{ $offProduct['categorie'] }}</p>
            <p><strong>Score indicatif :</strong> {{ $offProduct['impact_score'] ?? '—' }} / 100 (déduit de l’Eco-Score lorsqu’il est disponible)</p>
            @php
                $srcKey = $offProduct['source'] ?? 'open_food_facts';
                $srcLabels = [
                    'open_food_facts' => 'Open Food Facts',
                    'open_food_facts_v0' => 'Open Food Facts (API v0)',
                    'open_food_facts_search' => 'Open Food Facts (recherche)',
                    'upcitemdb' => 'UPCitemdb',
                ];
                $srcLabel = $srcLabels[$srcKey] ?? $srcKey;
            @endphp
            <p><strong>Source :</strong>
                {{ $srcLabel }}
                @if(! empty($offProduct['source_url']))
                    · <a href="{{ $offProduct['source_url'] }}" target="_blank" rel="noopener">Voir la fiche / page produit →</a>
                @endif
            </p>
            <p><strong>Note :</strong> {{ $offProduct['description'] }}</p>
            @if(! empty($offProduct['labels']))
                <p><strong>Labels :</strong> {{ $offProduct['labels'] }}</p>
            @endif

            @if(! empty($impactLinesOff))
                <h3>Informations environnement & produit</h3>
                <ul>
                    @foreach($impactLinesOff as $row)
                        <li><strong>{{ $row['label'] }} :</strong> {{ $row['value'] }}</li>
                    @endforeach
                </ul>
            @endif

        @else

            <h2>{{ $produit->nom }}</h2>
            <p><strong>Marque :</strong> {{ $produit->marque }}</p>
            <p><strong>Code-barre :</strong> {{ $produit->code_barre }}</p>
            <p><strong>Catégorie :</strong> {{ $produit->categorie }}</p>
            <p><strong>Description :</strong> {{ $produit->description ?? 'N/A' }}</p>
            <p><strong>Score d’impact :</strong> {{ $produit->impact_score }}</p>

            @if($produit->impact)
                <h3>Impact écologique</h3>
                <ul>
                    <li>Empreinte carbone : {{ $produit->impact->empreinte_carbone }}</li>
                    <li>Recyclable : {{ $produit->impact->recyclable ? 'Oui' : 'Non' }}</li>
                    <li>Composition : {{ $produit->impact->composition }}</li>
                    <li>Niveau de pollution : {{ ucfirst((string) $produit->impact->niveau_pollution) }}</li>
                    <li>Consommation d'eau : {{ $produit->impact->consommation_eau }} L</li>
                    <li>Temps de décomposition : {{ $produit->impact->temps_decomposition }} jours</li>
                </ul>
            @endif

            @if($produit->alternatives && $produit->alternatives->count())
                <h3>Alternatives</h3>
                <ul>
                    @foreach($produit->alternatives as $alternative)
                        <li>
                            <strong>{{ $alternative->nom }}</strong> — {{ $alternative->description }}
                        </li>
                    @endforeach
                </ul>
            @endif

        @endif

        <a href="{{ route('scanner') }}" class="button-link">Retour au scanner</a>
    </div>
@endsection
