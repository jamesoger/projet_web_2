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
        $dateArrivee = $request->input('date_arrivee');
        $dateDepart = $request->input('date_depart');

        if (!$dateArrivee || !$dateDepart) {
            return redirect()->back()->with('error', 'Veuillez spécifier des dates valides.');
        }
        // Récupérez l'ID de l'utilisateur actuellement authentifié
        $userId = auth()->id();

        if ($userId && $forfaitId) {
            // Attachez le forfait à l'utilisateur
            $user = User::find($userId);
            $user->forfaits()->attach($forfaitId, [
                'date_arrivee' => $dateArrivee,
                'date_depart' => $dateDepart,
            ]);
        }

        return redirect()->route('user.index');
    }


    public function index()
    {
        return view('user.index', [
            'forfaits' => auth()->user()->forfaits
        ]);
    }

    public function destroy($forfait_id)
    {
        // Récupérez l'ID de l'utilisateur actuellement authentifié
        $userId = auth()->id();

        if ($userId) {
            $user = User::find($userId);

            if ($user) {
                // Détachez le forfait de l'utilisateur dans la table pivot
             $user->forfaits()->detach($forfait_id);


                return redirect()->route('user.index')->with('success', "Le forfait a été détaché de l'utilisateur!");
            }
        }

        // Redirigez en cas d'échec ou de non-authentification
        return redirect()->route('user.index')->with('error', "La suppression du forfait a échoué!");
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
