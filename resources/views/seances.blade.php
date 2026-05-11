<!DOCTYPE html>
<html>
<head>
    <title>Classes</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.8/css/dataTables.dataTables.min.css">
</head>
<body class="p-4">

<h1>👥 Liste des Classes</h1>

<a href="{{ route('classes.create') }}" class="btn btn-success mb-3">➕ Ajouter</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table id="myTable" class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Classe</th>
            <th>Séances</th>
            <th>Utilisateurs</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach($classes as $classe)
        <tr>
            <td>{{ $classe->id }}</td>
            <td>{{ $classe->nom }}</td>

            <!-- Séances -->
            <td>
                @forelse($classe->seances as $seance)
                    {{ $seance->matiere }} ({{ $seance->date }})<br>
                @empty
                    <span class="text-muted">Aucune</span>
                @endforelse
            </td>

            <!-- Utilisateurs -->
            <td>
                @forelse($classe->apprenants as $user)
                    {{ $user->name }}<br>
                @empty
                    <span class="text-muted">Aucun</span>
                @endforelse
            </td>

            <!-- Actions -->
            <td>
                <a href="{{ route('classes.edit', $classe->id) }}" class="btn btn-warning btn-sm">
                    ✏️ Modifier
                </a>

                <form action="{{ route('classes.destroy', $classe->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ?')">
                        ❌ Supprimer
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/2.3.8/js/dataTables.min.js"></script>

<script>
    new DataTable('#myTable');
</script>

</body>
</html>