<!DOCTYPE html>

<html class="light" lang="fr"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "secondary-fixed-dim": "#ccc6ba",
                        "secondary-fixed": "#e9e2d6",
                        "primary-fixed-dim": "#a1d494",
                        "outline-variant": "#c2c9bb",
                        "surface-container-high": "#e8e8e6",
                        "primary": "#154212",
                        "on-primary-container": "#9dd090",
                        "surface-container-highest": "#e2e3e1",
                        "on-secondary-container": "#666259",
                        "on-error-container": "#93000a",
                        "on-tertiary": "#ffffff",
                        "inverse-on-surface": "#f1f1ef",
                        "surface-tint": "#3b6934",
                        "on-background": "#1a1c1b",
                        "on-tertiary-container": "#accaa8",
                        "on-tertiary-fixed-variant": "#334d33",
                        "on-primary-fixed-variant": "#23501e",
                        "on-primary": "#ffffff",
                        "on-error": "#ffffff",
                        "inverse-primary": "#a1d494",
                        "tertiary-fixed-dim": "#b0cfad",
                        "surface-container-low": "#f4f4f2",
                        "secondary": "#625e55",
                        "outline": "#72796e",
                        "on-secondary-fixed-variant": "#4a463e",
                        "background": "#f9f9f7",
                        "surface-container": "#eeeeec",
                        "primary-fixed": "#bcf0ae",
                        "tertiary-fixed": "#ccebc7",
                        "surface-bright": "#f9f9f7",
                        "surface": "#f9f9f7",
                        "tertiary": "#253f26",
                        "error": "#ba1a1a",
                        "tertiary-container": "#3c563b",
                        "surface-dim": "#dadad8",
                        "secondary-container": "#e6dfd3",
                        "primary-container": "#2d5a27",
                        "error-container": "#ffdad6",
                        "inverse-surface": "#2f3130",
                        "surface-container-lowest": "#ffffff",
                        "on-surface-variant": "#42493e",
                        "on-primary-fixed": "#002201",
                        "on-secondary-fixed": "#1e1b14",
                        "surface-variant": "#e2e3e1",
                        "on-surface": "#1a1c1b",
                        "on-tertiary-fixed": "#07200b",
                        "on-secondary": "#ffffff"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "container-max": "1280px",
                        "unit": "8px",
                        "margin": "32px",
                        "gutter": "24px"
                    },
                    "fontFamily": {
                        "label-sm": ["Plus Jakarta Sans"],
                        "h3": ["Plus Jakarta Sans"],
                        "body-md": ["Plus Jakarta Sans"],
                        "h1": ["Plus Jakarta Sans"],
                        "body-lg": ["Plus Jakarta Sans"],
                        "h2": ["Plus Jakarta Sans"]
                    },
                    "fontSize": {
                        "label-sm": ["14px", {"lineHeight": "1.2", "letterSpacing": "0.05em", "fontWeight": "600"}],
                        "h3": ["24px", {"lineHeight": "1.4", "fontWeight": "600"}],
                        "body-md": ["16px", {"lineHeight": "1.6", "fontWeight": "400"}],
                        "h1": ["48px", {"lineHeight": "1.2", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                        "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}],
                        "h2": ["32px", {"lineHeight": "1.3", "letterSpacing": "-0.01em", "fontWeight": "600"}]
                    }
                },
            },
        }
    </script>
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        body {
            background-color: #f9f9f7;
            color: #1a1c1b;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>
<body class="bg-background text-on-surface">
<!-- TopNavBar -->
<header class="bg-surface/80 dark:bg-surface-dim/80 backdrop-blur-md shadow-[0_4px_20px_-4px_rgba(21,66,18,0.08)] docked full-width top-0 sticky z-50">
<nav class="flex justify-between items-center w-full px-margin py-unit max-w-container-max mx-auto">
<div class="text-h3 font-h3 tracking-tight text-primary dark:text-primary-fixed-dim">Zéro Déchet</div>
<!-- Desktop Navigation -->
<div class="hidden md:flex items-center gap-gutter font-body-md text-body-md">
<button onclick="navigateTo('/')" class="text-on-surface-variant dark:text-secondary-fixed-dim hover:text-primary transition-colors cursor-pointer">Accueil</button>
<button onclick="navigateTo('/solutions')" class="text-primary dark:text-primary-fixed-dim font-bold border-b-2 border-primary dark:border-primary-fixed-dim pb-1 cursor-pointer">Solutions</button>
<button onclick="navigateTo('/scan')" class="text-on-surface-variant dark:text-secondary-fixed-dim hover:text-primary transition-colors cursor-pointer">Scan</button>
<button onclick="navigateTo('/impact')" class="text-on-surface-variant dark:text-secondary-fixed-dim hover:text-primary transition-colors cursor-pointer">Impact</button>
<button onclick="navigateTo('/assistant')" class="text-on-surface-variant dark:text-secondary-fixed-dim hover:text-primary transition-colors cursor-pointer">Assistant IA</button>
<button onclick="navigateTo('/blog')" class="text-on-surface-variant dark:text-secondary-fixed-dim hover:text-primary transition-colors cursor-pointer">Blog</button>
<button onclick="navigateTo('/contact')" class="text-on-surface-variant dark:text-secondary-fixed-dim hover:text-primary transition-colors cursor-pointer">Contact</button>
</div>
<div class="flex items-center">
<button onclick="navigateTo('/join')" class="bg-primary text-on-primary px-6 py-2.5 rounded-full font-label-sm text-label-sm hover:scale-95 duration-200 ease-in-out cursor-pointer">🌿 Rejoindre</button>
</div>
</nav>
</header>
<main>
<!-- Hero Section -->
<section class="relative pt-24 pb-32 px-margin overflow-hidden">
<div class="max-w-container-max mx-auto grid grid-cols-1 md:grid-cols-2 gap-margin items-center">
<div class="z-10">
<span class="font-label-sm text-label-sm text-primary uppercase tracking-widest mb-4 block">Notre Mission</span>
<h1 class="font-h1 text-h1 text-primary mb-6">Nos Solutions pour un mode de vie durable</h1>
<p class="font-body-lg text-body-lg text-on-surface-variant max-w-lg mb-10">
                        Nous mettons la technologie au service de la planète pour vous aider à réduire votre empreinte écologique au quotidien, un geste après l'autre.
                    </p>
<div class="flex flex-wrap gap-4">
<button class="bg-primary text-on-primary px-8 py-4 rounded-full font-label-sm shadow-[0_4px_12px_rgba(21,66,18,0.15)] hover:bg-primary-container transition-colors">Découvrir l'App</button>
<button class="border border-outline text-primary px-8 py-4 rounded-full font-label-sm hover:bg-surface-container-low transition-colors">Voir l'Impact</button>
</div>
</div>
<div class="relative">
<div class="aspect-square rounded-[48px] overflow-hidden shadow-2xl relative">
<img alt="Sustainable lifestyle" class="w-full h-full object-cover" data-alt="A serene and bright lifestyle photograph featuring high-quality glass jars and bamboo toothbrushes on a clean, light beige stone countertop. Natural sunlight streams in from a window, creating soft, diffused shadows and a warm, inviting atmosphere. The scene is minimal and organized, reflecting a commitment to zero-waste living with earthy green accents from a small potted plant in the background. The visual style is premium and eco-conscious." src="https://lh3.googleusercontent.com/aida-public/AB6AXuD0k-INMRU50ftiRdL0yD2VIiYfgAt0CcG5cydkPetJxnvXF0IKxzHlFaFg6I6qNG4_JhNat4reAtHuyoRGCNzAHpkyp6_AVDEPLWCqNA44m697tF8qku0O47IqnfrWhU-K4TfHbBl0KfZ1cl0GikSp5lolhOSi7u1rvT86jRbbGN9jFLojYACYpdYX_GNqm84cWlDchNL_zrBgNKr5U5yFSuxqXnYirIqi_fR-OeA02R2BFByIAK9hp0GKiy1nlBhjpxk2XD8xo5M"/>
</div>
<div class="absolute -bottom-6 -left-6 bg-white p-6 rounded-3xl shadow-xl flex items-center gap-4 max-w-xs">
<div class="w-12 h-12 bg-primary-fixed rounded-full flex items-center justify-center">
<span class="material-symbols-outlined text-primary" data-icon="eco" style="font-variation-settings: 'FILL' 1;">eco</span>
</div>
<div>
<p class="font-label-sm text-primary">-24kg CO2</p>
<p class="text-xs text-on-surface-variant">Économie moyenne par mois</p>
</div>
</div>
</div>
</div>
</section>
<!-- Detailed Solutions Bento Grid -->
<section class="py-24 bg-surface-container-low">
<div class="max-w-container-max mx-auto px-margin">
<div class="text-center mb-16">
<h2 class="font-h2 text-h2 text-primary mb-4">L'écosystème au service du changement</h2>
<p class="font-body-md text-body-md text-on-surface-variant max-w-2xl mx-auto">Trois piliers fondamentaux conçus pour transformer vos intentions en actions concrètes et mesurables.</p>
</div>
<div class="grid grid-cols-1 md:grid-cols-12 gap-gutter">
<!-- Scan Intelligent -->
<div class="md:col-span-8 bg-surface-container-lowest p-10 rounded-[32px] shadow-sm border border-outline-variant flex flex-col md:flex-row gap-10 items-center">
<div class="flex-1">
<div class="w-14 h-14 bg-primary-fixed-dim rounded-2xl flex items-center justify-center mb-6">
<span class="material-symbols-outlined text-primary text-3xl" data-icon="barcode_scanner">barcode_scanner</span>
</div>
<h3 class="font-h3 text-h3 text-primary mb-4">Scan Intelligent</h3>
<p class="font-body-md text-body-md text-on-surface-variant mb-6">
                                Ne doutez plus devant un emballage. Notre scanner analyse instantanément la recyclabilité et l'impact environnemental de plus de 500 000 produits.
                            </p>
<ul class="space-y-3">
<li class="flex items-center gap-3 font-body-md text-on-surface">
<span class="material-symbols-outlined text-primary" data-icon="check_circle" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                                    Instructions de tri locales
                                </li>
<li class="flex items-center gap-3 font-body-md text-on-surface">
<span class="material-symbols-outlined text-primary" data-icon="check_circle" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                                    Score carbone en temps réel
                                </li>
</ul>
</div>
<div class="w-full md:w-64 h-80 rounded-2xl overflow-hidden shadow-lg border-4 border-white">
<img alt="App Scanning" class="w-full h-full object-cover" data-alt="A close-up shot of a smartphone screen displaying a sleek mobile application interface for scanning product barcodes. The hand holding the phone is positioned over a recyclable cardboard package. The lighting is bright and natural, suggesting a modern kitchen setting. The app interface uses soft sage green and white tones, matching the global zero-waste brand aesthetic. The background is softly blurred to keep focus on the interaction." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAaibpaXWJCyZM9FJWnabVNFHmb7iGSY6c_3IEBQ1QxsnBPN6MBM_Pm_RN_zpeI3KSlkZ_xzmjcdGVleqLrTlRZS405XWihfrssGc-H3KO5r9V2VIhug5TcET4nxjo5_vnn3uNyAV8Myqhb4mEBGfxy45Z8G8s1-xBfWbfMWaDWJDkXtcHFTBr33RNzTaZ0f3eIqug0mITm8tPEFfdiUTHKcwV_HJcOOsyt7MvsEeU0_2prQ_Juk4ScdYjCB5V9mV4xis5K6GfcoQ0"/>
</div>
</div>
<!-- Suivi d'Impact -->
<div class="md:col-span-4 bg-primary text-on-primary p-10 rounded-[32px] shadow-sm flex flex-col justify-between">
<div>
<div class="w-14 h-14 bg-on-primary-container rounded-2xl flex items-center justify-center mb-6">
<span class="material-symbols-outlined text-primary text-3xl" data-icon="query_stats">query_stats</span>
</div>
<h3 class="font-h3 text-h3 mb-4">Suivi d'Impact</h3>
<p class="font-body-md text-body-md opacity-90 mb-8">
                                Visualisez vos progrès à travers un tableau de bord personnalisé. Suivez vos économies de CO2 et de déchets plastiques mois après mois.
                            </p>
</div>
<div class="bg-primary-container/20 p-6 rounded-2xl border border-primary-fixed-dim/30">
<div class="flex items-end justify-between gap-2 h-24 mb-4">
<div class="w-full bg-primary-fixed-dim h-1/2 rounded-t-lg"></div>
<div class="w-full bg-primary-fixed-dim h-2/3 rounded-t-lg"></div>
<div class="w-full bg-primary-fixed-dim h-3/4 rounded-t-lg"></div>
<div class="w-full bg-primary-fixed-dim h-full rounded-t-lg"></div>
<div class="w-full bg-on-primary-container h-full rounded-t-lg"></div>
</div>
<p class="font-label-sm text-center">Votre progression hebdomadaire</p>
</div>
</div>
<!-- Le Switch -->
<div class="md:col-span-12 bg-secondary-container p-10 rounded-[32px] flex flex-col md:flex-row gap-12 items-center">
<div class="w-full md:w-1/2 grid grid-cols-2 gap-4">
<div class="aspect-square rounded-2xl overflow-hidden shadow-md">
<img alt="Solid soap" class="w-full h-full object-cover" data-alt="Minimalist top-down view of organic solid soaps and wooden brushes on a neutral, textured background. The composition is clean and artistic, emphasizing natural materials like wood, jute, and vegetable glycerin. Soft morning light creates delicate shadows, evoking a sense of purity and calm. The color palette is dominated by creams, beiges, and soft greens." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCEfnurrn3Zj7EvoF_k8Qh1-9nqL6drZ1YcKfA8n1cqy74nSsUqBTiO65x2kfcKlOWkIDm6wjBH-bYxwr1G3GLvznLj0TOOfZeb2c16k7QV2pYMxNRo4sBHelLER5BroASa4DX--IFFsA1ULDRUzYyGo7SD3qqqcym5mTMbUMgJAb__JrtA-z73noayutNb-SUi-ctxLrw8d_6LuL0aIAl6NUEJ8xEUnpG9jHJdzhvdlMVfVYJ-BJMBOJI4DbHxX1qV5Yg2YAxJqus"/>
</div>
<div class="aspect-square rounded-2xl overflow-hidden shadow-md translate-y-8">
<img alt="Bulk shopping" class="w-full h-full object-cover" data-alt="An aesthetic shot of glass containers filled with various bulk grains, seeds, and nuts on a clean pantry shelf. The jars are labeled with minimalist paper tags. The lighting is bright and airy, highlighting the textures of the contents. The scene represents an organized, sustainable kitchen environment aligned with zero-waste principles. Natural wood and glass elements are prominent." src="https://lh3.googleusercontent.com/aida-public/AB6AXuB-5TTLaCWBPPM_1Zql5vnPK2DWqL6CY09dZ6guX2-EHc1HhOxCV8bEX-SEOEMsaQgXttFtbD8MuI4ZB7HUBRJYMU4kzkl5Z_nBqyd7U4l9dhRToCa6urs5pIs_3b0FxNgh31RghJpu1hhERwHyrv6ZoRutNeTPlcBK-vf5hstZ6coWBGAKPqFFZDHor0WjnPFcoCIkEurWcg3buUEIQJtfcxqcFkdXjolTPAo2RdplFrAEl2HEqAzo7Zm49nrrIaRqF7Lp43TPWvQ"/>
</div>
</div>
<div class="md:w-1/2">
<div class="w-14 h-14 bg-on-secondary-container/10 rounded-2xl flex items-center justify-center mb-6">
<span class="material-symbols-outlined text-on-secondary-container text-3xl" data-icon="published_with_changes">published_with_changes</span>
</div>
<h3 class="font-h3 text-h3 text-on-secondary-container mb-4">Le Switch (Alternatives)</h3>
<p class="font-body-md text-body-md text-secondary mb-8">
                                Pour chaque produit à fort impact, nous vous suggérons une alternative durable. Découvrez les stations de vrac à proximité et les marques certifiées éco-responsables.
                            </p>
<button class="bg-secondary text-on-tertiary px-8 py-3 rounded-full font-label-sm hover:opacity-90 transition-opacity">Explorer les alternatives</button>
</div>
</div>
</div>
</div>
</section>
<!-- Feature Comparison -->
<section class="py-24 px-margin">
<div class="max-w-container-max mx-auto">
<div class="flex flex-col md:flex-row justify-between items-end gap-gutter mb-16">
<div class="max-w-xl">
<h2 class="font-h2 text-h2 text-primary mb-4">Comparez votre parcours</h2>
<p class="font-body-md text-body-md text-on-surface-variant">Que vous soyez débutant ou expert en mode "Zero Waste", notre plateforme s'adapte à vos besoins.</p>
</div>
<div class="bg-surface-container rounded-full p-1 flex">
<button class="px-6 py-2 bg-white rounded-full shadow-sm font-label-sm text-primary">Particulier</button>
<button class="px-6 py-2 rounded-full font-label-sm text-on-surface-variant">Communauté</button>
</div>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
<!-- Feature Group 1 -->
<div class="p-8 rounded-3xl border border-outline-variant hover:border-primary transition-colors bg-white">
<h4 class="font-h3 text-h3 text-primary mb-6">Outils de Base</h4>
<ul class="space-y-6">
<li class="flex gap-4">
<span class="material-symbols-outlined text-primary-fixed-dim" data-icon="database">database</span>
<div>
<p class="font-label-sm">Base de données 500k+</p>
<p class="text-xs text-on-surface-variant">Accès complet au catalogue</p>
</div>
</li>
<li class="flex gap-4">
<span class="material-symbols-outlined text-primary-fixed-dim" data-icon="location_on">location_on</span>
<div>
<p class="font-label-sm">Carte interactive</p>
<p class="text-xs text-on-surface-variant">Points de collecte &amp; vrac</p>
</div>
</li>
</ul>
</div>
<!-- Feature Group 2 -->
<div class="p-8 rounded-3xl border border-outline-variant hover:border-primary transition-colors bg-white">
<h4 class="font-h3 text-h3 text-primary mb-6">Social &amp; Conseils</h4>
<ul class="space-y-6">
<li class="flex gap-4">
<span class="material-symbols-outlined text-primary-fixed-dim" data-icon="groups">groups</span>
<div>
<p class="font-label-sm">Communauté Active</p>
<p class="text-xs text-on-surface-variant">Echangez vos meilleures astuces</p>
</div>
</li>
<li class="flex gap-4">
<span class="material-symbols-outlined text-primary-fixed-dim" data-icon="verified">verified</span>
<div>
<p class="font-label-sm">Conseils Certifiés</p>
<p class="text-xs text-on-surface-variant">Astuces validées par des experts</p>
</div>
</li>
</ul>
</div>
<!-- Feature Group 3 -->
<div class="p-8 rounded-3xl border border-primary bg-primary-container/5 relative overflow-hidden">
<div class="absolute top-4 right-4 bg-primary text-on-primary text-[10px] px-3 py-1 rounded-full uppercase font-bold">Premium</div>
<h4 class="font-h3 text-h3 text-primary mb-6">Avancé</h4>
<ul class="space-y-6">
<li class="flex gap-4">
<span class="material-symbols-outlined text-primary" data-icon="monitoring">monitoring</span>
<div>
<p class="font-label-sm">Analyses Détaillées</p>
<p class="text-xs text-on-surface-variant">Rapports d'impact mensuels</p>
</div>
</li>
<li class="flex gap-4">
<span class="material-symbols-outlined text-primary" data-icon="redeem">redeem</span>
<div>
<p class="font-label-sm">Récompenses</p>
<p class="text-xs text-on-surface-variant">Bons d'achat chez partenaires</p>
</div>
</li>
</ul>
</div>
</div>
</div>
</section>
<!-- Secondary CTA -->
<section class="py-24 px-margin bg-surface">
<div class="max-w-container-max mx-auto">
<div class="bg-primary text-on-primary rounded-[48px] p-12 md:p-20 text-center relative overflow-hidden shadow-2xl">
<!-- Botanical line art abstraction -->
<div class="absolute top-0 left-0 w-64 h-64 opacity-10 pointer-events-none">
<span class="material-symbols-outlined text-[200px]" data-icon="psychology_alt">psychology_alt</span>
</div>
<div class="relative z-10">
<h2 class="font-h1 text-h1 mb-6">Prêt pour le changement ?</h2>
<p class="font-body-lg text-body-lg mb-12 max-w-2xl mx-auto opacity-90">
                            Rejoignez plus de 50 000 citoyens qui agissent chaque jour pour un avenir sans déchets.
                        </p>
<div class="flex flex-col sm:flex-row justify-center gap-4">
<button class="bg-on-primary-container text-primary font-label-sm px-10 py-5 rounded-full hover:scale-105 transition-transform">🌿 Rejoindre gratuitement</button>
<button class="bg-transparent border-2 border-on-primary-container text-on-primary font-label-sm px-10 py-5 rounded-full hover:bg-on-primary-container/10 transition-colors">En savoir plus</button>
</div>
</div>
</div>
</div>
</section>
</main>
<!-- Footer -->
<footer class="bg-surface-container-low dark:bg-surface-container-lowest full-width mt-auto">
<div class="flex flex-col md:flex-row justify-between items-center w-full px-margin py-12 max-w-container-max mx-auto gap-gutter">
<div class="text-center md:text-left">
<div class="text-h3 font-h3 text-primary dark:text-primary-fixed-dim mb-2">Zéro Déchet</div>
<p class="text-on-surface-variant dark:text-secondary-fixed-dim font-body-md text-body-md">© 2024 Zéro Déchet. Ensemble pour un avenir durable.</p>
</div>
<div class="flex flex-wrap justify-center gap-8 font-body-md text-body-md">
<a class="text-on-surface-variant dark:text-secondary-fixed-dim hover:text-primary dark:hover:text-primary-fixed-dim underline underline-offset-4 transition-opacity opacity-80 hover:opacity-100" href="#">Mission</a>
<a class="text-on-surface-variant dark:text-secondary-fixed-dim hover:text-primary dark:hover:text-primary-fixed-dim underline underline-offset-4 transition-opacity opacity-80 hover:opacity-100" href="#">Community</a>
<a class="text-on-surface-variant dark:text-secondary-fixed-dim hover:text-primary dark:hover:text-primary-fixed-dim underline underline-offset-4 transition-opacity opacity-80 hover:opacity-100" href="#">Legal</a>
<a class="text-on-surface-variant dark:text-secondary-fixed-dim hover:text-primary dark:hover:text-primary-fixed-dim underline underline-offset-4 transition-opacity opacity-80 hover:opacity-100" href="#">Contact</a>
</div>
<div class="flex gap-4">
<a class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center hover:bg-primary-fixed transition-colors" href="#">
<span class="material-symbols-outlined text-primary" data-icon="public">public</span>
</a>
<a class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center hover:bg-primary-fixed transition-colors" href="#">
<span class="material-symbols-outlined text-primary" data-icon="share">share</span>
</a>
</div>
</div>
</footer>
<script>
function navigateTo(path) {
  window.location.href = path;
}
</script>
</body></html>
