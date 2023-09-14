<?php

namespace App\Http\Controllers;

use App\Models\Artiste;
use App\Models\Programmation;
use App\Models\Spectacle;
use Illuminate\Http\Request;

class ProgrammationController extends Controller
{
    public function index()
    {
        return view('programmation.index', [
            "programmation" => Programmation::all()
        ]);
    }
    public function edit($id)
    {
        $programmation = Programmation::find($id);

        // Récupérez les artistes et les spectacles liés à cette programmation
        $artistes = $programmation->artistes;
        $spectacles = $programmation->spectacles;

        return view('programmation.edit', [
            'programmation' => $programmation,
            'artistes' => $artistes,
            'spectacles' => $spectacles,
        ]);
    }
    public function update(Request $request, $id)
{
    // Récupérez la programmation existante
    $programmation = Programmation::findOrFail($id);

    // Définissez des règles de validation pour les artistes et les spectacles
    $validationRules = [
        'nom_scene' =>'nullable',
        'heure_show' => 'nullable',
        'image' => 'nullable|image',
        'nom_spectacle' => 'nullable',
        'heure_spectacle' => 'nullable',
        'image_spectacle' => 'nullable|image',
    ];

    // Validez les données principales (scène, heure de représentation)
    $valides = $request->validate($validationRules, [

        'image.image' => 'Le fichier doit être une image valide.',
        'image_spectacle.image' => 'Le fichier doit être une image valide.',
    ]);


    // Vérifiez s'il y a des données d'artiste
    if ($request->filled('nom_scene') && $request->filled('heure_show')) {
        $artiste = new Artiste;
        $artiste->nom_scene = $valides['nom_scene'];
        $artiste->heure_show = $valides['heure_show'];

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imagePath = $request->file('image')->store('images', 'public');
            $artiste->image = $imagePath;
        }

        $artiste->save();

        // Attachez l'artiste à la programmation existante
        $programmation->artistes()->attach($artiste->id);

    }

    // Vérifiez s'il y a des données de spectacle
    if ($request->filled('nom_spectacle') && $request->filled('heure_spectacle')) {

        $spectacle = new Spectacle;
        $spectacle->nom = $valides['nom_spectacle'];
        $spectacle->heure = $valides['heure_spectacle'];

        if ($request->hasFile('image_spectacle') && $request->file('image_spectacle')->isValid()) {
            $imagePathSpectacle = $request->file('image_spectacle')->store('images', 'public');
            $spectacle->image = $imagePathSpectacle;
        }


      $spectacle->save();

      $programmation->spectacles()->attach($spectacle->id);
    }

    if (!$programmation->artistes()->exists() && !$programmation->spectacles()->exists()) {
        return redirect()
            ->back()
            ->with('error', 'Le formulaire est vide. Veuillez remplir au moins une partie (artistes ou spectacles).');
    }

    return redirect()
        ->route('admin.index')
        ->with('success', 'Les artistes et spectacles ont été ajoutés à la programmation');
}

}
