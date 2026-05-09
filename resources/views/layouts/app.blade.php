<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Zéro Déchet</title>

    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    <!-- FONT AWESOME -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

    <!-- APP CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- APP JS -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family:'Inter',sans-serif;
            background:#fafbf8;
            overflow-x:hidden;
        }

        .app-wrapper{
            min-height:100vh;
        }

        /*
        ==========================================
        NAVBAR
        ==========================================
        */

        .navbar-eco{
            height:76px;
            padding:0 34px;
            display:flex;
            align-items:center;
            background:#fafbf8;
            border-bottom:1px solid #ececec;
            position:sticky;
            top:0;
            z-index:999;
        }

        .logo-eco{
            font-size:34px;
            font-weight:800;
            color:#0d5b25;
            text-decoration:none;
            margin-right:44px;
            white-space:nowrap;
            letter-spacing:-1px;
        }

        .logo-eco span{
            font-style:italic;
        }

        .nav-links{
            display:flex;
            align-items:center;
            gap:30px;
            flex:1;
        }

        .nav-links a{
            text-decoration:none;
            color:#3d3d3d;
            font-size:15px;
            font-weight:600;
            transition:.3s ease;
            position:relative;
        }

        .nav-links a:hover{
            color:#064f13;
        }

        .nav-links a::after{
            content:'';
            position:absolute;
            left:0;
            bottom:-6px;
            width:0;
            height:2px;
            background:#064f13;
            transition:.3s ease;
        }

        .nav-links a:hover::after{
            width:100%;
        }

        /*
        ==========================================
        ACTIONS
        ==========================================
        */

        .nav-actions{
            display:flex;
            align-items:center;
            gap:18px;
        }

        .nav-join{
            background:#064f13;
            color:white;
            text-decoration:none;
            padding:12px 24px;
            border-radius:999px;
            font-size:14px;
            font-weight:700;
            display:flex;
            align-items:center;
            gap:10px;
            transition:.3s ease;
        }

        .nav-join:hover{
            background:#043b0e;
            color:white;
            transform:translateY(-1px);
        }

        /*
        ==========================================
        ICONS
        ==========================================
        */

        .nav-icon{
            width:44px;
            height:44px;
            border-radius:50%;
            background:#f2f5f1;
            color:#064f13;
            display:flex;
            align-items:center;
            justify-content:center;
            text-decoration:none;
            font-size:17px;
            transition:.3s ease;
        }

        .nav-icon:hover{
            background:#dff4d6;
            transform:translateY(-2px);
        }

        /*
        ==========================================
        USER MENU
        ==========================================
        */

        .user-menu{
            position:relative;
        }

        .user-btn{
            width:44px;
            height:44px;
            border:none;
            border-radius:50%;
            background:#f2f5f1;
            color:#064f13;
            display:flex;
            align-items:center;
            justify-content:center;
            cursor:pointer;
            font-size:17px;
            transition:.3s ease;
        }

        .user-btn:hover{
            background:#dff4d6;
            transform:translateY(-2px);
        }

        .user-dropdown{
            position:absolute;
            top:58px;
            right:0;
            width:240px;
            background:white;
            border-radius:20px;
            box-shadow:0 18px 50px rgba(0,0,0,.08);
            border:1px solid #edf2eb;
            padding:10px;
            display:none;
            flex-direction:column;
            z-index:999;
        }

        .user-dropdown.show{
            display:flex;
        }

        .user-dropdown a,
        .user-dropdown button{
            width:100%;
            border:none;
            background:none;
            padding:15px 16px;
            border-radius:14px;
            text-decoration:none;
            display:flex;
            align-items:center;
            gap:12px;
            color:#333;
            font-size:15px;
            font-weight:600;
            cursor:pointer;
            transition:.3s ease;
        }

        .user-dropdown a:hover,
        .user-dropdown button:hover{
            background:#f4f7f2;
            color:#064f13;
        }

        .user-dropdown i{
            width:18px;
        }

        /*
        ==========================================
        RESPONSIVE
        ==========================================
        */

        @media (max-width:992px){

            .nav-links{
                display:none;
            }

            .navbar-eco{
                justify-content:space-between;
                padding:0 22px;
            }

            .logo-eco{
                font-size:28px;
                margin-right:0;
            }

            .nav-join{
                display:none;
            }
        }

    </style>

</head>

<body>

<div class="app-wrapper">

    <!-- NAVBAR -->

    <nav class="navbar-eco">

        <!-- LOGO -->

        <a href="{{ url('/') }}" class="logo-eco">
            Zéro<span>Déchet</span>
        </a>

        <!-- MENU -->

        <div class="nav-links">

            <a href="{{ url('/') }}">
                Accueil
            </a>

            <a href="{{ url('/solutions') }}">
                Solutions
            </a>

            <a href="{{ url('/scan') }}">
                Scan
            </a>

            <a href="{{ url('/impact') }}">
                Impact
            </a>

            <a href="{{ url('/blog') }}">
                Blog
            </a>

            <a href="{{ url('/contact') }}">
                Contact
            </a>

        </div>

        <!-- ACTIONS -->

        <div class="nav-actions">

            @guest

                <a href="{{ route('register') }}" class="nav-join">

                    <i class="fa-solid fa-leaf"></i>

                    Rejoindre

                </a>

            @endguest


            <!-- USER MENU -->

            <div class="user-menu">

                <button class="user-btn" onclick="toggleUserMenu()">

                    <i class="fa-regular fa-user"></i>

                </button>

                <div class="user-dropdown" id="userDropdown">

                    @guest

                        <a href="{{ route('login') }}">

                            <i class="fa-solid fa-right-to-bracket"></i>

                            Connexion

                        </a>

                        <a href="{{ route('register') }}">

                            <i class="fa-solid fa-user-plus"></i>

                            Inscription

                        </a>

                    @endguest


                    @auth

                        @if(auth()->user()->role === 'admin')

                            <a href="{{ route('admin.dashboard') }}">

                                <i class="fa-solid fa-chart-line"></i>

                                Dashboard Admin

                            </a>

                        @endif

                        <form
                            action="{{ route('logout') }}"
                            method="POST"
                        >

                            @csrf

                            <button type="submit">

                                <i class="fa-solid fa-right-from-bracket"></i>

                                Déconnexion

                            </button>

                        </form>

                    @endauth

                </div>

            </div>

            <!-- NOTIFICATION -->

            <a href="#" class="nav-icon">

                <i class="fa-regular fa-bell"></i>

            </a>

        </div>

    </nav>

    <!-- CONTENT -->

    <main>

        @yield('content')

    </main>

</div>

<script>

    function toggleUserMenu() {

        document
            .getElementById('userDropdown')
            .classList
            .toggle('show');
    }

    window.onclick = function(event) {

        if (!event.target.closest('.user-menu')) {

            const dropdown =
                document.getElementById('userDropdown');

            if (dropdown.classList.contains('show')) {

                dropdown.classList.remove('show');
            }
        }
    }

</script>

</body>

</html>