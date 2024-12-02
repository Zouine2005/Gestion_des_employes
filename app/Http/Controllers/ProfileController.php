<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        $users= User::all();
        return view('profile.index',compact('users'));
    }
    public function edit($id)
{
    $user = User::findOrFail($id); // Trouver l'utilisateur ou renvoyer une erreur 404
    return view('profile.edit', compact('user'));
}

public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id, // Vérifie l'unicité en excluant l'utilisateur actuel
        'password' => 'nullable|min:8|confirmed', // Le champ mot de passe est optionnel
    ]);

    try {
        $user = User::findOrFail($id);
        $user->update($validatedData);

        return redirect()->route('profile.index')->with('success', 'Profil mis à jour avec succès.');
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['message' => 'Erreur lors de la mise à jour : ' . $e->getMessage()]);
    }
}

}
