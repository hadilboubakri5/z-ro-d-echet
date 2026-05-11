<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejoindre - Zero d'echet </title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, sans-serif;
        }

        body{
            min-height:100vh;
            background:linear-gradient(to bottom, white, #ecfdf5, white);
        }

        header{
            border-bottom:1px solid #d1fae5;
            background:white;
        }

        .container{
            max-width:1200px;
            margin:auto;
            padding:20px 24px;
        }

        .header-content{
            display:flex;
            justify-content:space-between;
            align-items:center;
        }

        .logo{
            display:flex;
            align-items:center;
            gap:12px;
        }

        .logo-icon{
            width:40px;
            height:40px;
            background:#059669;
            border-radius:10px;
            display:flex;
            justify-content:center;
            align-items:center;
            color:white;
            font-size:20px;
        }

        .logo h1{
            font-size:30px;
            font-weight:bold;
            color:#064e3b;
        }

        nav{
            display:flex;
            gap:24px;
        }

        nav a{
            text-decoration:none;
            color:#047857;
            font-weight:600;
        }

        main{
            max-width:1200px;
            margin:auto;
            padding:50px 24px;
        }

        .grid{
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:50px;
            align-items:center;
        }

        .hero-title{
            font-size:60px;
            font-weight:bold;
            line-height:1.2;
            color:#064e3b;
            margin-bottom:24px;
        }

        .hero-title span{
            color:#059669;
        }

        .hero-text{
            font-size:20px;
            color:#047857;
            margin-bottom:35px;
        }

        .feature{
            display:flex;
            gap:15px;
            margin-bottom:25px;
        }

        .feature-icon{
            width:25px;
            height:25px;
            background:#059669;
            border-radius:50%;
            display:flex;
            align-items:center;
            justify-content:center;
            color:white;
            font-size:14px;
            flex-shrink:0;
        }

        .feature h4{
            color:#064e3b;
            margin-bottom:5px;
        }

        .feature p{
            color:#047857;
            font-size:14px;
        }

        .card{
            background:white;
            border-radius:25px;
            padding:40px;
            border:1px solid #d1fae5;
            box-shadow:0 10px 30px rgba(0,0,0,0.08);
        }

        .card h3{
            font-size:38px;
            color:#064e3b;
            margin-bottom:10px;
        }

        .card-desc{
            color:#047857;
            margin-bottom:30px;
        }

        .form-group{
            margin-bottom:24px;
        }

        label{
            display:block;
            margin-bottom:8px;
            font-weight:600;
            color:#064e3b;
        }

        input{
            width:100%;
            padding:15px;
            border-radius:12px;
            border:1px solid #a7f3d0;
            background:#ecfdf5;
            outline:none;
            font-size:15px;
        }

        input:focus{
            border-color:#059669;
        }

        .checkbox{
            display:flex;
            gap:10px;
            align-items:flex-start;
            margin-bottom:35px;
        }

        .checkbox input{
            width:auto;
            margin-top:4px;
        }

        .checkbox p{
            font-size:14px;
            color:#047857;
        }

        .checkbox a{
            color:#064e3b;
            font-weight:600;
        }

        .buttons{
            display:grid;
            grid-template-columns:1fr 1fr 1fr;
            gap:20px;
            margin-top:20px;
        }

        button{
            border:none;
            padding:16px;
            border-radius:18px;
            font-size:18px;
            font-weight:bold;
            cursor:pointer;
            transition:0.3s;
        }

        button:hover{
            transform:scale(1.05);
        }

        .btn-add{
            background:linear-gradient(to right,#059669,#16a34a);
            color:white;
        }

        .btn-edit{
            background:linear-gradient(to right,#2563eb,#06b6d4);
            color:white;
        }

        .btn-cancel{
            background:linear-gradient(to right,#e5e7eb,#d1d5db);
            color:#374151;
        }

        .login-text{
            margin-top:30px;
            text-align:center;
            color:#047857;
            font-size:14px;
        }

        .login-text button{
            background:none;
            border:none;
            padding:0;
            color:#064e3b;
            font-weight:bold;
            cursor:pointer;
            font-size:14px;
        }

        #loginPanel{
            margin-top:30px;
            background:#ecfdf5;
            border:1px solid #d1fae5;
            border-radius:20px;
            padding:25px;
            display:none;
        }

        #loginPanel h4{
            font-size:28px;
            color:#064e3b;
            margin-bottom:20px;
        }

        .login-btn{
            width:100%;
            background:#059669;
            color:white;
        }

        .login-btn:hover{
            background:#047857;
        }

        @media(max-width:900px){

            .grid{
                grid-template-columns:1fr;
            }

            .buttons{
                grid-template-columns:1fr;
            }

            .hero-title{
                font-size:40px;
            }

        }

    </style>

</head>

<body>

<header>

    <div class="container header-content">

        <div class="logo">

            <div class="logo-icon">
                ♻️
            </div>

            <h1>Zéro Déchet</h1>

        </div>

        <nav>
            <a href="/">Accueil</a>
            <a href="/assistant">Assistant IA</a>
        </nav>

    </div>

</header>

<main>

    <div class="grid">

        <!-- LEFT -->

        <div>

            <h2 class="hero-title">
                Rejoignez le
                <span>mouvement zéro déchet</span>
            </h2>

            <p class="hero-text">
                Devenez un guerrier écologique et commencez à suivre votre impact environnemental dès aujourd'hui.
            </p>

            <div class="feature">

                <div class="feature-icon">✓</div>

                <div>
                    <h4>Scannez facilement</h4>
                    <p>Accédez à notre scanner instantané</p>
                </div>

            </div>

            <div class="feature">

                <div class="feature-icon">✓</div>

                <div>
                    <h4>Suivez votre progrès</h4>
                    <p>Analyse détaillée de votre impact</p>
                </div>

            </div>

            <div class="feature">

                <div class="feature-icon">✓</div>

                <div>
                    <h4>Conseils personnalisés</h4>
                    <p>Recommandations adaptées à vos habitudes</p>
                </div>

            </div>

        </div>

        <!-- RIGHT -->

        <div>

            <div class="card">

                <h3>Créez votre compte</h3>

                <p class="card-desc">
                    Commencez votre voyage zéro déchet maintenant
                </p>

                <form id="registerForm" method="POST" action="/register">
                    @csrf

                    <div class="form-group">

                        <label>Nom complet</label>

                        <input
                            type="text"
                            name="name"
                            placeholder="Jean Dupont"
                            required>

                    </div>

                    <div class="form-group">

                        <label>Email</label>

                        <input
                            type="email"
                            name="email"
                            placeholder="vous@exemple.com"
                            required>

                    </div>

                    <div class="form-group">

                        <label>Mot de passe</label>

                        <input
                            type="password"
                            name="password"
                            placeholder="••••••••"
                            required>

                    </div>

                    <div class="form-group">

                        <label>Confirmer le mot de passe</label>

                        <input
                            type="password"
                            name="password_confirmation"
                            placeholder="••••••••"
                            required>

                    </div>

                    <div class="checkbox">

                        <input type="checkbox" name="consent" required>

                        <p>
                            J'accepte les
                            <a href="#">conditions d'utilisation</a>
                            et la
                            <a href="#">politique de confidentialité</a>
                        </p>

                    </div>

                    <div class="buttons">

                        <button type="submit" class="btn-add">
                            ➕ Ajouter
                        </button>

                        <button type="button" class="btn-edit">
                            ✏️ Modifier
                        </button>

                        <button type="reset" class="btn-cancel">
                            ❌ Annuler
                        </button>

                    </div>

                </form>

                <div class="login-text">

                    <p>
                        Vous avez déjà un compte ?

                        <button id="showLoginBtn">
                            Se connecter
                        </button>

                    </p>

                </div>

                <div id="loginPanel">

                    <h4>Connexion</h4>

                    <form method="POST" action="/login">
                        @csrf

                        <div class="form-group">

                            <label>Email</label>

                            <input
                                type="email"
                                name="email"
                                placeholder="vous@exemple.com"
                                required>

                        </div>

                        <div class="form-group">

                            <label>Mot de passe</label>

                            <input
                                type="password"
                                name="password"
                                placeholder="••••••••"
                                required>

                        </div>

                        <button type="submit" class="login-btn">
                            Se connecter
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</main>

<script>

const showLoginBtn = document.getElementById('showLoginBtn');
const loginPanel = document.getElementById('loginPanel');

showLoginBtn.addEventListener('click', () => {

    if(loginPanel.style.display === "block"){
        loginPanel.style.display = "none";
    }else{
        loginPanel.style.display = "block";
    }

});

</script>

</body>
</html>