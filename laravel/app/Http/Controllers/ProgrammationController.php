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

    public function create()
    {
        return view('programmation.create', [
            "programmations" => Programmation::all(),
            "artistes" => Artiste::all(),
            "spectacles" => Spectacle::all(),
        ]);
    }
    public function store(Request $request)
    {
        $valides = $request->validate([
            "date" => "required",
            "nom_scene" => "required",
            "image" => "nullable",
            "heure_show" => "required",
        ]);

        $programmation = new Programmation;
        $programmation->date = $valides["date"];
        $programmation->nom_scene = $valides["nom_scene"];
        $programmation->image = $valides["image"];
        $programmation->heure_show = $valides["heure_show"];
        $programmation->save();

        return redirect()
            ->route('admin.index')
            ->with('succes', 'La programmation a été créer');
    }
}
