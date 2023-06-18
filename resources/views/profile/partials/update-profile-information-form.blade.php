<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            <span class="content-fr">{{ __('Identifiants') }}</span>
            <span class="content-en">{{ __('Credentials') }}</span>
            <span class="content-nl">{{ __('Inloggegevens') }}</span>
            <span class="content-de">{{ __('Anmeldedaten') }}</span>
        </h2>

        {{-- <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p> --}}
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        {{-- <div>
            <x-input-label for="pseudo" :value="__('Pseudo')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('pseudo', $user->pseudo)"
                required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div> --}}

        <div>
            <p class="mt-3 mb-3 text-red-500">
                {{ auth()->user()->pseudo }}
            </p>

            <label for="email">
                <span class="content-fr">Email</span>
                <span class="content-en">Email</span>
                <span class="content-nl">Email</span>
                <span class="content-de">E-Mail</span>
            </label>
            <x-text-input id="email" name="email" type="email"
                class="mt-1 block w-full bg-slate-700 text-yellow-300" :value="old('email', $user->email)" required
                autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        <span class="content-fr">{{ __("Votre adresse mail n'est pas vérifiée.") }}</span>
                        <span class="content-en">{{ __('Your email address is not verified.') }}</span>
                        <span class="content-nl">{{ __('Uw e-mailadres is niet geverifieerd.') }}</span>
                        <span class="content-de">{{ __('Ihre E-Mail-Adresse ist nicht verifiziert.') }}</span>

                        <button form="send-verification"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <span class="content-fr">{{ __('Cliquez pour renvoyer le mail de confirmation.') }}</span>
                            <span class="content-en">{{ __('Click to resend the confirmation email.') }}</span>
                            <span
                                class="content-nl">{{ __('Klik om de bevestigingsmail opnieuw te verzenden.') }}</span>
                            <span
                                class="content-de">{{ __('Klicken Sie hier, um die Bestätigungs-E-Mail erneut zu senden.') }}</span>
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('Un nouveau lien de vérification a été envoyé à votre adresse mail.') }}
                        </p>
                    @endif
                </div>
            @endif
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
