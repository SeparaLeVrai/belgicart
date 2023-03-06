<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('belgicart.users.index', compact('users'));
    }

    public function show($pseudo)
    {
        $users = User::where('pseudo', $pseudo)->first();

        return view('belgicart.users.show', compact('users'));
    }
}
