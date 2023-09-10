<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Forfait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function buy()
    {
        // Récupérez la liste de tous les forfaits
        $forfaits = Forfait::all();


        return view('user.panier', [
            'forfaits' => $forfaits
        ]);
    }

    public function store(Request $request)
{
    // Récupérez l'ID du forfait à partir de la requête
    $forfaitId = $request->input('forfait_id');

    // Récupérez l'ID de l'utilisateur actuellement authentifié
    $userId = auth()->id();

    if ($userId && $forfaitId) {
        // Attachez le forfait à l'utilisateur
        $user = User::find($userId);
        $user->forfaits()->attach($forfaitId);
    }

    return redirect()->route('user.index');
}



    public function index()
    {


        return view('user.index', [
            'forfaits' => auth()->user()->forfaits
        ]);
    }

    public function destroy($id) {
        // Récupérez l'ID de l'utilisateur actuellement authentifié
        $userId = auth()->id();

        if ($userId) {
            $user = User::find($userId);

            // Détachez le forfait de l'utilisateur dans la table pivot
            $user->forfaits()->detach($id);

            return redirect()->route('user.index')->with('succes', "Le forfait a été détaché de l'utilisateur!");
        }

        // Redirigez en cas d'échec ou de non-authentification
        return redirect()->route('user.index')->with('erreur', "La suppression du forfait a échoué!");
    }



}

