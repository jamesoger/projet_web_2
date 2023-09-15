<?php

namespace App\Http\Controllers;

use App\Models\Forfait;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ForfaitController extends Controller
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
//     public function store(Request $request)
// {
//     // Récupérez l'ID du forfait à partir de la requête
//     $forfaitId = $request->input('forfait_id');
//     $dateArrivee = $request->input('date_arrivee');

//     // Calculer la date de départ en fonction du forfait
//     $dateDepart = $dateArrivee;

//     if ($forfaitId == 1) {
//         // Ajoutez 1 jour pour le forfait une journée
//         $dateDepart = date('Y-m-d', strtotime($dateDepart . ' +1 day'));
//     } elseif ($forfaitId == 2) {
//         // Ajoutez 2 jours pour le forfait deux jours
//         $dateDepart = date('Y-m-d', strtotime($dateDepart . ' +2 days'));
//     }

//     if (!$dateArrivee || !$dateDepart) {
//         return redirect()->back()->with('error', 'Veuillez spécifier des dates valides.');
//     }

//     // Récupérez l'ID de l'utilisateur actuellement authentifié
//     $userId = auth()->id();

//     if ($userId && $forfaitId) {
//         // Attachez le forfait à l'utilisateur
//         $user = User::find($userId);
//         $user->forfaits()->attach($forfaitId, [
//             'date_arrivee' => $dateArrivee,
//             'date_depart' => $dateDepart,
//         ]);
//     }

//     return redirect()->route('user.index');
// }


    public function destroy($id)
    {
        $userId = auth()->id();

        if ($userId) {
            DB::table('user_forfait')->where('id', $id)->delete();
            return redirect()->route('user.index')->with('success', "L'entrée de la table user_forfait a été supprimée!");
        }

        return redirect()->route('user.index')->with('error', "La suppression de l'entrée de la table user_forfait a échoué!");
    }

    public function destroyForfaitAdmin($id){

        DB::table('user_forfait')->where('id', $id)->delete();

        return redirect()->route('admin.index')
            ->with('succes', 'Le forfait a bien été supprimé');
    }
}
