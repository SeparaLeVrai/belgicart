<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AccueilController extends Controller
{
    public function index()
    {

        $users = User::all();

        return view('belgicart.index', compact('users'));
    }
}
