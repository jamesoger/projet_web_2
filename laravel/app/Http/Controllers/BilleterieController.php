<?php

namespace App\Http\Controllers;

use App\Models\Forfait;
use Illuminate\Http\Request;

class BilleterieController extends Controller
{
    public function index() {
        $forfaits = Forfait::all();



        return view('billeterie.index', [
            "forfaits"=> $forfaits,
            'selectedForfait' => $selectedForfait ?? null,
        ]);
    }
}
