@extends('layouts.app')

@section('title', 'Scanner — Zéro Déchet')

@section('content')

<style>
    .scan-page {
        min-height: calc(100vh - 74px);
        background: #f7f8f4;
        padding: 55px 24px 80px;
        margin: -32px -32px 0;
        font-family: 'Inter', sans-serif;
    }

    .scan-breadcrumb {
        max-width: 1100px;
        margin: 0 auto 20px;
        font-size: 14px;
    }

    .scan-breadcrumb a {
        font-weight: 600;
        text-decoration: underline;
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
        position: relative;
        width: 100%;
        min-height: 260px;
        border-radius: 18px;
        overflow: hidden;
        margin-bottom: 12px;
        border: 2px dashed #b9eba9;
        background: #1a1a1a;
    }

    #reader video,
    #reader canvas {
        width: 100% !important;
        max-height: 420px;
        height: auto !important;
        display: block;
        border-radius: 16px;
        object-fit: cover;
    }

    #camStatus {
        font-size: 14px;
        color: #555;
        margin-bottom: 14px;
        min-height: 22px;
        font-weight: 600;
    }

    #camStatus.error {
        color: #991b1b;
    }

    #camStatus.ok {
        color: #065f46;
    }

    .scan-actions {
        display: flex;
        gap: 14px;
        flex-wrap: wrap;
        margin-bottom: 14px;
    }

    .scan-actions-photo {
        margin-bottom: 22px;
    }

    .photo-btn {
        height: 52px;
        padding: 0 24px;
        border-radius: 14px;
        border: 2px solid #064f13;
        background: #fff;
        color: #064f13;
        font-weight: 800;
        cursor: pointer;
        transition: .3s ease;
        display: inline-flex;
        align-items: center;
        gap: 10px;
    }

    .photo-btn:hover {
        background: #ecfdf5;
    }

    .photo-hint {
        font-size: 14px;
        color: #64748b;
        margin: 0 0 18px;
        line-height: 1.5;
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

    .ean-examples {
        margin-top: 28px;
        padding: 18px 20px;
        border-radius: 18px;
        border: 1px solid #d8ddd4;
        background: #f9faf8;
    }

    .ean-examples summary {
        cursor: pointer;
        font-weight: 800;
        color: #064f13;
        font-size: 15px;
    }

    .ean-examples-note {
        font-size: 14px;
        color: #64748b;
        margin: 12px 0 14px;
        line-height: 1.55;
    }

    .ean-chip-list {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .ean-chip {
        width: 100%;
        text-align: left;
        padding: 12px 16px;
        border-radius: 14px;
        border: 1px solid #064f13;
        background: #fff;
        color: #064f13;
        font-weight: 700;
        font-size: 14px;
        cursor: pointer;
        transition: .2s ease;
    }

    .ean-chip:hover {
        background: #ecfdf5;
    }

    .scan-tabs {
        max-width: 1100px;
        margin: 0 auto 28px;
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        justify-content: center;
    }

    .scan-tabs .tab-pill {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 20px;
        border-radius: 999px;
        font-weight: 700;
        font-size: 15px;
        border: 2px solid #064f13;
        background: #ecfdf5;
        color: #064f13;
    }

    .scan-tabs a.tab-pill {
        background: #fff;
        color: #b45309;
        border-color: #fbbf24;
        text-decoration: none;
    }

    .scan-tabs a.tab-pill:hover {
        background: #fffbeb;
    }

    .defis-card.impact-card {
        background: linear-gradient(155deg, #1a4d14 0%, #0f3d0c 55%, #1e5c18 100%);
        color: #fff;
        border: 2px solid #fbbf24;
    }

    .defis-card.impact-card h2 {
        color: #fff;
    }

    .defis-icon-wrap {
        width: 58px;
        height: 58px;
        border-radius: 16px;
        background: rgba(251, 191, 36, 0.25);
        color: #fef3c7;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 26px;
        margin-bottom: 22px;
    }

    .defis-card p.intro {
        color: #dcfce7;
        line-height: 1.7;
        margin-bottom: 20px;
    }

    .defis-list {
        margin: 0 0 22px;
        padding: 0;
        list-style: none;
    }

    .defis-list li {
        display: flex;
        gap: 10px;
        align-items: flex-start;
        color: #e7fde9;
        font-size: 15px;
        line-height: 1.45;
        margin-bottom: 12px;
    }

    .defis-list li span.emoji {
        flex-shrink: 0;
        font-size: 18px;
    }

    .defis-actions {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .btn-defis-main {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
        padding: 14px 20px;
        border-radius: 14px;
        background: #fbbf24;
        color: #422006;
        font-weight: 800;
        text-decoration: none;
        font-size: 16px;
    }

    .btn-defis-main:hover {
        background: #fcd34d;
        color: #422006;
    }

    .link-quiet {
        color: #bbf7d0;
        font-weight: 600;
        font-size: 14px;
        text-decoration: underline;
    }

    .link-quiet:hover {
        color: #fff;
    }

    @media (max-width: 992px) {
        .scan-container {
            grid-template-columns: 1fr;
        }

        .defis-card.impact-card {
            order: 2;
        }
    }
</style>

<section class="scan-page">

    <div class="scan-breadcrumb">
        <a href="{{ route('dashboard') }}">← Tableau de bord</a>
        ·
        <a href="{{ route('scan') }}">Page Scan</a>
        ·
        <span>Scanner produit</span>
    </div>

    <div class="scan-tabs">
        <span class="tab-pill"><i class="fa-solid fa-barcode"></i> Scanner produit</span>
        <a href="{{ route('defis') }}" class="tab-pill"><i class="fa-solid fa-trophy"></i> Défis communautaires →</a>
    </div>

    <div class="scan-header">
        <h1>Scanner un produit ♻️</h1>
        <p>
            Décodez un code-barres pour la fiche produit et son impact.<br/>
            <strong>Défis :</strong> sur la droite (ou sous le bloc caméra sur mobile), ouvre la page avec filtres et classement.
        </p>
    </div>

    <div class="scan-container">

        <div class="scan-card">

            <div class="scan-icon">
                <i class="fa-solid fa-barcode"></i>
            </div>

            <h2>Scan Intelligent</h2>

            <p>
                Sur <strong>PC</strong>, utilisez souvent la webcam ; le cadre doit couvrir <strong>toute la largeur du code-barres</strong>.
                Pour une <strong>bouteille</strong> ou une surface courbe, utilisez plutôt <strong>Analyser une photo</strong> (plus fiable).
                <strong>Chrome ou Edge</strong> recommandés.
            </p>

            @if(session('error'))
                <div class="alert-error">
                    {{ session('error') }}
                </div>
            @endif

            <div id="scanMessage" class="scan-message">
                Code détecté. Recherche du produit en cours...
            </div>

            <div id="camStatus" role="status"></div>
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

            <p class="photo-hint">
                <strong>Photo :</strong> prenez une vue droite du code, bien nette, sans reflet fort — ou choisissez une image depuis votre appareil.
            </p>
            <div class="scan-actions-photo">
                <input type="file" id="barcodePhotoInput" accept="image/*" capture="environment" style="display:none" aria-hidden="true">
                <button type="button" class="photo-btn" onclick="document.getElementById('barcodePhotoInput').click()">
                    <i class="fa-solid fa-image"></i>
                    Analyser une photo
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

            <details class="ean-examples">
                <summary>Codes d’exemple (souvent présents sur Open Food Facts)</summary>
                <p class="ean-examples-note">
                    Il n’existe pas de liste officielle « tous les EAN tunisiens ». Pour tester le scan, utilisez des codes déjà référencés par la communauté (mondiaux ou locaux) ou ajoutez une fiche sur
                    <a href="https://world.openfoodfacts.org/" target="_blank" rel="noopener">openfoodfacts.org</a>.
                    L’app interroge aussi d’autres bases ouvertes si OFF ne répond pas.
                </p>
                <ul class="ean-chip-list" aria-label="Exemples de codes-barres">
                    <li><button type="button" class="ean-chip" data-ean="3017620422005">3017620422005 — Nutella (référence mondiale fréquente)</button></li>
                    <li><button type="button" class="ean-chip" data-ean="7622210719136">7622210719136 — Kinder Bueno</button></li>
                    <li><button type="button" class="ean-chip" data-ean="3274080005003">3274080005003 — Evian 1,5 L</button></li>
                    <li><button type="button" class="ean-chip" data-ean="1234567890123">1234567890123 — Démo locale (base du projet)</button></li>
                </ul>
            </details>

        </div>

        <div class="impact-card defis-card" id="defis-panel">

            <div class="defis-icon-wrap" aria-hidden="true">
                <i class="fa-solid fa-trophy"></i>
            </div>

            <h2>Défis communautaires</h2>

            <p class="intro">
                La partie « défis » du projet&nbsp;: filtres par thème (alimentation, transport, maison…),
                carte du mois, modale pour rejoindre un défi, classement.
            </p>

            <ul class="defis-list">
                <li><span class="emoji">🏆</span> Grand défi Zéro plastique, points communautaires</li>
                <li><span class="emoji">🥗</span> Mini-défis (viande, eau, tri…) avec progression</li>
                <li><span class="emoji">🌿</span> Complète un scan puis enchaîne avec un défi assorti sur la page suivante</li>
            </ul>

            <div class="defis-actions">
                <a href="{{ route('defis') }}" class="btn-defis-main">
                    Ouvrir la page Défis
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
                <a href="{{ route('impact') }}" class="link-quiet">Voir aussi la page Impact →</a>
            </div>

        </div>

    </div>

</section>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/@ericblade/quagga2@1.8.4/dist/quagga.min.js"></script>
<script src="https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js"></script>

<script>
    let scannerRunning = false;
    let decodeLocked = false;

    function barcodeFormatsForScanner() {
        var F = typeof Html5QrcodeSupportedFormats !== 'undefined' ? Html5QrcodeSupportedFormats : {};
        var list = [F.EAN_13, F.EAN_8, F.UPC_A, F.UPC_E, F.CODE_128, F.CODE_39, F.ITF, F.QR_CODE];
        if (F.CODABAR) list.push(F.CODABAR);
        return list.filter(Boolean);
    }

    function html5CtorOptions() {
        var bf = barcodeFormatsForScanner();
        return bf.length ? { formatsToSupport: bf, verbose: false } : { verbose: false };
    }

    function createNativeBarcodeDetector() {
        if (typeof BarcodeDetector === 'undefined') return null;
        var formatSets = [
            ['ean_13', 'ean_8', 'upc_a', 'upc_e', 'code_128', 'code_39', 'itf', 'qr_code'],
            ['ean_13', 'ean_8', 'upc_a', 'upc_e'],
            ['ean_13', 'ean_8'],
        ];
        for (var fi = 0; fi < formatSets.length; fi++) {
            try {
                return new BarcodeDetector({ formats: formatSets[fi] });
            } catch (e) {}
        }
        return null;
    }

    function stopQuaggaCompletely() {
        try {
            if (typeof Quagga !== 'undefined') {
                Quagga.offDetected();
                Quagga.stop();
            }
        } catch (e) {}
    }

    function applyDecodedAndSubmit(raw) {
        if (decodeLocked) return;
        decodeLocked = true;
        var text = String(raw || '').trim();
        var digits = text.replace(/\D/g, '');
        document.getElementById('code_barre').value = digits || text;
        document.getElementById('scanMessage').style.display = 'block';
        stopScanner();
        setCamStatus('Code détecté — recherche du produit…', 'ok');
        setTimeout(function () {
            document.getElementById('scanForm').submit();
        }, 400);
    }

    /**
     * Caméra en direct : Quagga2 (optimisé codes-barres EAN / UPC, mieux que le simple flux QR pour les produits).
     */
    function startQuaggaWithConstraints(readerEl, constraints) {
        return new Promise(function (resolve, reject) {
            stopQuaggaCompletely();
            readerEl.innerHTML = '';

            if (typeof Quagga === 'undefined') {
                reject(new Error('Quagga2 non chargé (réseau / bloqueur).'));
                return;
            }

            Quagga.init({
                inputStream: {
                    type: 'LiveStream',
                    target: readerEl,
                    constraints: constraints,
                    area: {
                        top: '8%',
                        right: '1%',
                        left: '1%',
                        bottom: '8%',
                    },
                },
                locator: {
                    patchSize: 'large',
                    halfSample: false,
                },
                numOfWorkers: 0,
                frequency: 12,
                decoder: {
                    readers: [
                        'ean_reader',
                        'ean_8_reader',
                        'upc_reader',
                        'upc_e_reader',
                        'code_128_reader',
                        'code_39_reader',
                        'codabar_reader',
                    ],
                    multiple: false,
                },
                locate: true,
            }, function (err) {
                if (err) {
                    reject(err);
                    return;
                }
                Quagga.onDetected(function (data) {
                    if (decodeLocked || !data || !data.codeResult || !data.codeResult.code) return;
                    applyDecodedAndSubmit(String(data.codeResult.code));
                });
                Quagga.start();
                resolve();
            });
        });
    }

    async function decodeBarcodeFromImageFile(file) {
        var detector = createNativeBarcodeDetector();

        if (detector && typeof createImageBitmap !== 'undefined') {
            try {
                var bmp = await createImageBitmap(file);
                try {
                    var codes = await detector.detect(bmp);
                    if (codes && codes.length && codes[0].rawValue) {
                        return codes[0].rawValue;
                    }
                } finally {
                    bmp.close();
                }
            } catch (e) {}
        }

        if (detector) {
            try {
                var url = URL.createObjectURL(file);
                var img = new Image();
                await new Promise(function (resolve, reject) {
                    img.onload = resolve;
                    img.onerror = reject;
                    img.src = url;
                });
                var canvas = document.createElement('canvas');
                canvas.width = img.naturalWidth;
                canvas.height = img.naturalHeight;
                canvas.getContext('2d').drawImage(img, 0, 0);
                URL.revokeObjectURL(url);
                var codes2 = await detector.detect(canvas);
                if (codes2 && codes2.length && codes2[0].rawValue) {
                    return codes2[0].rawValue;
                }
            } catch (e2) {}
        }

        var temp = new Html5Qrcode('reader', html5CtorOptions());
        try {
            return await temp.scanFile(file, true);
        } finally {
            try {
                await temp.clear();
            } catch (x) {}
        }
    }

    async function analyzeBarcodeFromFile(file) {
        if (!file || !file.type.match(/^image\//)) {
            setCamStatus('Choisissez une image (JPEG, PNG, WebP…).', 'error');
            return;
        }
        decodeLocked = false;
        await stopScanner();
        document.getElementById('reader').innerHTML = '';
        setCamStatus('Analyse de la photo en cours…');

        try {
            var decoded = await decodeBarcodeFromImageFile(file);
            if (decoded) {
                decodeLocked = false;
                applyDecodedAndSubmit(decoded);
                return;
            }
        } catch (err) {
            console.warn('decodeBarcodeFromImageFile', err);
        }

        decodeLocked = false;
        setCamStatus('Code illisible sur cette image. Rapprochez-vous, évitez flou et reflets, ou recadrez uniquement les barres.', 'error');
    }

    document.addEventListener('DOMContentLoaded', function () {
        var input = document.getElementById('barcodePhotoInput');
        if (input) {
            input.addEventListener('change', function () {
                var f = input.files && input.files[0];
                input.value = '';
                if (f) analyzeBarcodeFromFile(f);
            });
        }

        document.querySelectorAll('.ean-chip[data-ean]').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var code = btn.getAttribute('data-ean');
                var field = document.getElementById('code_barre');
                if (field && code) field.value = code;
                field && field.focus();
            });
        });
    });

    function setCamStatus(msg, cls) {
        const el = document.getElementById('camStatus');
        el.textContent = msg || '';
        el.classList.remove('error', 'ok');
        if (cls) el.classList.add(cls);
    }

    async function resetReaderArea() {
        stopQuaggaCompletely();
        scannerRunning = false;
        document.getElementById('reader').innerHTML = '';
    }

    async function startScanner() {
        if (scannerRunning) return;

        await resetReaderArea();
        decodeLocked = false;

        if (typeof Quagga === 'undefined') {
            setCamStatus('Bibliothèque Quagga2 introuvable. Vérifiez votre connexion ou désactivez le bloqueur de pub.', 'error');
            return;
        }

        var readerEl = document.getElementById('reader');
        var base = {
            width: { min: 480, ideal: 1280, max: 1920 },
            height: { min: 360, ideal: 720, max: 1080 },
        };

        var attempts = [
            { label: 'caméra arrière', constraints: Object.assign({ facingMode: 'environment' }, base) },
            { label: 'caméra avant (webcam)', constraints: Object.assign({ facingMode: 'user' }, base) },
            { label: 'caméra par défaut', constraints: Object.assign({}, base) },
        ];

        var lastErr = null;
        for (var i = 0; i < attempts.length; i++) {
            try {
                setCamStatus('Démarrage : ' + attempts[i].label + '…');
                await startQuaggaWithConstraints(readerEl, attempts[i].constraints);
                scannerRunning = true;
                setCamStatus('Caméra active — alignez le code-barres ; Quagga détecte EAN-8 / EAN-13 / UPC.', 'ok');
                return;
            } catch (e) {
                lastErr = e;
                console.warn('Quagga tentative ' + (i + 1), e);
                stopQuaggaCompletely();
                readerEl.innerHTML = '';
            }
        }

        var msg = 'Caméra impossible. ';
        msg += lastErr && lastErr.message ? lastErr.message + ' ' : '';
        msg += 'Windows : Confidentialité → Caméra. Sinon utilisez « Analyser une photo » ou la saisie manuelle.';
        setCamStatus(msg, 'error');
    }

    async function stopScanner() {
        stopQuaggaCompletely();
        scannerRunning = false;
        document.getElementById('reader').innerHTML = '';
        setCamStatus('');
    }
</script>
@endpush
