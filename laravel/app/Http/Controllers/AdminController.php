<?php

namespace App\Http\Controllers;

use App\Models\Actualite;
use App\Models\Admin;
use App\Models\Artiste;
use App\Models\Programmation;
use App\Models\Spectacle;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {

        $users = User::all();

        $users->each(function ($user) {
            $user->forfaits = $user->forfaits->sortBy('pivot.date_arrivee');
        });
        $admins = Admin::all();
        $programmations = Programmation::all();
        $artistes = Artiste::all();
        $spectacles = Spectacle::all();
        $actualites = Actualite::all();


        return view('admin.index', [
            "users" => $users,
            "admins" => $admins,
            "programmations" => $programmations,
            "artistes" => $artistes,
            "spectacles" => $spectacles,
            "actualites" => $actualites,
        ]);
    }

    public function destroy(Request $request)
    {
        Admin::destroy($request->id);

        return redirect()->route('admin.index')
            ->with('succes', " Cet admin a bien été supprimé");
    }
}
