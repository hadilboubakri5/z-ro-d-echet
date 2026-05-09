@extends('layouts.app')

@section('content')

<style>
    .login-page {
        min-height: calc(100vh - 76px);
        background: linear-gradient(135deg, #fafbf8 0%, #eef8ec 100%);
        display: grid;
        grid-template-columns: 1fr 480px;
        gap: 60px;
        align-items: center;
        padding: 60px 70px;
        font-family: 'Inter', sans-serif;
    }

    .login-left h1 {
        font-size: 64px;
        line-height: 1.08;
        font-weight: 800;
        color: #111;
        margin-bottom: 24px;
    }

    .login-left h1 span {
        color: #064f13;
    }

    .login-left p {
        max-width: 560px;
        font-size: 18px;
        line-height: 1.8;
        color: #5f5f5f;
        margin-bottom: 34px;
    }

    .login-feature {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 18px;
        color: #333;
        font-weight: 600;
    }

    .login-feature i {
        width: 36px;
        height: 36px;
        background: #d8f5cf;
        color: #064f13;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .login-card {
        background: white;
        border-radius: 30px;
        padding: 42px;
        box-shadow: 0 25px 70px rgba(6, 79, 19, 0.10);
        border: 1px solid #e2eee0;
    }

    .login-badge {
        display: inline-block;
        background: #d8f5cf;
        color: #14532d;
        padding: 8px 18px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: .7px;
        margin-bottom: 22px;
    }

    .login-card h2 {
        font-size: 34px;
        font-weight: 800;
        color: #064f13;
        margin-bottom: 10px;
    }

    .login-card .subtitle {
        color: #666;
        line-height: 1.6;
        margin-bottom: 30px;
    }

    .form-group {
        margin-bottom: 22px;
    }

    .form-group label {
        display: block;
        color: #064f13;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .input-box {
        position: relative;
    }

    .input-box i {
        position: absolute;
        left: 18px;
        top: 50%;
        transform: translateY(-50%);
        color: #10b981;
    }

    .input-box input {
        width: 100%;
        height: 58px;
        border-radius: 16px;
        border: 1.5px solid #d8ddd4;
        background: #fbfdf9;
        padding: 0 18px 0 50px;
        font-size: 16px;
        outline: none;
        transition: .3s ease;
    }

    .input-box input:focus {
        border-color: #064f13;
        background: white;
        box-shadow: 0 0 0 4px rgba(6, 79, 19, .08);
    }

    .remember-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin: 8px 0 26px;
        color: #555;
        font-size: 14px;
    }

    .remember-row label {
        display: flex;
        align-items: center;
        gap: 9px;
        cursor: pointer;
    }

    .remember-row input {
        accent-color: #064f13;
    }

    .login-btn {
        width: 100%;
        height: 58px;
        border: none;
        border-radius: 16px;
        background: #064f13;
        color: white;
        font-size: 16px;
        font-weight: 800;
        cursor: pointer;
        transition: .3s ease;
    }

    .login-btn:hover {
        background: #043b0e;
    }

    .register-link {
        text-align: center;
        margin-top: 24px;
        color: #666;
        font-size: 15px;
    }

    .register-link a {
        color: #064f13;
        font-weight: 800;
        text-decoration: none;
    }

    .alert-success {
        background: #dcfce7;
        color: #166534;
        padding: 14px 16px;
        border-radius: 14px;
        margin-bottom: 20px;
        font-weight: 700;
    }

    .alert-error {
        background: #fee2e2;
        color: #991b1b;
        padding: 14px 16px;
        border-radius: 14px;
        margin-bottom: 20px;
        font-weight: 700;
    }

    .validation-error {
        color: #dc2626;
        font-size: 14px;
        margin-top: 8px;
        font-weight: 600;
    }

    @media (max-width: 992px) {
        .login-page {
            grid-template-columns: 1fr;
            padding: 50px 22px;
        }

        .login-left {
            text-align: center;
        }

        .login-left h1 {
            font-size: 42px;
        }

        .login-feature {
            justify-content: center;
        }
    }
</style>

<section class="login-page">

    <div class="login-left">
        <h1>
            Bienvenue dans votre<br>
            espace <span>éco-responsable</span>
        </h1>

        <p>
            Connectez-vous pour scanner vos produits, suivre votre impact écologique
            et accéder à vos recommandations personnalisées.
        </p>

        <div class="login-feature">
            <i class="fa-solid fa-barcode"></i>
            Scanner les produits
        </div>

        <div class="login-feature">
            <i class="fa-solid fa-chart-line"></i>
            Suivre votre impact
        </div>

        <div class="login-feature">
            <i class="fa-solid fa-leaf"></i>
            Découvrir des alternatives durables
        </div>
    </div>

    <div class="login-card">

        <span class="login-badge">ESPACE MEMBRE</span>

        <h2>Connexion</h2>

        <p class="subtitle">
            Accédez à votre compte Zéro Déchet.
        </p>

        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert-error">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.store') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>

                <div class="input-box">
                    <i class="fa-regular fa-envelope"></i>

                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="admin@gmail.com"
                        required
                        autofocus
                    >
                </div>

                @error('email')
                    <div class="validation-error">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>

                <div class="input-box">
                    <i class="fa-solid fa-lock"></i>

                    <input
                        id="password"
                        type="password"
                        name="password"
                        placeholder="••••••••"
                        required
                    >
                </div>

                @error('password')
                    <div class="validation-error">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="remember-row">
                <label>
                    <input type="checkbox" name="remember">
                    Se souvenir de moi
                </label>
            </div>

            <button type="submit" class="login-btn">
                🌿 Se connecter
            </button>
        </form>

        <div class="register-link">
            Pas encore de compte ?
            <a href="{{ route('register') }}">Créer un compte</a>
        </div>

    </div>

</section>

@endsection