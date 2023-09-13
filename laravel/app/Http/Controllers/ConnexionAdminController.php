<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class ConnexionAdminController extends Controller
{
    public function login()
    {
        return view('auth.admin.connexion.login');
    }

    public function authentifier(Request $request)
    {
        if (auth()->guard('admin')->check()) {
            // Si l'utilisateur est déjà authentifié en tant qu'administrateur, redirigez-le vers la page d'accueil de l'administration.
            return redirect()->route('admin.index')->with('success', 'You are already logged in.');
        }

        // Valider
        $valides = $request->validate([
            "email" => "required|email",
            "password" => "required"
        ], [
            "email.required" => "Le courriel est obligatoire",
            "email.email" => "Le courriel doit avoir un format valide",
            "password.required" => "Le mot de passe est requis"
        ]);


        if (auth()->guard('admin')->attempt($valides)) {

            // Vérifiez le rôle de l'utilisateur directement à partir de la session

            if (auth()->guard('admin')->user()->role === 'admin') {

                session(["droits" => [
                    "droits" => auth()->guard('admin')->user()->droits,

                ]]);
                return redirect()->route('admin.index')->with('success', 'You are logged in successfully.');
            }
        } else {
            return back()
            ->withErrors([

                "email" => "Les informations fournies ne sont pas valides"

            ]) ->onlyInput('email');
        }
    }





    public function deconnecter(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('accueil')
            ->with('success', "Vous êtes déconnectés!");
    }
}
