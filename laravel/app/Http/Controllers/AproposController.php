<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AproposController extends Controller
{
    /**
     * Affichage de la page à propos
     *
     * @return void
     */
    public function index() {
        return view('a_propos.index',[
            "admins"=>Admin::all()
        ]);
    }
}
