<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Connexion administrateur</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            background: #1f2a44;
        }

        header {
            height: 70px;
            background: white;
            display: flex;
            align-items: center;
            padding: 0 60px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #1f2a44;
        }

        .logo span {
            color: #e46b2c;
        }

        .container {
            min-height: calc(100vh - 70px);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            width: 420px;
            background: white;
            padding: 40px;
            border-radius: 18px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.25);
            text-align: center;
        }

        .profile-circle {
            width: 75px;
            height: 75px;
            border-radius: 50%;
            margin: 0 auto 20px;
            border: 3px solid #e46b2c;
            background: #f1f1f1;
        }

        h2 {
            margin-bottom: 25px;
            color: #1f2a44;
        }

        .input-group {
            text-align: left;
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
            color: #333;
        }

        input {
            width: 100%;
            padding: 13px;
            border: 1px solid #ccc;
            border-radius: 10px;
            outline: none;
        }

        input:focus {
            border-color: #e46b2c;
        }

        .forgot {
            text-align: right;
            font-size: 13px;
            margin-bottom: 20px;
            color: #e46b2c;
        }

        .login-btn {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 12px;
            background: #e46b2c;
            color: white;
            font-weight: bold;
            cursor: pointer;
            margin-bottom: 15px;
        }

        .download-btn {
            display: block;
            width: 100%;
            padding: 13px;
            border-radius: 12px;
            border: 2px solid #1f2a44;
            text-decoration: none;
            color: #1f2a44;
            font-weight: bold;
        }

        .alert {
            background: #ffd6d6;
            color: #b00020;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

<header>
    <div class="logo">
        Groupe <span>GEFOR</span>
    </div>
</header>

<div class="container">

    <div class="login-card">

        <div class="profile-circle"></div>

        <h2>Connexion administrateur</h2>

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

        <a href="{{ route('mobile') }}" class="download-btn">
            Télécharger l'application mobile
        </a>

    </div>

</div>

</body>
</html>