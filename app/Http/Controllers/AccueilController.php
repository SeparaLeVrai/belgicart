<?php

namespace App\Http\Controllers;

use App\Models\Pays;
use App\Models\Slides;
use App\Models\User;
use Illuminate\Http\Request;

class AccueilController extends Controller
{
    public function index()
    {

        $users = User::all();
        $countries = Pays::all();

        return view('belgicart.index', compact('users', 'countries'));
    }

    // public function carousel(Request $request)
    // {
    //     $data = Slides::get();
    //     return response()->json($data);
    // }
}
