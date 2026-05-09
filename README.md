# 🌿 Zéro Déchet — Application Web Écologique avec Laravel

## 📌 Présentation du projet

Zéro Déchet est une application web dynamique développée avec le framework Laravel.

L’objectif principal est de sensibiliser les utilisateurs à une consommation responsable grâce à :

- l’analyse des produits via scan de code-barres
- l’évaluation de leur impact écologique
- la proposition d’alternatives durables
- la participation à des défis écologiques

---

## 🎯 Objectifs du projet

- Développer une application web dynamique complète avec Laravel
- Concevoir une base de données relationnelle
- Implémenter des fonctionnalités CRUD
- Utiliser les vues Blade et les composants Laravel
- Gérer l’authentification et les rôles utilisateurs
- Créer une interface moderne et responsive

---

## 🛠 Technologies utilisées

| Technologie | Description |
|---|---|
| Laravel | Framework PHP MVC |
| PHP | Langage backend |
| MySQL | Base de données |
| Blade | Moteur de templates Laravel |
| HTML5 / CSS3 | Interfaces utilisateur |
| JavaScript | Interactivité |
| Git & GitHub | Gestion de version |

---

## 📁 Fonctionnalités réalisées

### ✅ Authentification

- Inscription utilisateur
- Connexion utilisateur
- Déconnexion sécurisée
- Gestion des rôles :
  - Admin
  - Utilisateur

---

### ✅ Dashboard Administrateur

Le dashboard admin permet :

- Gestion des utilisateurs
- Gestion des produits
- Gestion des défis écologiques
- Consultation des statistiques

---

### ✅ Gestion des Produits CRUD

- Ajouter un produit
- Modifier un produit
- Supprimer un produit
- Afficher les produits

Champs gérés :

- nom
- code-barres
- catégorie
- marque
- impact écologique
- image
- description

---

### ✅ Scan Intelligent des Produits

- Activation de la caméra
- Détection automatique du code-barres
- Recherche du produit
- Affichage des informations écologiques

---

### ✅ Impact Écologique

- Affichage du score environnemental
- Tableau de suivi écologique
- Sensibilisation écologique

---

### ✅ Défis Écologiques

- Création de défis
- Gestion des défis par admin
- Participation des utilisateurs

---

## 🧩 Architecture MVC

Le projet respecte l’architecture MVC de Laravel.

### Models

- User
- Produit
- Alternative
- Impact
- Defi
- Participation

### Controllers

- AuthController
- ScanController
- AdminDashboardController
- AdminProduitController
- AdminUserController
- AdminDefiController

### Views Blade

- Home
- Login
- Register
- Dashboard Admin
- Produits
- Scan
- Défis

---

## 🔗 Relations Eloquent

| Relation | Description |
|---|---|
| hasMany | Produit → Alternatives |
| hasOne | Produit → Impact |
| belongsTo | Participation → User |
| belongsTo | Participation → Defi |

---

## 📄 Fonctionnalités Laravel utilisées

### Routes

- Routes publiques
- Routes protégées
- Middleware admin

### Eloquent ORM

- Models
- Relations
- Requêtes base de données

### Blade

- Templates
- Layouts
- Composants

### Middleware

- Authentification
- Protection admin