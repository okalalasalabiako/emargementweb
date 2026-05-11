<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // READ ALL
    public function index()
    {   $users = User::all();
        return view('users.user', compact('users'));
    }

    // CREATE
    public function create()
    {
        return view('users.create');
    }
    
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'prenom' => 'required|string',
            'username' => 'required|string|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|string',
            'classe_id' => 'nullable|exists:classes,id',
        ]);

        $user = User::create($data);

        return response()->json($user, 201);
    }

    // READ ONE
    public function show($id)
    {
        $user = User::with(['classe', 'seances', 'emargements'])->findOrFail($id);
        return response()->json($user);
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data = $request->validate([
            'name' => 'sometimes|string',
            'prenom' => 'sometimes|string',
            'username' => 'sometimes|string|unique:users,username,' . $id,
            'email' => 'sometimes|email|unique:users,email,' . $id,
            'password' => 'sometimes|min:6',
            'role' => 'sometimes|string',
            'classe_id' => 'nullable|exists:classes,id',
        ]);

        $user->update($data);

        return response()->json($user);
    }

    // DELETE
    public function destroy($id)
    {
        User::destroy($id);
        return response()->json(['message' => 'Utilisateur supprimé']);
    }
}