 <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des séances</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.8/css/dataTables.dataTables.min.css">

    <style>
        body {
            min-height: 100vh;
            background: #1f2a44;
            font-family: Arial, sans-serif;
        }

        header {
            height: 70px;
            background: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 60px;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #1f2a44;
        }

        .logo span {
            color: #e46b2c;
        }

        nav a {
            margin-left: 25px;
            text-decoration: none;
            color: #1f2a44;
            font-weight: bold;
        }

        nav a:hover {
            color: #e46b2c;
        }

        .page-container {
            padding: 50px;
        }

        .card-custom {
            background: white;
            border-radius: 18px;
            padding: 35px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.25);
        }

        h1 {
            color: #1f2a44;
            font-weight: bold;
            margin-bottom: 25px;
        }

        .btn-add {
            background: #e46b2c;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 12px 18px;
            text-decoration: none;
            font-weight: bold;
        }

        .btn-add:hover {
            background: #c95720;
            color: white;
        }

        thead th {
            background: #1f2a44 !important;
            color: white !important;
        }

        .btn-edit {
            background: #ffc107;
            border: none;
            border-radius: 8px;
            padding: 7px 12px;
            color: black;
            text-decoration: none;
        }

        .btn-delete {
            background: #dc3545;
            border: none;
            border-radius: 8px;
            padding: 7px 12px;
            color: white;
        }

        .badge-success-custom {
            background: #198754;
            color: white;
            padding: 7px 12px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 13px;
        }

        .badge-danger-custom {
            background: #dc3545;
            color: white;
            padding: 7px 12px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 13px;
        }
    </style>
</head>

<body>

<header>
    <div class="logo">
        Groupe <span>GEFOR</span>
    </div>

    <nav>
        <a href="{{ route('accueil') }}">Accueil</a>
        <a href="{{ route('users') }}">Utilisateurs</a>
        <a href="{{ route('classes') }}">Classes</a>
        <a href="{{ route('seances') }}">Séances</a>
        <a href="{{ route('deconnexion.post') }}">Déconnexion</a>
    </nav>
</header>

<div class="page-container">

    <div class="card-custom">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>📚 Liste des séances</h1>

            <a href="{{ route('seances.create') }}" class="btn-add">
                ➕ Ajouter une séance
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <table id="myTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Matière</th>
                    <th>Date</th>
                    <th>Heure début</th>
                    <th>Heure fin</th>
                    <th>Formateur</th>
                    <th>Classe</th>
                    <th>Validation</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($seances as $seance)
                    <tr>
                        <td>{{ $seance->id }}</td>

                        <td>{{ $seance->matiere }}</td>

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
                                <span class="badge-success-custom">Validée</span>
                            @else
                                <span class="badge-danger-custom">Non validée</span>
                            @endif
                        </td>

                        <td>
                            <a href="{{ route('seances.edit', $seance->id) }}" class="btn-edit">
                                ✏️ Modifier
                            </a>

                            <form action="{{ route('seances.destroy', $seance->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button class="btn-delete" onclick="return confirm('Supprimer cette séance ?')">
                                    ❌ Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/2.3.8/js/dataTables.min.js"></script>

<script>
    new DataTable('#myTable', {
        order: [[2, 'asc']]
    });
</script>

</body>
</html>