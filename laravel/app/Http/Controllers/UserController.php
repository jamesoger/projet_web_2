<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Forfait;
use App\Models\Programmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{


    public function index()
{
    $programmations = Programmation::all();
    $artistes = [];
    $spectacles = [];

    // Parcourir chaque programmation pour récupérer les artistes et les spectacles
    foreach ($programmations as $programmation) {
        $artistes[] = $programmation->artistes;
        $spectacles[] = $programmation->spectacles;
    }

    return view('user.index', [
        'forfaits' => auth()->user()->forfaits,
        'programmations' => $programmations,
        'artistes' => $artistes,
        'spectacles' => $spectacles
    ]);
}

    public function edit($id)
    {
        $user = User::find($id);

        return view('user.edit', [
            'user' => $user
        ]);
    }


    public function update(Request $request ){
        $valides = $request->validate([
            "id" => "required",
            "prenom" => "required|min:4|max:70",
            "nom" => "required|min:4|max:70",
            "email" => "required"
        ], [
            "id.required" => "L'id de la note est obligatoire",
            "prenom.required"=> "Le champ prenom est requis",
            "prenom.max" => "Le prenom doit avoir un maximum de :max caractères",
            "prenom.min" => "Le prenom doit avoir un minimum de :min caractères",
            "nom.required" => "La champ nom est requis",
            "nom.max" => "Le nom doit avoir un maximum de :max caractères",
            "nom.min" => "Le nom doit avoir un minimum de :min caractères",

        ]);

        // Récupération de la note à modifier, suivi de la modification et sauvegarde
        $user = User::findOrFail($valides["id"]);
        $user->prenom = $valides["prenom"];
        $user->nom = $valides["nom"];
        $user->email = $valides["email"];
        $user->save();

        // Rediriger
        return redirect()
                ->route('admin.index')
                ->with('succes', "Cet utilisateur a été modifiée avec succès!");
    }



    public function destroy(Request $request)
    {
        User::destroy($request->id);

        return redirect()->route('admin.index')
            ->with('succes', "Cet utilisateur a été supprimé!");
    }
}
