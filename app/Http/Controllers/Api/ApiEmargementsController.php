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
        $validated = $request->validate([
         
        'signature' => ['required', 'string'],
        'seances_id' => ['required', 'integer'],
        'user_id' => ['nullable', 'integer'],
        
        ]);
        $signature = Emargements::create([

        'signature' => $validated['signature'],
        'date' => now(),
        'user_id' => $validated['user_id'] ?? Auth::id(),
        'seances_id' => $validated['seances_id'],

        ]);

        return response()->json([
            'status' => 'Signature enregistrée avec succès.',
            'signature_id' => $signature->id,
        ], 201);
        //return response()->json
     
    }


}
