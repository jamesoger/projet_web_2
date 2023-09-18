<?php

namespace App\Http\Controllers;

use App\Models\Forfait;
use Illuminate\Http\Request;

class BilletterieController extends Controller
{
    public function index() {
        $forfaits = Forfait::all();



        return view('billetterie.index', [
            "forfaits"=> $forfaits,
            'selectedForfait' => $selectedForfait ?? null,
        ]);
    }
}
