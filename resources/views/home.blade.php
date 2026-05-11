<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zéro Déchet AI</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(135deg, #ecfdf5, #f8fffc);
            color: #064e3b;
        }

        .navbar {
            height: 70px;
            background: #ffffff;
            border-bottom: 1px solid #d1fae5;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 12%;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 14px;
            font-size: 28px;
            font-weight: 800;
            color: #065f46;
        }

        .logo-icon {
            width: 48px;
            height: 48px;
            background: #059669;
            color: white;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .nav-link {
            color: #047857;
            text-decoration: none;
            font-weight: 700;
        }

        .container {
            min-height: calc(100vh - 70px);
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 70px;
            align-items: center;
            padding: 60px 12%;
        }

        .hero h1 {
            font-size: 56px;
            line-height: 1.25;
            margin: 0;
            color: #064e3b;
        }

        .hero h1 span {
            color: #059669;
        }

        .hero p {
            margin-top: 25px;
            font-size: 21px;
            line-height: 1.7;
            color: #047857;
        }

        .feature {
            display: flex;
            gap: 15px;
            margin-top: 28px;
            align-items: flex-start;
        }

        .check {
            background: #059669;
            color: white;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            flex-shrink: 0;
        }

        .feature h3 {
            margin: 0;
            font-size: 18px;
        }

        .feature p {
            margin: 6px 0 0;
            font-size: 16px;
        }

        .card {
            background: white;
            padding: 38px;
            border-radius: 22px;
            box-shadow: 0 25px 60px rgba(6, 78, 59, 0.12);
            border: 1px solid #bbf7d0;
        }

        .card h2 {
            font-size: 36px;
            margin: 0 0 10px;
            color: #064e3b;
        }

        .card > p {
            font-size: 19px;
            margin-bottom: 30px;
            color: #047857;
        }

        label {
            display: block;
            margin-top: 14px;
            margin-bottom: 8px;
            font-weight: 700;
            color: #064e3b;
        }

        input,
        select {
            width: 100%;
            padding: 16px 18px;
            border-radius: 14px;
            border: 1px solid #86efac;
            background: #ecfdf5;
            font-size: 16px;
            outline: none;
            transition: 0.3s;
            margin-bottom: 10px;
        }

        input:focus,
        select:focus {
            border-color: #059669;
            box-shadow: 0 0 0 4px rgba(5, 150, 105, 0.15);
            background: white;
        }

        button {
            width: 100%;
            margin-top: 15px;
            padding: 17px;
            border: none;
            border-radius: 16px;
            background: linear-gradient(135deg, #059669, #047857);
            color: white;
            font-size: 17px;
            font-weight: 800;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(5, 150, 105, 0.25);
        }

        .result {
            margin-top: 25px;
            padding: 22px;
            border-radius: 18px;
            background: #ecfdf5;
            border-left: 5px solid #059669;
            color: #064e3b;
            line-height: 1.7;
        }

        .result h3 {
            margin-top: 0;
        }

        pre {
            white-space: pre-wrap;
            font-family: inherit;
            font-size: 16px;
            margin: 0;
        }

        @media (max-width: 900px) {
            .navbar {
                padding: 0 6%;
            }

            .container {
                grid-template-columns: 1fr;
                padding: 40px 6%;
                gap: 40px;
            }

            .hero h1 {
                font-size: 42px;
            }

            .card h2 {
                font-size: 30px;
            }
        }

        @media (max-width: 500px) {
            .logo {
                font-size: 22px;
            }

            .logo-icon {
                width: 42px;
                height: 42px;
            }

            .hero h1 {
                font-size: 34px;
            }

            .card {
                padding: 25px;
            }
        }
    </style>
</head>

<body>

<nav class="navbar">
    <div class="logo">
        <div class="logo-icon">♻</div>
        Zéro Déchet
    </div>

    <a href="/" class="nav-link">Retour à l'accueil</a>
</nav>

<div class="container">
    <div class="hero">
        <h1>Assistant <span>zéro déchet</span> avec IA</h1>
        <p>
            Entrez un objet, un déchet ou une matière, et recevez des conseils intelligents
            pour réutiliser, recycler et réduire votre impact écologique.
        </p>

        <div class="feature">
            <div class="check">✓</div>
            <div>
                <h3>Réutilisation intelligente</h3>
                <p>Des idées pratiques pour donner une seconde vie aux objets.</p>
            </div>
        </div>

        <div class="feature">
            <div class="check">✓</div>
            <div>
                <h3>Tri et recyclage</h3>
                <p>Des conseils simples selon la matière sélectionnée.</p>
            </div>
        </div>

        <div class="feature">
            <div class="check">✓</div>
            <div>
                <h3>Conseils personnalisés</h3>
                <p>Une réponse générée par IA selon votre besoin.</p>
            </div>
        </div>
    </div>

    <div class="card">
        <h2>Zéro Déchet IA</h2>
        <p>Générez une suggestion écologique en quelques secondes.</p>

        <form method="POST" action="{{ route('generate') }}">
            @csrf

            <label>Objet ou déchet</label>
            <input
                type="text"
                name="item"
                placeholder="Exemple : bouteille plastique, vieux t-shirt..."
                value="{{ $item ?? '' }}"
                required
            >

            <label>Catégorie</label>
            <select name="category">
                <option value="food" {{ ($category ?? '') == 'food' ? 'selected' : '' }}>Food</option>
                <option value="plastic" {{ ($category ?? '') == 'plastic' ? 'selected' : '' }}>Plastic</option>
                <option value="clothes" {{ ($category ?? '') == 'clothes' ? 'selected' : '' }}>Clothes</option>
                <option value="cardboard" {{ ($category ?? '') == 'cardboard' ? 'selected' : '' }}>Cardboard</option>
                <option value="glass" {{ ($category ?? '') == 'glass' ? 'selected' : '' }}>Glass</option>
                <option value="electronics" {{ ($category ?? '') == 'electronics' ? 'selected' : '' }}>Electronics</option>
                <option value="other" {{ ($category ?? '') == 'other' ? 'selected' : '' }}>Other</option>
            </select>

            <button type="submit">Générer une suggestion IA</button>
        </form>

        @if(isset($result))
            <div class="result">
                <h3>Suggestion IA pour {{ $item }}</h3>
                <pre>{{ $result }}</pre>
            </div>
        @endif
    </div>
</div>

</body>
</html>