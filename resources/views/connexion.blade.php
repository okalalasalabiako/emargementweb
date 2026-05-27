<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="connection.css">
</head>

<body>

<header>
    <h1>Groupe gefor</h1>
    <button class="top-btn">S'inscrire</button>
</header>

<div class="container">
    <div class="login-bubble">

        <div class="profile-circle"></div>

        <h2>Connexion</h2>

        {{-- Message erreur Laravel --}}
        @if (session('error'))
            <div class="alert">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('connexion.post') }}">
            @csrf     

            <div class="input-group">
                <label for="email">Email *</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    required 
                    autofocus
                >
            </div>

            <div class="input-group">
                <label for="password">Mot de passe *</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    required
                >
            </div>

            <p class="forgot">Mot de passe oublié ?</p>

            <button type="submit" class="login-btn">
                Connexion
            </button>


        </form>

    </div>
</div>

 <button class="login-btn">
        <a href="{{ route('mobile') }}">Télécharger l'Application mobile</a>
            </button>

</body>
</html>