<?php

namespace App\Http\Controllers;

use App\Models\Forfait;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return view('user.index', [
            "forfaits" => Forfait::all()
        ]);
    }
}
