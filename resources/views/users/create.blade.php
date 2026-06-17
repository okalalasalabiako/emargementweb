<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un utilisateur</title>

    <style>
        body {
            min-height: 100vh;
            background: #1f2a44;
            font-family: Arial, sans-serif;
            margin: 0;
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

        .container {
            display: flex;
            justify-content: center;
            padding: 50px;
        }

        .form-card {
            width: 520px;
            background: white;
            padding: 35px;
            border-radius: 18px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.25);
        }

        h1 {
            color: #1f2a44;
            margin-bottom: 25px;
            text-align: center;
        }

        label {
            font-weight: bold;
            margin-bottom: 6px;
            display: block;
        }

        input, select {
            width: 100%;
            padding: 13px;
            margin-bottom: 18px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        .btn-submit {
            width: 100%;
            padding: 14px;
            background: #e46b2c;
            color: white;
            border: none;
            border-radius: 12px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-back {
            display: block;
            margin-top: 15px;
            text-align: center;
            color: #1f2a44;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>

<body>

<header>
    <div class="logo">Groupe <span>GEFOR</span></div>

    <nav>
        <a href="{{ route('accueil') }}">Accueil</a>
        <a href="{{ route('users') }}">Utilisateurs</a>
        <a href="{{ route('deconnexion.post') }}">Déconnexion</a>
    </nav>
</header>

<div class="container">

    <div class="form-card">

        <h1>➕ Ajouter un utilisateur</h1>

        <form method="POST" action="{{ route('users.store') }}">
            @csrf

            <label>Nom</label>
            <input type="text" name="name" required>

            <label>Prénom</label>
            <input type="text" name="prenom" required>

            <label>Username</label>
            <input type="text" name="username" required>

            <label>Email</label>
            <input type="email" name="email" required>

            <label>Mot de passe</label>
            <input type="password" name="password" required>

            <label>Rôle</label>
            <select name="role" required>
                <option value="">Choisir un rôle</option>
                <option value="admin">Admin</option>
                <option value="enseignant">Enseignant</option>
                <option value="formateur">Formateur</option>
                <option value="etudiant">Étudiant</option>
                <option value="apprenant">Apprenant</option>
            </select>

            <label>ID de la classe</label>
            <input type="number" name="classe_id" placeholder="Ex : 1, 2, 3...">

            <button type="submit" class="btn-submit">
                Créer l'utilisateur
            </button>
        </form>

        <a href="{{ route('users') }}" class="btn-back">
            ← Retour à la liste
        </a>

    </div>

</div>

</body>
</html>