<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            <span class="content-fr">{{ __('Changer le mot de passe') }}</span>
            <span class="content-en">{{ __('Change Password') }}</span>
            <span class="content-nl">{{ __('Wachtwoord wijzigen') }}</span>
            <span class="content-de">{{ __('Passwort ändern') }}</span>
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            <span class="content-fr">{{ __('Privilégiez un mot de passe long.') }}</span>
            <span class="content-en">{{ __('Choose a strong password.') }}</span>
            <span class="content-nl">{{ __('Kies een sterk wachtwoord.') }}</span>
            <span class="content-de">{{ __('Wählen Sie ein sicheres Passwort.') }}</span>
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <label for="current_password">
                <span class="content-fr">{{ __('Mot de passe actuel') }}</span>
                <span class="content-en">{{ __('Current Password') }}</span>
                <span class="content-nl">{{ __('Huidig wachtwoord') }}</span>
                <span class="content-de">{{ __('Aktuelles Passwort') }}</span>
            </label>
            <x-text-input id="current_password" name="current_password" type="password"
                class="mt-1 block w-full bg-slate-700 text-yellow-300" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <label for="password">
                <span class="content-fr">{{ __('Nouveau mot de passe') }}</span>
                <span class="content-en">{{ __('New Password') }}</span>
                <span class="content-nl">{{ __('Nieuw wachtwoord') }}</span>
                <span class="content-de">{{ __('Neues Passwort') }}</span>
            </label>
            <x-text-input id="password" name="password" type="password"
                class="mt-1 block w-full bg-slate-700 text-yellow-300" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <label for="password_confirmation">
                <span class="content-fr">{{ __('Confirmer le nouveau mot de passe') }}</span>
                <span class="content-en">{{ __('Confirm New Password') }}</span>
                <span class="content-nl">{{ __('Bevestig nieuw wachtwoord') }}</span>
                <span class="content-de">{{ __('Neues Passwort bestätigen') }}</span>
            </label>
            <x-text-input id="password_confirmation" name="password_confirmation" type="password"
                class="mt-1 block w-full bg-slate-700 text-yellow-300" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>
                <span class="content-fr">{{ __('Sauvegarder') }}</span>
                <span class="content-en">{{ __('Save') }}</span>
                <span class="content-nl">{{ __('Opslaan') }}</span>
                <span class="content-de">{{ __('Speichern') }}</span>
            </x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">
                    <span class="content-fr">{{ __('Sauvegardé.') }}</span>
                    <span class="content-en">{{ __('Saved.') }}</span>
                    <span class="content-nl">{{ __('Opgeslagen.') }}</span>
                    <span class="content-de">{{ __('Gespeichert.') }}</span>
                </p>
            @endif
        </div>
    </form>
</section>
