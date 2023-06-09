<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <nav class="grid grid-cols-3 gap-3">
            <a href="{{ route('home') }}">Belgicart</a>
            <a href="{{ route('users') }}">Membres</a>
            <a href="{{ route('mRelief') }}">Cartes Relief</a>
            <a href="{{ route('relief') }}">Quizz Relief</a>
            @if (Auth::check())
                <a href='{{ url('admin/users') }}'>Admin</a>
            @endif
            <a class="@if (Auth::check()) hidden @endif" href="{{ route('login') }}">Connexion</a>
            <form method="POST" action="{{ route('logout') }}" class="@if (!Auth::check()) hidden @endif">
                @csrf

                <x-dropdown-link :href="route('logout')"
                    onclick="event.preventDefault();
                                        this.closest('form').submit();">
                    {{ __('Déconnexion') }}
                </x-dropdown-link>
            </form>
        </nav>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
