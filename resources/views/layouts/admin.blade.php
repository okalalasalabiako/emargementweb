<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <style>
        body {
            display: flex;
            min-height: 100vh;
            margin: 0;
        }

        .sidebar {
            width: 250px;
            background: #1f2937;
            color: white;
            padding: 20px;
        }

        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            margin: 15px 0;
            padding: 10px;
            border-radius: 8px;
        }

        .sidebar a:hover {
            background: #374151;
        }

        .content {
            flex: 1;
            padding: 20px;
            background: #f3f4f6;
        }

        .title {
            font-size: 20px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h3>📊 Admin</h3>

        <a href="{{ route('users') }}">👥 Users</a>
        <a href="{{ route('classes') }}">🏫 Classes</a>
        <a href="{{ route('seances') }}">📅 Séances</a>

        <hr>

        <a href="{{ route('deconnexion.post') }}">🚪 Déconnexion</a>
    </div>

    <!-- CONTENU -->
    <div class="content">
        @yield('content')
    </div>

</body>
</html>