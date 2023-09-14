<?php

namespace App\Http\Controllers;

use App\Models\Actualite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActualiteController extends Controller
{
    public function index()
    {
        return view('actualites.index', [
            'actualites' => Actualite::all()
        ]);
    }

    public function create()
    {
        return view('actualites.create');
    }

    public function store(Request $request)
    {
        $valides = $request->validate([
            'titre' => 'required|min:6|max:40',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'details' => 'required|min:30|max:250',
        ], [
            "titre.min"=> "Le titre doit avoir un minimum de :min caractères",
            "titre.max"=>"Le titre doit avoir un maximum de :max caracteres",
            "image"=> " L'image n,'est pas du bon format, veuillez réessayez",
            "details.min"=>"Le texte doit avoir un minimum de :min caractères",
            "details.max"=>"Le titre doit avoir un maximum de :max caracteres",
        ]);

       $actualite = new Actualite;
       $actualite->titre = $valides["titre"];
       $actualite->details = $valides["details"];


       if($request->hasFile('image')){
        // Déplacer
        Storage::putFile("public/uploads", $request->image);
        // Sauvegarder le "bon" chemin qui sera inséré dans la BDD et utilisé par le navigateur
        $actualite->image = "/storage/uploads/" . $request->image->hashName();
    }
       $actualite->save();

        return redirect()->route('actualites.index')->with('success', 'Actualité créée avec succès.');
    }


    public function edit($id)
    {
        $actualites = Actualite::findOrFail($id);
        return view('actualites.edit', [
            "actualites"=> $actualites
        ]);
    }

    public function update(Request $request, $id)
    {
        $actualite = Actualite::findOrFail($id);

        $request->validate([
            'titre' => 'required',
            'image' => 'required',
            'details' => 'required',
        ]);



        return redirect()->route('actualites.index')->with('success', 'Actualité mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $actualite = Actualite::findOrFail($id);
        $actualite->delete();

        return redirect()->route('actualites.index')->with('success', 'Actualité supprimée avec succès.');
    }
}
