<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EnregistrementUserController extends Controller
{
        /**
         * Formulaire de creation d'un nouvel utilisateur
         *
         * @return View
         */
    public function create(){
        return view('auth.user.enregistrement.create');
    }

    /**
     * Enregistrement du nouvel utilisateur
     *
     * @param Request $request
     * @return Redirect/Response
     */
    public function store(Request $request) {

        $valides = $request->validate([
            "prenom" => "required",
            "nom" => "required",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:8",
            "confirmation_password" => "required|same:password"
        ],[
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


        $user = new User();
        $user->prenom = $valides["prenom"];
        $user->nom = $valides["nom"];
        $user->email = $valides["email"];
        $user->password = Hash::make($valides["password"]);

        $user->save();

        Auth::login($user);


        return redirect()
                ->route('billetterie.index')
                ->with('success', 'Votre compte a été créé, vous pouvez maintenant réserver un forfait!');

    }
}
