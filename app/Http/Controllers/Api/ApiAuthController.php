<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\ValidationException;
     

class ApiAuthController extends Controller
{
    public function login(Request $request)
{
$credentials = $request->validate([
'email' => ['required', 'email'],
'password' => ['required', 'string'],
]);

//si les credentials sont invalides, on retourne une erreur de validation
if (! Auth::attempt($credentials)) {
throw ValidationException::withMessages([
'email' => ['The provided credentials are incorrect.'],
]);
}

/** @var User $user */
$user = Auth::user();

// Créer un token d'accès pour l'utilisateur
$token = $user->createToken('external-app-token')->plainTextToken;

//je retourne les informations de l'utilisateur et le token d'accès en json
return response()->json([
'user' => [
'id' => $user->id,
'name' => $user->name,
'email' => $user->email,
],
'token' => $token,
'token_type' => 'Bearer',
]);
}

public function logout(Request $request)
{
// Revoke current token
$request->user()->currentAccessToken()->delete();

return response()->json([
'message' => 'Logged out successfully.',
]);
}

//J'envoie les informations de l'utilisateur connecté
public function me(Request $request)
{
return response()->json([
'id' => $request->user()->id,
'name' => $request->user()->name,
'email' => $request->user()->email,
]);
}
    //
}
