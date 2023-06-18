<?php

namespace App\Http\Livewire\App;

use App\Models\Pays;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Validation\Rules;

class LiveErrorsComponent extends Component
{

    public $pseudo;
    public $email;
    public $avatar;
    public $password;
    public $pays_id;
    public $isSubmitting = false;

    protected $rules = [
        'pseudo' => ['required', 'string', 'min:4', 'max:20', 'unique:users'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'confirmed', 'min:8'],
        'avatar' => ['nullable', 'image', 'mimes:jpg,png,gif,jpeg', 'max:400'],
        'pays_id' => ['required'],
    ];

    protected $messages = [
        'pseudo.required' => 'Le pseudo est un champ obligatoire.',
        'pseudo.string' => 'Le pseudo ne peut pas inclure de caractères spéciaux.',
        'pseudo.min' => 'Le pseudo ne peut pas faire moins de 4 caractères.',
        'pseudo.max' => 'Le pseudo ne peut pas faire plus de 20 caractères.',
        'pseudo.unique' => 'Ce pseudo est déjà utilisé.',
        'email.required' => "L'adresse mail est un champ obligatoire.",
        'email.email' => "Le format de l'adresse mail n'est pas correcte.",
        'email.unique' => "Cette adresse mail est déjà utilisée.",
        'password.required' => 'Le mot de passe est un champ obligatoire.',
        'password.confirmed' => 'Les 2 mots de passe sont différents.',
        'avatar.mimes' => "Le format de l'avatar n'est pas correct. (jpg, png, gif, ou jpeg)",
        'avatar.max' => "L'image utilisée est trop volumineuse. (max 400)",
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function saveContact()
    {
        $validatedData = $this->validate();

        $this->isSubmitting = true;

        $user = new User();
        if ($this->avatar) {
            $path = Storage::url($this->avatar->store('avatar', 'public'));
        } else {
            $path = null;
        }
        $user->avatar = $path;
        $user->pseudo = $this->pseudo;
        $user->email = $this->email;
        $user->password = Hash::make($this->password);
        $user->pays_id = $this->pays_id;
        $user->niveau_id = 2;

        $user->save();

        session()->flash('success', 'Inscription réussie !');

        // Réinitialiser les propriétés du formulaire
        $this->pseudo = '';
        $this->email = '';
        $this->password = '';
        $this->avatar = null;
        $this->pays_id = '';

        $this->emitSelf('refreshParent');
        $this->isSubmitting = false;
    }

    public function render()
    {
        $countries = Pays::all();

        return view('auth.register', compact('countries'));
    }
}
