<!-- Session Status -->
<x-auth-session-status class="mb-4" :status="session('status')" />

<form method="POST" action="{{ route('login') }}" class='p-10 bg-slate-900 border-4 border-yellow-300 rounded-sm'>
    @csrf

    <!-- Email Address -->
    <div>
        <label for="pseudo" class="text-white">
            <span class="content-fr">Pseudo</span>
            <span class="content-en">Username</span>
            <span class="content-nl">Gebruikersnaam</span>
            <span class="content-de">Benutzername</span>
        </label>
        <x-text-input id="pseudo" class="block mt-1 w-full text-white bg-slate-900 border-yellow-500" type="text"
            name="pseudo" :value="old('pseudo')" required autofocus autocomplete="username" />
        <x-input-error :messages="$errors->get('pseudo')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
        <label for="password" class="text-white">
            <span class="content-fr">Mot de passe</span>
            <span class="content-en">Password</span>
            <span class="content-nl">Wachtwoord</span>
            <span class="content-de">Passwort</span>
        </label>

        <x-text-input id="password" class="block mt-1 w-full text-white bg-slate-900 border-yellow-500" type="password"
            name="password" required autocomplete="current-password" />

        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Remember Me -->
    <div class="block mt-4">
        <label for="remember_me" class="inline-flex items-center text-white">
            <input id="remember_me" type="checkbox"
                class="rounded text-indigo-600 shadow-sm focus:ring-indigo-500 bg-slate-900 border-yellow-500"
                name="remember">
            <span class="ml-2 text-sm text-white-600">
                <span class="content-fr">{{ __('Se souvenir de moi') }}</span>
                <span class="content-en">{{ __('Remember me') }}</span>
                <span class="content-nl">{{ __('Onthoud mij') }}</span>
                <span class="content-de">{{ __('Erinnere dich an mich') }}</span>
            </span>
        </label>
    </div>

    <div class="flex items-center justify-end mt-4 text-white">
        @if (Route::has('password.request'))
            <a class="underline text-sm text-white-900 hover:text-white-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('password.request') }}">
                <span class="content-fr">{{ __('Mot de passe oublié ?') }}</span>
                <span class="content-en">{{ __('Forgot password?') }}</span>
                <span class="content-nl">{{ __('Wachtwoord vergeten?') }}</span>
                <span class="content-de">{{ __('Passwort vergessen?') }}</span>
            </a>
        @endif

        <x-primary-button
            class='font-display text-black bg-yellow-300 hover:bg-yellow-500 focus:bg-yellow-500 active:bg-yellow-500 px-3 py-6
        focus:ring-2 focus:ring-yellow-100 focus:ring-offset-2'>
            <span class="content-fr">{{ __('Se connecter') }}</span>
            <span class="content-en">{{ __('Login') }}</span>
            <span class="content-nl">{{ __('Inloggen') }}</span>
            <span class="content-de">{{ __('Anmelden') }}</span>
        </x-primary-button>
    </div>
</form>
