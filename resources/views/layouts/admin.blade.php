<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            background: #f5f6f8;
        }

        .sidebar {
            width: 260px;
            height: 100vh;
            background: #1f2a44;
            color: white;
            padding: 35px 25px;
            position: fixed;
            left: 0;
            top: 0;
            box-shadow: 10px 0 30px rgba(0,0,0,0.12);
        }

        .logo {
            font-size: 28px;
            font-weight: 800;
            margin-bottom: 55px;
            color: white;
        }

        .logo span {
            color: #e46b2c;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 15px 16px;
            margin-bottom: 14px;
            border-radius: 14px;
            color: white;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background: #e46b2c;
            color: white;
            transform: translateX(5px);
        }

        .sidebar hr {
            border: none;
            border-top: 1px solid rgba(255,255,255,0.25);
            margin: 28px 0;
        }

        .content {
            margin-left: 260px;
            min-height: 100vh;
            background: #f5f6f8;
            padding: 35px;
        }
    </style>
</head>

<body>

    <div class="sidebar">

        <div class="logo">
            Groupe <span>GEFOR</span>
        </div>

        <a href="{{ route('accueil') }}">📊 Dashboard</a>
        <a href="{{ route('users') }}">👥 Utilisateurs</a>
        <a href="{{ route('classes') }}">🎓 Classes</a>
        <a href="{{ route('seances') }}">📅 Séances</a>

        <hr>

        <a href="{{ route('deconnexion.post') }}">🚪 Déconnexion</a>

    </div>

    <div class="content">
        @yield('content')
    </div>

</body>
</html>