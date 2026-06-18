<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Ajouter une classe</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial,sans-serif;
}

body{
    min-height:100vh;
    background:linear-gradient(135deg,#1f2a44,#2c3e66);
    padding:40px;
}

/* HEADER */

.header{
    background:white;
    border-radius:20px;
    padding:20px 40px;

    display:flex;
    justify-content:space-between;
    align-items:center;

    margin-bottom:30px;

    box-shadow:0 10px 30px rgba(0,0,0,0.15);
}

.logo{
    font-size:28px;
    font-weight:bold;
    color:#1f2a44;
}

.logo span{
    color:#e46b2c;
}

.menu{
    display:flex;
    gap:25px;
}

.menu a{
    text-decoration:none;
    color:#1f2a44;
    font-weight:bold;
}

/* CARD */

.card{
    max-width:700px;
    margin:auto;

    background:white;
    border-radius:25px;

    padding:40px;

    box-shadow:0 20px 50px rgba(0,0,0,0.25);
}

.card h1{
    color:#1f2a44;
    margin-bottom:30px;
}

.form-group{
    margin-bottom:25px;
}

label{
    display:block;
    margin-bottom:10px;
    font-weight:bold;
    color:#1f2a44;
}

input{
    width:100%;
    padding:14px;

    border:1px solid #ddd;
    border-radius:12px;

    font-size:16px;
}

.actions{
    display:flex;
    gap:15px;
    margin-top:30px;
}

.btn-save{
    background:#e46b2c;
    color:white;

    border:none;

    padding:14px 25px;
    border-radius:12px;

    cursor:pointer;
    font-size:16px;
}

.btn-save:hover{
    opacity:0.9;
}

.btn-back{
    background:#1f2a44;
    color:white;

    text-decoration:none;

    padding:14px 25px;
    border-radius:12px;
}

</style>

</head>
<body>

<div class="header">

    <div class="logo">
        Groupe <span>GEFOR</span>
    </div>

    <div class="menu">
        <a href="{{ route('admin.dashboard') }}">Accueil</a>
        <a href="{{ route('classes') }}">Classes</a>
        <a href="{{ route('users') }}">Utilisateurs</a>
        <a href="{{ route('deconnexion.post') }}">Déconnexion</a>
    </div>

</div>

<div class="card">

    <h1>➕ Ajouter une classe</h1>

    <form action="{{ route('classes.store') }}" method="POST">
        @csrf

        <div class="form-group">

            <label>Nom de la classe</label>

            <input
                type="text"
                name="name"
                placeholder="Ex : BTS SIO 1"
                required
            >

        </div>

        <div class="actions">

            <button type="submit" class="btn-save">
                Enregistrer
            </button>

            <a href="{{ route('classes') }}" class="btn-back">
                Retour
            </a>

        </div>

    </form>

</div>

</body>
</html>