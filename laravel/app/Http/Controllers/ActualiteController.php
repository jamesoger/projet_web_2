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
            'date' =>'required',
            'titre' => 'required|min:6|max:150',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'details' => 'required|min:30|max:750',
        ], [
            "date.required" => "lda date est requise",
            "titre.min"=> "Le titre doit avoir un minimum de :min caractères",
            "titre.max"=>"Le titre doit avoir un maximum de :max caracteres",
            "image"=> " L'image n,'est pas du bon format, veuillez réessayez",
            "details.min"=>"Le texte doit avoir un minimum de :min caractères",
            "details.max"=>"Le texte doit avoir un maximum de :max caracteres",
        ]);

       $actualite = new Actualite;
       $actualite->date = $valides["date"];
       $actualite->titre = $valides["titre"];
       $actualite->details = $valides["details"];


       if($request->hasFile('image')){
        // Déplacer
        Storage::putFile("public/uploads", $request->image);
        // Sauvegarder le "bon" chemin qui sera inséré dans la BDD et utilisé par le navigateur
        $actualite->image = "/storage/uploads/" . $request->image->hashName();
    }else{
        $actualite->image ="/images/default.jpg";
    }
       $actualite->save();

        return redirect()->route('admin.index')->with('success', 'Actualité créée avec succès.');
    }


    public function edit($id)
    {
        $actualites = Actualite::findOrFail($id);
        return view('actualites.edit', [
            "actualites"=> $actualites
        ]);
    }

    public function update(Request $request ){
        $valides = $request->validate([
            'id' => 'required',
            'date' =>'required',
            'titre' => 'required|min:6|max:150',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'details' => 'required|min:30|max:750',
        ], [
            'id.required' =>'id est requis',
            "date.required" => "lda date est requise",
            "titre.min"=> "Le titre doit avoir un minimum de :min caractères",
            "titre.max"=>"Le titre doit avoir un maximum de :max caracteres",
            "image"=> " L'image n,'est pas du bon format, veuillez réessayez",
            "details.min"=>"Le texte doit avoir un minimum de :min caractères",
            "details.max"=>"Le texte doit avoir un maximum de :max caracteres",
        ]);


        // Récupération de la note à modifier, suivi de la modification et sauvegarde
        $actualite = Actualite::findOrFail($valides["id"]);
        $actualite->date = $valides["date"];
        $actualite->titre = $valides["titre"];
        $actualite->details = $valides["details"];

        if($request->hasFile('image')){
            // Déplacer
            Storage::putFile("public/uploads", $request->image);
            // Sauvegarder le "bon" chemin qui sera inséré dans la BDD et utilisé par le navigateur
            $actualite->image = "/storage/uploads/" . $request->image->hashName();
        }

        $actualite->save();

        // Rediriger
        return redirect()
                ->route('admin.index')
                ->with('succes', "Cette actualité a été modifiée avec succès!");
    }

    public function destroy(Request $request)
    {
        Actualite::destroy($request->id);

        return redirect()->route('admin.index')->with('success', 'Actualité supprimée avec succès.');
    }
}
