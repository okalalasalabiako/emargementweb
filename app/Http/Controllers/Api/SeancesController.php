<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Seances;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeancesController extends Controller
{
    public function index()
    {
       /* $seances = Seances::with('user')
            ->whereDate('date', '>=', now())
            ->orderBy('date')
            ->orderBy('heure_debut')
            ->get();
            */

            $user = Auth::user();

        // ADMIN

        $seances = [];
       

        // ENSEIGNANT affiche ses séances à venir en fonction de l'utilisateur connecté
        if($user->role === 'formateur') {

            $seances = Seances::with(['user', 'classe'])
                ->where('user_id', $user->id)
                  ->whereDate('date', '>=', now())
                ->orderBy('date')
                ->orderBy('heure_debut')
                ->get();
        }

        // ETUDIANT affiche les séances de sa classe en fonction de l'utilisateur connecté
        elseif ($user->role === 'apprenant') {       

            $seances = Seances::with(['user', 'classe'])
                ->where('classe_id', $user->classe_id)
                ->whereDate('date', '>=', now())
                ->orderBy('date')
                ->orderBy('heure_debut')
                ->get();
        }

// Retourne la liste des séances au format JSON et les affiche sur l'application mobile
            return response()->json($seances);
    }

    public function store(Request $request)
    {
        // Valide les données entrantes pour créer une nouvelle séance
        $validated = $request->validate([
            'matiere' => 'required|string|max:255',
            'date' => 'required|date_format:Y-m-d',
            'heure_debut' => 'required|date_format:H:i',
            'heure_fin' => 'required|date_format:H:i|after:heure_debut',
            'user_id' => 'required|exists:users,id',
        ]);

        $seance = Seances::create($validated);

        return response()->json($seance, 201);
    }

    public function show($id)
    {
        // Récupère une séance spécifique avec les détails de l'enseignant et de la classe associée
        $seance = Seances::with('user')->findOrFail($id);

        return response()->json($seance);
    }

    public function update(Request $request, $id)
    {
        // Valide les données entrantes pour mettre à jour une séance existante
        $seance = Seances::findOrFail($id);

        $validated = $request->validate([
            'matiere' => 'required|string|max:255',
            'date' => 'required|date_format:Y-m-d',
            'heure_debut' => 'required|date_format:H:i',
            'heure_fin' => 'required|date_format:H:i|after:heure_debut',
            'user_id' => 'required|exists:users,id',
        ]);

        $seance->update($validated);

        return response()->json($seance);
    }

    public function destroy($id)
    {
        // Supprime une séance spécifique et retourne un message de confirmation
        $seance = Seances::findOrFail($id);
        $seance->delete();

        return response()->json([
            'message' => 'Séance supprimée'
        ]);
    }
}
