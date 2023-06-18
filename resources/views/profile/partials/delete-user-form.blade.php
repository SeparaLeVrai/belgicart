<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            <span class="content-fr">{{ __('Supprimer votre compte') }}</span>
            <span class="content-en">{{ __('Delete Your Account') }}</span>
            <span class="content-nl">{{ __('Uw account verwijderen') }}</span>
            <span class="content-de">{{ __('Ihr Konto löschen') }}</span>
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            <span
                class="content-fr">{{ __('Une fois votre compte effacé, toutes ses ressources et données seront supprimées de manière permanente. Avant de le supprimer, veuillez à télécharger quelconque donnée ou information que vous souhaiteriez conserver.') }}</span>
            <span
                class="content-en">{{ __('Once your account is deleted, all its resources and data will be permanently removed. Before deleting it, please make sure to download any data or information you wish to keep.') }}</span>
            <span
                class="content-nl">{{ __('Zodra uw account is verwijderd, worden al zijn bronnen en gegevens permanent verwijderd. Voordat u dit doet, zorg ervoor dat u eventuele gegevens of informatie downloadt die u wilt behouden.') }}</span>
            <span
                class="content-de">{{ __('Sobald Ihr Konto gelöscht ist, werden alle Ressourcen und Daten dauerhaft entfernt. Bevor Sie dies tun, stellen Sie sicher, dass Sie alle Daten oder Informationen herunterladen, die Sie behalten möchten.') }}</span>
        </p>
    </header>

    <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
        <span class="content-fr">{{ __('Supprimer votre compte') }}</span>
        <span class="content-en">{{ __('Delete Your Account') }}</span>
        <span class="content-nl">{{ __('Uw account verwijderen') }}</span>
        <span class="content-de">{{ __('Ihr Konto löschen') }}</span>
    </x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 ">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                <span class="content-fr">{{ __('Voulez-vous vraiment supprimer votre compte ?') }}</span>
                <span class="content-en">{{ __('Do you really want to delete your account?') }}</span>
                <span class="content-nl">{{ __('Wil je echt je account verwijderen?') }}</span>
                <span class="content-de">{{ __('Möchten Sie Ihr Konto wirklich löschen?') }}</span>
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                <span
                    class="content-fr">{{ __('Une fois votre compte effacé, toutes ses ressources et données seront supprimées de manière permanente. Avant de le supprimer, veuillez à télécharger quelconque donnée ou information que vous souhaiteriez conserver.') }}</span>
                <span
                    class="content-en">{{ __('Once your account is deleted, all its resources and data will be permanently removed. Before deleting it, please make sure to download any data or information you would like to keep.') }}</span>
                <span
                    class="content-nl">{{ __('Zodra je account is verwijderd, worden al zijn bronnen en gegevens permanent verwijderd. Voordat je het verwijdert, zorg ervoor dat je eventuele gegevens of informatie downloadt die je wilt behouden.') }}</span>
                <span
                    class="content-de">{{ __('Sobald Ihr Konto gelöscht ist, werden alle Ressourcen und Daten dauerhaft entfernt. Bevor Sie es löschen, stellen Sie bitte sicher, dass Sie alle Daten oder Informationen herunterladen, die Sie behalten möchten.') }}</span>
            </p>
            <div class="mt-6">
                <label for="password">
                    <span class="content-fr">Mot de passe</span>
                    <span class="content-en">Password</span>
                    <span class="content-nl">Wachtwoord</span>
                    <span class="content-de">Passwort</span>
                </label>

                <x-text-input id="password" name="password" type="password" class="mt-1 block w-3/4" />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    <span class="content-fr">{{ __('Annuler') }}</span>
                    <span class="content-en">{{ __('Cancel') }}</span>
                    <span class="content-nl">{{ __('Annuleren') }}</span>
                    <span class="content-de">{{ __('Abbrechen') }}</span>
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    <span class="content-fr">{{ __('Supprimer le compte') }}</span>
                    <span class="content-en">{{ __('Delete Account') }}</span>
                    <span class="content-nl">{{ __('Account verwijderen') }}</span>
                    <span class="content-de">{{ __('Konto löschen') }}</span>
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
