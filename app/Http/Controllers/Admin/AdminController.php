<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuizzAddRequest;
use App\Models\Categories;
use App\Models\Difficulte;
use App\Models\Question;
use App\Models\User;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $categories = Categories::all();
        $difficultes = Difficulte::all();

        return view('belgicart.admin.index', compact('users', 'categories', 'difficultes'));
    }

    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuizzAddRequest $request)
    {

        // $categories = Categories::all();
        // $questions = Question::all();

        // dd($categories, $questions);

        $quizz = $request->validated();

        $quizz = new Question();
        $quizz->question = $request->input('question');
        $quizz->categorie_id = $request->input('categorie_id');
        $quizz->difficulte_id = $request->input('difficulte_id');
        $quizz->reponse1_id = 1;
        $quizz->reponse2_id = 2;

        $quizz->save();
        return redirect()->back();

        // $categorie = Categories::where('nom', $request->input('categorie'))->firstOrFail();
        // $difficulte = Difficulte::where('level', $request->input('difficulte'))->firstOrFail();

        // $quizz = Question::create([
        //     'question' => $request->question,
        //     'categorie_id' => $categorie->id,
        //     'difficulte_id' => $difficulte->id,
        // ]);

        // $quizz->reponses()->createMany(
        //     [
        //         'text' => $request->input('rep1'),
        //         'good_answer' => true,
        //     ],
        //     [
        //         'text' => $request->input('rep2'),
        //         'good_answer' => false,
        //     ]
        // );
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // // Vérifier si l'utilisateur connecté a la permission de supprimer un utilisateur
        // if (Gate::authorize('delete', $user)) {
        //     // Supprimer l'utilisateur
        //     $user->delete();

        //     // Redirection vers la liste des utilisateurs ou une autre action appropriée
        //     return redirect()->route('admin.users.index')->with('success', 'Utilisateur supprimé avec succès.');
        // } else {
        //     // Si l'utilisateur n'a pas la permission de supprimer, retourner une réponse d'accès refusé
        //     abort(403, 'Accès refusé');
        // }
        // $this->authorize('delete', $user);

        // Supprimer l'utilisateur
        $user->delete();
        return redirect()->back();

        // Rediriger ou retourner une réponse appropriée
    }
}
