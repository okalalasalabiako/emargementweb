<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Seances;
use App\Models\User;
use App\Models\Classes;
use Illuminate\Http\Request;

class SeancesController extends Controller
{
    public function index()
    {
        $seances = Seances::with(['user', 'classe'])
            ->orderBy('date')
            ->orderBy('heure_debut')
            ->get();

        return view('seances', compact('seances'));
    }

    public function create()
    {
        $formateurs = User::whereIn('role', ['enseignant', 'formateur'])
            ->orderBy('name')
            ->get();

        $classes = Classes::orderBy('name')
            ->get();

        return view('seances.create', compact('formateurs', 'classes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'matiere' => 'required|string|max:255',
            'date' => 'required|date_format:Y-m-d',
            'heure_debut' => 'required|date_format:H:i',
            'heure_fin' => 'required|date_format:H:i|after:heure_debut',
            'user_id' => 'required|exists:users,id',
            'classe_id' => 'required|exists:classes,id',
        ]);

        Seances::create($validated);

        return redirect()
            ->route('seances')
            ->with('success', 'Séance créée avec succès.');
    }

    public function show($id)
    {
        $seance = Seances::with(['user', 'classe'])
            ->findOrFail($id);

        return view('seances.show', compact('seance'));
    }

    public function edit($id)
    {
        $seance = Seances::with(['user', 'classe'])
            ->findOrFail($id);

        $formateurs = User::whereIn('role', ['enseignant', 'formateur'])
            ->orderBy('name')
            ->get();

        $classes = Classes::orderBy('name')
            ->get();

        return view('seances.edit', compact('seance', 'formateurs', 'classes'));
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
            'classe_id' => 'required|exists:classes,id',
            'valide' => 'nullable|boolean',
        ]);

        $seance->update($validated);

        return redirect()
            ->route('seances')
            ->with('success', 'Séance modifiée avec succès.');
    }

    public function destroy($id)
    {
        $seance = Seances::findOrFail($id);
        $seance->delete();

        return redirect()
            ->route('seances')
            ->with('success', 'Séance supprimée avec succès.');
    }
}