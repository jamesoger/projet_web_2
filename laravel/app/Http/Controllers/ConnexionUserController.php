<?php

namespace App\Http\Controllers;

use App\Models\Forfait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConnexionUserController extends Controller
{
    /**
     * Connexion de l'utilisateur
     *
     * @param int $forfaitId
     * @return View
     */
    public function create($forfaitId = null)
{
    if (auth()->check()) {
        $selectedForfait = session('selected_forfait');

        if ($selectedForfait) {
            session(['selected_forfait' => $selectedForfait]);
        }
    }
    if ($forfaitId) {
        $forfait = Forfait::find($forfaitId);

        session(['selected_forfait' => [
            'nom' => $forfait->nom,
            'prix' => $forfait->prix,
            'image' => $forfait->image,
            'id' => $forfait->id,
        ]]);
    } else {
        session()->forget('selected_forfait');
    }

    return view('auth.user.connexion.create');
}

    /**
     * Authentification de l'utilisateur
     *
     * @param Request $request
     * @return Redirect/Response
     */
    public function authentifier(Request $request)

    {
         $valides = $request->validate([
             "email" => "required|email",
              "password" => "required"

        ], [
             "email.required" => "Le courriel est obligatoire",
            "email.email" => "Le courriel doit avoir un format valide",
             "password.required" => "Le mot de passe est requis"

        ]);

        if (Auth::guard('web')->attempt($valides)) {

            if (session("selected_forfait")) {
                return redirect()
                      ->intended(route('user.panier'))
                     ->with('success', 'Vous êtes connecté!');

            } else {

                return redirect()->route('user.index')
                    ->with('success', 'Vous êtes connecté!');
            }
        }
                 return back()
                       ->withErrors([

                "email" => "Les informations fournies ne sont pas valides"

            ])

            ->onlyInput('email');
    }
    /**
     * Deconnexion de l'utilisateur
     *
     * @param Request $request
     * @return Redirect/Response
     */
    public function deconnecter(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('accueil')
            ->with('success', "Vous êtes déconnecté(e)!");
    }
}
