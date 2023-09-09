<?php

namespace App\Http\Controllers;

use App\Models\Forfait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConnexionUserController extends Controller
{
    public function create(Request $request) {
        $forfaitId = $request->input('forfait_id');
        $forfait = Forfait::find($forfaitId);

        if (!$forfait) {
            return redirect()->route('accueil')->with('error', 'Le forfait sélectionné n\'existe pas.');
        }

        // Stockez les informations du forfait dans la session de l'utilisateur
        $request->session()->put('selected_forfait', [
            'nom' => $forfait->nom,
            'prix' => $forfait->prix,
        ]);



        return view('auth.user.connexion.create'); // Redirigez l'utilisateur vers la page de connexion
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

        if(Auth::guard('web')->attempt($valides)){
            $request->session()->regenerate();

            return redirect()
                    ->intended(route('user.index'))
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
