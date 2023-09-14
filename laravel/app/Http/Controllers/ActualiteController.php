<?php

namespace App\Http\Controllers;

use App\Models\Actualite;
use Illuminate\Http\Request;

class ActualiteController extends Controller
{
    public function index()
    {
        return view('actualites.index');
    }

    public function create()
    {
        return view('actualites.create');
    }
    // A réparé rien ne push dans la BDD
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'details' => 'required',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('actualites', $imageName, 'public');
        }

        Actualite::create([
            'titre' => $request->input('titre'),
            'image' => $imagePath,
            'details' => $request->input('details'),
        ]);

        return redirect()->route('actualites.index')->with('success', 'Actualité créée avec succès.');
    }


    public function edit($id)
    {
        $actualite = Actualite::findOrFail($id);
        return view('actualites.edit', compact('actualite'));
    }

    public function update(Request $request, $id)
    {
        $actualite = Actualite::findOrFail($id);

        $request->validate([
            'titre' => 'required',
            'image' => 'required',
            'details' => 'required',
        ]);

        $actualite->update([
            'titre' => $request->input('titre'),
            'image' => $request->input('image'),
            'details' => $request->input('details'),
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
