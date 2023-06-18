<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            <span class="content-fr">{{ __('Avatar') }}</span>
            <span class="content-en">{{ __('Avatar') }}</span>
            <span class="content-nl">{{ __('Profielfoto') }}</span>
            <span class="content-de">{{ __('Avatar') }}</span>
        </h2>

        @if ($user->avatar)
            <img src="{{ asset($user->avatar) }}" title='{{ $user->pseudo }}' alt="{{ $user->pseudo }}" height="100"
                width="100" />
        @endif
    </header>

    <form method="post" action="{{ route('avatar.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div>
            <input id="avatar" name="avatar" type="file" class="mt-1 block w-full bg-slate-700 text-yellow-300"
                required autofocus autocomplete="avatar" />
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
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
    <section>
