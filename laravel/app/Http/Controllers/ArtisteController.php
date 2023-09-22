<?php

namespace App\Http\Controllers;

use App\Models\Artiste;
use App\Models\Programmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ArtisteController extends Controller
{
    /**
     * Formulaire de modification d'un artiste
     *
     * @param int $id
     * @return View
     */
    public function edit($id)

    {
        $artiste = Artiste::find($id);
        $programmations = Programmation::all();
        $programmationsArtiste = $artiste->programmations;

        return view('programmation.artiste.edit', [
            'artiste' => $artiste,
            'programmations' => $programmations,
            'programmationsArtiste' => $programmationsArtiste,
        ]);
    }

    /**
     * Tratiement de la modification d'un artiste
     *
     * @param Request $request
     * @return Redirect/Response
     */
    public function update(Request $request)
    {
        $valides = $request->validate([
            "id" => "required",
            "nom_scene" => "required|min:4|max:60",
            "heure_show" => "required",
            "image" => "nullable|image|mimes:png,jpg,jpeg, gif",
            "date" => "required",

        ], [
            "id.required" => "L'id de la note est obligatoire",
            "nom_scene.max" => "Le nom doit avoir un maximum de :max caractères",
            "nom_scene.min" => "Le nom doit avoir un minimum de :min caractères",
            "heure_show.required" => "L'heure du show est requise",
            "image.mimes" => "L,image n'est pas du bon format",
            "date.required" => " la date de représentation est requise"
        ]);

        $artiste = Artiste::findOrFail($valides["id"]);
        $artiste->nom_scene = $valides["nom_scene"];
        $artiste->heure_show = $valides["heure_show"];


        if($request->hasFile('image') && $request->file('image')->isValid()){
            Storage::putFile("public/uploads", $request->image);
            $artiste->image = "/storage/uploads/" . $request->image->hashName();
        }else{
            $artiste->image = $request->input('image_artiste');
        }

        $artiste->programmations()->sync([$request->date]);

        $artiste->save();

        // Rediriger
        return redirect()
            ->route('admin.index')
            ->with('success', "cet artiste a été modifié avec succès!");
    }

    /**
     * Suppression d'un artiste
     *
     * @param Request $request
     * @return Redirect/Response
     */
    public function destroy(Request $request)
    {
        Artiste::destroy($request->id);

        return redirect()->route('admin.index')->with('success', 'Artiste supprimé avec succès.');
    }
}
