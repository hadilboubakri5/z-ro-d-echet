/* ═══════════════════════════════════════
   defis.js  –  Zéro Déchet · Défis Page
   ═══════════════════════════════════════ */

// ────────────────────────────────────────
// 1. FILTRES PAR CATÉGORIE
// ────────────────────────────────────────

/**
 * Filtre les cartes de défis selon la catégorie choisie.
 * Marque le bouton actif et cache / affiche les cartes.
 */
function initFilters() {
  const filtersRow = document.getElementById('filtersRow');
  const cards      = document.querySelectorAll('#cardsGrid .card');

  filtersRow.addEventListener('click', function (e) {
    const btn = e.target.closest('.filter-btn');
    if (!btn) return;

    // Mettre à jour l'état actif des boutons
    filtersRow.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');

    const cat = btn.dataset.cat;

    // Afficher / cacher les cartes
    cards.forEach(card => {
      if (cat === 'tous' || card.dataset.cat === cat) {
        card.style.display = '';
      } else {
        card.style.display = 'none';
      }
    });
  });
}

// ────────────────────────────────────────
// 2. BARRES DE PROGRESSION ANIMÉES
// ────────────────────────────────────────

/**
 * Anime les barres de progression après le chargement de la page.
 * La valeur cible est stockée dans data-width sur chaque .progress-fill.
 */
function initProgressBars() {
  const fills = document.querySelectorAll('.progress-fill');

  setTimeout(function () {
    fills.forEach(function (fill) {
      const targetWidth = fill.dataset.width;
      if (targetWidth) {
        fill.style.width = targetWidth + '%';
      }
    });
  }, 300); // légère pause pour que la transition soit visible
}

// ────────────────────────────────────────
// 3. MODAL
// ────────────────────────────────────────

let currentDefiTitle = ''; // garde le titre du défi ouvert

/**
 * Ouvre la modale en injectant les données du défi cliqué.
 * @param {string} title    - Titre du défi
 * @param {string} desc     - Description
 * @param {string} icon     - Emoji / icône
 * @param {string} duration - Durée (ex: "7 jours")
 * @param {string} pts      - Points (ex: "150 pts")
 * @param {string} cat      - Catégorie
 * @param {string} diff     - Difficulté
 */
function openModal(title, desc, icon, duration, pts, cat, diff) {
  currentDefiTitle = title;

  document.getElementById('mIcon').textContent  = icon;
  document.getElementById('mTitle').textContent = title;
  document.getElementById('mDesc').textContent  = desc;

  document.getElementById('mMeta').innerHTML =
    '<span class="modal-chip">⏱ ' + duration + '</span>' +
    '<span class="modal-chip">' + pts + '</span>' +
    '<span class="modal-chip">📁 ' + cat + '</span>' +
    '<span class="modal-chip">📊 ' + diff + '</span>';

  document.getElementById('modalOverlay').classList.add('open');
}

/** Ferme la modale. */
function closeModal() {
  document.getElementById('modalOverlay').classList.remove('open');
}

/**
 * Ferme la modale si l'utilisateur clique sur l'arrière-plan (overlay).
 */
function initModal() {
  const overlay = document.getElementById('modalOverlay');

  // Clic sur l'overlay (arrière-plan)
  overlay.addEventListener('click', function (e) {
    if (e.target === overlay) {
      closeModal();
    }
  });

  // Bouton ✕
  document.getElementById('modalClose').addEventListener('click', closeModal);

  // Bouton "Annuler"
  document.getElementById('btnAnnuler').addEventListener('click', closeModal);

  // Bouton "Rejoindre ce défi"
  document.getElementById('btnJoindre').addEventListener('click', function () {
    closeModal();
    showToast('🎉 Tu as rejoint le défi "' + currentDefiTitle + '" !');
  });

  // Délégation d'événements : tous les boutons .btn-card dans les cartes
  document.getElementById('cardsGrid').addEventListener('click', function (e) {
    const btn = e.target.closest('.btn-card');
    if (!btn) return;

    openModal(
      btn.dataset.title,
      btn.dataset.desc,
      btn.dataset.icon,
      btn.dataset.duration,
      btn.dataset.pts,
      btn.dataset.cat2,
      btn.dataset.diff
    );
  });
}

// ────────────────────────────────────────
// 4. TOAST (notification)
// ────────────────────────────────────────

/**
 * Affiche un message toast temporaire en bas de page.
 * @param {string} message - Texte à afficher
 * @param {number} duration - Durée d'affichage en ms (défaut: 3000)
 */
function showToast(message, duration) {
  duration = duration || 3000;

  var toast = document.getElementById('toast');
  toast.textContent = message;
  toast.classList.add('show');

  setTimeout(function () {
    toast.classList.remove('show');
  }, duration);
}

// ────────────────────────────────────────
// 5. SCROLL VERS LES DÉFIS (bouton Hero)
// ────────────────────────────────────────

function initHeroButton() {
  var btn = document.getElementById('btnVoirDefis');
  if (!btn) return;

  btn.addEventListener('click', function () {
    var grid = document.getElementById('cardsGrid');
    if (grid) {
      grid.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
  });
}

// ────────────────────────────────────────
// 6. INSCRIPTION CTA (email)
// ────────────────────────────────────────

function initCTA() {
  var btn   = document.getElementById('btnInscrire');
  var input = document.getElementById('ctaEmail');
  if (!btn || !input) return;

  btn.addEventListener('click', function () {
    var email = input.value.trim();

    if (!email) {
      showToast('⚠️ Veuillez entrer votre adresse email.');
      return;
    }

    // Validation simple de l'email
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
      showToast('⚠️ Adresse email invalide.');
      return;
    }

    // Succès
    input.value = '';
    showToast('✅ Inscription réussie ! Bienvenue dans la communauté Zéro Déchet 🌿');
  });

  // Aussi sur "Entrée"
  input.addEventListener('keydown', function (e) {
    if (e.key === 'Enter') btn.click();
  });
}

// ────────────────────────────────────────
// 7. INITIALISATION PRINCIPALE
// ────────────────────────────────────────

document.addEventListener('DOMContentLoaded', function () {
  initFilters();
  initProgressBars();
  initModal();
  initHeroButton();
  initCTA();
});
