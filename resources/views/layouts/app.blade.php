<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Zéro Déchet')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            margin: 0;
            overflow-x: hidden;
            font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background: #f7f8f4;
            color: #111;
        }

        a {
            color: #064f13;
            text-decoration: none;
        }

        .app-nav {
            background: #fff;
            border-bottom: 1px solid #d8ddd4;
            padding: 12px 24px;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }

        .app-nav a {
            font-weight: 600;
            margin-right: 16px;
        }

        .app-nav a:last-child {
            margin-right: 0;
        }

        .container {
            max-width: 1120px;
            margin: 0 auto;
            padding: 32px;
        }

        .container-fluid {
            width: 100%;
            margin: 0 auto;
            padding: 0;
        }

        .section-header {
            margin-bottom: 24px;
        }

        .section-card {
            background: #fff;
            border-radius: 24px;
            padding: 24px;
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.05);
        }

        .button-link {
            display: inline-block;
            margin-top: 12px;
            padding: 12px 18px;
            border-radius: 14px;
            background: #064f13;
            color: #fff;
        }

        .button-link:hover {
            background: #043b0e;
            color: #fff;
        }
    </style>
    @stack('styles')
</head>
<body>
    @auth
    <nav class="app-nav">
        <span style="font-weight:800;color:#064f13;">♻️ Zéro Déchet</span>
        <div>
            <a href="{{ route('dashboard') }}">Tableau de bord</a>
            <a href="{{ route('scan') }}">Scan</a>
            <a href="{{ route('defis') }}">Défis</a>
            <a href="{{ route('impact') }}">Impact</a>
        </div>
    </nav>
    @endauth
    <div class="@yield('wrapper_class', 'container')">
        @yield('content')
    </div>
    @stack('scripts')
</body>
</html>
