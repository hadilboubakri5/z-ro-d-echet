@extends('layouts.app')

@section('content')

<style>
    body {
        margin: 0;
        font-family: 'Inter', sans-serif;
        background: #fafbf8;
    }

    .home-hero {
        min-height: calc(100vh - 76px);
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 60px;
        padding: 70px 60px;
        background: #fafbf8;
        overflow: hidden;
    }

    .hero-left {
        max-width: 580px;
        z-index: 2;
    }

    .hero-badge {
        display: inline-block;
        background: #d8f5cf;
        color: #14532d;
        padding: 9px 20px;
        border-radius: 999px;
        font-size: 13px;
        font-weight: 800;
        letter-spacing: 1px;
        margin-bottom: 30px;
    }

    .hero-left h1 {
        font-size: 68px;
        line-height: 1.05;
        font-weight: 800;
        color: #111;
        margin: 0 0 26px;
    }

    .hero-left p {
        font-size: 18px;
        line-height: 1.8;
        color: #5f5f5f;
        margin-bottom: 36px;
        max-width: 560px;
    }

    .hero-actions {
        display: flex;
        align-items: center;
        gap: 18px;
        flex-wrap: wrap;
    }

    .btn-primary-eco,
    .btn-outline-eco {
        padding: 15px 32px;
        border-radius: 999px;
        text-decoration: none;
        font-weight: 700;
        font-size: 16px;
        transition: 0.3s ease;
    }

    .btn-primary-eco {
        background: #064f13;
        color: #fff;
        border: 2px solid #064f13;
    }

    .btn-primary-eco:hover {
        background: #043b0e;
        color: #fff;
    }

    .btn-outline-eco {
        background: #fff;
        color: #222;
        border: 1.5px solid #d4d4d4;
    }

    .btn-outline-eco:hover {
        border-color: #064f13;
        color: #064f13;
    }

    .hero-right {
        flex: 1;
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 520px;
    }

    .hero-shape {
        position: absolute;
        width: 560px;
        height: 390px;
        background: #dde8d8;
        border-radius: 50%;
        top: 20px;
        right: 10px;
        z-index: 1;
    }

    .hero-right img {
        width: 100%;
        max-width: 570px;
        height: 430px;
        object-fit: cover;
        border-radius: 32px;
        position: relative;
        z-index: 2;
        box-shadow: 0 25px 70px rgba(0, 0, 0, 0.12);
    }

    @media (max-width: 992px) {
        .home-hero {
            flex-direction: column;
            text-align: center;
            padding: 50px 22px;
        }

        .hero-left h1 {
            font-size: 44px;
        }

        .hero-actions {
            justify-content: center;
        }

        .hero-right {
            min-height: 360px;
            width: 100%;
        }

        .hero-right img {
            height: 320px;
        }

        .hero-shape {
            width: 340px;
            height: 250px;
            right: 50%;
            transform: translateX(50%);
        }
    }
</style>

<section class="home-hero">

    <div class="hero-left">
        <span class="hero-badge">MOUVEMENT COLLECTIF</span>

        <h1>
            Réduisez vos déchets,<br>
            protégez l'avenir
        </h1>

        <p>
            Rejoignez une communauté engagée pour une consommation consciente.
            Ensemble, chaque geste compte pour transformer notre empreinte
            environnementale en un héritage durable.
        </p>

        <div class="hero-actions">
            <a href="{{ url('/register') }}" class="btn-primary-eco">
                🌿 Rejoindre
            </a>

            <a href="{{ url('/produits') }}" class="btn-outline-eco">
                Voir le catalogue
            </a>
        </div>
    </div>

    <div class="hero-right">
        <div class="hero-shape"></div>

        <img
            src="https://images.unsplash.com/photo-1618477388954-7852f32655ec?q=80&w=1200&auto=format&fit=crop"
            alt="Produits écologiques zéro déchet"
        >
    </div>

</section>

@endsection