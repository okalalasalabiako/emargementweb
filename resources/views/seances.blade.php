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
                <th>Validation</th>
            </tr>
        </thead>

        <tbody>

            @foreach($seances as $seance)

                <tr>

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