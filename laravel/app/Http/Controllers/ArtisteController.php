<?php

namespace App\Http\Controllers;

use App\Models\Artiste;
use Illuminate\Http\Request;

class ArtisteController extends Controller
{
    public function edit($id)
    {
        $artiste = Artiste::find($id);

        return view('programmation.artiste.edit', [
            'artiste' => $artiste
        ]);
    }
}
