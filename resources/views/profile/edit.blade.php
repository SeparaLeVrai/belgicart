<x-guest-layout>
    <x-slot name="header">
        @if (auth()->check())
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <span class="content-fr">Voici votre profil, {{ auth()->user()->pseudo }}</span>
                <span class="content-en">Here is your profile, {{ auth()->user()->pseudo }}</span>
                <span class="content-nl">Hier is uw profiel, {{ auth()->user()->pseudo }}</span>
                <span class="content-de">Hier ist Ihr Profil, {{ auth()->user()->pseudo }}</span>
            </h2>
        @endif
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 shadow sm:rounded-lg bg-yellow-300 border-4 border-slate-900 text-slate-900">
                <div class="max-w-xl">
                    @include('profile.partials.update-avatar-form')
                </div>
            </div>

            <div class="p-4 sm:p-8shadow sm:rounded-l bg-yellow-300 border-4 border-slate-900 text-slate-900">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 shadow sm:rounded-lg bg-yellow-300 border-4 border-slate-900 text-slate-900">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8shadow sm:rounded-lg bg-yellow-300 border-4 border-slate-900 text-slate-900">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
