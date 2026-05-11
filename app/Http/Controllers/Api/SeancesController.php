<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Seances;
use Illuminate\Http\Request;

class SeancesController extends Controller
{
    public function index()
    {
        $seances = Seances::with('user')
            ->whereDate('date', '>=', now())
            ->orderBy('date')
            ->orderBy('heure_debut')
            ->get();

            return response()->json($seances);
    }

    public function store(Request $request)
    {
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
        $seance = Seances::with('user')->findOrFail($id);

        return response()->json($seance);
    }

    public function update(Request $request, $id)
    {
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
        $seance = Seances::findOrFail($id);
        $seance->delete();

        return response()->json([
            'message' => 'Séance supprimée'
        ]);
    }
}
