<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

public function connexion(Request $request)
{
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (!Auth::attempt($credentials)) {
        return redirect()
            ->route('connexion')
            ->with('error', 'Email ou mot de passe incorrect.');
    }

    $request->session()->regenerate();

    // 🔥 ICI on adapte la redirection selon le rôle
    $user = Auth::user();

    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('accueil');
}

public function deconnexion(Request $request)
{
Auth::logout();

$request->session()->invalidate();
$request->session()->regenerateToken();

return redirect()
->route('connexion')
->with('success', 'Déconnexion réussie.');
}

public function me(Request $request)
{
return response()->json([
'user' => $request->user(),
]);
}
    //
}
