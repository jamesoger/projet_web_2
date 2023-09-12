<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {

        $users = User::all();
        $admins = Admin::all();
        return view('admin.index', [
            "users" => $users,
            "admins" => $admins,
        ]);
    }
}
