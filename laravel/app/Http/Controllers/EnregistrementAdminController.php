<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class EnregistrementAdminController extends Controller
{
        /**
         * Formulaire de création nouvel administrateur
         *
         * @return View
         */
    public function create()
    {
        return view('auth.admin.create');
    }
    /**
     * Enregsitrement du nouvel administrateur
     *
     * @param Request $request
     * @return Redirect/Response
     */
    public function store(Request $request)
    {

        $valides = $request->validate([
            "prenom" => "required",
            "nom" => "required",
            "email" => "required|email|unique:users,email",
            "image"=>"nullable|mimes:png,jpg,jpeg,gif",
            "password" => "required|min:8",
            "confirmation_password" => "required|same:password"
        ], [
            "prenom.required" => "Le prénom est requis",
            "nom.required" => "Le nom est requis",
            "email.required" => "Le courriel est requis",
            "email.email" => "Le courriel doit avoir un format valide",
            "email.unique" => "Ce courriel ne peut pas être utilisé",
            "image.mimes" => "L'image n'est pas du bon format",
            "password.required" => "Le mot de passe est requis",
            "password.min" => "Le mot de passe doit avoir une longueur de :min caractères",
            "confirmation_password.required" => "La confirmation requise",
            "confirmation_password.same" => "Le mot de passe n'a pu être confirmé"
        ]);


        $admin = new Admin();
        $admin->prenom = $valides["prenom"];
        $admin->nom = $valides["nom"];
        $admin->email = $valides["email"];
        $admin->droits = $request->input('droits');
        $admin->password = Hash::make($valides["password"]);

        if($request->hasFile('image') && $request->file('image')->isValid()){
            Storage::putFile("public/uploads", $request->image);
            $admin->image = "/storage/uploads/" . $request->image->hashName();
        }else{
            $admin->image ="/images/default.png";
        }

        $admin->save();

        Auth::login($admin);

        return redirect()
            ->route('admin.index')
            ->with('success', 'Votre compte admin a été créé');
    }



}
