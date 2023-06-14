<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Niveau;
use App\Models\Pays;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {

        $countries = Pays::all();
        return view('auth.register', compact('countries'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // $request->validate([
        //     'pseudo' => ['required', 'string', 'min:4', 'max:20'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        //     // 'avatar' => ['image', 'mimes:png, jpeg, jpg', 'max:400'],
        //     'niveau_id' => ['required'],
        // ]);


        // $user = User::create([
        //     'pseudo' => $request->pseudo,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     // 'pays_id' => $request->pays,
        //     'niveau_id' => 2,
        // ]);

        // if ($request->hasFile('avatar')) {
        //     $avatarPath = $request->file('avatar')->store('images', 'public');
        //     $user->avatar = $avatarPath;
        // }

        // $filename = time() . '.' . $request->file('img')->extension();

        $user = new User();
        $user->pseudo = $request->input('pseudo');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->password);
        $user->pays_id = $request->input('pays_id');
        $user->niveau_id = 2;

        // dd($request);
        // $user->img_path = $request->file('img')->storeAs('images', $filename, 'public');

        $user->save();

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
