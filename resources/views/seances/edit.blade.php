<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier une séance</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="p-5">

<div class="container">

    <h1 class="mb-4">
        ✏️ Modifier une séance
    </h1>

    <form action="{{ route('seances.update', $seance->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Matière</label>

            <input
                type="text"
                name="matiere"
                class="form-control"
                value="{{ $seance->matiere }}"
                required
            >
        </div>

        <div class="mb-3">
            <label class="form-label">Date</label>

            <input
                type="date"
                name="date"
                class="form-control"
                value="{{ $seance->date }}"
                required
            >
        </div>

        <div class="mb-3">
            <label class="form-label">Heure début</label>

            <input
                type="time"
                name="heure_debut"
                class="form-control"
                value="{{ $seance->heure_debut }}"
                required
            >
        </div>

        <div class="mb-3">
            <label class="form-label">Heure fin</label>

            <input
                type="time"
                name="heure_fin"
                class="form-control"
                value="{{ $seance->heure_fin }}"
                required
            >
        </div>

        <div class="mb-3">
            <label class="form-label">ID Formateur</label>

            <input
                type="number"
                name="user_id"
                class="form-control"
                value="{{ $seance->user_id }}"
                required
            >
        </div>

        <div class="mb-3">
            <label class="form-label">ID Classe</label>

            <input
                type="number"
                name="classe_id"
                class="form-control"
                value="{{ $seance->classe_id }}"
                required
            >
        </div>

        <div class="mb-3">

            <label class="form-label">
                Validation
            </label>

            <select name="valide" class="form-control">

                <option value="1"
                    {{ $seance->valide ? 'selected' : '' }}>
                    Validée
                </option>

                <option value="0"
                    {{ !$seance->valide ? 'selected' : '' }}>
                    Non validée
                </option>

            </select>

        </div>

        <button type="submit" class="btn btn-warning">
            💾 Enregistrer les modifications
        </button>

        <a href="{{ route('seances') }}" class="btn btn-secondary">
            Retour
        </a>

    </form>

</div>

</body>
</html>