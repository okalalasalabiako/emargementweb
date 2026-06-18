 <!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Séances</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.8/css/dataTables.dataTables.min.css">
</head>

<body class="p-4">

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <a href="{{ route('accueil') }}" class="btn btn-dark">
            🏠 Accueil
        </a>
        <a href="{{ route('users') }}" class="btn btn-outline-dark">
            👥 Utilisateurs
        </a>
        <a href="{{ route('classes') }}" class="btn btn-outline-dark">
            🎓 Classes
        </a>
    </div>

    <a href="{{ route('seances.create') }}" class="btn btn-success">
        ➕ Ajouter une séance
    </a>
</div>

    <h1 class="mb-4">📚 Liste des Séances</h1>

    <!-- Message succès -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tableau -->
    <table id="myTable" class="table table-bordered table-striped">

        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Matière</th>
                <th>Date</th>
                <th>Heure début</th>
                <th>Heure fin</th>
                <th>Formateur</th>
                <th>Classe</th>
                <th>Actions</th>
                <th>Validation</th>
            </tr>
        </thead>

        <tbody>

            @foreach($seances as $seance)

                <tr>

<td>

    <a href="{{ route('seances.edit', $seance->id) }}"
       class="btn btn-warning btn-sm">
        ✏️ Modifier
    </a>

    <form action="{{ route('seances.destroy', $seance->id) }}"
          method="POST"
          style="display:inline">

        @csrf
        @method('DELETE')

        <button class="btn btn-danger btn-sm"
                onclick="return confirm('Supprimer cette séance ?')">

            ❌ Supprimer

        </button>

    </form>

</td>

                    <!-- ID -->
                    <td>{{ $seance->id }}</td>

                    <!-- Matière -->
                    <td>{{ $seance->matiere }}</td>

                    <!-- Date -->
                    <td>{{ $seance->date }}</td>

                    <!-- Heure début -->
                    <td>{{ $seance->heure_debut }}</td>

                    <!-- Heure fin -->
                    <td>{{ $seance->heure_fin }}</td>

                    <!-- Formateur -->
                    <td>
                        {{ $seance->user->name ?? 'Aucun formateur' }}
                    </td>

                    <!-- Classe -->
                    <td>
                        {{ $seance->classe->name ?? 'Aucune classe' }}
                    </td>

                    <!-- Validation -->
                    <td>

                        @if($seance->valide)

                            <span class="badge bg-success">
                                Validée
                            </span>

                        @else

                            <span class="badge bg-danger">
                                Non validée
                            </span>

                        @endif

                    </td>

                </tr>

            @endforeach

        </tbody>

    </table>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- DataTables -->
    <script src="https://cdn.datatables.net/2.3.8/js/dataTables.min.js"></script>

    <!-- Initialisation -->
    <script>
        new DataTable('#myTable');
    </script>

</body>
</html>