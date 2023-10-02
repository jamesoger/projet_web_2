<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Forfait;
use App\Models\Programmation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{

    /**
     * Affichage de la vue utilisateur
     *
     * @return View
     */
    public function index()
    {


        if (auth()->user()->forfaits->isEmpty()) {
            return redirect()->route('billetterie.index')
                ->with('success', 'Vous êtes connecté(e)!');
        }
            $programmations = Programmation::all();


            $artistes = [];
            $spectacles = [];


            foreach ($programmations as $programmation) {
                $artistes[] = $programmation->artistes;
                $spectacles[] = $programmation->spectacles;
            }

            if (auth()->user()->forfaits->isEmpty()) {
                return redirect()->route('billetterie.index')
                    ->with('success', 'Vous êtes connecté(e)!');
            }

            return view('user.index', [
                'forfaits' => auth()->user()->forfaits,
                'programmations' => $programmations,
                'artistes' => $artistes,
                'spectacles' => $spectacles
            ]);
        }

    /**
     * Formulaire de modification d'un utilisateur
     *
     * @param int $id
     * @return View
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('user.edit', [
            'user' => $user
        ]);
    }

    /**
     * Traitement de la modification d'un utilisateur
     *
     * @param Request $request
     * @return Redirect/Response
     */
    public function update(Request $request)
    {
        $valides = $request->validate([
            "id" => "required",
            "prenom" => "required|min:4|max:70",
            "nom" => "required|min:4|max:70",
            "email" => "required"
        ], [
            "id.required" => "L'id de la note est obligatoire",
            "prenom.required" => "Le champ prenom est requis",
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
            ->with('success', "Cet utilisateur a été modifié avec succès!");
    }


    /**
     * Suppression d'un utilisateur
     *
     * @param Request $request
     * @return Redirect/Response
     */
    public function destroy(Request $request)
    {
        User::destroy($request->id);

        return redirect()->route('admin.index')
            ->with('success', "Cet utilisateur a été supprimé!");
    }
}


