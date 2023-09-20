<?php

namespace App\Http\Controllers;

use App\Models\Actualite;
use App\Models\Admin;
use App\Models\Artiste;
use App\Models\Programmation;
use App\Models\Spectacle;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {

        $users = User::all();

        $users->each(function ($user) {
            $user->forfaits = $user->forfaits->sortBy('pivot.date_arrivee');
        });
        $admins = Admin::all();
        $programmations = Programmation::all();
        $artistes = Artiste::all();
        $spectacles = Spectacle::all();
        $actualites = Actualite::all();


        return view('admin.index', [
            "users" => $users,
            "admins" => $admins,
            "programmations" => $programmations,
            "artistes" => $artistes,
            "spectacles" => $spectacles,
            "actualites" => $actualites,
        ]);
    }
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('auth.admin.edit', [
            "admin" => $admin,
        ]);
    }

    public function update(Request $request)
    {

        $valides = $request->validate([
            "id" => "required",
            "prenom" => "required|min:4|max:70",
            "nom" => "required|min:4|max:70",
            "image"=>"nullable|mimes:png,jpg,jpeg,gif",
            "email" => "required",
            "droits"=>"required",
        ], [
            "id.required" => "L'id de la note est obligatoire",
            "prenom.required"=> "Le champ prenom est requis",
            "prenom.max" => "Le prenom doit avoir un maximum de :max caractères",
            "prenom.min" => "Le prenom doit avoir un minimum de :min caractères",
            "nom.required" => "La champ nom est requis",
            "image.mimes" => "L'image n'est pas du bon format",
            "droits.required"=>"le statut est requis",
            "nom.max" => "Le nom doit avoir un maximum de :max caractères",
            "nom.min" => "Le nom doit avoir un minimum de :min caractères",

        ]);

         $admin = Admin::findOrFail($valides["id"]);
         $admin->prenom = $valides["prenom"];
         $admin->nom = $valides["nom"];
         $admin->email = $valides["email"];
         $admin->droits = $valides["droits"];

         if($request->hasFile('image') && $request->file('image')->isValid()){
            Storage::putFile("public/uploads", $request->image);
            $admin->image = "/storage/uploads/" . $request->image->hashName();
        }
         $admin->save();



        return redirect()->route('admin.index')->with('success', 'Les informations de l\'administrateur ont été mises à jour avec succès.');
    }


    public function destroy(Request $request)
    {
        Admin::destroy($request->id);

        return redirect()->route('admin.index')
            ->with('succes', " Cet admin a bien été supprimé");
    }
}
