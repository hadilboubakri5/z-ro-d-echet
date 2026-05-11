@extends('layouts.app')

@section('title', 'Défis — Zéro Déchet')

@section('wrapper_class', 'container-fluid app-defis-shell')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,wght@0,400;0,600;0,700;1,400&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="{{ asset('css/defis.css') }}"/>
<style>
  .app-defis-shell {
      max-width: 100%;
      width: 100%;
      margin: 0;
      padding: 0;
      background: transparent;
  }
  .defis-app-bridge {
      font-family: "DM Sans", system-ui, sans-serif;
      background: linear-gradient(90deg, #e8f5e9 0%, #fff8e1 100%);
      padding: 10px 32px;
      font-size: 14px;
      display: flex;
      flex-wrap: wrap;
      gap: 14px;
      justify-content: center;
      align-items: center;
      border-bottom: 1px solid rgba(0,0,0,0.06);
  }
  .defis-app-bridge span { color:#33691e; font-weight:600; }
  .defis-bridge-link {
      color: #1b5e20;
      font-weight: 700;
      text-decoration: none;
      padding: 6px 12px;
      border-radius: 999px;
      background: rgba(255,255,255,0.85);
      border: 1px solid #c8e6c9;
  }
  .defis-bridge-link:hover {
      border-color:#43a047;
  }
</style>
@endpush

@section('content')

<div class="defis-vue-root">

<div class="defis-app-bridge">
  <span>Intégré dans Zéro Déchet :</span>
  <a href="{{ route('scanner') }}" class="defis-bridge-link"><i class="fa-solid fa-barcode"></i> Scanner un produit</a>
  <a href="{{ route('scan') }}" class="defis-bridge-link"><i class="fa-solid fa-up-right-from-square"></i> Intro Scan</a>
</div>

<!-- ═══ HERO ═══ -->
<section class="hero">
  <div class="hero-text">
    <span class="hero-badge">Défis Communautaires</span>
    <h1>Relevez des défis,<br/>changez le monde</h1>
    <p>Rejoignez notre communauté engagée, participez aux défis écologiques et mesurez votre impact réel. Chaque action compte pour protéger l'avenir.@auth Identifiez d’abord vos produits avec le <a href="{{ route('scanner') }}" style="color:#2e7d32;font-weight:700;">scanner</a>.@endauth</p>
    <div class="hero-actions">
      <button class="btn-primary" id="btnVoirDefis">🏆 Voir les défis</button>
      <a href="{{ route('impact') }}" class="btn-outline" style="text-decoration:none;display:inline-flex;align-items:center;justify-content:center;">Mes progrès</a>
    </div>
  </div>
  <div class="hero-image">
    <div class="hero-image-inner">🌍</div>
    <div class="hero-stats">
      <div class="stat-icon">🏅</div>
      <div>
        <div class="stat-num">12 847</div>
        <div class="stat-lbl">Participants actifs</div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ FILTERS ═══ -->
<div class="filters-section">
  <div class="section-label"><span></span></div>
  <h2 class="filters-title">Tous les Défis</h2>
  <p class="filters-sub">Filtrez par catégorie et trouvez votre prochain défi écologique</p>
  <div class="filters-row" id="filtersRow">
    <button class="filter-btn active" data-cat="tous">🌿 Tous</button>
    <button class="filter-btn" data-cat="alimentation">🥗 Alimentation</button>
    <button class="filter-btn" data-cat="transport">🚲 Transport</button>
    <button class="filter-btn" data-cat="maison">🏠 Maison</button>
    <button class="filter-btn" data-cat="shopping">🛍️ Shopping</button>
    <button class="filter-btn" data-cat="eau">💧 Eau</button>
    <button class="filter-btn" data-cat="communaute">🤝 Communauté</button>
  </div>
</div>

<!-- ═══ CHALLENGE CARDS GRID ═══ -->
<div class="challenges-grid" id="cardsGrid">

  <!-- FEATURED -->
  <div class="card card-featured" data-cat="communaute">
    <div class="card-banner gold">
      🏆
      <span class="card-featured-crown">⭐ Défi du mois</span>
      <span class="card-badge-participants">👥 3 421</span>
    </div>
    <div class="card-body">
      <div class="card-category">Communauté</div>
      <div class="card-title">Grand Défi Zéro Plastique – Mai 2026</div>
      <div class="card-desc">Éliminez tout plastique à usage unique de votre quotidien pendant 30 jours. Documentez chaque alternative et partagez vos astuces avec la communauté.</div>
      <div class="progress-wrap">
        <div class="progress-labels"><span>Progression collective</span><strong>68%</strong></div>
        <div class="progress-bar"><div class="progress-fill" data-width="68"></div></div>
      </div>
      <div class="card-footer">
        <span class="card-duration">⏱ 30 jours restants</span>
        <span class="card-points">🌿 500 pts</span>
      </div>
      <button class="btn-card"
        data-title="Grand Défi Zéro Plastique"
        data-desc="Éliminez tout plastique à usage unique pendant 30 jours. Documentez vos alternatives et inspirez la communauté."
        data-icon="🏆" data-duration="30 jours" data-pts="500 pts"
        data-cat2="Communauté" data-diff="Avancé">
        Rejoindre le défi
      </button>
    </div>
  </div>

  <!-- CARD 1 -->
  <div class="card" data-cat="alimentation">
    <div class="card-banner green">
      🥗
      <span class="card-difficulty diff-facile">Facile</span>
      <span class="card-badge-participants">👥 1 204</span>
    </div>
    <div class="card-body">
      <div class="card-category">Alimentation</div>
      <div class="card-title">7 Jours Sans Viande</div>
      <div class="card-desc">Adoptez une alimentation végétarienne pendant une semaine et découvrez l'impact de votre assiette sur la planète.</div>
      <div class="progress-wrap">
        <div class="progress-labels"><span>Participants ayant réussi</span><strong>82%</strong></div>
        <div class="progress-bar"><div class="progress-fill" data-width="82"></div></div>
      </div>
      <div class="card-footer">
        <span class="card-duration">⏱ 7 jours</span>
        <span class="card-points">🌿 150 pts</span>
      </div>
      <button class="btn-card"
        data-title="7 Jours Sans Viande"
        data-desc="Adoptez une alimentation végétarienne pendant une semaine et mesurez votre empreinte carbone réduite."
        data-icon="🥗" data-duration="7 jours" data-pts="150 pts"
        data-cat2="Alimentation" data-diff="Facile">
        Participer
      </button>
    </div>
  </div>

  <!-- CARD 2 -->
  <div class="card" data-cat="transport">
    <div class="card-banner teal">
      🚲
      <span class="card-difficulty diff-moyen">Moyen</span>
      <span class="card-badge-participants">👥 876</span>
    </div>
    <div class="card-body">
      <div class="card-category">Transport</div>
      <div class="card-title">Vélo ou Marche – 14 jours</div>
      <div class="card-desc">Abandonnez votre voiture pendant deux semaines. Utilisez le vélo, les transports en commun ou marchez pour chaque déplacement.</div>
      <div class="progress-wrap">
        <div class="progress-labels"><span>Taux de réussite</span><strong>61%</strong></div>
        <div class="progress-bar"><div class="progress-fill" data-width="61"></div></div>
      </div>
      <div class="card-footer">
        <span class="card-duration">⏱ 14 jours</span>
        <span class="card-points">🌿 220 pts</span>
      </div>
      <button class="btn-card"
        data-title="Vélo ou Marche"
        data-desc="Abandonnez votre voiture pendant deux semaines et réduisez vos émissions de CO2."
        data-icon="🚲" data-duration="14 jours" data-pts="220 pts"
        data-cat2="Transport" data-diff="Moyen">
        Participer
      </button>
    </div>
  </div>

  <!-- CARD 3 -->
  <div class="card" data-cat="maison">
    <div class="card-banner sand">
      🏠
      <span class="card-difficulty diff-facile">Facile</span>
      <span class="card-badge-participants">👥 2 109</span>
    </div>
    <div class="card-body">
      <div class="card-category">Maison</div>
      <div class="card-title">Tri des Déchets Expert</div>
      <div class="card-desc">Mettez en place un système de tri complet chez vous : compost, recyclage, verre, papier. Zéro erreur pendant 21 jours.</div>
      <div class="progress-wrap">
        <div class="progress-labels"><span>Progression</span><strong>74%</strong></div>
        <div class="progress-bar"><div class="progress-fill" data-width="74"></div></div>
      </div>
      <div class="card-footer">
        <span class="card-duration">⏱ 21 jours</span>
        <span class="card-points">🌿 180 pts</span>
      </div>
      <button class="btn-card"
        data-title="Tri des Déchets Expert"
        data-desc="Mettez en place un système de tri parfait à la maison pendant 21 jours consécutifs."
        data-icon="🏠" data-duration="21 jours" data-pts="180 pts"
        data-cat2="Maison" data-diff="Facile">
        Participer
      </button>
    </div>
  </div>

  <!-- CARD 4 -->
  <div class="card" data-cat="shopping">
    <div class="card-banner gold-light">
      🛍️
      <span class="card-difficulty diff-moyen">Moyen</span>
      <span class="card-badge-participants">👥 543</span>
    </div>
    <div class="card-body">
      <div class="card-category">Shopping</div>
      <div class="card-title">Achat Zéro Neuf – 1 Mois</div>
      <div class="card-desc">Pendant un mois, achetez uniquement d'occasion, empruntez ou fabriquez vous-même. Aucun produit neuf autorisé.</div>
      <div class="progress-wrap">
        <div class="progress-labels"><span>Taux de réussite</span><strong>45%</strong></div>
        <div class="progress-bar"><div class="progress-fill" data-width="45"></div></div>
      </div>
      <div class="card-footer">
        <span class="card-duration">⏱ 30 jours</span>
        <span class="card-points">🌿 350 pts</span>
      </div>
      <button class="btn-card"
        data-title="Achat Zéro Neuf"
        data-desc="Pendant un mois entier, achetez uniquement d'occasion, empruntez ou fabriquez vous-même vos objets."
        data-icon="🛍️" data-duration="30 jours" data-pts="350 pts"
        data-cat2="Shopping" data-diff="Moyen">
        Participer
      </button>
    </div>
  </div>

  <!-- CARD 5 -->
  <div class="card" data-cat="eau">
    <div class="card-banner blue">
      💧
      <span class="card-difficulty diff-facile">Facile</span>
      <span class="card-badge-participants">👥 1 788</span>
    </div>
    <div class="card-body">
      <div class="card-category">Eau</div>
      <div class="card-title">Économie d'Eau – 10 Jours</div>
      <div class="card-desc">Réduisez votre consommation d'eau de 30% : douches courtes, robinets fermés, récupération des eaux de pluie.</div>
      <div class="progress-wrap">
        <div class="progress-labels"><span>Participants actifs</span><strong>88%</strong></div>
        <div class="progress-bar"><div class="progress-fill" data-width="88"></div></div>
      </div>
      <div class="card-footer">
        <span class="card-duration">⏱ 10 jours</span>
        <span class="card-points">🌿 120 pts</span>
      </div>
      <button class="btn-card"
        data-title="Économie d'Eau"
        data-desc="Réduisez votre consommation d'eau quotidienne de 30% pendant 10 jours et mesurez les litres économisés."
        data-icon="💧" data-duration="10 jours" data-pts="120 pts"
        data-cat2="Eau" data-diff="Facile">
        Participer
      </button>
    </div>
  </div>

  <!-- CARD 6 -->
  <div class="card" data-cat="alimentation">
    <div class="card-banner rose">
      🌾
      <span class="card-difficulty diff-avance">Avancé</span>
      <span class="card-badge-participants">👥 312</span>
    </div>
    <div class="card-body">
      <div class="card-category">Alimentation</div>
      <div class="card-title">Compost Maison – 30 Jours</div>
      <div class="card-desc">Lancez votre composteur, éliminez tous vos déchets organiques de la poubelle. Objectif : zéro organique à la décharge.</div>
      <div class="progress-wrap">
        <div class="progress-labels"><span>Taux de complétion</span><strong>39%</strong></div>
        <div class="progress-bar"><div class="progress-fill" data-width="39"></div></div>
      </div>
      <div class="card-footer">
        <span class="card-duration">⏱ 30 jours</span>
        <span class="card-points">🌿 400 pts</span>
      </div>
      <button class="btn-card"
        data-title="Compost Maison"
        data-desc="Installez un composteur et détournez 100% de vos déchets organiques de la poubelle pendant 30 jours."
        data-icon="🌾" data-duration="30 jours" data-pts="400 pts"
        data-cat2="Alimentation" data-diff="Avancé">
        Participer
      </button>
    </div>
  </div>

</div>

<!-- ═══ LEADERBOARD ═══ -->
<section class="leaderboard-section">
  <div class="leaderboard-inner">
    <div class="leaderboard-header">
      <div>
        <div class="leaderboard-title">🏅 Classement communauté</div>
        <div class="leaderboard-sub">Les éco-guerriers les plus engagés ce mois-ci</div>
      </div>
      <button class="btn-outline">Voir tout le classement</button>
    </div>
    <div class="leaderboard-grid">
      <div class="lb-row">
        <div class="lb-rank gold-rank">1</div>
        <div class="lb-avatar" style="background:#fff9c4;">🦁</div>
        <div class="lb-info">
          <div class="lb-name">Amina B.</div>
          <div class="lb-score">2 340 pts · 8 défis complétés</div>
        </div>
        <span class="lb-badge">🥇 Or</span>
      </div>
      <div class="lb-row">
        <div class="lb-rank silver-rank">2</div>
        <div class="lb-avatar" style="background:#e3f2fd;">🌊</div>
        <div class="lb-info">
          <div class="lb-name">Youssef M.</div>
          <div class="lb-score">1 980 pts · 6 défis complétés</div>
        </div>
        <span class="lb-badge">🥈 Argent</span>
      </div>
      <div class="lb-row">
        <div class="lb-rank bronze-rank">3</div>
        <div class="lb-avatar" style="background:#fce4ec;">🌸</div>
        <div class="lb-info">
          <div class="lb-name">Sarra K.</div>
          <div class="lb-score">1 720 pts · 5 défis complétés</div>
        </div>
        <span class="lb-badge">🥉 Bronze</span>
      </div>
      <div class="lb-row">
        <div class="lb-rank">4</div>
        <div class="lb-avatar" style="background:#e8f5e9;">🌿</div>
        <div class="lb-info">
          <div class="lb-name">Mohamed A.</div>
          <div class="lb-score">1 450 pts · 4 défis complétés</div>
        </div>
        <span class="lb-badge">🌿 Top</span>
      </div>
      <div class="lb-row">
        <div class="lb-rank">5</div>
        <div class="lb-avatar" style="background:#f3e5f5;">🦋</div>
        <div class="lb-info">
          <div class="lb-name">Ines T.</div>
          <div class="lb-score">1 210 pts · 4 défis complétés</div>
        </div>
        <span class="lb-badge">🌿 Top</span>
      </div>
      <div class="lb-row">
        <div class="lb-rank">6</div>
        <div class="lb-avatar" style="background:#e0f2f1;">🐢</div>
        <div class="lb-info">
          <div class="lb-name">Hajer R.</div>
          <div class="lb-score">1 090 pts · 3 défis complétés</div>
        </div>
        <span class="lb-badge">🌿 Top</span>
      </div>
    </div>
  </div>
</section>

<!-- ═══ CTA ═══ -->
<section class="cta-section">
  <h2>Chaque geste compte</h2>
  <p>Inscrivez-vous pour recevoir nos nouveaux défis chaque semaine et rejoignez les 50 000 personnes qui changent déjà le futur.</p>
  <div class="cta-input-wrap">
    <input type="email" class="cta-input" id="ctaEmail" placeholder="votre@email.com"/>
    <button class="btn-primary" id="btnInscrire">S'inscrire</button>
  </div>
</section>

<!-- ═══ MODAL ═══ -->
<div class="modal-overlay" id="modalOverlay">
  <div class="modal">
    <button class="modal-close" id="modalClose">✕</button>
    <div class="modal-icon" id="mIcon"></div>
    <h3 id="mTitle"></h3>
    <p id="mDesc"></p>
    <div class="modal-meta" id="mMeta"></div>
    <button class="btn-card" id="btnJoindre">🌿 Rejoindre ce défi</button>
    <button class="btn-card secondary" id="btnAnnuler">Annuler</button>
  </div>
</div>

<!-- ═══ TOAST ═══ -->
<div class="toast" id="toast"></div>

</div>

@endsection

@push('scripts')
<script src="{{ asset('js/defis.js') }}"></script>
@endpush
