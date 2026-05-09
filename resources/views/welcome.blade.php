<!DOCTYPE html>
<html class="light" lang="fr">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Zéro Déchet - Réduisez vos déchets, protégez l'avenir</title>

<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,700&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

<style>
* {
    box-sizing: border-box;
}

body {
    margin: 0;
    background: #f9f9f7;
    color: #1a1c1b;
    font-family: "Plus Jakarta Sans", sans-serif;
}

.material-symbols-outlined {
    font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
}

.organic-shape {
    border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
}

.header {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 50;
    background: rgba(250, 250, 249, 0.9);
    backdrop-filter: blur(12px);
    border-bottom: 1px solid #e7e5e4;
}

.nav-container {
    width: 100%;
    max-width: 1536px;
    margin: auto;
    padding: 16px 32px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.nav-left,
.nav-right,
.nav-icons {
    display: flex;
    align-items: center;
    gap: 16px;
}

.nav-left {
    gap: 32px;
}

.logo {
    font-size: 24px;
    font-weight: 700;
    color: #14532d;
    letter-spacing: -0.05em;
    font-style: italic;
    text-decoration: none;
}

.nav-menu {
    display: flex;
    align-items: center;
    gap: 24px;
}

.nav-link {
    font-size: 14px;
    font-weight: 500;
    color: #57534e;
    background: none;
    border: none;
    cursor: pointer;
    transition: color 0.3s;
}

.nav-link:hover {
    color: #15803d;
}

.btn-primary {
    background: #154212;
    color: #ffffff;
    border: none;
    cursor: pointer;
    transition: 0.3s;
}

.btn-primary:hover {
    opacity: 0.9;
}

.join-btn {
    padding: 10px 20px;
    border-radius: 9999px;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 8px;
    box-shadow: 0 1px 2px rgba(0,0,0,0.08);
}

.icon-btn {
    padding: 8px;
    color: #57534e;
    background: none;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: 0.3s;
}

.icon-btn:hover {
    background: #f5f5f4;
}

.main {
    padding-top: 96px;
}

.section {
    max-width: 1536px;
    margin: auto;
    padding: 80px 32px;
}

.hero {
    position: relative;
    overflow: hidden;
}

.hero-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 64px;
    align-items: center;
}

.badge {
    display: inline-block;
    padding: 6px 16px;
    background: #bcf0ae;
    color: #23501e;
    border-radius: 9999px;
    font-size: 14px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.12em;
    margin-bottom: 24px;
}

h1 {
    font-size: 48px;
    line-height: 1.2;
    letter-spacing: -0.02em;
    font-weight: 700;
    color: #1a1c1b;
    margin: 0 0 24px;
}

.hero-text {
    font-size: 18px;
    line-height: 1.6;
    color: #42493e;
    max-width: 576px;
    margin-bottom: 40px;
}

.hero-buttons {
    display: flex;
    flex-wrap: wrap;
    gap: 16px;
}

.big-btn {
    padding: 16px 32px;
    border-radius: 9999px;
    font-size: 18px;
    font-weight: 600;
}

.btn-outline {
    background: transparent;
    color: #154212;
    border: 1px solid #72796e;
    cursor: pointer;
    transition: 0.3s;
}

.btn-outline:hover {
    background: #f4f4f2;
}

.hero-img-box {
    position: relative;
}

.hero-bg {
    position: absolute;
    inset: -40px;
    background: rgba(45, 90, 39, 0.2);
    z-index: -1;
}

.hero-img {
    width: 100%;
    aspect-ratio: 4 / 3;
    object-fit: cover;
    border-radius: 32px;
    box-shadow: 0 25px 50px rgba(0,0,0,0.25);
}

.solutions {
    background: #ffffff;
    border-top: 1px solid #f5f5f4;
    border-bottom: 1px solid #f5f5f4;
}

.section-title {
    text-align: center;
    margin-bottom: 64px;
}

.section-title h2,
.impact-title h2 {
    font-size: 32px;
    line-height: 1.3;
    font-weight: 600;
    color: #154212;
    margin: 0 0 16px;
}

.title-line {
    width: 80px;
    height: 4px;
    background: #a1d494;
    border-radius: 9999px;
    margin: auto;
}

.cards-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 48px;
}

.solution-card {
    padding: 32px;
    border-radius: 16px;
    transition: 0.5s;
}

.solution-card:hover {
    background: #f4f4f2;
}

.card-icon {
    width: 64px;
    height: 64px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 24px;
    transition: transform 0.3s;
}

.solution-card:hover .card-icon {
    transform: scale(1.1);
}

.icon-primary {
    background: #2d5a27;
    color: #9dd090;
}

.icon-secondary {
    background: #e6dfd3;
    color: #666259;
}

.icon-tertiary {
    background: #3c563b;
    color: #accaa8;
}

.card-icon span {
    font-size: 40px;
}

.solution-card h3 {
    font-size: 24px;
    line-height: 1.4;
    font-weight: 600;
    color: #1a1c1b;
    margin: 0 0 16px;
}

.solution-card p {
    color: #42493e;
    line-height: 1.7;
}

.impact-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    margin-bottom: 48px;
    gap: 24px;
}

.impact-header p {
    color: #42493e;
}

.impact-link {
    color: #154212;
    font-size: 14px;
    font-weight: 600;
    text-decoration: none;
    border-bottom: 2px solid #bcf0ae;
    padding-bottom: 4px;
}

.impact-link:hover {
    border-bottom-color: #154212;
}

.bento-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-template-rows: repeat(2, 300px);
    gap: 24px;
}

.main-challenge {
    grid-column: span 2;
    grid-row: span 2;
    position: relative;
    border-radius: 24px;
    overflow: hidden;
}

.challenge-img {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.7s;
}

.main-challenge:hover .challenge-img {
    transform: scale(1.05);
}

.challenge-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(0,0,0,0.8), rgba(0,0,0,0.2), transparent);
}

.challenge-content {
    position: absolute;
    bottom: 0;
    left: 0;
    padding: 40px;
    width: 100%;
}

.challenge-meta {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 16px;
}

.challenge-badge {
    background: #154212;
    color: #fff;
    padding: 4px 12px;
    border-radius: 9999px;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
}

.challenge-time {
    color: rgba(255,255,255,0.8);
    font-size: 14px;
    display: flex;
    align-items: center;
    gap: 4px;
}

.challenge-content h3 {
    color: #fff;
    font-size: 32px;
    margin: 0 0 16px;
}

.challenge-content p {
    color: rgba(255,255,255,0.8);
    font-size: 18px;
    max-width: 512px;
    margin-bottom: 24px;
}

.white-btn {
    background: #fff;
    color: #154212;
    border: none;
    padding: 12px 24px;
    border-radius: 9999px;
    font-weight: 600;
    cursor: pointer;
}

.white-btn:hover {
    background: #bcf0ae;
}

.small-challenge {
    border-radius: 24px;
    padding: 32px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    cursor: pointer;
    transition: 0.3s;
}

.small-challenge:hover {
    box-shadow: 0 10px 20px rgba(0,0,0,0.12);
}

.small-challenge .material-symbols-outlined {
    font-size: 40px;
    margin-bottom: 16px;
}

.blue-card {
    background: #3c563b;
    color: #accaa8;
}

.beige-card {
    background: #e6dfd3;
    color: #666259;
}

.small-challenge h4 {
    font-size: 24px;
    margin: 0 0 8px;
}

.blue-card h4,
.blue-card p {
    color: #ffffff;
}

.blue-card p {
    opacity: 0.7;
}

.beige-card h4 {
    color: #1a1c1b;
}

.beige-card p {
    color: #42493e;
}

.small-challenge p {
    font-size: 14px;
}

.challenge-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 16px;
}

.challenge-footer span:first-child {
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
}

.newsletter-box {
    background: rgba(45, 90, 39, 0.1);
    border-radius: 48px;
    padding: 80px;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.newsletter-box h2 {
    font-size: 48px;
    color: #154212;
    margin: 0 0 24px;
}

.newsletter-box p {
    color: #42493e;
    font-size: 18px;
    max-width: 672px;
    margin: 0 auto 40px;
    line-height: 1.6;
}

.newsletter-form {
    display: flex;
    gap: 16px;
    max-width: 448px;
    margin: auto;
}

.newsletter-form input {
    flex: 1;
    padding: 16px 24px;
    border-radius: 9999px;
    border: 1px solid #72796e;
    background: #fff;
}

.newsletter-form button {
    padding: 16px 32px;
    border-radius: 9999px;
    font-weight: 600;
    white-space: nowrap;
}

.footer {
    background: #f5f5f4;
    border-top: 1px solid #e7e5e4;
}

.footer-container {
    max-width: 1536px;
    margin: auto;
    padding: 64px 48px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 32px;
}

.footer-brand {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.footer-brand span {
    font-size: 18px;
    font-weight: 600;
    color: #166534;
}

.footer-brand p {
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 0.12em;
    color: #78716c;
}

.footer-links {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 32px;
}

.footer-links button {
    background: none;
    border: none;
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 0.12em;
    color: #78716c;
    cursor: pointer;
}

.footer-links button:hover {
    color: #16a34a;
    text-decoration: underline;
}

.footer-social {
    display: flex;
    gap: 16px;
}

.footer-social a {
    padding: 8px;
    background: #e7e5e4;
    border-radius: 9999px;
    color: #57534e;
    text-decoration: none;
    transition: 0.3s;
}

.footer-social a:hover {
    background: #bcf0ae;
    color: #23501e;
}

@media (max-width: 768px) {
    .nav-menu {
        display: none;
    }

    .hero-grid,
    .cards-grid,
    .bento-grid {
        grid-template-columns: 1fr;
    }

    .bento-grid {
        grid-template-rows: auto;
    }

    .main-challenge {
        grid-column: auto;
        grid-row: auto;
        min-height: 520px;
    }

    .impact-header,
    .footer-container,
    .newsletter-form {
        flex-direction: column;
    }

    h1,
    .newsletter-box h2 {
        font-size: 36px;
    }

    .newsletter-box {
        padding: 48px 24px;
    }
}
</style>
</head>

<body>
<header class="header">
<div class="nav-container">
<div class="nav-left">
<a class="logo" href="/solutions">Zéro Déchet</a>
<nav class="nav-menu">
<button onclick="navigateTo('/')" class="nav-link">Accueil</button>
<button onclick="navigateTo('/solutions')" class="nav-link">Solutions</button>
<button onclick="navigateTo('/impact')" class="nav-link">Impact</button>
<button onclick="navigateTo('/assistant')" class="nav-link">Assistant IA</button>
<button onclick="navigateTo('/blog')" class="nav-link">Blog</button>
<button onclick="navigateTo('/contact')" class="nav-link">Contact</button>
</nav>
</div>

<div class="nav-right">
<button onclick="navigateTo('/join')" class="btn-primary join-btn">🌿 Rejoindre</button>
<div class="nav-icons">
<button class="icon-btn">
<span class="material-symbols-outlined">person</span>
</button>
<button class="icon-btn">
<span class="material-symbols-outlined">notifications</span>
</button>
</div>
</div>
</div>
</header>

<main class="main">
<section class="section hero">
<div class="hero-grid">
<div>
<span class="badge">Mouvement Collectif</span>
<h1>Réduisez vos déchets, protégez l'avenir</h1>
<p class="hero-text">
Rejoignez une communauté engagée pour une consommation consciente. Ensemble, chaque geste compte pour transformer notre empreinte environnementale en un héritage durable.
</p>
<div class="hero-buttons">
<button class="btn-primary big-btn">🌿 Rejoindre</button>
<button class="btn-outline big-btn">Voir le catalogue</button>
</div>
</div>

<div class="hero-img-box">
<div class="organic-shape hero-bg"></div>
<img alt="Sustainable Lifestyle" class="hero-img" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDiTjpYcu4lmrl1OdUr1XJ96NGQg9wkDfdeUmg2zq2eIf9F-qCG_jUsdFV3Ts26bfkUPsVti48yHP-ISAJkxQ5fSD8c1pxdg-jj_iJ_MnIo-37jSXPJ3we7DVekXi1cYCKkd0eFrmXXXYF3I_U0H7xYRmhOyq1zbfPJL9VLNe5gqar1sXul5ABFosoo3plz1dPEB3jlu1uYCS_VmNb5puftbpv1PQGpVJ9iL_cxglSbuwp8UAMz7yJN_GBTgZviIsKaMJDcqAtDg2s"/>
</div>
</div>
</section>

<section class="section solutions">
<div class="section-title">
<h2>Nos Solutions</h2>
<div class="title-line"></div>
</div>

<div class="cards-grid">
<div class="solution-card">
<div class="card-icon icon-primary">
<span class="material-symbols-outlined">barcode_scanner</span>
</div>
<h3>Scan</h3>
<p>Analysez instantanément vos produits du quotidien. Obtenez une transparence totale sur leur composition et leur recyclabilité.</p>
</div>

<div class="solution-card">
<div class="card-icon icon-secondary">
<span class="material-symbols-outlined">eco</span>
</div>
<h3>Impact</h3>
<p>Mesurez votre empreinte carbone en temps réel. Suivez votre progression personnelle et l'impact collectif de la communauté.</p>
</div>

<div class="solution-card">
<div class="card-icon icon-tertiary">
<span class="material-symbols-outlined">rebase_edit</span>
</div>
<h3>Switch</h3>
<p>Découvrez des alternatives durables et locales. Changez vos habitudes pas à pas avec nos recommandations personnalisées.</p>
</div>
</div>
</section>

<section class="section">
<div class="impact-header">
<div class="impact-title">
<h2>Notre Impact</h2>
<p>Relevez des défis, gagnez des points, sauvez la planète.</p>
</div>
<a class="impact-link" href="#">Tous les challenges →</a>
</div>

<div class="bento-grid">
<div class="main-challenge">
<img class="challenge-img" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB7-lFWx43zOGgVYH_5v6DmtZe7sEtd2_gk1GInBbhKJtHA57dhYBwdRPollrGmIJNWHtU6GbvlBbEluoCyOFnokoULHCI-FAUm8OqB8_Mbr6eX1TBQxcqdTIssSBJbFol5FuUHeafNnFWup0Yv0DKZ3eRRQynje1Ndc00MtljR9cbOmyxK-R1cMxmHbajuqYnvL4BfP896SofeVmObjhKHztaLv9OcPViPJALrN5umpivQp16VGxEih_yONRtYqTdPYpMoMXX_vfc"/>
<div class="challenge-overlay"></div>
<div class="challenge-content">
<div class="challenge-meta">
<span class="challenge-badge">Challenge de la semaine</span>
<span class="challenge-time">
<span class="material-symbols-outlined">schedule</span> 4 jours restants
</span>
</div>
<h3>Zéro Plastique en Cuisine</h3>
<p>Remplacez tous vos emballages plastiques par des alternatives réutilisables ou biodégradables pendant 7 jours.</p>
<button class="white-btn">Rejoindre 1.2k participants</button>
</div>
</div>

<div class="small-challenge blue-card">
<div>
<span class="material-symbols-outlined">water_drop</span>
<h4>Économie Bleue</h4>
<p>Réduisez votre consommation d'eau domestique de 15%.</p>
</div>
<div class="challenge-footer">
<span>500 Points</span>
<span class="material-symbols-outlined">arrow_forward</span>
</div>
</div>

<div class="small-challenge beige-card">
<div>
<span class="material-symbols-outlined">compost</span>
<h4>Compost Master</h4>
<p>Démarrez votre propre compost de balcon ou de jardin.</p>
</div>
<div class="challenge-footer">
<span>750 Points</span>
<span class="material-symbols-outlined">arrow_forward</span>
</div>
</div>
</div>
</section>

<section class="section">
<div class="newsletter-box">
<h2>Chaque geste compte</h2>
<p>Inscrivez-vous pour recevoir nos conseils hebdomadaires et rejoignez les 50 000 personnes qui changent déjà le futur.</p>
<div class="newsletter-form">
<input placeholder="votre@email.com" type="email"/>
<button class="btn-primary">S'inscrire</button>
</div>
</div>
</section>
</main>

<footer class="footer">
<div class="footer-container">
<div class="footer-brand">
<span>Zéro Déchet</span>
<p>© 2024 Zéro Déchet. For a breathable, renewable future.</p>
</div>

<div class="footer-links">
<button onclick="navigateTo('/')">Accueil</button>
<button onclick="navigateTo('/solutions')">Solutions</button>
<button onclick="navigateTo('/impact')">Impact</button>
<button onclick="navigateTo('/assistant')">Assistant IA</button>
<button onclick="navigateTo('/blog')">Blog</button>
<button onclick="navigateTo('/contact')">Contact</button>
</div>

<div class="footer-social">
<a href="#"><span class="material-symbols-outlined">public</span></a>
<a href="#"><span class="material-symbols-outlined">hub</span></a>
</div>
</div>

<script>
function navigateTo(path) {
  window.location.href = path;
}
</script>
</footer>
</body>
</html>