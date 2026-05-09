<!DOCTYPE html>

<html class="light" lang="fr"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Zéro Déchet - Réduisez vos déchets, protégez l'avenir</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "on-secondary": "#ffffff",
                    "outline-variant": "#c2c9bb",
                    "on-tertiary-container": "#accaa8",
                    "on-background": "#1a1c1b",
                    "surface-bright": "#f9f9f7",
                    "secondary-fixed": "#e9e2d6",
                    "on-primary-fixed-variant": "#23501e",
                    "surface-container-high": "#e8e8e6",
                    "surface-container": "#eeeeec",
                    "on-primary-fixed": "#002201",
                    "on-secondary-fixed-variant": "#4a463e",
                    "inverse-primary": "#a1d494",
                    "background": "#f9f9f7",
                    "error-container": "#ffdad6",
                    "on-surface": "#1a1c1b",
                    "on-tertiary": "#ffffff",
                    "tertiary": "#253f26",
                    "on-secondary-container": "#666259",
                    "on-primary": "#ffffff",
                    "surface-variant": "#e2e3e1",
                    "primary-fixed": "#bcf0ae",
                    "error": "#ba1a1a",
                    "tertiary-fixed-dim": "#b0cfad",
                    "on-surface-variant": "#42493e",
                    "primary": "#154212",
                    "on-secondary-fixed": "#1e1b14",
                    "surface-container-highest": "#e2e3e1",
                    "outline": "#72796e",
                    "on-primary-container": "#9dd090",
                    "tertiary-fixed": "#ccebc7",
                    "primary-container": "#2d5a27",
                    "surface": "#f9f9f7",
                    "on-tertiary-fixed-variant": "#334d33",
                    "secondary": "#625e55",
                    "inverse-on-surface": "#f1f1ef",
                    "secondary-container": "#e6dfd3",
                    "tertiary-container": "#3c563b",
                    "surface-container-low": "#f4f4f2",
                    "primary-fixed-dim": "#a1d494",
                    "surface-tint": "#3b6934",
                    "on-error-container": "#93000a",
                    "surface-dim": "#dadad8",
                    "secondary-fixed-dim": "#ccc6ba",
                    "inverse-surface": "#2f3130",
                    "surface-container-lowest": "#ffffff",
                    "on-error": "#ffffff",
                    "on-tertiary-fixed": "#07200b"
            },
            "borderRadius": {
                    "DEFAULT": "0.25rem",
                    "lg": "0.5rem",
                    "xl": "0.75rem",
                    "full": "9999px"
            },
            "spacing": {
                    "unit": "8px",
                    "margin": "32px",
                    "container-max": "1280px",
                    "gutter": "24px"
            },
            "fontFamily": {
                    "h1": ["Plus Jakarta Sans"],
                    "body-lg": ["Plus Jakarta Sans"],
                    "label-sm": ["Plus Jakarta Sans"],
                    "h3": ["Plus Jakarta Sans"],
                    "h2": ["Plus Jakarta Sans"],
                    "body-md": ["Plus Jakarta Sans"]
            },
            "fontSize": {
                    "h1": ["48px", {"lineHeight": "1.2", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                    "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}],
                    "label-sm": ["14px", {"lineHeight": "1.2", "letterSpacing": "0.05em", "fontWeight": "600"}],
                    "h3": ["24px", {"lineHeight": "1.4", "fontWeight": "600"}],
                    "h2": ["32px", {"lineHeight": "1.3", "letterSpacing": "-0.01em", "fontWeight": "600"}],
                    "body-md": ["16px", {"lineHeight": "1.6", "fontWeight": "400"}]
            }
          }
        }
      }
    </script>
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .organic-shape {
            border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
        }
    </style>
</head>
<body class="bg-background font-body-md text-on-background selection:bg-primary-fixed selection:text-on-primary-fixed">
<!-- TopNavBar -->
<header class="fixed top-0 left-0 right-0 z-50 bg-stone-50/90 backdrop-blur-md border-b border-stone-200">
<div class="flex justify-between items-center w-full px-8 py-4 max-w-screen-2xl mx-auto">
<div class="flex items-center gap-8">
<a class="text-2xl font-bold text-green-900 tracking-tighter italic" href="/solutions">Zéro Déchet</a>
<nav class="hidden md:flex items-center gap-6">
<button onclick="navigateTo('/')" class="font-['Plus_Jakarta_Sans'] text-sm font-medium tracking-wide text-stone-600 hover:text-green-700 transition-colors cursor-pointer">Accueil</button>
<button onclick="navigateTo('/solutions')" class="font-['Plus_Jakarta_Sans'] text-sm font-medium tracking-wide text-stone-600 hover:text-green-700 transition-colors cursor-pointer">Solutions</button>
<button onclick="navigateTo('/impact')" class="font-['Plus_Jakarta_Sans'] text-sm font-medium tracking-wide text-stone-600 hover:text-green-700 transition-colors cursor-pointer">Impact</button>
<button onclick="navigateTo('/assistant')" class="font-['Plus_Jakarta_Sans'] text-sm font-medium tracking-wide text-stone-600 hover:text-green-700 transition-colors cursor-pointer">Assistant IA</button>
<button onclick="navigateTo('/blog')" class="font-['Plus_Jakarta_Sans'] text-sm font-medium tracking-wide text-stone-600 hover:text-green-700 transition-colors cursor-pointer">Blog</button>
<button onclick="navigateTo('/contact')" class="font-['Plus_Jakarta_Sans'] text-sm font-medium tracking-wide text-stone-600 hover:text-green-700 transition-colors cursor-pointer">Contact</button>
</nav>
</div>
<div class="flex items-center gap-4">
<button onclick="navigateTo('/join')" class="bg-primary text-on-primary px-5 py-2.5 rounded-full font-label-sm text-sm hover:opacity-90 transition-all flex items-center gap-2 shadow-sm cursor-pointer">🌿 Rejoindre</button>
<div class="flex items-center gap-2">
<button class="p-2 text-stone-600 hover:bg-stone-100 rounded-lg transition-all">
<span class="material-symbols-outlined">person</span>
</button>
<button class="p-2 text-stone-600 hover:bg-stone-100 rounded-lg transition-all">
<span class="material-symbols-outlined">notifications</span>
</button>
</div>
</div>
</div>
</header>
<main class="pt-24">
<!-- Hero Section -->
<section class="relative overflow-hidden px-8 py-20 lg:py-32 max-w-screen-2xl mx-auto">
<div class="grid lg:grid-cols-2 gap-16 items-center">
<div class="z-10">
<span class="inline-block px-4 py-1.5 bg-primary-fixed text-on-primary-fixed-variant rounded-full text-label-sm mb-6 uppercase tracking-widest">Mouvement Collectif</span>
<h1 class="font-h1 text-h1 text-on-surface mb-6 leading-tight">Réduisez vos déchets, protégez l'avenir</h1>
<p class="font-body-lg text-body-lg text-on-surface-variant mb-10 max-w-xl">
                        Rejoignez une communauté engagée pour une consommation consciente. Ensemble, chaque geste compte pour transformer notre empreinte environnementale en un héritage durable.
                    </p>
<div class="flex flex-wrap gap-4">
<button class="bg-primary text-on-primary px-8 py-4 rounded-full font-h3 text-lg hover:shadow-lg transition-all scale-95 active:scale-90">🌿 Rejoindre</button>
<button class="border border-outline text-primary px-8 py-4 rounded-full font-h3 text-lg hover:bg-surface-container-low transition-all">
                            Voir le catalogue
                        </button>
</div>
</div>
<div class="relative">
<div class="organic-shape bg-primary-container/20 absolute -inset-10 -z-10"></div>
<img alt="Sustainable Lifestyle" class="rounded-[2rem] shadow-2xl w-full object-cover aspect-[4/3]" data-alt="A serene, high-key photograph of a modern, eco-friendly kitchen space featuring reusable glass jars filled with grains and sustainable wooden utensils. The lighting is soft and natural, streaming from a large window to create a bright, airy atmosphere. A small green plant grows in a terracotta pot in the foreground, emphasizing life and renewal. The color palette consists of soft beiges, crisp whites, and deep forest greens, perfectly embodying the Natural Minimalism aesthetic." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDiTjpYcu4lmrl1OdUr1XJ96NGQg9wkDfdeUmg2zq2eIf9F-qCG_jUsdFV3Ts26bfkUPsVti48yHP-ISAJkxQ5fSD8c1pxdg-jj_iJ_MnIo-37jSXPJ3we7DVekXi1cYCKkd0eFrmXXXYF3I_U0H7xYRmhOyq1zbfPJL9VLNe5gqar1sXul5ABFosoo3plz1dPEB3jlu1uYCS_VmNb5puftbpv1PQGpVJ9iL_cxglSbuwp8UAMz7yJN_GBTgZviIsKaMJDcqAtDg2s"/>
</div>
</div>
</section>
<!-- How It Works Section -->
<section class="bg-surface-container-lowest py-24 px-8 border-y border-stone-100">
<div class="max-w-screen-2xl mx-auto">
<div class="text-center mb-16">
<h2 class="font-h2 text-h2 text-primary mb-4">Nos Solutions</h2>
<div class="h-1 w-20 bg-primary-fixed-dim mx-auto rounded-full"></div>
</div>
<div class="grid md:grid-cols-3 gap-12">
<!-- Scan -->
<div class="group p-8 rounded-2xl hover:bg-surface-container-low transition-all duration-500">
<div class="w-16 h-16 bg-primary-container rounded-2xl flex items-center justify-center mb-6 text-on-primary-container group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined text-4xl">barcode_scanner</span>
</div>
<h3 class="font-h3 text-h3 mb-4 text-on-surface">Scan</h3>
<p class="text-on-surface-variant leading-relaxed">
                            Analysez instantanément vos produits du quotidien. Obtenez une transparence totale sur leur composition et leur recyclabilité.
                        </p>
</div>
<!-- Impact -->
<div class="group p-8 rounded-2xl hover:bg-surface-container-low transition-all duration-500">
<div class="w-16 h-16 bg-secondary-container rounded-2xl flex items-center justify-center mb-6 text-on-secondary-container group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined text-4xl">eco</span>
</div>
<h3 class="font-h3 text-h3 mb-4 text-on-surface">Impact</h3>
<p class="text-on-surface-variant leading-relaxed">
                            Mesurez votre empreinte carbone en temps réel. Suivez votre progression personnelle et l'impact collectif de la communauté.
                        </p>
</div>
<!-- Switch -->
<div class="group p-8 rounded-2xl hover:bg-surface-container-low transition-all duration-500">
<div class="w-16 h-16 bg-tertiary-container rounded-2xl flex items-center justify-center mb-6 text-on-tertiary-container group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined text-4xl">rebase_edit</span>
</div>
<h3 class="font-h3 text-h3 mb-4 text-on-surface">Switch</h3>
<p class="text-on-surface-variant leading-relaxed">
                            Découvrez des alternatives durables et locales. Changez vos habitudes pas à pas avec nos recommandations personnalisées.
                        </p>
</div>
</div>
</div>
</section>
<!-- Community Challenges (Bento Layout) -->
<section class="py-24 px-8 max-w-screen-2xl mx-auto">
<div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6">
<div>
<h2 class="font-h2 text-h2 text-on-surface mb-2">Notre Impact</h2>
<p class="text-on-surface-variant">Relevez des défis, gagnez des points, sauvez la planète.</p>
</div>
<a class="text-primary font-label-sm border-b-2 border-primary-fixed pb-1 hover:border-primary transition-all" href="#">Tous les challenges →</a>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 grid-rows-2 gap-6 h-auto md:h-[600px]">
<!-- Challenge of the Week (Main Card) -->
<div class="md:col-span-2 md:row-span-2 relative rounded-3xl overflow-hidden group">
<img class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" data-alt="A beautiful, vibrant outdoor farmers market scene during a golden hour sunset. A variety of fresh, organic vegetables like carrots, leafy greens, and tomatoes are displayed in wooden crates. The soft, warm light creates long shadows and a welcoming, earthy mood. This image highlights community involvement and sustainable sourcing, aligned with the Zero Waste brand's focus on local impact and natural purity." src="https://lh3.googleusercontent.com/aida-public/AB6AXuB7-lFWx43zOGgVYH_5v6DmtZe7sEtd2_gk1GInBbhKJtHA57dhYBwdRPollrGmIJNWHtU6GbvlBbEluoCyOFnokoULHCI-FAUm8OqB8_Mbr6eX1TBQxcqdTIssSBJbFol5FuUHeafNnFWup0Yv0DKZ3eRRQynje1Ndc00MtljR9cbOmyxK-R1cMxmHbajuqYnvL4BfP896SofeVmObjhKHztaLv9OcPViPJALrN5umpivQp16VGxEih_yONRtYqTdPYpMoMXX_vfc"/>
<div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
<div class="absolute bottom-0 left-0 p-10 w-full">
<div class="flex items-center gap-3 mb-4">
<span class="bg-primary text-on-primary px-3 py-1 rounded-full text-[12px] font-bold uppercase tracking-wider">Challenge de la semaine</span>
<span class="text-white/80 text-sm flex items-center gap-1">
<span class="material-symbols-outlined text-sm">schedule</span> 4 jours restants
                            </span>
</div>
<h3 class="text-white font-h1 text-h2 mb-4">Zéro Plastique en Cuisine</h3>
<p class="text-white/80 text-lg max-w-lg mb-6">Remplacez tous vos emballages plastiques par des alternatives réutilisables ou biodégradables pendant 7 jours.</p>
<button class="bg-white text-primary px-6 py-3 rounded-full font-label-sm hover:bg-primary-fixed transition-colors">Rejoindre 1.2k participants</button>
</div>
</div>
<!-- Secondary Challenge 1 -->
<div class="bg-tertiary-container rounded-3xl p-8 flex flex-col justify-between text-on-tertiary-container group cursor-pointer hover:shadow-lg transition-all">
<div>
<span class="material-symbols-outlined text-4xl mb-4">water_drop</span>
<h4 class="font-h3 text-h3 mb-2 text-white">Économie Bleue</h4>
<p class="text-white/70 text-sm">Réduisez votre consommation d'eau domestique de 15%.</p>
</div>
<div class="flex justify-between items-center mt-4">
<span class="text-xs font-bold uppercase tracking-tighter">500 Points</span>
<span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
</div>
</div>
<!-- Secondary Challenge 2 -->
<div class="bg-secondary-container rounded-3xl p-8 flex flex-col justify-between text-on-secondary-container group cursor-pointer hover:shadow-lg transition-all">
<div>
<span class="material-symbols-outlined text-4xl mb-4">compost</span>
<h4 class="font-h3 text-h3 mb-2 text-on-surface">Compost Master</h4>
<p class="text-on-surface-variant text-sm">Démarrez votre propre compost de balcon ou de jardin.</p>
</div>
<div class="flex justify-between items-center mt-4">
<span class="text-xs font-bold uppercase tracking-tighter">750 Points</span>
<span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
</div>
</div>
</div>
</section>
<!-- Newsletter / Community Growth -->
<section class="py-24 px-8 max-w-screen-2xl mx-auto">
<div class="bg-primary-container/10 rounded-[3rem] p-12 md:p-20 text-center relative overflow-hidden">
<div class="absolute -top-20 -left-20 w-64 h-64 bg-primary/5 rounded-full blur-3xl"></div>
<div class="absolute -bottom-20 -right-20 w-64 h-64 bg-secondary/5 rounded-full blur-3xl"></div>
<h2 class="font-h2 text-h1 text-primary mb-6">Chaque geste compte</h2>
<p class="text-on-surface-variant font-body-lg text-lg max-w-2xl mx-auto mb-10">
                    Inscrivez-vous pour recevoir nos conseils hebdomadaires et rejoignez les 50 000 personnes qui changent déjà le futur.
                </p>
<div class="flex flex-col md:flex-row gap-4 max-w-md mx-auto">
<input class="flex-1 px-6 py-4 rounded-full border-outline bg-white focus:ring-primary focus:border-primary transition-all" placeholder="votre@email.com" type="email"/>
<button class="bg-primary text-on-primary px-8 py-4 rounded-full font-label-sm whitespace-nowrap hover:shadow-md transition-all">S'inscrire</button>
</div>
</div>
</section>
</main>
<!-- Footer -->
<footer class="bg-stone-100 border-t border-stone-200">
<div class="w-full py-16 px-12 flex flex-col md:flex-row justify-between items-center gap-8 max-w-screen-2xl mx-auto">
<div class="flex flex-col items-center md:items-start gap-4">
<span class="text-lg font-semibold text-green-800">Zéro Déchet</span>
<p class="font-['Plus_Jakarta_Sans'] text-xs uppercase tracking-widest text-stone-500">© 2024 Zéro Déchet. For a breathable, renewable future.</p>
</div>
<div class="flex flex-wrap justify-center gap-8">
<button onclick="navigateTo('/')" class="font-['Plus_Jakarta_Sans'] text-xs uppercase tracking-widest text-stone-500 hover:text-green-600 transition-colors hover:underline decoration-green-500 underline-offset-4 cursor-pointer">Accueil</button>
<button onclick="navigateTo('/solutions')" class="font-['Plus_Jakarta_Sans'] text-xs uppercase tracking-widest text-stone-500 hover:text-green-600 transition-colors hover:underline decoration-green-500 underline-offset-4 cursor-pointer">Solutions</button>
<button onclick="navigateTo('/impact')" class="font-['Plus_Jakarta_Sans'] text-xs uppercase tracking-widest text-stone-500 hover:text-green-600 transition-colors hover:underline decoration-green-500 underline-offset-4 cursor-pointer">Impact</button>
<button onclick="navigateTo('/assistant')" class="font-['Plus_Jakarta_Sans'] text-xs uppercase tracking-widest text-stone-500 hover:text-green-600 transition-colors hover:underline decoration-green-500 underline-offset-4 cursor-pointer">Assistant IA</button>
<button onclick="navigateTo('/blog')" class="font-['Plus_Jakarta_Sans'] text-xs uppercase tracking-widest text-stone-500 hover:text-green-600 transition-colors hover:underline decoration-green-500 underline-offset-4 cursor-pointer">Blog</button>
<button onclick="navigateTo('/contact')" class="font-['Plus_Jakarta_Sans'] text-xs uppercase tracking-widest text-stone-500 hover:text-green-600 transition-colors hover:underline decoration-green-500 underline-offset-4 cursor-pointer">Contact</button>
</div>
<div class="flex gap-4 opacity-80 hover:opacity-100 transition-opacity">
<a class="p-2 bg-stone-200 rounded-full text-stone-600 hover:bg-primary-fixed hover:text-on-primary-fixed-variant transition-colors" href="#">
<span class="material-symbols-outlined text-[20px]">public</span>
</a>
<a class="p-2 bg-stone-200 rounded-full text-stone-600 hover:bg-primary-fixed hover:text-on-primary-fixed-variant transition-colors" href="#">
<span class="material-symbols-outlined text-[20px]">hub</span>
</a>
</div>
</div>
<script>
function navigateTo(path) {
  window.location.href = path;
}
</script>
</footer>
</body></html>
