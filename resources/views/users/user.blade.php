<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
    
    <!-- Bootstrap (optionnel mais joli) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.8/css/dataTables.dataTables.min.css">
</head>
<body class="p-4">

    <h1>👥 Liste des Users</h1>
    <a href="{{ route('users.create') }}" class="btn btn-success mb-3">➕ Ajouter</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

<div class="mb-3">
    <label for="roleFilter" class="form-label">Filtrer par rôle :</label>
    <select id="roleFilter" class="form-select" style="width: 200px;">
        <option value="">Tous</option>
        <option value="admin">Admin</option>
        <option value="formateur">Formateur</option>
        <option value="apprenant">Apprenant</option>
    </select>
</div>

    <table id="myTable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Username</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->prenom }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    <a href="{{ route('users.update', $user->id) }}" class="btn btn-warning btn-sm">✏️ Modifier</a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ?')">❌ Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- jQuery (requis par DataTables) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/2.3.8/js/dataTables.min.js"></script>

    <!-- Initialisation -->
    <script>
       <script>
    let table = new DataTable('#myTable');

    document.getElementById('roleFilter').addEventListener('change', function () {
        let value = this.value;

        if (value === "") {
            table.column(5).search('').draw(); // colonne "Rôle"
        } else {
            table.column(5).search(value).draw();
        }
    });
</script>
    </script>

</body>
</html>