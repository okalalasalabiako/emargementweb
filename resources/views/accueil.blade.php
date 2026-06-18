<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gefor - Administration</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        * { margin:0; padding:0; box-sizing:border-box; font-family:'Poppins', sans-serif; }

        body {
            background:#1f2a44;
            min-height:100vh;
            color:#1f2a44;
        }

        .sidebar {
            width:260px;
            height:100vh;
            background:white;
            position:fixed;
            left:0;
            top:0;
            padding:30px 20px;
            box-shadow:0 10px 30px rgba(0,0,0,.18);
        }

        .logo {
            font-size:30px;
            font-weight:700;
            margin-bottom:40px;
            text-align:center;
            color:#1f2a44;
        }

        .logo span { color:#e46b2c; }

        .sidebar a {
            display:flex;
            align-items:center;
            gap:12px;
            text-decoration:none;
            color:#1f2a44;
            padding:14px 16px;
            margin-bottom:12px;
            border-radius:12px;
            transition:.3s;
            font-size:15px;
            font-weight:600;
        }

        .sidebar a:hover {
            background:#e46b2c;
            color:white;
            transform:translateX(5px);
        }

        .main {
            margin-left:260px;
            padding:40px;
        }

        .topbar {
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:40px;
            color:white;
        }

        .welcome h1 {
            font-size:34px;
            font-weight:700;
        }

        .welcome p { color:#e5e7eb; }

        .logout-btn {
            background:#e46b2c;
            padding:12px 20px;
            border-radius:12px;
            color:white;
            text-decoration:none;
            font-weight:600;
        }

        .cards {
            display:grid;
            grid-template-columns:repeat(auto-fit, minmax(220px, 1fr));
            gap:20px;
            margin-bottom:40px;
        }

        .card-dashboard {
            background:white;
            border-radius:20px;
            padding:25px;
            box-shadow:0 20px 50px rgba(0,0,0,.20);
        }

        .card-dashboard i {
            font-size:35px;
            color:#e46b2c;
            margin-bottom:15px;
        }

        .card-dashboard h2 {
            font-size:32px;
            font-weight:700;
            color:#1f2a44;
        }

        .card-dashboard p { color:#555; }

        .table-container {
            background:white;
            padding:25px;
            border-radius:20px;
            box-shadow:0 20px 50px rgba(0,0,0,.20);
        }

        .table-title h2 {
            font-size:24px;
            font-weight:700;
            margin-bottom:25px;
            color:#1f2a44;
        }

        thead {
            background:#1f2a44;
            color:white;
        }

        th, td { padding:15px; }

        .badge-success, .badge-danger {
            padding:8px 14px;
            border-radius:50px;
            font-size:12px;
            color:white;
        }

        .badge-success { background:#22c55e; }
        .badge-danger { background:#ef4444; }
    </style>
</head>

<body>

<div class="sidebar">
    <div class="logo">Groupe <span>GEFOR</span></div>

    <a href="{{ route('admin.dashboard') }}"><i class="bi bi-speedometer2"></i> Dashboard</a>
    <a href="{{ route('users') }}"><i class="bi bi-people-fill"></i> Utilisateurs</a>
    <a href="{{ route('classes') }}"><i class="bi bi-mortarboard-fill"></i> Classes</a>
    <a href="{{ route('seances') }}"><i class="bi bi-calendar-event-fill"></i> Séances</a>
</div>

<div class="main">

    <div class="topbar">
        <div class="welcome">
            <h1>Bonjour {{ Auth::user()->name }}</h1>
            <p>Bienvenue sur le tableau de bord administrateur.</p>
        </div>

        <a href="{{ route('deconnexion.post') }}" class="logout-btn">
            <i class="bi bi-box-arrow-right"></i> Déconnexion
        </a>
    </div>

    <div class="cards">
        <div class="card-dashboard">
            <i class="bi bi-calendar-check-fill"></i>
            <h2>{{ count($seances) }}</h2>
            <p>Séances à venir</p>
        </div>

        <div class="card-dashboard">
            <i class="bi bi-person-check-fill"></i>
            <h2>98%</h2>
            <p>Taux de présence</p>
        </div>

        <div class="card-dashboard">
            <i class="bi bi-mortarboard-fill"></i>
            <h2>5</h2>
            <p>Classes actives</p>
        </div>

        <div class="card-dashboard">
            <i class="bi bi-people-fill"></i>
            <h2>120</h2>
            <p>Étudiants inscrits</p>
        </div>
    </div>

    <div class="table-container">
        <div class="table-title">
            <h2>📚 Séances programmées</h2>
        </div>

        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Matière</th>
                        <th>Date</th>
                        <th>Début</th>
                        <th>Fin</th>
                        <th>Formateur</th>
                        <th>Classe</th>
                        <th>Statut</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($seances as $seance)
                        <tr>
                            <td>{{ $seance->matiere }}</td>
                            <td>{{ \Carbon\Carbon::parse($seance->date)->format('d/m/Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($seance->heure_debut)->format('H:i') }}</td>
                            <td>{{ \Carbon\Carbon::parse($seance->heure_fin)->format('H:i') }}</td>
                            <td>{{ $seance->user->name ?? 'Aucun formateur' }}</td>
                            <td>{{ $seance->classe->name ?? 'Aucune classe' }}</td>
                            <td>
                                @if($seance->valide)
                                    <span class="badge-success">Validée</span>
                                @else
                                    <span class="badge-danger">Non validée</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Aucune séance disponible.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

</body>
</html>

