<?php

namespace App\Http\Controllers;

use App\Models\Programmation;
use Illuminate\Http\Request;

class ProgrammationController extends Controller
{
    public function index() {
        return view('programmation.index', [
            "programmation"=> Programmation::all()
        ]);
    }
}
