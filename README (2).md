
# 🌿 Zéro Déchet — Application Web Écologique avec Laravel

## 📌 Présentation du projet

**Zéro Déchet** est une application web dynamique développée avec le framework **Laravel** dans le cadre du module **Programmation Web 2**.

L’objectif principal de l’application est de sensibiliser les utilisateurs à une consommation responsable grâce à :

- l’analyse de produits via scan de code-barres,
- l’évaluation de leur impact écologique,
- la proposition d’alternatives durables,
- la participation à des défis écologiques.

Le projet respecte l’architecture **MVC (Model - View - Controller)** et met en œuvre l’ensemble des concepts étudiés durant les travaux pratiques TP1 à TP4.

---

# 🎯 Objectifs du projet

- Développer une application web dynamique complète avec Laravel
- Concevoir une base de données relationnelle
- Implémenter des fonctionnalités CRUD
- Utiliser les vues Blade et les composants Laravel
- Gérer l’authentification et les rôles utilisateurs
- Créer une interface moderne et responsive

---

# 🛠️ Technologies utilisées

| Technologie | Description |
|---|---|
| Laravel | Framework PHP MVC |
| PHP | Langage backend |
| MySQL | Base de données |
| Blade | Moteur de templates Laravel |
| HTML5 / CSS3 | Interfaces utilisateur |
| JavaScript | Interactivité |
| Font Awesome | Icônes |
| Git & GitHub | Gestion de version |

---

# 📂 Fonctionnalités réalisées

## ✅ Authentification

- Inscription utilisateur
- Connexion utilisateur
- Déconnexion sécurisée
- Gestion des rôles :
  - Admin
  - Utilisateur

---

## ✅ Dashboard Administrateur

Le dashboard admin permet :

- Gestion des utilisateurs
- Gestion des produits
- Gestion des défis écologiques
- Consultation des statistiques

---

## ✅ Gestion des Produits (CRUD)

Fonctionnalités :

- Ajouter un produit
- Modifier un produit
- Supprimer un produit
- Afficher les produits
- Gestion :
  - nom
  - code-barres
  - catégorie
  - marque
  - impact écologique
  - image
  - description

---

## ✅ Scan Intelligent des Produits

Fonctionnalités :

- Activation de la caméra
- Détection automatique du code-barres
- Recherche du produit
- Affichage des informations écologiques

---

## ✅ Impact Écologique

- Affichage du score environnemental
- Tableau de suivi écologique
- Sensibilisation écologique

---

## ✅ Défis Écologiques

- Création de défis
- Gestion des défis par admin
- Participation des utilisateurs

---

# 🧩 Architecture MVC

Le projet respecte totalement l’architecture MVC de Laravel :

## Models

- User
- Produit
- Alternative
- Impact
- Defi
- Participation

## Controllers

- AuthController
- ScanController
- AdminDashboardController
- AdminProduitController
- AdminUserController
- AdminDefiController

## Views Blade

- Home
- Login
- Register
- Dashboard
- Solutions
- Scan
- Impact
- Blog
- Contact
- Admin Panel

---

# 🔗 Relations Eloquent

Le projet utilise plusieurs relations :

| Relation | Description |
|---|---|
| hasMany | Produit → Alternatives |
| hasOne | Produit → Impact |
| belongsTo | Participation → User |
| belongsTo | Participation → Defi |

---

# 📄 Fonctionnalités Laravel utilisées

## ✔️ Routes

- Routes publiques
- Routes protégées
- Middleware admin


