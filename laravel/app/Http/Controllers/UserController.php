<?php

namespace App\Http\Controllers;

use App\Models\Forfait;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request) {
        // Récupérez la liste de tous les forfaits
        $forfaits = Forfait::all();

        return view('user.index', [
            'forfaits' => $forfaits
        ]);
    }


}
