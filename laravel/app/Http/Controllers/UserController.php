<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Forfait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function buy($forfaitId = null)
    {
        if (auth()->check()) {
            // Si l'utilisateur est déjà connecté, récupérez le forfait sélectionné (s'il existe)
            $selectedForfait = session('selected_forfait');

            // Si un forfait est sélectionné, stockez-le à nouveau dans la session de l'utilisateur actuel
            if ($selectedForfait) {
                session(['selected_forfait' => $selectedForfait]);
            }
        }

        if ($forfaitId) {
            $forfait = Forfait::find($forfaitId);

            session(['selected_forfait' => [
                'nom' => $forfait->nom,
                'prix' => $forfait->prix,
                'id' => $forfait->id,
            ]]);
        }
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



public function destroy($id)
{
    // Récupérez l'ID de l'utilisateur actuellement authentifié
    $userId = auth()->id();

    if ($userId) {
        // Supprimez l'entrée de la table user_forfait en fonction de l'ID
        DB::table('user_forfait')->where('id', $id)->delete();

        return redirect()->route('user.index')->with('success', "L'entrée de la table user_forfait a été supprimée!");
    }

    // Redirigez en cas d'échec ou de non-authentification
    return redirect()->route('user.index')->with('error', "La suppression de l'entrée de la table user_forfait a échoué!");
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
