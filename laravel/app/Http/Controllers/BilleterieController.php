<?php

namespace App\Http\Controllers;

use App\Models\Forfait;
use Illuminate\Http\Request;

class BilleterieController extends Controller
{
    public function index() {
        return view('billeterie.index', [
            "forfaits"=> Forfait::all()
        ]);
    }
}
