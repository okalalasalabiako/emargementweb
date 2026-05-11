<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gefor</title>

    <link rel="stylesheet" href="accueil.css">

</head>

<body>

    <div class="container">

        <div class="card">

            <header class="header">

                <img src="logo.png" class="logo">

                <button class="login-btn">
                    S'identifier / S'inscrire
                </button>

            </header>


            <div class="hero">

                <h1 class="title">Gefor</h1>

            </div>

<p>
<a href="{{ route('deconnexion.post') }}"
class="btn btn-outline-danger">
Se déconnecter
</a>
</p>

            <ul>
               @foreach ($seances as $seance)
                  
                     <li> Seance le  {{\Carbon\Carbon::parse($seance->date)->format('d/m/Y') }} -  {{\Carbon\Carbon::parse($seance->heure_debut)->format('H:i') }} à {{ \Carbon\Carbon::parse($seance->heure_fin)->format('H:i') }} : {{ $seance->user->name }} </li>
                 @endforeach
                   
        
            </ul>

            `<p>Bonjour, {{ Auth::user()->name }}</p>



            {{ $seances }}


            <div class="info">

                <div class="box">
                    <h3>Groupe gefor</h3>
                    <p>Gestion du site d'émargement</p>
                </div>

                <div class="box">
                    <h3>Espace Administrateur - Système d'Emargement</h3>
                    <p>Veuillez vous connecter pour accéder à la gestion des classes et des séances d'émargement.</p>
                </div>

                <div class="box">
                    <h3>Connexion à l’interface d’administration</h3>
                    <p>Cette plateforme permet la gestion des classes, des élèves et des séances d'émargement.</p>
                </div>

            </div>

        </div>

    </div>

    

    <script src="accueil.js"></script>

</body>

</html>