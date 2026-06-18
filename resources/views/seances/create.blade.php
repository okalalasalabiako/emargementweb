<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une séance</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="p-5">

    <div class="container">

        <h1 class="mb-4">➕ Ajouter une séance</h1>

        <form action="{{ route('seances.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Matière</label>
                <input type="text" name="matiere" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Date</label>
                <input type="date" name="date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Heure début</label>
                <input type="time" name="heure_debut" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Heure fin</label>
                <input type="time" name="heure_fin" class="form-control" required>
            </div>

           <div class="mb-3">
    <label class="form-label">Formateur</label>

    <select name="user_id" class="form-control" required>

        <option value="">
            Sélectionner un formateur
        </option>

        @foreach($formateurs as $formateur)

            <option value="{{ $formateur->id }}">
                {{ $formateur->name }}
                {{ $formateur->prenom ?? '' }}
            </option>

        @endforeach

    </select>
</div>

<div class="mb-3">
    <label class="form-label">Classe</label>

    <select name="classe_id" class="form-control" required>

        <option value="">
            Sélectionner une classe
        </option>

        @foreach($classes as $classe)

            <option value="{{ $classe->id }}">
                {{ $classe->name }}
            </option>

        @endforeach

    </select>
</div>

            <button type="submit" class="btn btn-success">
                Enregistrer
            </button>

            <a href="{{ route('seances') }}" class="btn btn-secondary">
                Retour
            </a>

        </form>

    </div>

</body>
</html>