  <form method="POST" wire:submit.prevent='saveContact' action="{{ route('register') }}" enctype="multipart/form-data"
      class='p-10 bg-slate-900 border-4 border-yellow-300 rounded-sm'>
      @csrf

      <!-- Avatar -->
      <div>
          <label for="avatar" class="text-white">
              <span class="content-fr">Avatar</span>
              <span class="content-en">Avatar</span>
              <span class="content-nl">Profielfoto</span>
              <span class="content-de">Profilbild</span>
          </label>
          <input id="avatar" name="avatar" type="file"
              class="mt-1 block w-full text-white bg-slate-900
              border-yellow-500" required autofocus
              autocomplete="avatar" wire:model="avatar" />
          <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
      </div>

      <!-- Name -->
      <div>
          <label for="pseudo" class="text-white">
              <span class="content-fr">Pseudo</span>
              <span class="content-en">Username</span>
              <span class="content-nl">Gebruikersnaam</span>
              <span class="content-de">Benutzername</span>
          </label>
          <x-text-input id="pseudo" class="block mt-1 w-full text-white bg-slate-900 border-yellow-500"
              type="text" name="pseudo" :value="old('pseudo')" required autofocus autocomplete="name"
              wire:model="pseudo" />
          <x-input-error :messages="$errors->get('pseudo')" class="mt-2" />
      </div>

      <!-- Email Address -->
      <div class="mt-4">
          <label for="email" class="text-white">
              <span class="content-fr">Email</span>
              <span class="content-en">Email</span>
              <span class="content-nl">Email</span>
              <span class="content-de">E-Mail</span>
          </label>
          <x-text-input id="email" class="block mt-1 w-full text-white bg-slate-900 border-yellow-500"
              type="email" name="email" :value="old('email')" required autocomplete="username" wire:model="email" />
          <x-input-error :messages="$errors->get('email')" class="mt-2" />
      </div>

      <!-- Password -->
      <div class="mt-4">
          <label for="password" class="text-white">
              <span class="content-fr">Mot de passe</span>
              <span class="content-en">Password</span>
              <span class="content-nl">Wachtwoord</span>
              <span class="content-de">Passwort</span>
          </label>

          <x-text-input id="password" class="block mt-1 w-full text-white bg-slate-900 border-yellow-500"
              type="password" name="password" required autocomplete="new-password" wire:model="password" />

          <x-input-error :messages="$errors->get('password')" class="mt-2" />
      </div>

      <!-- Confirm Password -->
      <div class="mt-4 text-white">
          <label for="password-confirmation">
              <span class="content-fr">Confirmez votre mot de passe</span>
              <span class="content-en">Confirm your password</span>
              <span class="content-nl">Bevestig uw wachtwoord</span>
              <span class="content-de">Bestätigen Sie Ihr Passwort</span>
          </label>

          <x-text-input id="password_confirmation" class="block mt-1 w-full text-white bg-slate-900 border-yellow-500"
              type="password" name="password_confirmation" required autocomplete="new-password" />

          <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
      </div>

      <!-- Pays de résidence -->
      <label for="pays_id" class="text-white">
          <span class="content-fr">Pays</span>
          <span class="content-en">Country</span>
          <span class="content-nl">Land</span>
          <span class="content-de">Land</span>
      </label>
      <select id="pays_id" name="pays_id"
          class="block mt-1 w-full text-white bg-slate-900 border-yellow-500 text-2xl rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
          required>
          @foreach ($countries as $country)
              <option value='{{ $country->id }}' class="content-fr">
                  <span class="content-fr">{{ $country->paysFr }}</span>
              </option>
              <option value='{{ $country->id }}' class="content-en">
                  <span class="content-en">{{ $country->paysEn }}</span>
              </option>
              <option value='{{ $country->id }}' class="content-nl">
                  <span class="content-nl">{{ $country->paysNl }}</span>
              </option>
              <option value='{{ $country->id }}' class="content-de">
                  <span class="content-de">{{ $country->paysDe }}</span>
              </option>
          @endforeach
      </select>

      <div class="flex items-center justify-end mt-4">
          {{-- <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
              href="{{ route('login') }}">
              {{ __('Déjà inscrit ?') }}
          </a> --}}

          <x-primary-button
              class="ml-4 font-display text-black bg-yellow-300 hover:bg-yellow-500 focus:bg-yellow-500 active:bg-yellow-500 px-3 py-6
          focus:ring-2 focus:ring-yellow-100 focus:ring-offset-2"
              wire:loading.attr="disabled">
              <span class="content-fr">{{ __("M'inscrire") }}</span>
              <span class="content-en">{{ __('Sign up') }}</span>
              <span class="content-nl">{{ __('Inschrijven') }}</span>
              <span class="content-de">{{ __('Registrieren') }}</span>
          </x-primary-button>
      </div>
  </form>

  {{-- @livewire('live-errors-component') --}}
