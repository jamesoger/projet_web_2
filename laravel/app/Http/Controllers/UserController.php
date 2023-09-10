<?php

namespace App\Http\Controllers;
use App\Models\User;
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

//    public function store(Request $request){

//     $forfaitId = $request->input('forfait_id');
//     $user = auth()->user();
//     $user->forfaits()->attach($forfaitId);


//    }
}
