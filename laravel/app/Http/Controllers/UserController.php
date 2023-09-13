<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Forfait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{


    public function index()
    {
        return view('user.index', [
            'forfaits' => auth()->user()->forfaits
        ]);
    }

    public function destroy(Request $request){
        User::destroy($request->id);

        return redirect()->route('admin.index')
            ->with('succes', "Cet utilisateur a été supprimé!");
    }



}
