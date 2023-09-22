<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccueilController extends Controller
{
  /**
 * affichage de l'acceuil
 *
 * @return view
 */
    public function index() {
        return view('index');
    }
}
