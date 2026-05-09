@extends('layouts.app')

@section('content')

<style>
    .solutions-section {
        min-height: calc(100vh - 74px);
        background: #ffffff;
        padding: 70px 24px;
        font-family: 'Inter', sans-serif;
    }

    .solutions-title {
        text-align: center;
        margin-bottom: 70px;
    }

    .solutions-title h1 {
        font-size: 36px;
        font-weight: 800;
        color: #064f13;
        margin-bottom: 16px;
    }

    .solutions-line {
        width: 80px;
        height: 4px;
        background: #9acb8d;
        border-radius: 999px;
        margin: 0 auto;
    }

    .solutions-grid {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 60px;
        align-items: stretch;
    }

    .solution-card {
        padding: 36px 28px;
        border-radius: 20px;
        transition: all .35s ease;
        display: block;
        text-decoration: none;
        color: inherit;
        position: relative;
        overflow: hidden;
    }

    .solution-card:hover {
        transform: translateY(-10px);
    }

    .solution-card.featured {
        background: #f4f3f1;
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.05);
    }

    .solution-card:not(.featured) {
        background: #ffffff;
        border: 1px solid #eef1eb;
    }

    .solution-icon {
        width: 58px;
        height: 58px;
        border-radius: 16px;
        background: #1f6b2a;
        color: #dff4d6;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        margin-bottom: 28px;
    }

    .featured .solution-icon {
        background: #e1ddd5;
        color: #4e514b;
    }

    .solution-card h2 {
        font-size: 26px;
        font-weight: 800;
        color: #111;
        margin-bottom: 18px;
    }

    .solution-card p {
        font-size: 15.5px;
        line-height: 1.8;
        color: #4f4f4f;
    }

    .solution-arrow {
        position: absolute;
        right: 28px;
        bottom: 28px;
        font-size: 22px;
        color: #064f13;
        opacity: 0;
        transition: .3s ease;
    }

    .solution-card:hover .solution-arrow {
        opacity: 1;
        transform: translateX(4px);
    }

    @media (max-width: 992px) {

        .solutions-grid {
            grid-template-columns: 1fr;
            gap: 28px;
        }

        .solution-card {
            max-width: 520px;
            margin: 0 auto;
        }
    }
</style>

<section class="solutions-section">

    <!-- TITLE -->

    <div class="solutions-title">
        <h1>Nos Solutions</h1>
        <div class="solutions-line"></div>
    </div>

    <!-- GRID -->

    <div class="solutions-grid">

        <!-- SCAN -->

        <a href="{{ route('scan') }}" class="solution-card">

            <div class="solution-icon">
                <i class="fa-solid fa-barcode"></i>
            </div>

            <h2>Scan</h2>

            <p>
                Analysez instantanément vos produits du quotidien.
                Découvrez leur impact environnemental, leur recyclabilité
                et obtenez des recommandations intelligentes.
            </p>

            <span class="solution-arrow">
                <i class="fa-solid fa-arrow-right"></i>
            </span>

        </a>

        <!-- IMPACT -->

        <a href="{{ route('impact') }}" class="solution-card featured">

            <div class="solution-icon">
                <i class="fa-solid fa-chart-line"></i>
            </div>

            <h2>Impact</h2>

            <p>
                Suivez votre empreinte écologique en temps réel.
                Mesurez vos progrès, économisez du CO₂ et rejoignez
                une communauté engagée pour la planète.
            </p>

            <span class="solution-arrow">
                <i class="fa-solid fa-arrow-right"></i>
            </span>

        </a>

        <!-- SWITCH -->

        <a href="{{ route('home') }}" class="solution-card">

            <div class="solution-icon">
                <i class="fa-solid fa-wand-magic-sparkles"></i>
            </div>

            <h2>Switch</h2>

            <p>
                Trouvez des alternatives durables et locales adaptées
                à vos habitudes. Passez progressivement à une consommation
                plus responsable et écologique.
            </p>

            <span class="solution-arrow">
                <i class="fa-solid fa-arrow-right"></i>
            </span>

        </a>

    </div>

</section>

@endsection