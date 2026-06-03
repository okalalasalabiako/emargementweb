
<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gefor - Administration</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #0f172a, #1e293b);
            min-height: 100vh;
            color: white;
        }

        .sidebar {
            width: 260px;
            height: 100vh;
            background: rgba(15, 23, 42, 0.95);
            position: fixed;
            left: 0;
            top: 0;
            padding: 30px 20px;
            border-right: 1px solid rgba(255,255,255,0.1);
        }

        .logo {
            font-size: 30px;
            font-weight: 700;
            margin-bottom: 40px;
            text-align: center;
            color: #38bdf8;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: white;
            padding: 14px 16px;
            margin-bottom: 12px;
            border-radius: 12px;
            transition: 0.3s;
            font-size: 15px;
        }

        .sidebar a:hover {
            background: #38bdf8;
            transform: translateX(5px);
        }

        .main {
            margin-left: 260px;
            padding: 40px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }

        .welcome h1 {
            font-size: 34px;
            font-weight: 700;
        }

        .welcome p {
            color: #cbd5e1;
            margin-top: 5px;
        }

        .logout-btn {
            background: #ef4444;
            border: none;
            padding: 12px 20px;
            border-radius: 12px;
            color: white;
            text-decoration: none;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background: #dc2626;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .card-dashboard {
            background: rgba(255,255,255,0.08);
            border-radius: 20px;
            padding: 25px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.1);
            transition: 0.3s;
        }

        .card-dashboard:hover {
            transform: translateY(-5px);
        }

        .card-dashboard i {
            font-size: 35px;
            color: #38bdf8;
            margin-bottom: 15px;
        }

        .card-dashboard h2 {
            font-size: 32px;
            font-weight: 700;
        }

        .card-dashboard p {
            color: #cbd5e1;
            margin-top: 5px;
        }

        .table-container {
            background: rgba(255,255,255,0.08);
            padding: 25px;
            border-radius: 20px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.1);
        }

        .table-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .table-title h2 {
            font-size: 24px;
            font-weight: 600;
        }

        table {
            width: 100%;
            color: white;
        }

        thead {
            background: rgba(255,255,255,0.1);
        }

        th, td {
            padding: 15px;
        }

        tbody tr {
            border-bottom: 1px solid rgba(255,255,255,0.08);
            transition: 0.3s;
        }

        tbody tr:hover {
            background: rgba(255,255,255,0.05);
        }

        .badge-success {
            background: #22c55e;
            padding: 8px 14px;
            border-radius: 50px;
            font-size: 12px;
        }

        .badge-danger {
            background: #ef4444;
            padding: 8px 14px;
            border-radius: 50px;
            font-size: 12px;
        }

        @media(max-width: 900px) {

            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .main {
                margin-left: 0;
                padding: 20px;
            }

            .topbar {
                flex-direction: column;
                align-items: flex-start;
                gap: 20px;
            }
        }

    </style>

</head>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar">

        <div class="logo">
            GEFOR
        </div>

        <a href="#">
            <i class="bi bi-speedometer2"></i>
            Dashboard
        </a>

        <a href="{{ route('users') }}">
            <i class="bi bi-people-fill"></i>
            Utilisateurs
        </a>

        <a href="{{ route('classes') }}">
            <i class="bi bi-mortarboard-fill"></i>
            Classes
        </a>

        <a href="{{ route('seances') }}">
            <i class="bi bi-calendar-event-fill"></i>
            Séances
        </a>

    </div>

    <!-- MAIN -->
    <div class="main">

        <!-- TOPBAR -->
        <div class="topbar">

            <div class="welcome">

                <h1>
                    Bonjour {{ Auth::user()->name }} 
                </h1>

                <p>
                    Bienvenue sur le tableau de bord administrateur.
                </p>

            </div>

            <a href="{{ route('deconnexion.post') }}" class="logout-btn">
                <i class="bi bi-box-arrow-right"></i>
                Déconnexion
            </a>

        </div>

        <!-- CARDS -->
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

        <!-- TABLE -->
        <div class="table-container">

            <div class="table-title">

                <h2>
                    📚 Séances programmées
                </h2>

            </div>

            <div class="table-responsive">

                <table class="table align-middle text-white">

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

                                <td>
                                    {{ $seance->matiere }}
                                </td>

                                <td>
                                    {{ \Carbon\Carbon::parse($seance->date)->format('d/m/Y') }}
                                </td>

                                <td>
                                    {{ \Carbon\Carbon::parse($seance->heure_debut)->format('H:i') }}
                                </td>

                                <td>
                                    {{ \Carbon\Carbon::parse($seance->heure_fin)->format('H:i') }}
                                </td>

                                <td>
                                    {{ $seance->user->name ?? 'Aucun formateur' }}
                                </td>

                                <td>
                                    {{ $seance->classe->name ?? 'Aucune classe' }}
                                </td>

                                <td>

                                    @if($seance->valide)

                                        <span class="badge-success">
                                            Validée
                                        </span>

                                    @else

                                        <span class="badge-danger">
                                            Non validée
                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="7" class="text-center">
                                    Aucune séance disponible.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    

    <script src="accueil.js"></script>

</body>

</html>

