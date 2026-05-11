<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord - Zéro Déchet</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-b from-white via-emerald-50 to-white">

<!-- HEADER -->
<header class="border-b border-emerald-100 bg-white sticky top-0 z-50 shadow">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-emerald-600 rounded-lg flex items-center justify-center text-white">
                ♻️
            </div>
            <h1 class="text-2xl font-bold text-emerald-900">Zéro Déchet</h1>
        </div>

        <div class="flex items-center gap-6">
            <span class="text-sm text-emerald-700">Bienvenue, <strong>{{ Auth::user()->name }}</strong></span>
            <a href="/" class="text-emerald-700 font-semibold hover:text-emerald-900">Accueil</a>
            <form method="POST" action="/logout" class="inline">
                @csrf
                <button type="submit" class="text-red-600 font-semibold hover:text-red-800">Déconnexion</button>
            </form>
        </div>
    </div>
</header>

<!-- MAIN CONTENT -->
<main class="max-w-7xl mx-auto px-6 py-12">
    <h2 class="text-4xl font-bold text-emerald-900 mb-2">Tableau de Bord</h2>
    <p class="text-emerald-700 mb-8">Gérez votre impact environnemental et accédez à vos outils</p>

    <!-- GRID DE SECTIONS -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

        <!-- CARD SCANNER -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-emerald-100 hover:shadow-xl transition-shadow">
            <div class="bg-gradient-to-r from-blue-500 to-cyan-500 h-40 flex items-center justify-center">
                <div class="text-6xl">📱</div>
            </div>
            <div class="p-6">
                <h3 class="text-2xl font-bold text-emerald-900 mb-2">Scanner</h3>
                <p class="text-emerald-700 mb-4">Code-barres, fiche produit et impact environnemental</p>
                <button onclick="goToScan()" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-semibold transition">
                    Ouvrir le scan
                </button>
            </div>
        </div>

        <!-- CARD IMPACT -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-emerald-100 hover:shadow-xl transition-shadow">
            <div class="bg-gradient-to-r from-green-500 to-emerald-500 h-40 flex items-center justify-center">
                <div class="text-6xl">📊</div>
            </div>
            <div class="p-6">
                <h3 class="text-2xl font-bold text-emerald-900 mb-2">Impact Environnemental</h3>
                <p class="text-emerald-700 mb-4">Visualisez votre impact sur l'environnement en temps réel</p>
                <button onclick="goToImpact()" class="w-full bg-green-600 hover:bg-green-700 text-white py-3 rounded-lg font-semibold transition">
                    Voir l'Impact
                </button>
            </div>
        </div>

        <!-- CARD ASSISTANT IA -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-emerald-100 hover:shadow-xl transition-shadow">
            <div class="bg-gradient-to-r from-purple-500 to-pink-500 h-40 flex items-center justify-center">
                <div class="text-6xl">🤖</div>
            </div>
            <div class="p-6">
                <h3 class="text-2xl font-bold text-emerald-900 mb-2">Assistant IA</h3>
                <p class="text-emerald-700 mb-4">Obtenez des conseils personnalisés pour réduire vos déchets</p>
                <button onclick="goToAssistant()" class="w-full bg-purple-600 hover:bg-purple-700 text-white py-3 rounded-lg font-semibold transition">
                    Accéder à l'Assistant
                </button>
            </div>
        </div>

        <!-- CARD DÉFIS -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-emerald-100 hover:shadow-xl transition-shadow">
            <div class="bg-gradient-to-r from-amber-500 to-orange-500 h-40 flex items-center justify-center">
                <div class="text-6xl">🏆</div>
            </div>
            <div class="p-6">
                <h3 class="text-2xl font-bold text-emerald-900 mb-2">Défis</h3>
                <p class="text-emerald-700 mb-4">Filtrez par catégorie et participez aux défis communautaires</p>
                <button onclick="goToDefis()" class="w-full bg-amber-600 hover:bg-amber-700 text-white py-3 rounded-lg font-semibold transition">
                    Voir les défis
                </button>
            </div>
        </div>

    </div>

    <!-- STATISTIQUES (données PHP : mises à jour à chaque scan / conseil assistant) -->
    <div class="mt-12 bg-gradient-to-r from-emerald-50 to-green-50 rounded-2xl p-8 border border-emerald-200" id="stats-dashboard">
        <h3 class="text-2xl font-bold text-emerald-900 mb-6">Vos Statistiques</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="text-center">
                <div class="text-4xl font-bold text-emerald-600 mb-2" data-stat="articles">{{ (int) ($stats['articles_scannes'] ?? 0) }}</div>
                <p class="text-emerald-700">Articles Scannés</p>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-green-600 mb-2"><span data-stat="dechets">{{ number_format((float) ($stats['dechets_kg'] ?? 0), 1, ',', ' ') }}</span> kg</div>
                <p class="text-emerald-700">Déchets Économisés</p>
                <p class="text-xs text-emerald-600/80 mt-1">Estimation cumulée après chaque scan</p>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-blue-600 mb-2" data-stat="conseils">{{ (int) ($stats['conseils_appliques'] ?? 0) }}</div>
                <p class="text-emerald-700">Conseils Appliqués</p>
                <p class="text-xs text-emerald-600/80 mt-1">Assistant IA (réponses réussies)</p>
            </div>
        </div>
    </div>

</main>

<!-- FOOTER -->
<footer class="bg-emerald-900 text-white mt-16 py-8">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <p>&copy; 2026 Zéro Déchet - Réduisons nos déchets ensemble</p>
    </div>
</footer>

<script>
    function goToScan() {
        window.location.href = '/scan';
    }

    function goToDefis() {
        window.location.href = '/defis';
    }

    function goToImpact() {
        window.location.href = '/impact';
    }

    function goToAssistant() {
        window.location.href = '/assistant';
    }

    /* Animation légère des chiffres au chargement (optionnel) */
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('[data-stat]').forEach(function (el) {
            var raw = el.textContent.replace(/\s/g, '').replace(',', '.');
            var target = parseFloat(raw);
            if (isNaN(target) || target === 0) return;
            var start = 0;
            var steps = 24;
            var step = 0;
            var dec = el.dataset.stat === 'dechets';
            var timer = setInterval(function () {
                step++;
                var v = start + (target - start) * (step / steps);
                el.textContent = dec ? v.toFixed(1).replace('.', ',') : String(Math.round(v));
                if (step >= steps) {
                    clearInterval(timer);
                    el.textContent = dec ? target.toFixed(1).replace('.', ',') : String(Math.round(target));
                }
            }, 20);
        });
    });
</script>

</body>
</html>
