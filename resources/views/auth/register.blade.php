<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Zéro Déchet</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #f7fffb 0%, #eafff4 100%);
            color: #064e3b;
        }

        .register-header {
            height: 74px;
            padding: 0 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgba(255, 255, 255, 0.75);
            border-bottom: 1px solid #d9f5ea;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 14px;
            font-size: 22px;
            font-weight: 800;
            color: #065f46;
            text-decoration: none;
        }

        .brand-icon {
            width: 46px;
            height: 46px;
            border-radius: 14px;
            background: #059669;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .back-home {
            color: #065f46;
            text-decoration: none;
            font-weight: 700;
            font-size: 15px;
        }

        .register-page {
            min-height: calc(100vh - 74px);
            display: grid;
            grid-template-columns: 1fr 0.95fr;
        }

        .register-info {
            padding: 55px 30px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .register-info h1 {
            font-size: clamp(44px, 5vw, 76px);
            line-height: 1.08;
            font-weight: 800;
            color: #065f46;
            margin-bottom: 28px;
            letter-spacing: -2px;
        }

        .register-info h1 span {
            color: #10b981;
        }

        .register-info > p {
            font-size: 22px;
            line-height: 1.7;
            max-width: 700px;
            color: #047857;
            margin-bottom: 42px;
        }

        .feature-list {
            display: flex;
            flex-direction: column;
            gap: 25px;
            max-width: 720px;
        }

        .feature {
            display: flex;
            align-items: flex-start;
            gap: 16px;
        }

        .feature-check {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: #059669;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .feature h3 {
            font-size: 18px;
            font-weight: 800;
            color: #064e3b;
            margin-bottom: 8px;
        }

        .feature p {
            font-size: 16px;
            color: #047857;
            line-height: 1.5;
        }

        .register-card-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 28px;
        }

        .register-card {
            width: 100%;
            max-width: 585px;
            background: rgba(255, 255, 255, 0.92);
            border: 1px solid #d7f1e7;
            border-radius: 22px;
            padding: 40px 38px;
            box-shadow: 0 25px 70px rgba(6, 95, 70, 0.12);
        }

        .register-card h2 {
            font-size: 32px;
            font-weight: 800;
            color: #064e3b;
            margin-bottom: 12px;
        }

        .register-card .subtitle {
            font-size: 17px;
            color: #047857;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            display: block;
            font-size: 15px;
            font-weight: 700;
            color: #065f46;
            margin-bottom: 10px;
        }

        .input-box {
            position: relative;
        }

        .input-box i {
            position: absolute;
            left: 17px;
            top: 50%;
            transform: translateY(-50%);
            color: #10b981;
            font-size: 20px;
        }

        .input-box input {
            width: 100%;
            height: 58px;
            border-radius: 14px;
            border: 1.5px solid #bdebdc;
            background: #ecfdf5;
            padding: 0 18px 0 52px;
            font-size: 17px;
            color: #064e3b;
            outline: none;
        }

        .input-box input:focus {
            border-color: #10b981;
            background: #ffffff;
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.12);
        }

        .terms {
            display: flex;
            gap: 12px;
            align-items: flex-start;
            margin: 26px 0;
            font-size: 16px;
            line-height: 1.5;
            color: #047857;
        }

        .terms input {
            width: 20px;
            height: 20px;
            accent-color: #059669;
            margin-top: 3px;
        }

        .terms a {
            color: #047857;
            font-weight: 700;
            text-decoration: underline;
        }

        .form-actions {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .btn-submit,
        .btn-cancel {
            height: 58px;
            border: none;
            border-radius: 14px;
            font-size: 17px;
            font-weight: 800;
            cursor: pointer;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-submit {
            background: #059669;
            color: white;
        }

        .btn-submit:hover {
            background: #047857;
        }

        .btn-cancel {
            background: #e5e7eb;
            color: #111827;
        }

        .btn-cancel:hover {
            background: #d1d5db;
        }

        .login-link {
            text-align: center;
            margin-top: 24px;
            font-size: 15px;
            color: #047857;
        }

        .login-link a {
            color: #065f46;
            font-weight: 800;
            text-decoration: none;
        }

        .error {
            margin-top: 8px;
            color: #dc2626;
            font-size: 14px;
            font-weight: 600;
        }

        @media (max-width: 992px) {
            .register-page {
                grid-template-columns: 1fr;
            }

            .register-info {
                text-align: center;
                padding: 45px 24px 20px;
            }

            .register-info > p {
                margin-left: auto;
                margin-right: auto;
            }

            .feature {
                text-align: left;
            }

            .register-card-wrapper {
                padding: 25px 20px 50px;
            }
        }

        @media (max-width: 576px) {
            .register-header {
                padding: 0 18px;
            }

            .brand {
                font-size: 18px;
            }

            .back-home {
                font-size: 13px;
            }

            .register-card {
                padding: 30px 22px;
            }

            .form-actions {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<header class="register-header">
    <a href="{{ url('/') }}" class="brand">
        <span class="brand-icon">
            <i class="fa-solid fa-recycle"></i>
        </span>
        ZeroTrace
    </a>

    <a href="{{ url('/') }}" class="back-home">Retour à l'accueil</a>
</header>

<section class="register-page">

    <div class="register-info">
        <h1>
            Rejoignez le<br>
            mouvement <span>zéro<br>déchet</span>
        </h1>

        <p>
            Devenez un guerrier écologique et commencez à suivre votre impact
            environnemental dès aujourd'hui. Ensemble, nous pouvons créer un monde plus durable.
        </p>

        <div class="feature-list">
            <div class="feature">
                <span class="feature-check"><i class="fa-solid fa-check"></i></span>
                <div>
                    <h3>Scannez facilement</h3>
                    <p>Accédez à notre scanner de codes-barres instantané</p>
                </div>
            </div>

            <div class="feature">
                <span class="feature-check"><i class="fa-solid fa-check"></i></span>
                <div>
                    <h3>Suivez votre progrès</h3>
                    <p>Mesurez votre impact avec des analyses détaillées</p>
                </div>
            </div>

            <div class="feature">
                <span class="feature-check"><i class="fa-solid fa-check"></i></span>
                <div>
                    <h3>Conseils personnalisés</h3>
                    <p>Recevez des recommandations adaptées à vos habitudes</p>
                </div>
            </div>

            <div class="feature">
                <span class="feature-check"><i class="fa-solid fa-check"></i></span>
                <div>
                    <h3>Rejoignez la communauté</h3>
                    <p>Connectez-vous avec 250 000+ guerriers écologiques</p>
                </div>
            </div>
        </div>
    </div>

    <div class="register-card-wrapper">
        <div class="register-card">
            <h2>Créez votre compte</h2>
            <p class="subtitle">Commencez votre voyage zéro déchet maintenant</p>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <label for="name">Nom complet</label>
                    <div class="input-box">
                        <i class="fa-regular fa-user"></i>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus placeholder="Votre nom complet">
                    </div>
                    @error('name')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="input-box">
                        <i class="fa-regular fa-envelope"></i>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required placeholder="votre@email.com">
                    </div>
                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <div class="input-box">
                        <i class="fa-solid fa-lock"></i>
                        <input id="password" type="password" name="password" required placeholder="••••••••">
                    </div>
                    @error('password')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirmer le mot de passe</label>
                    <div class="input-box">
                        <i class="fa-solid fa-lock"></i>
                        <input id="password_confirmation" type="password" name="password_confirmation" required placeholder="••••••••">
                    </div>
                </div>

                <label class="terms">
                    <input type="checkbox" required>
                    <span>
                        J'accepte les
                        <a href="#">conditions d'utilisation</a>
                        et la
                        <a href="#">politique de confidentialité</a>
                    </span>
                </label>

                <div class="form-actions">
                    <button type="submit" class="btn-submit">
                        <i class="fa-solid fa-plus"></i>
                        Ajouter
                    </button>

                    <a href="{{ url('/') }}" class="btn-cancel">
                        <i class="fa-solid fa-xmark"></i>
                        Annuler
                    </a>
                </div>

                <div class="login-link">
                    Vous avez déjà un compte ?
                    <a href="{{ route('login') }}">Se connecter</a>
                </div>
            </form>
        </div>
    </div>

</section>

</body>
</html>