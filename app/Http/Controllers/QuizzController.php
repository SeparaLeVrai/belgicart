<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizzController extends Controller
{
    public function quizz()
    {

        return view('belgicart.quizz.index');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $scoreValue = $request->input('score');

        $score = new Score();
        $score->score = $scoreValue; // Utilisation de auth() pour obtenir l'utilisateur authentifié et son ID
        $score->user_id = $user->id;
        $score->save();

        return response()->json('Score enregistré avec succès');
    }

    public function __invoke(Request $request)
    {
        return Question::all();
    }
}
