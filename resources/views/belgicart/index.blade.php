<x-guest-layout>
    <h1>Bienvenue sur Belgicart
        @if (Auth::check())
            , {{ auth()->user()->pseudo }}
        @endif !
    </h1>
</x-guest-layout>
