<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejoindre - ZeroTrace</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gradient-to-b from-white via-emerald-50 to-white">

<header class="border-b border-emerald-100 bg-white">
    <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">

        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-emerald-600 rounded-lg flex items-center justify-center text-white">
                ♻️
            </div>

            <h1 class="text-2xl font-bold text-emerald-900">
                ZeroTrace
            </h1>
        </div>

        <div class="flex items-center gap-6">
            <a href="/" class="text-emerald-700 font-semibold">Accueil</a>
            <a href="/assistant" class="text-emerald-700 font-semibold">Assistant IA</a>
        </div>

    </div>
</header>

<main class="max-w-6xl mx-auto px-6 py-12">

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

        <!-- LEFT -->
        <div>

            <h2 class="text-5xl font-bold text-emerald-900 leading-tight mb-6">
                Rejoignez le
                <span class="text-emerald-600">
                    mouvement zéro déchet
                </span>
            </h2>

            <p class="text-lg text-emerald-700 mb-8">
                Devenez un guerrier écologique et commencez à suivre votre impact environnemental dès aujourd'hui.
            </p>

            <div class="space-y-6">

                <div class="flex gap-3">
                    <div class="w-6 h-6 bg-emerald-600 rounded-full text-white flex items-center justify-center">
                        ✓
                    </div>

                    <div>
                        <h4 class="font-bold text-emerald-900">
                            Scannez facilement
                        </h4>

                        <p class="text-sm text-emerald-700">
                            Accédez à notre scanner instantané
                        </p>
                    </div>
                </div>

                <div class="flex gap-3">
                    <div class="w-6 h-6 bg-emerald-600 rounded-full text-white flex items-center justify-center">
                        ✓
                    </div>

                    <div>
                        <h4 class="font-bold text-emerald-900">
                            Suivez votre progrès
                        </h4>

                        <p class="text-sm text-emerald-700">
                            Analyse détaillée de votre impact
                        </p>
                    </div>
                </div>

                <div class="flex gap-3">
                    <div class="w-6 h-6 bg-emerald-600 rounded-full text-white flex items-center justify-center">
                        ✓
                    </div>

                    <div>
                        <h4 class="font-bold text-emerald-900">
                            Conseils personnalisés
                        </h4>

                        <p class="text-sm text-emerald-700">
                            Recommandations adaptées à vos habitudes
                        </p>
                    </div>
                </div>

            </div>

        </div>

        <!-- RIGHT -->
        <div>

            <div class="bg-white rounded-2xl shadow-xl p-8 border border-emerald-100">

                <h3 class="text-3xl font-bold text-emerald-900 mb-2">
                    Créez votre compte
                </h3>

                <p class="text-emerald-700 mb-6">
                    Commencez votre voyage zéro déchet maintenant
                </p>

                <form method="POST" action="{{ isset($user) ? '/update/'.$user->id : '/register' }}">

                    @csrf
                    @if(isset($user))
                        @method('PUT')
                    @endif

                    <!-- NAME -->
                    <div>

                        <label class="block text-sm font-medium text-emerald-900 mb-2">
                            Nom complet
                        </label>

                        <input
                            type="text"
                            name="name"
                            placeholder="Jean Dupont"
                            value="{{ $user->name ?? '' }}"
                            required
                            class="w-full px-4 py-3 bg-emerald-50 border border-emerald-200 rounded-lg">
                    </div>

                    <!-- EMAIL -->
                    <div>

                        <label class="block text-sm font-medium text-emerald-900 mb-2">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            placeholder="vous@exemple.com"
                            value="{{ $user->email ?? '' }}"
                            required
                            class="w-full px-4 py-3 bg-emerald-50 border border-emerald-200 rounded-lg">
                    </div>

                    <!-- PASSWORD -->
                    <div>

                        <label class="block text-sm font-medium text-emerald-900 mb-2">
                            Mot de passe
                        </label>

                        <input
                            type="password"
                            name="password"
                            placeholder="••••••••"
                            required
                            class="w-full px-4 py-3 bg-emerald-50 border border-emerald-200 rounded-lg">
                    </div>

                    <!-- CONFIRM PASSWORD -->
                    <div>

                        <label class="block text-sm font-medium text-emerald-900 mb-2">
                            Confirmer le mot de passe
                        </label>

                        <input
                            type="password"
                            name="confirmPassword"
                            placeholder="••••••••"
                            required
                            class="w-full px-4 py-3 bg-emerald-50 border border-emerald-200 rounded-lg">
                    </div>

                    <!-- CHECKBOX -->
                    <div class="flex gap-3 items-start">

                        <input type="checkbox" required class="mt-1">

                        <p class="text-sm text-emerald-700">
                            J'accepte les
                            <a href="#" class="underline font-semibold">
                                conditions d'utilisation
                            </a>
                            et la
                            <a href="#" class="underline font-semibold">
                                politique de confidentialité
                            </a>
                        </p>

                    </div>
<!-- BUTTONS -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-5 pt-8">

    <!-- AJOUTER -->
    <button
        type="submit"
        class="group relative overflow-hidden bg-gradient-to-r from-emerald-600 to-green-600 hover:from-emerald-700 hover:to-green-700 text-white py-4 rounded-2xl font-bold text-lg shadow-xl transition-all duration-300 hover:scale-105">

        <span class="relative z-10 flex items-center justify-center gap-2">
            ➕ Ajouter
        </span>

    </button>

    <!-- MODIFIER -->
    <button
        type="button"
        onclick="window.location.href='/edit/1'"
        class="group relative overflow-hidden bg-gradient-to-r from-blue-600 to-cyan-600 hover:from-blue-700 hover:to-cyan-700 text-white py-4 rounded-2xl font-bold text-lg shadow-xl transition-all duration-300 hover:scale-105">

        <span class="relative z-10 flex items-center justify-center gap-2">
            ✏️ Modifier
        </span>

    </button>

    <!-- ANNULER -->
    <button
        type="button"
        onclick="annulerFormulaire()"
        class="group relative overflow-hidden bg-gradient-to-r from-gray-200 to-gray-300 hover:from-gray-300 hover:to-gray-400 text-gray-700 py-4 rounded-2xl font-bold text-lg shadow-lg transition-all duration-300 hover:scale-105">

        <span class="relative z-10 flex items-center justify-center gap-2">
            ❌ Annuler
        </span>

    </button>

</div>
</div>

        </div>

    </div>

</main>
<script>

function annulerFormulaire() {

    document.querySelector('form').reset();

}

function modifierCompte() {

    alert("Mode modification activé");

}

</script>
<script>

function annulerFormulaire() {

    document.querySelector('form').reset();

    alert("Formulaire réinitialisé");

}

function modifierCompte() {

    alert("Mode modification activé");

}

</script>
</body>
</html>