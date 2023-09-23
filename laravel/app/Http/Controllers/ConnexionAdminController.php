<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class ConnexionAdminController extends Controller
{
    /**
     * Formulaire de connexion admin
     *
     * @return View
     */
    public function login()
    {
        if(Auth::guard('admin')->check()){
            return redirect()->route('admin.index');
        }
        return view('auth.admin.connexion.login');
    }

    /**
     * Authentification de l'admin
     *
     * @param Request $request
     * @return Redirect/Response
     */
    public function authentifier(Request $request)
    {
        if (auth()->guard('admin')->check()) {

            return redirect()->route('admin.index')->with('success', 'Vous êtes connectés!');
        }

        $valides = $request->validate([
            "email" => "required|email",
            "password" => "required"
        ], [
            "email.required" => "Le courriel est obligatoire",
            "email.email" => "Le courriel doit avoir un format valide",
            "password.required" => "Le mot de passe est requis"
        ]);


        if (auth()->guard('admin')->attempt($valides)) {


            if (auth()->guard('admin')->user()->role === 'admin') {

                session(["droits" => [
                    "droits" => auth()->guard('admin')->user()->droits,

                ]]);
                return redirect()->route('admin.index')->with('success', 'Vous êtes connecté!');
            }
        } else {
            return back()
                ->withErrors([

                    "email" => "Les informations fournies ne sont pas valides"

                ])->onlyInput('email');
        }
    }

    /**
     * deconnexion de l'admin
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
            ->with('success', "Vous êtes déconnectés!");
    }
}
