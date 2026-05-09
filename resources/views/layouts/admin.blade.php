<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin - Zéro Déchet</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        * { margin:0; padding:0; box-sizing:border-box; }

        body {
            font-family: 'Inter', sans-serif;
            background:#f7f8f4;
            display:flex;
            min-height:100vh;
        }

        .sidebar {
            width:270px;
            background:#064f13;
            color:white;
            padding:30px 22px;
            position:fixed;
            top:0;
            bottom:0;
            left:0;
        }

        .sidebar h2 {
            font-size:28px;
            font-weight:800;
            margin-bottom:35px;
        }

        .sidebar a {
            display:flex;
            gap:12px;
            align-items:center;
            color:white;
            text-decoration:none;
            padding:14px 16px;
            border-radius:14px;
            margin-bottom:10px;
            font-weight:700;
        }

        .sidebar a:hover {
            background:rgba(255,255,255,.12);
        }

        .content {
            margin-left:270px;
            padding:35px;
            width:100%;
        }

        .topbar {
            background:white;
            padding:24px 28px;
            border-radius:24px;
            margin-bottom:28px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            box-shadow:0 10px 30px rgba(0,0,0,.04);
        }

        .topbar h1 {
            color:#064f13;
            font-size:30px;
            font-weight:800;
        }

        .card {
            background:white;
            border-radius:24px;
            padding:30px;
            box-shadow:0 10px 30px rgba(0,0,0,.04);
        }

        .btn {
            display:inline-block;
            background:#064f13;
            color:white;
            padding:12px 20px;
            border-radius:999px;
            text-decoration:none;
            border:none;
            font-weight:700;
            cursor:pointer;
        }

        .btn-danger {
            background:#dc2626;
        }

        table {
            width:100%;
            border-collapse:collapse;
        }

        th, td {
            padding:16px;
            border-bottom:1px solid #e5e7eb;
            text-align:left;
        }

        th {
            color:#064f13;
        }

        input, select, textarea {
            width:100%;
            padding:14px;
            border:1px solid #d8ddd4;
            border-radius:14px;
            margin-top:8px;
            margin-bottom:18px;
            font-size:15px;
        }

        label {
            font-weight:700;
            color:#064f13;
        }

        .alert {
            background:#dcfce7;
            color:#166534;
            padding:14px;
            border-radius:14px;
            margin-bottom:20px;
            font-weight:700;
        }
    </style>
</head>

<body>

<aside class="sidebar">
    <h2>🌿 Admin</h2>

    <a href="{{ route('admin.dashboard') }}">
        <i class="fa-solid fa-chart-line"></i> Dashboard
    </a>

    <a href="{{ route('admin.users.index') }}">
        <i class="fa-solid fa-users"></i> Utilisateurs
    </a>

    <a href="{{ route('admin.produits.index') }}">
        <i class="fa-solid fa-box"></i> Produits
    </a>

    <a href="{{ route('admin.defis.index') }}">
        <i class="fa-solid fa-trophy"></i> Défis
    </a>

    <a href="{{ route('home') }}">
        <i class="fa-solid fa-house"></i> Retour site
    </a>
</aside>

<main class="content">
    <div class="topbar">
        <h1>@yield('title')</h1>
        <strong>{{ auth()->user()->name ?? 'Admin' }}</strong>
    </div>

    <div class="card">
        @yield('content')
    </div>
</main>

</body>
</html>