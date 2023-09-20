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

            $selectedForfait = session('selected_forfait');

            if ($selectedForfait) {
                session(['selected_forfait' => $selectedForfait]);
            }
        }
        if ($forfaitId) {
            $forfait = Forfait::find($forfaitId);

            session(['selected_forfait' => [
                'nom' => $forfait->nom,
                'prix' => $forfait->prix,
                'image' => $forfait->image,
                'id' => $forfait->id,
            ]]);
        }
        $forfaits = Forfait::all();

        return view('user.panier', [
            'forfaits' => $forfaits
        ]);
    }
    public function store(Request $request)
    {
        $forfaitId = $request->input('forfait_id');
        $dateArrivee = $request->input('dates');
        $dateMaxEvenement = '2024-08-11';
        $quantite = $request->input('quantite');

        if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $dateArrivee)) {
            return redirect()->back()->with('error', 'Le format de date est incorrect.');
        }

        $nombreDeJoursAajouter = 0;

        if ($forfaitId == 1) {
            $nombreDeJoursAajouter = 0;
        } elseif ($forfaitId == 2) {
            $nombreDeJoursAajouter = 1;
        } elseif($forfaitId == 3){
            $nombreDeJoursAajouter = 2;
        }

        $dateDepart = date('Y-m-d', strtotime($dateArrivee . " +$nombreDeJoursAajouter days"));

        if (strtotime($dateDepart) > strtotime($dateMaxEvenement)) {
            // ajuster ce code pour mettre des erreurs.
            $dateDepart = $dateMaxEvenement;
        }
        $userId = auth()->id();


        if ($userId && $forfaitId && $quantite > 0) {
            $user = User::find($userId);


            for ($i = 0; $i < $quantite; $i++) {
                $user->forfaits()->attach($forfaitId, [
                    'date_arrivee' => $dateArrivee,
                    'date_depart' => $dateDepart,
                ]);
            }

        return redirect()->route('user.index');
    }

    }

    public function update(Request $request, $forfaitId)
{

    $forfait = Forfait::find($forfaitId);

    if ($forfait) {
        session(['selected_forfait' => [
            'nom' => $forfait->nom,
            'prix' => $forfait->prix,
            'image' => $forfait->image,
            'id' => $forfait->id,
        ]]);

        return redirect()->route('user.panier')->with('success', 'Forfait sélectionné avec succès.');
    }

    return redirect()->route('user.panier')->with('error', 'Forfait introuvable.');
}



    // public function store(Request $request)
    // {
    //     // Récupérez l'ID du forfait à partir de la requête
    //     $forfaitId = $request->input('forfait_id');
    //     $dateArrivee = $request->input('date_arrivee');
    //     $dateDepart = $request->input('date_depart');

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


    // public function destroy($id)
    // {
    //     $userId = auth()->id();

    //     if ($userId) {
    //         DB::table('user_forfait')->where('id', $id)->delete();
    //         return redirect()->route('user.index')->with('success', "L'entrée de la table user_forfait a été supprimée!");
    //     }

    //     return redirect()->route('user.index')->with('error', "La suppression de l'entrée de la table user_forfait a échoué!");
    // }



    // a verifier
    public function destroy($id)
    {
        $userId = auth()->id();

        if ($userId) {
            $userForfait = DB::table('user_forfait')->find($id);

            if ($userForfait) {
                $dateArrivee = $userForfait->date_arrivee;
                $dateMaxEvenement = '2024-08-11';

                if (strtotime($dateArrivee) > strtotime($dateMaxEvenement)) {
                    return redirect()->route('user.index')->with('error', "La date est dépassée. La suppression n'est pas autorisée.");
                }

                DB::table('user_forfait')->where('id', $id)->delete();
                return redirect()->route('user.index')->with('success', "Le forfait a été supprimée!");
            }
        }

        return redirect()->route('user.index')->with('error', "La suppression du forfait a échouée!");
    }




    public function destroyForfaitAdmin($id)
    {

        DB::table('user_forfait')->where('id', $id)->delete();

        return redirect()->route('admin.index')
            ->with('succes', 'Le forfait a bien été supprimé');
    }
}
