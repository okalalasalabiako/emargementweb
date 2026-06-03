<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Emargements;
use Illuminate\Support\Facades\Auth;

class ApiEmargementsController extends Controller

{
    public function store(Request $request)
    {

        /*
        |--------------------------------------------------------------------------
        | Validation des données
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([

            'signature' => ['required', 'string'],

            'seance_id' => ['required', 'integer'],

            'user_id' => ['nullable', 'integer'],

        ]);

        /*
        |--------------------------------------------------------------------------
        | Création de l'émargement
        |--------------------------------------------------------------------------
        */

        $emargement = Emargements::create([

            'signature' => $validated['signature'],

            'date' => now(),

            'user_id' => $validated['user_id'] ?? Auth::id(),

            'seance_id' => $validated['seance_id'],

        ]);

        /*
        |--------------------------------------------------------------------------
        | Réponse JSON
        |--------------------------------------------------------------------------
        */

        return response()->json([

            'status' => 'Signature enregistrée avec succès.',

            'emargement_id' => $emargement->id,

        ], 201);

    }


}



