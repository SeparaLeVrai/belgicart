<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizzController extends Controller
{
    public function quizz()
    {

        return view('belgicart.quizz.index');
    }
}
