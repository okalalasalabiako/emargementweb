<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des classes</title>

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

        .filter-box {
            margin: 25px 0;
            width: 240px;
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
    </style>
</head>

<body>

<header>
    <div class="logo">Groupe <span>GEFOR</span></div>

    <nav>
        <a href="{{ route('accueil') }}">Accueil</a>
        <a href="{{ route('classes') }}">Classes</a>
        <a href="{{ route('deconnexion.post') }}">Déconnexion</a>
    </nav>
</header>

<div class="page-container">

    <div class="card-custom">

        <h1>👥 Liste des classes</h1>

        <a href="{{ route('classes.create') }}" class="btn-add">
            ➕ Ajouter
        </a>

        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <div class="filter-box">
            <label for="classeFilter" class="form-label">Filtrer par formation :</label>
            <select id="classeFilter" class="form-select">
                <option value="">Toutes</option>
                <option value="BTS">BTS</option>
                <option value="Bachelor">Bachelor</option>
                <option value="Master">Master</option>
            </select>
        </div>

        <table id="myTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Classe</th>
                    <th>Nombre de séances</th>
<th>Nombre d’apprenants</th>
                    <th>Validé</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($classes as $classe)
                    <tr>
                        <td>{{ $classe->id }}</td>
                        <td>{{ $classe->nom }}</td>
                        <td>{{ $classe->seances_count }}</td>
<td>{{ $classe->apprenants_count }}</td>
                        <td>{{ $classe->valide ? 'Oui' : 'Non' }}</td>
                        <td>
                            <a href="{{ route('classes.update', $classe->id) }}" class="btn-edit">
                                ✏️ Modifier
                            </a>

                            <form action="{{ route('classes.destroy', $classe->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button class="btn-delete" onclick="return confirm('Supprimer ?')">
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
    let table = new DataTable('#myTable', {
        order: [[1, 'asc']]
    });

    document.getElementById('classeFilter').addEventListener('change', function () {
        table.column(1).search(this.value).draw();
    });
</script>

</body>
</html>