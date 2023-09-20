<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AproposController extends Controller
{
    public function index() {
        return view('a_propos.index',[
            "admins"=>Admin::all()
        ]);
    }
}
