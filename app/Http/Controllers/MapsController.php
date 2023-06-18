<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class MapsController extends Controller
{
    public function relief()
    {
        $categories = Categories::all();

        return view('belgicart.maps.relief', compact('categories'));
    }

    public function hydrographie()
    {
        $categories = Categories::all();

        return view('belgicart.maps.hydrographie', compact('categories'));
    }

    public function monuments()
    {
        $categories = Categories::all();

        return view('belgicart.maps.monuments', compact('categories'));
    }

    public function population()
    {
        $categories = Categories::all();

        return view('belgicart.maps.population', compact('categories'));
    }

    public function insolites()
    {
        $categories = Categories::all();

        return view('belgicart.maps.lieux-insolites', compact('categories'));
    }
}
