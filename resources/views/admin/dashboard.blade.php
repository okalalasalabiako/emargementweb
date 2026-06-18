@extends('layouts.admin')

@section('content')

<div class="dashboard-modern">

    <section class="hero-card">

        <div class="hero-overlay">

            <div class="hero-top">
                <span class="pill">Admin</span>

                <a href="{{ route('deconnexion.post') }}" class="logout-pill">
                    Déconnexion
                </a>
            </div>

            <div class="hero-content">
                <h1>
                    Bienvenue {{ Auth::user()->name }}
                </h1>

                <p>
                    Gérez les utilisateurs, les classes, les séances et le suivi des émargements depuis votre espace administrateur.
                </p>
            </div>

        </div>

    </section>

    <section class="stats-bar">

        <a href="{{ route('users') }}" class="stat-item">
            <strong>👥</strong>
            <span>Utilisateurs</span>
        </a>

        <a href="{{ route('classes') }}" class="stat-item">
            <strong>🎓</strong>
            <span>Classes</span>
        </a>

        <a href="{{ route('seances') }}" class="stat-item">
            <strong>📅</strong>
            <span>Séances</span>
        </a>

        <div class="stat-text">
            <p>
                Accédez rapidement aux modules principaux du back-office GEFOR.
            </p>
        </div>

    </section>

    <section class="services-section">

        <div>
            <h2>Gestion administrative</h2>

            <p>
                Centralisez la gestion des utilisateurs, des classes, des séances et des émargements.
            </p>
        </div>

        <a href="{{ route('users') }}" class="explore-btn">
            Explorer
        </a>

    </section>

</div>

<style>

.dashboard-modern{
    padding:30px;
    background:#f5f6f8;
    min-height:100vh;
}

.hero-card{
    min-height:420px;
    border-radius:30px;
    background:
        linear-gradient(90deg, rgba(31,42,68,.85), rgba(31,42,68,.35)),
        url("{{ asset('background/img.png') }}");
    background-size:cover;
    background-position:center;
    overflow:hidden;
    position:relative;
}

.hero-overlay{
    height:100%;
    min-height:420px;
    padding:30px;
    display:flex;
    flex-direction:column;
    justify-content:space-between;
}

.hero-top{
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.pill,
.logout-pill{
    background:white;
    color:#1f2a44;
    padding:10px 18px;
    border-radius:999px;
    text-decoration:none;
    font-weight:700;
}

.logout-pill{
    background:#e46b2c;
    color:white;
}

.hero-content{
    max-width:620px;
    color:white;
    margin-bottom:40px;
}

.hero-content h1{
    font-size:52px;
    font-weight:800;
    margin-bottom:15px;
}

.hero-content p{
    font-size:18px;
    line-height:1.6;
}

.stats-bar{
    margin:-45px auto 35px;
    width:90%;
    background:#1f2a44;
    color:white;
    border-radius:18px;
    padding:25px;
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:20px;
    position:relative;
    z-index:2;
    box-shadow:0 20px 40px rgba(0,0,0,.25);
}

.stat-item{
    color:white;
    text-decoration:none;
    border-right:1px solid rgba(255,255,255,.25);
}

.stat-item strong{
    display:block;
    font-size:32px;
    margin-bottom:5px;
}

.stat-item span{
    color:#e5e7eb;
}

.stat-text p{
    color:#e5e7eb;
    margin:0;
    font-size:14px;
}

.services-section{
    display:flex;
    justify-content:space-between;
    align-items:center;
    background:white;
    padding:35px;
    border-radius:25px;
}

.services-section h2{
    color:#1f2a44;
    font-weight:800;
}

.services-section p{
    color:#666;
}

.explore-btn{
    background:#1f2a44;
    color:white;
    padding:14px 22px;
    border-radius:999px;
    text-decoration:none;
    font-weight:700;
}

.explore-btn:hover{
    background:#e46b2c;
    color:white;
}

</style>

@endsection