<?php

namespace App\Http\Controllers;

use App\Models\Programmation;
use App\Models\Spectacle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SpectacleController extends Controller
{
    public function edit($id)

    {
        $spectacle = Spectacle::find($id);
        $programmations = Programmation::all();
        $programmationsSpectacle = $spectacle->programmations;

        return view('programmation.spectacle.edit', [
            'spectacle' => $spectacle,
            'programmations' => $programmations,
            'programmationsSpectacle' => $programmationsSpectacle,
        ]);
    }


    public function update(Request $request)
    {
        $valides = $request->validate([
            "id" => "required",
            "nom" => "required|min:4|max:60",
            "heure" => "required",
            "image" => "required|image|mimes:png,jpg,jpeg, gif",
            "date" => "required",

        ], [
            "id.required" => "L'id de la note est obligatoire",
            "nom.max" => "Le nom doit avoir un maximum de :max caractères",
            "nom.min" => "Le nom doit avoir un minimum de :min caractères",
            "heure.required" => "L'heure du show est requise",
            "image.required" => "L,image est obligatoire",
            "image.mimes" => "L,image n'est pas du bon format",
            "date.required" => " la date de représentation est requise"
        ]);

        $spectacle= Spectacle::findOrFail($valides["id"]);
        $spectacle->nom = $valides["nom"];
        $spectacle->heure = $valides["heure"];

        if($request->hasFile('image') && $request->file('image')->isValid()){
            Storage::putFile("public/uploads", $request->image);
            $spectacle->image = "/storage/uploads/" . $request->image->hashName();
        } else{
            $spectacle->image = $request->input('image_spectacle');
        }

        $spectacle->programmations()->sync([$request->date]);

        $spectacle->save();

        // Rediriger
        return redirect()
            ->route('admin.index')
            ->with('succes', "ce spectacle été modifié avec succès!");
    }

    public function destroy(Request $request)
    {
        Spectacle::destroy($request->id);

        return redirect()->route('admin.index')->with('success', 'Spectacle supprimé avec succès.');
    }



}
