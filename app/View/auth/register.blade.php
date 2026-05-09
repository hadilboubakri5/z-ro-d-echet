<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription - Zéro Déchet</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #e8f5e9, #f1f8e9);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-auth {
            width: 400px;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 25px rgba(0,0,0,0.1);
            background: white;
        }

        .title {
            color: #2e7d32;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        .btn-green {
            background: #2e7d32;
            color: white;
        }

        .btn-green:hover {
            background: #1b5e20;
            color: white;
        }

        a {
            text-decoration: none;
            color: #2e7d32;
        }
    </style>
</head>

<body>

<div class="card-auth">

    <h3 class="title">🌱 Inscription</h3>

    <form method="POST" action="/register">
        @csrf

        <div class="mb-3">
            <label>Nom</label>
            <input type="text" name="name" class="form-control" required>
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label>Mot de passe</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Confirmer mot de passe</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <button class="btn btn-green w-100">Créer un compte 🌿</button>
    </form>

    <p class="text-center mt-3">
        Déjà un compte ? <a href="/login">Se connecter</a>
    </p>

</div>

</body>
</html>