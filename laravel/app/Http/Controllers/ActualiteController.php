<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActualiteController extends Controller
{
    public function index() {
        return view('actualites.index');
    }
}
