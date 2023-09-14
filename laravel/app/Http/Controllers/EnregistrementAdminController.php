<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EnregistrementAdminController extends Controller
{
    public function create()
    {
        return view('auth.admin.create');
    }

    public function store(Request $request)
    {
        // Valider
        $valides = $request->validate([
            "prenom" => "required",
            "nom" => "required",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:8",
            "confirmation_password" => "required|same:password"
        ], [
            "prenom.required" => "Le prénom est requis",
            "nom.required" => "Le nom est requis",
            "email.required" => "Le courriel est requis",
            "email.email" => "Le courriel doit avoir un format valide",
            "email.unique" => "Ce courriel ne peut pas être utilisé",
            "password.required" => "Le mot de passe est requis",
            "password.min" => "Le mot de passe doit avoir une longueur de :min caractères",
            "confirmation_password.required" => "La confirmation du mot de passe est requise",
            "confirmation_password.same" => "Le mot de passe n'a pu être confirmé"
        ]);

        // Sauvegarder
        $admin = new Admin();
        $admin->prenom = $valides["prenom"];
        $admin->nom = $valides["nom"];
        $admin->email = $valides["email"];
        $admin->droits = 0;
        $admin->password = Hash::make($valides["password"]);

        $admin->save();

        // Connecter l'admin tout de suite
        Auth::login($admin);

        // Rediriger
        return redirect()
            ->route('admin.index')
            ->with('succes', 'Votre compte admin a été créé');
    }

    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('auth.admin.edit', [
            "admin" => $admin,
        ]);
    }

    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $request->validate([
            'prenom' => 'required',
            'nom' => 'required',
        ]);

        $admin->prenom = $request->input('prenom');
        $admin->nom = $request->input('nom');

        $admin->save();

        return redirect()->route('admin.index')->with('success', 'Les informations de l\'administrateur ont été mises à jour avec succès.');
    }
}
