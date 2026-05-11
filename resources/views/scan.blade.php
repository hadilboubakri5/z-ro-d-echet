@extends('layouts.app')

@section('title', 'Scan — Zéro Déchet')

@section('content')

<style>
    .scan-hub-page {
        min-height: calc(100vh - 120px);
        padding: 24px 0 48px;
    }

    .scan-hub-header {
        text-align: center;
        margin-bottom: 42px;
    }

    .scan-hub-header h1 {
        font-size: 34px;
        font-weight: 800;
        color: #064f13;
        margin-bottom: 12px;
    }

    .scan-hub-header p {
        color: #555;
        font-size: 17px;
        line-height: 1.7;
        max-width: 560px;
        margin: 0 auto;
    }

    .scan-hub-single {
        max-width: 440px;
        margin: 0 auto;
    }

    .scan-hub-card {
        background: #fff;
        border: 1px solid #d8ddd4;
        border-radius: 24px;
        padding: 32px;
        box-shadow: 0 12px 35px rgba(0,0,0,0.05);
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .scan-hub-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 18px 40px rgba(0,0,0,0.08);
    }

    .scan-hub-icon {
        width: 56px;
        height: 56px;
        border-radius: 16px;
        background: #b9eba9;
        color: #064f13;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        margin-bottom: 18px;
    }

    .scan-hub-card h2 {
        font-size: 22px;
        font-weight: 800;
        color: #064f13;
        margin-bottom: 10px;
    }

    .scan-hub-card p {
        color: #555;
        line-height: 1.65;
        margin-bottom: 22px;
        flex: 1;
    }

    .scan-hub-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        height: 48px;
        padding: 0 22px;
        border-radius: 14px;
        background: #064f13;
        color: #fff;
        font-weight: 700;
        border: none;
        cursor: pointer;
        text-decoration: none;
    }

    .scan-hub-btn:hover {
        background: #043b0e;
        color: #fff;
    }
</style>

<section class="scan-hub-page">
    <div class="scan-hub-header">
        <h1>Scanner un produit ♻️</h1>
        <p>
            Détectez un code-barres à la caméra ou saisissez-le à la main pour afficher la fiche produit,
            l’impact environnemental et des alternatives.
            Les défis communautaires sont sur la page dédiée Défis.
        </p>
    </div>

    <div class="scan-hub-single">
        <article class="scan-hub-card">
            <div class="scan-hub-icon">
                <i class="fa-solid fa-barcode"></i>
            </div>
            <h2>Scanner</h2>
            <p>
                Ouvrez la page de scan avec aperçu caméra,
                puis consultation du résultat.
            </p>
            <a class="scan-hub-btn" href="{{ route('scanner') }}">
                Ouvrir le scanner
                <i class="fa-solid fa-arrow-right"></i>
            </a>
        </article>
    </div>
</section>

@endsection
