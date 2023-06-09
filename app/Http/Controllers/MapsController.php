<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapsController extends Controller
{
    public function relief()
    {

        return view('belgicart.maps.relief');
    }
}
