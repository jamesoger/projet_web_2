<?php

namespace App\Http\Controllers;

use App\Models\Forfait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConnexionUserController extends Controller
{
    public function create($forfaitId = null)
{
    if (auth()->check()) {
        // Si l'utilisateur est déjà connecté, récupérez le forfait sélectionné (s'il existe)
        $selectedForfait = session('selected_forfait');

        // Si un forfait est sélectionné, stockez-le à nouveau dans la session de l'utilisateur actuel
        if ($selectedForfait) {
            session(['selected_forfait' => $selectedForfait]);
        }
    } // Fermez la première condition `if` ici

    if ($forfaitId) {
        $forfait = Forfait::find($forfaitId);

        session(['selected_forfait' => [
            'nom' => $forfait->nom,
            'prix' => $forfait->prix,
            'image' => $forfait->image,
            'id' => $forfait->id,
        ]]);
    } else {
        // Si aucun forfait n'est sélectionné, retirez-le de la session (au cas où il y en aurait un précédemment)
        session()->forget('selected_forfait');
    }

    return view('auth.user.connexion.create');
}

    public function authentifier(Request $request)

    {
        // Valider
         $valides = $request->validate([
             "email" => "required|email",
              "password" => "required"

        ], [
             "email.required" => "Le courriel est obligatoire",
            "email.email" => "Le courriel doit avoir un format valide",
             "password.required" => "Le mot de passe est requis"

        ]);

        if (Auth::guard('web')->attempt($valides)) {

            // Si l'utilisateur est en train de réserver un forfait

            if (session("selected_forfait")) {
                return redirect()
                      ->intended(route('user.panier'))
                     ->with('succes', 'Vous êtes connectés!');

                // Si l'utilisateur se connecte normalement

            } else {

                return redirect()->route('user.index');
            }
        }

                 return back()
                       ->withErrors([

                "email" => "Les informations fournies ne sont pas valides"

            ])

            ->onlyInput('email');
    }
    public function deconnecter(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('accueil')
            ->with('succes', "Vous êtes déconnectés!");
    }
}
