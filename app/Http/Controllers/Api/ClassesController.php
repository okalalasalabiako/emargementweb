<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use Illuminate\Http\Request;


class ClassesController extends Controller
{
   public function index()
{
    $classes = Classes::withCount(['seances', 'apprenants'])
        ->orderBy('name')
        ->get();

    return view('users.classes', compact('classes'));
}
    public function create()
    {
        // Récupérer toutes les classes avec leurs séances associées
        $classes = Classes::with('seances', 'apprenants')->get();

return view('classes.create', compact('classes'));

    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'id' => 'nullable|exists:classes,id',
            'classe_id' => 'nullable|exists:classes,id',
            'seances' => 'nullable|array',
            'user_id' => 'nullable|exists:users,id',

        ]);

        $classe = Classes::create($validated);

        return response()->json($classe, 201);
    }

    public function show($id)
    {
        $classe = Classes::with(['seances', 'apprenants'])->findOrFail($id);

        return response()->json($classe);
    }

    public function update(Request $request, $id)
    {
        $classe = Classes::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $classe->update($validated);

        return response()->json($classe);
    }

    public function destroy($id)
    {
        $classe = Classes::findOrFail($id);
        $classe->delete();

        return response()->json(null, 204);
    }
}
