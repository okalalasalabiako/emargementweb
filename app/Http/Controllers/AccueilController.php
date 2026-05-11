<?php

namespace App\Http\Controllers;
use App\Models\Seances;
use Illuminate\Http\Request;

class AccueilController extends Controller
{
    public function getSeances()
    {
        // Récupérer les séances à venir, triées par date et heure de début
        $seances = Seances::with('user')->whereDate('date', '>=', now()->toDateString())->orderBy('date')->orderBy('heure_debut')->get();


        // Passer les séances à la vue "accueil"

        $toto = "toto";
        return view('accueil', ['seances' => $seances, 'toto' => $toto]);
    }
    //
}
