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
    public function update(Request $request,$id)
{
    // Validez les données du formulaire
    $valides = $request->validate([
        'nom_scene' => 'required',
        'heure_show' => 'required',
        'image' => 'nullable|image',
        'nom_spectacle' => 'required',
        'heure_spectacle' => 'required',
        'image_spectacle' => 'nullable|image',

    ],[
        'nom_scene.required' => 'Le champ Nom de la scène est obligatoire.',
        'heure_show.required' => 'Le champ Heure de la représentation est obligatoire.',
        'image.image' => 'Le fichier doit être une image valide.',
        'nom_spectacle.required' => 'Le champ Nom du spectacle est obligatoire.',
        'heure_spectacle.required' => 'Le champ Heure de la représentation du spectacle est obligatoire.',
        'image_spectacle.image' => 'Le fichier de l\'image du spectacle doit être une image valide.',
    ]);

    // Récupérez la programmation existante
    $programmation = Programmation::findOrFail($id);

    // Créez et sauvegardez un nouvel artiste
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

    // Créez et sauvegardez un nouveau spectacle
    $spectacle = new Spectacle;
    $spectacle->nom = $valides['nom_spectacle'];
    $spectacle->heure = $valides['heure_spectacle'];

    if ($request->hasFile('image_spectacle') && $request->file('image_spectacle')->isValid()) {
        $imagePathSpectacle = $request->file('image_spectacle')->store('images', 'public');
        $spectacle->image = $imagePathSpectacle;
    }

    $spectacle->save();

    // Attachez le spectacle à la programmation existante
    $programmation->spectacles()->attach($spectacle->id);

    return redirect()
        ->route('admin.index')
        ->with('success', 'Les artistes et spectacles ont été ajoutés à la programmation');


}







}
