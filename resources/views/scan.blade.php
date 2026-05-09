@extends('layouts.app')

@section('content')

<style>
    .scan-page {
        min-height: calc(100vh - 74px);
        background: #f7f8f4;
        padding: 55px 24px 80px;
        font-family: 'Inter', sans-serif;
    }

    .scan-header {
        text-align: center;
        margin-bottom: 50px;
    }

    .scan-header h1 {
        font-size: 38px;
        font-weight: 800;
        color: #064f13;
        margin-bottom: 16px;
    }

    .scan-header p {
        color: #555;
        font-size: 16px;
        line-height: 1.7;
    }

    .scan-container {
        max-width: 1100px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1.6fr 1fr;
        gap: 28px;
    }

    .scan-card,
    .impact-card {
        border-radius: 28px;
        padding: 36px;
        box-shadow: 0 12px 35px rgba(0,0,0,0.05);
    }

    .scan-card {
        background: #fff;
        border: 1px solid #d8ddd4;
    }

    .scan-icon,
    .impact-icon {
        width: 58px;
        height: 58px;
        border-radius: 16px;
        background: #b9eba9;
        color: #064f13;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        margin-bottom: 22px;
    }

    .scan-card h2,
    .impact-card h2 {
        font-size: 26px;
        font-weight: 800;
        color: #064f13;
        margin-bottom: 16px;
    }

    .scan-card p {
        color: #555;
        line-height: 1.7;
        margin-bottom: 24px;
    }

    #reader {
        width: 100%;
        border-radius: 18px;
        overflow: hidden;
        margin-bottom: 22px;
        border: 2px dashed #b9eba9;
        background: #f7f8f4;
    }

    .scan-actions {
        display: flex;
        gap: 14px;
        flex-wrap: wrap;
        margin-bottom: 22px;
    }

    .scan-btn,
    .stop-btn,
    .submit-btn {
        height: 52px;
        padding: 0 24px;
        border-radius: 14px;
        border: none;
        font-weight: 800;
        cursor: pointer;
        transition: .3s ease;
    }

    .scan-btn,
    .submit-btn {
        background: #064f13;
        color: white;
    }

    .scan-btn:hover,
    .submit-btn:hover {
        background: #043b0e;
    }

    .stop-btn {
        background: #e5e7eb;
        color: #111;
    }

    .scan-input-group {
        display: flex;
        gap: 14px;
        flex-wrap: wrap;
    }

    .scan-input {
        flex: 1;
        min-width: 220px;
        height: 52px;
        border-radius: 14px;
        border: 1px solid #d8ddd4;
        padding: 0 18px;
        font-size: 16px;
        outline: none;
    }

    .scan-input:focus {
        border-color: #064f13;
        box-shadow: 0 0 0 4px rgba(6,79,19,0.08);
    }

    .alert-error {
        background: #fee2e2;
        color: #991b1b;
        padding: 14px 16px;
        border-radius: 14px;
        margin-bottom: 20px;
        font-weight: 600;
    }

    .scan-message {
        background: #ecfdf5;
        color: #064f13;
        padding: 14px 16px;
        border-radius: 14px;
        margin-bottom: 20px;
        font-weight: 700;
        display: none;
    }

    .validation-error {
        color: #dc2626;
        font-size: 14px;
        margin-top: 8px;
        font-weight: 600;
    }

    .impact-card {
        background: #064f13;
        color: white;
    }

    .impact-card h2 {
        color: white;
    }

    .impact-card p {
        color: #e6f5e4;
        line-height: 1.7;
        margin-bottom: 28px;
    }

    .chart-box {
        border: 1px solid rgba(255,255,255,0.18);
        border-radius: 16px;
        padding: 24px 20px 18px;
        height: 160px;
        display: flex;
        align-items: end;
        gap: 12px;
    }

    .bar {
        flex: 1;
        background: #a8df9b;
        border-radius: 8px 8px 0 0;
    }

    .bar:nth-child(1) { height: 42px; }
    .bar:nth-child(2) { height: 60px; }
    .bar:nth-child(3) { height: 68px; }
    .bar:nth-child(4) { height: 90px; }
    .bar:nth-child(5) { height: 110px; }

    .chart-title {
        color: #e6f5e4;
        font-size: 14px;
        font-weight: 700;
        margin-top: 14px;
    }

    @media (max-width: 992px) {
        .scan-container {
            grid-template-columns: 1fr;
        }
    }
</style>

<section class="scan-page">

    <div class="scan-header">
        <h1>Scanner un produit ♻️</h1>
        <p>
            Utilisez votre caméra pour détecter automatiquement le code-barres
            et analyser l’impact écologique du produit.
        </p>
    </div>

    <div class="scan-container">

        <div class="scan-card">

            <div class="scan-icon">
                <i class="fa-solid fa-barcode"></i>
            </div>

            <h2>Scan Intelligent</h2>

            <p>
                Cliquez sur “Activer la caméra”, placez le code-barres devant la caméra,
                puis le produit sera recherché automatiquement.
            </p>

            @if(session('error'))
                <div class="alert-error">
                    {{ session('error') }}
                </div>
            @endif

            <div id="scanMessage" class="scan-message">
                Code détecté. Recherche du produit en cours...
            </div>

            <div id="reader"></div>

            <div class="scan-actions">
                <button type="button" class="scan-btn" onclick="startScanner()">
                    <i class="fa-solid fa-camera"></i>
                    Activer la caméra
                </button>

                <button type="button" class="stop-btn" onclick="stopScanner()">
                    <i class="fa-solid fa-stop"></i>
                    Arrêter
                </button>
            </div>

            <form action="{{ route('scan.search') }}" method="POST" id="scanForm">
                @csrf

                <div class="scan-input-group">
                    <input
                        type="text"
                        name="code_barre"
                        id="code_barre"
                        class="scan-input"
                        placeholder="Code-barres détecté ou saisi manuellement..."
                        value="{{ old('code_barre') }}"
                        required
                    >

                    <button type="submit" class="submit-btn">
                        Scanner
                    </button>
                </div>

                @error('code_barre')
                    <div class="validation-error">
                        {{ $message }}
                    </div>
                @enderror
            </form>

        </div>

        <div class="impact-card">

            <div class="impact-icon">
                <i class="fa-solid fa-chart-line"></i>
            </div>

            <h2>Suivi d'Impact</h2>

            <p>
                Visualisez vos progrès écologiques et suivez vos économies
                de CO₂ grâce à un tableau de bord intelligent.
            </p>

            <div class="chart-box">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>

            <div class="chart-title">
                Progression écologique hebdomadaire
            </div>

        </div>

    </div>

</section>

<script src="https://unpkg.com/html5-qrcode"></script>

<script>
    let html5QrCode = null;
    let scannerRunning = false;

    function startScanner() {
        if (scannerRunning) {
            return;
        }

        html5QrCode = new Html5Qrcode("reader");

        html5QrCode.start(
            { facingMode: "environment" },
            {
                fps: 10,
                qrbox: {
                    width: 280,
                    height: 160
                }
            },
            function(decodedText) {
                document.getElementById('code_barre').value = decodedText;
                document.getElementById('scanMessage').style.display = 'block';

                stopScanner();

                setTimeout(function () {
                    document.getElementById('scanForm').submit();
                }, 700);
            },
            function(errorMessage) {
                // Erreurs ignorées pendant la lecture
            }
        ).then(function () {
            scannerRunning = true;
        }).catch(function (err) {
            alert("Impossible d'accéder à la caméra. Vérifiez les permissions du navigateur.");
        });
    }

    function stopScanner() {
        if (html5QrCode && scannerRunning) {
            html5QrCode.stop().then(function () {
                scannerRunning = false;
                html5QrCode.clear();
            }).catch(function (err) {
                scannerRunning = false;
            });
        }
    }
</script>

@endsection