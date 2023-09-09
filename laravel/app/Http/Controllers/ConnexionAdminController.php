<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConnexionAdminController extends Controller
{
    public function create() {
        return view('auth.admin.create');
    }

    public function authentifier(Request $request) {
        // Valider
        $valides = $request->validate([
            "email" => "required|email",
            "password" => "required"
        ], [
            "email.required" => "Le courriel est obligatoire",
            "email.email" => "Le courriel doit avoir un format valide",
            "password.required" => "Le mot de passe est requis"
        ]);

        if(Auth::guard('admin')->attempt($valides)){
            $request->session()->regenerate();

            return redirect()
                    ->intended(route('admin.index'))
                    ->with('succes', 'Vous êtes connectés!');
        }

        return back()
                ->withErrors([
                    "email" => "Les informations fournies ne sont pas valides"
                ])
                ->onlyInput('email');

    }

    public function deconnecter(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
                ->route('accueil')
                ->with('succes', "Vous êtes déconnectés!");

    }
}
