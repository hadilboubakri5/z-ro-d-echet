@extends('layouts.app')

@section('content')

<style>
    .impact-page {
        min-height: calc(100vh - 74px);
        background: #fafbf8;
        padding: 55px 24px 80px;
        font-family: 'Inter', sans-serif;
    }

    .impact-header {
        max-width: 1220px;
        margin: 0 auto 42px;
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 20px;
    }

    .impact-header h1 {
        font-size: 38px;
        font-weight: 800;
        color: #111;
        margin-bottom: 10px;
    }

    .impact-header p {
        color: #555;
        font-size: 16px;
    }

    .impact-link {
        color: #315b31;
        font-weight: 700;
        text-decoration: none;
        border-bottom: 2px solid #9acb8d;
        padding-bottom: 4px;
        white-space: nowrap;
    }

    .impact-grid {
        max-width: 1220px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 28px;
    }

    .main-challenge {
        min-height: 470px;
        border-radius: 24px;
        overflow: hidden;
        position: relative;
        background-image:
            linear-gradient(to top, rgba(0,0,0,0.72), rgba(0,0,0,0.08)),
            url('https://images.unsplash.com/photo-1542838132-92c53300491e?q=80&w=1400&auto=format&fit=crop');
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: flex-end;
        padding: 34px;
        color: white;
    }

    .challenge-content {
        max-width: 650px;
    }

    .challenge-meta {
        display: flex;
        align-items: center;
        gap: 18px;
        margin-bottom: 18px;
        font-size: 14px;
        font-weight: 700;
    }

    .challenge-badge {
        background: #315b31;
        color: white;
        padding: 7px 13px;
        border-radius: 999px;
        font-size: 12px;
        letter-spacing: .3px;
    }

    .main-challenge h2 {
        font-size: 34px;
        font-weight: 800;
        margin-bottom: 18px;
    }

    .main-challenge p {
        font-size: 18px;
        line-height: 1.6;
        max-width: 660px;
        margin-bottom: 24px;
        color: #f2f2f2;
    }

    .join-btn {
        display: inline-block;
        background: white;
        color: #315b31;
        padding: 14px 24px;
        border-radius: 999px;
        text-decoration: none;
        font-weight: 800;
    }

    .side-challenges {
        display: flex;
        flex-direction: column;
        gap: 22px;
    }

    .mini-card {
        min-height: 224px;
        border-radius: 22px;
        padding: 32px 28px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        position: relative;
        overflow: hidden;
    }

    .mini-card.green {
        background: #355b38;
        color: white;
    }

    .mini-card.beige {
        background: #e9e1d5;
        color: #111;
    }

    .mini-icon {
        font-size: 28px;
        opacity: .9;
        margin-bottom: 22px;
    }

    .mini-card h3 {
        font-size: 25px;
        font-weight: 800;
        margin-bottom: 12px;
    }

    .mini-card p {
        font-size: 14px;
        line-height: 1.6;
        opacity: .9;
    }

    .mini-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: 28px;
        font-size: 13px;
        font-weight: 800;
    }

    .mini-arrow {
        font-size: 26px;
        font-weight: 400;
    }

    @media (max-width: 992px) {
        .impact-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .impact-grid {
            grid-template-columns: 1fr;
        }

        .main-challenge {
            min-height: 420px;
        }
    }

    @media (max-width: 576px) {
        .impact-page {
            padding: 40px 16px 60px;
        }

        .main-challenge {
            padding: 24px;
        }

        .main-challenge h2 {
            font-size: 26px;
        }

        .main-challenge p {
            font-size: 15px;
        }
    }
</style>

<section class="impact-page">

    <div class="impact-header">
        <div>
            <h1>Notre Impact</h1>
            <p>Relevez des défis, gagnez des points, sauvez la planète.</p>
        </div>

        <a href="{{ url('/challenges') }}" class="impact-link">
            Tous les challenges →
        </a>
    </div>

    <div class="impact-grid">

        <div class="main-challenge">
            <div class="challenge-content">
                <div class="challenge-meta">
                    <span class="challenge-badge">CHALLENGE DE LA SEMAINE</span>
                    <span>⏱ 4 jours restants</span>
                </div>

                <h2>Zéro Plastique en Cuisine</h2>

                <p>
                    Remplacez tous vos emballages plastiques par des alternatives
                    réutilisables ou biodégradables pendant 7 jours.
                </p>

                <a href="#" class="join-btn">Rejoindre 1.2k participants</a>
            </div>
        </div>

        <div class="side-challenges">

            <div class="mini-card green">
                <div>
                    <div class="mini-icon">
                        <i class="fa-solid fa-droplet"></i>
                    </div>

                    <h3>Économie Bleue</h3>
                    <p>Réduisez votre consommation d'eau domestique de 15%.</p>
                </div>

                <div class="mini-footer">
                    <span>500 POINTS</span>
                    <span class="mini-arrow">→</span>
                </div>
            </div>

            <div class="mini-card beige">
                <div>
                    <div class="mini-icon">
                        <i class="fa-solid fa-recycle"></i>
                    </div>

                    <h3>Compost Master</h3>
                    <p>Démarrez votre propre compost de balcon ou de jardin.</p>
                </div>

                <div class="mini-footer">
                    <span>750 POINTS</span>
                    <span class="mini-arrow">→</span>
                </div>
            </div>

        </div>

    </div>

</section>

@endsection