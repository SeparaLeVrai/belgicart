<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Belgicart</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&Montserrat:wght@300&family=Red+Hat+Display:ital,wght@0,400;0,700;1,900&display=swap"
        rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @stack('scripts')

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-display antialiased bg-gradient-to-b
        from-slate-900 via-indigo-900 to-slate-900 bg-fixed">
    @php
        $currentRoute = request()->url();
    @endphp

    <nav
        class="firstNav hidden sm:grid
         @auth {{ auth()->user()->niveau_id === 1 ? 'grid-cols-6' : 'grid-cols-5' }} @endauth
         grid-cols-6 gap-3 place-items-center
         text-white h-1/8 text-2xl sticky top-0 bg-transparent z-50 w-full">
        <a href="{{ route('home') }}">
            <img src='{{ asset('/storage/images/7ke7HZWE3XBidlWZMVttuJ15TqzI356QmdP2ILtg.png') }}' width="150"
                height="100" class="sm:block" />
        </a>
        <a href="{{ route('users') }}" class="{{ $currentRoute == route('users') ? 'active' : '' }}">
            <span class="content-fr">Membres</span>
            <span class="content-en">Members</span>
            <span class="content-nl">Leden</span>
            <span class="content-de">Mitglieder</span>
        </a>

        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
                <button
                    class="inline-flex items-center px-3 py-2 border border-transparent text-2xl leading-4 font-medium rounded-md text-yellow-300 bg-transparent focus:outline-none transition ease-in-out duration-150">
                    <div class="text-white"><span class="content-fr">Cartes</span>
                        <span class="content-en">Maps</span>
                        <span class="content-nl">Kaarten</span>
                        <span class="content-de">Karten</span>
                    </div>

                    <div class="ml-1">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>
            </x-slot>

            <x-slot name="content">
                <x-dropdown-link :href="route('relief')">
                    <span class="content-fr">Relief</span>
                    <span class="content-en">Relief</span>
                    <span class="content-nl">Reliëf</span>
                    <span class="content-de">Relief</span>
                </x-dropdown-link>

                <x-dropdown-link :href="route('hydrographie')">
                    <span class="content-fr">Hydrographie</span>
                    <span class="content-en">Hydrography</span>
                    <span class="content-nl">Hydrografie</span>
                    <span class="content-de">Hydrographie</span>
                </x-dropdown-link>

                <x-dropdown-link :href="route('monuments')">
                    <span class="content-fr">Monuments</span>
                    <span class="content-en">Monuments</span>
                    <span class="content-nl">Monumenten</span>
                    <span class="content-de">Denkmäler</span>
                </x-dropdown-link>

                <x-dropdown-link :href="route('population')">
                    <span class="content-fr">Population</span>
                    <span class="content-en">Population</span>
                    <span class="content-nl">Bevolking</span>
                    <span class="content-de">Bevölkerung</span>
                </x-dropdown-link>

                <x-dropdown-link :href="route('lieux-insolites')">
                    <span class="content-fr">Lieux insolites</span>
                    <span class="content-en">Unusual Places</span>
                    <span class="content-nl">Ongewone Plaatsen</span>
                    <span class="content-de">Ungewöhnliche Orte</span>
                </x-dropdown-link>
            </x-slot>
        </x-dropdown>

        <a href="{{ route('quizz') }}" class="{{ $currentRoute == route('quizz') ? 'active' : '' }}">
            <span class="content-fr">Quizz</span>
            <span class="content-en">Quiz</span>
            <span class="content-nl">Quiz</span>
            <span class="content-de">Quiz</span>
        </a>

        @if (Auth::check() && Auth::user()->niveau_id === 1)
            <a href='{{ url('admin/users') }}'>
                <span class="content-fr">Admin</span>
                <span class="content-en">Admin</span>
                <span class="content-nl">Beheerder</span>
                <span class="content-de">Admin</span>
            </a>
        @endif

        @if (Auth::check())
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button
                        class="inline-flex items-center px-3 py-2 border border-transparent text-2xl leading-4 font-medium rounded-md text-yellow-300 bg-transparent focus:outline-none transition ease-in-out duration-150">
                        <div class="text-white">
                            @if (auth()->user()->avatar)
                                <img src='{{ asset(auth()->user()->avatar) }}'
                                    class="rounded-full border-yellow-300 border-4" width='100' height='100' />
                            @else
                                <p class="text-white">{{ auth()->user()->pseudo }}</p> </a>
                            @endif
                        </div>

                        <div class="ml-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        <span class="content-fr">Profil</span>
                        <span class="content-en">Profile</span>
                        <span class="content-nl">Profiem</span>
                        <span class="content-de">Profile</span>
                    </x-dropdown-link>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            <x-tabler-logout class="h-10 w-10 text-yellow-300" />
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        @endif

        @if (!Auth::check())
            <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'login')"
                class='font-display text-slate-900 bg-yellow-300 hover:bg-yellow-500 focus:bg-yellow-500 active:bg-yellow-500 px-3 py-6
                focus:ring-2 focus:ring-yellow-100 focus:ring-offset-2'>
                <span class="content-fr">Connexion</span>
                <span class="content-en">Login</span>
                <span class="content-nl">Inloggen</span>
                <span class="content-de">Anmeldung</span>
            </x-primary-button>
            <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'register')"
                class='font-display text-slate-900 bg-yellow-300 hover:bg-yellow-500 focus:bg-yellow-500 active:bg-yellow-500 px-3 py-6
                focus:ring-2 focus:ring-yellow-100 focus:ring-offset-2'>
                <span class="content-fr">Inscription</span>
                <span class="content-en">Register</span>
                <span class="content-nl">Registreren</span>
                <span class="content-de">Registrieren</span>
            </x-primary-button>
        @endif
    </nav>

    <nav x-data="{ open: false }" class="sm:hidden bg-yellow-300 border-b border-gray-100 sticky top-0">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <nav class="-mr-2 flex items-center">
                    <!-- Bouton du menu hamburger -->
                    <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-slate-900 hover:bg-slate-900 hover:text-yellow-300 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </nav>
            </div>
        </div>

        <!-- Menu hamburger -->
        <div x-show="open" @click.away="open = false"
            class="sm:hidden absolute top-0 inset-x-0 p-2 transition transform origin-top-right z-50">
            <div class="rounded-lg shadow-lg bg-yellow-300 ring-1 ring-black ring-opacity-5 overflow-hidden">
                <div class="px-5 py-7">
                    <!-- Liens du menu -->
                    <a href="{{ route('home') }}"
                        class="block px-3 py-2 rounded-md text-base font-medium text-slate-900
      hover:text-yellow-300 hover:bg-slate-900">Accueil</a>
                    <a href="{{ route('users') }}"
                        class="block px-3 py-2 rounded-md text-base font-medium text-slate-900
                        hover:text-yellow-300 hover:bg-slate-900">Membres</a>
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-2xl leading-4 font-medium rounded-md text-yellow-300 bg-transparent focus:outline-none transition ease-in-out duration-150">
                                <div
                                    class="block px-3 py-2 rounded-md text-base font-medium text-slate-900
                                hover:text-yellow-300 hover:bg-slate-900">
                                    <span class="content-fr">Cartes</span>
                                    <span class="content-en">Maps</span>
                                    <span class="content-nl">Kaarten</span>
                                    <span class="content-de">Karten</span>
                                </div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('relief')">
                                <span class="content-fr">Relief</span>
                                <span class="content-en">Relief</span>
                                <span class="content-nl">Reliëf</span>
                                <span class="content-de">Relief</span>
                            </x-dropdown-link>

                            <x-dropdown-link :href="route('hydrographie')">
                                <span class="content-fr">Hydrographie</span>
                                <span class="content-en">Hydrography</span>
                                <span class="content-nl">Hydrografie</span>
                                <span class="content-de">Hydrographie</span>
                            </x-dropdown-link>

                            <x-dropdown-link :href="route('monuments')">
                                <span class="content-fr">Monuments</span>
                                <span class="content-en">Monuments</span>
                                <span class="content-nl">Monumenten</span>
                                <span class="content-de">Denkmäler</span>
                            </x-dropdown-link>

                            <x-dropdown-link :href="route('population')">
                                <span class="content-fr">Population</span>
                                <span class="content-en">Population</span>
                                <span class="content-nl">Bevolking</span>
                                <span class="content-de">Bevölkerung</span>
                            </x-dropdown-link>

                            <x-dropdown-link :href="route('lieux-insolites')">
                                <span class="content-fr">Lieux insolites</span>
                                <span class="content-en">Unusual Places</span>
                                <span class="content-nl">Ongewone Plaatsen</span>
                                <span class="content-de">Ungewöhnliche Orte</span>
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                    <a href="{{ route('quizz') }}"
                        class="block px-3 py-2 rounded-md text-base font-medium text-slate-900
                        hover:text-yellow-300 hover:bg-slate-900">Quizz</a>
                    @auth
                        <a href="{{ route('profile.edit') }}"
                            class="block px-3 py-2 rounded-md text-base font-medium text-slate-900
                        hover:text-yellow-300 hover:bg-slate-900">Profile</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                <x-tabler-logout
                                    class="h-10 w-10 text-slate-900 hover:bg-slate-900 hover:text-yellow-300 justify-center" />
                            </x-dropdown-link>
                        </form>
                    @else
                        <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'login')"
                            class='font-display text-yellow-300 bg-slate-900 hover:text-slate-900 hover:bg-yellow-500 focus:bg-yellow-500 active:bg-yellow-500 px-3 py-6
                focus:ring-2 focus:ring-yellow-100 focus:ring-offset-2'>
                            <span class="content-fr">Connexion</span>
                            <span class="content-en">Login</span>
                            <span class="content-nl">Inloggen</span>
                            <span class="content-de">Anmeldung</span>
                        </x-primary-button>
                        <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'register')"
                            class='font-display text-yellow-300 bg-slate-900 hover:text-slate-900 hover:bg-yellow-500 focus:bg-yellow-500 active:bg-yellow-500 px-3 py-6
                        focus:ring-2 focus:ring-yellow-100 focus:ring-offset-2'>
                            <span class="content-fr">Inscription</span>
                            <span class="content-en">Register</span>
                            <span class="content-nl">Registreren</span>
                            <span class="content-de">Registrieren</span>
                        </x-primary-button>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <x-modal name="login" focusable class="fixed inset-0 flex items-center justify-center mt-auto">
        @include('auth.login')
    </x-modal>
    <x-modal name="register" focusable class="fixed inset-0 flex items-center justify-center">
        @include('auth.register')
    </x-modal>


    <div class="flex flex-col sm:justify-center items-center m-auto  p-10">

        <nav class="secondNav text-white font-classic w-6/12 h-1/5">
            <ul class="grid grid-cols-4 place-items-center py-10">
                <li><button id="btn-fr">FR</button></li>
                <li><button id="btn-en">EN</button></li>
                <li><button id="btn-nl">NL</button></li>
                <li><button id="btn-de">DE</button></li>
            </ul>
        </nav>

        <a id="backToTopBtn" class="back-to-top">
            <x-bxs-up-arrow />
        </a>


        @if ($errors->any())
            <ul class="bg-red-300 text-red-800 border-red-800 text-md p-5 rounded-md">
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        @endif

        <!-- Modal -->
        <div id="cookieModal" class="modal shadow-lg p-6 bg-slate-900 border-4 border-yellow-300 rounded-sm">
            <div class="modal-content">
                <h2 class='border-b border-white py-5 text-2xl font-classic text-white'>Utilisation des cookies</h2>
                <p class="text-left text-white text-l py-5">Ce site web utilise des cookies pour améliorer votre
                    expérience utilisateur.</p>
                <p class="text-left
                    text-white text-l py-5">En continuant à naviguer sur ce site,
                    vous acceptez notre utilisation des
                    cookies.</p>
                <button id="closeModalBtn"
                    class='font-display text-black bg-yellow-300 hover:bg-yellow-500 focus:bg-yellow-500 active:bg-yellow-500 px-3 py-6
                    focus:ring-2 focus:ring-yellow-100 focus:ring-offset-2 col-span-1'>Fermer</button>
            </div>
        </div>

        <!-- Overlay du modal -->
        <div id="modalOverlay" class="modal-overlay"></div>

        {{ $slot }}


        <footer class="sm:grid sm:grid-rows-3 pt-5 text-center border-t border-yellow-300 m-10">
            <p class="text-white text-l">
                <span class="content-fr">2023 © Nicolas Carré. Tous droits réservés.</span>
                <span class="content-en">2023 © Nicolas Carré. All rights reserved.</span>
                <span class="content-nl">2023 © Nicolas Carré. Alle rechten voorbehouden.</span>
                <span class="content-de">2023 © Nicolas Carré. Alle Rechte vorbehalten.</span>
            </p>
            <div class="bouton sm:grid sm:grid-cols-2 place-items-center w-3/5 m-auto mt-5">
                <x-primary-button x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'conditions'
                    )"
                    class='font-display text-slate-900 bg-yellow-300 hover:bg-yellow-500 focus:bg-yellow-500 active:bg-yellow-500 px-3 py-6
                    focus:ring-2 focus:ring-yellow-100 focus:ring-offset-2 col-span-1'>
                    <span class="content-fr">{{ __("Conditions d'utilisation") }}</span>
                    <span class="content-en">{{ __('Terms of Use') }}</span>
                    <span class="content-nl">{{ __('Gebruiksvoorwaarden') }}</span>
                    <span class="content-de">{{ __('Nutzungsbedingungen') }}</span>
                </x-primary-button>
                <x-modal name="conditions" focusable class="transform origin-top">
                    <div class="shadow-lg p-6 bg-slate-900 border-4 border-yellow-300 rounded-sm ">
                        <h2 class="border-b border-white py-5 text-2xl font-classic text-white">
                            <span class="content-fr">Conditions d'utilisation</span>
                            <span class="content-en">Terms of Use</span>
                            <span class="content-nl">Gebruiksvoorwaarden</span>
                            <span class="content-de">Nutzungsbedingungen</span>
                        </h2>
                        <p class="text-left text-white text-l py-5">
                            <span class="content-fr">Les conditions d'utilisation constituent un accord
                                contraignant
                                entre
                                l'auteur et l'utilisateur. En tant qu'utilisateur, vous acceptez de vous conformer à
                                ces
                                conditions d'utilisation. Dans le contraire, veuillez ne pas utiliser
                                BELGICART.</span>
                            <span class="content-en">The terms of use constitute a binding agreement between the
                                author
                                and
                                the user. As a user, you agree to comply with these terms of use. Otherwise, please
                                do
                                not
                                use BELGICART.</span>
                            <span class="content-nl">De gebruiksvoorwaarden vormen een bindende overeenkomst tussen
                                de
                                auteur en de gebruiker. Als gebruiker stemt u ermee in deze gebruiksvoorwaarden na
                                te
                                leven.
                                Gebruik anders BELGICART niet.</span>
                            <span class="content-de">Die Nutzungsbedingungen stellen eine verbindliche Vereinbarung
                                zwischen dem Autor und dem Benutzer dar. Als Benutzer erklären Sie sich damit
                                einverstanden,
                                diese Nutzungsbedingungen einzuhalten. Andernfalls verwenden Sie BELGICART bitte
                                nicht.</span>
                        </p>
                        <h3 class="text-left text-white text-xl py-5">
                            <span class="content-fr">Propriété intellectuelle</span>
                            <span class="content-en">Intellectual Property</span>
                            <span class="content-nl">Intellectueel eigendom</span>
                            <span class="content-de">Geistiges Eigentum</span>
                        </h3>
                        <p class="text-left text-white text-l py-5">
                            <span class="content-fr">Tout le contenu, comprenant le logo et les textes, est protégé
                                par
                                des
                                droits d'auteur et appartient à BELGICART. Il est fortement prohibé de copier,
                                diffuser,
                                modifier ou employer le contenu de ce site web sans autorisation accordée par
                                l'auteur.</span>
                            <span class="content-en">All content, including the logo and texts, is protected by
                                copyright
                                and belongs to BELGICART. It is strictly prohibited to copy, distribute, modify, or
                                use
                                the
                                content of this website without authorization from the author.</span>
                            <span class="content-nl">Alle inhoud, inclusief het logo en teksten, is beschermd door
                                auteursrecht en behoort toe aan BELGICART. Het is ten strengste verboden om de
                                inhoud
                                van
                                deze website te kopiëren, verspreiden, wijzigen of gebruiken zonder toestemming van
                                de
                                auteur.</span>
                            <span class="content-de">Alle Inhalte, einschließlich des Logos und der Texte, sind
                                urheberrechtlich geschützt und gehören zu BELGICART. Das Kopieren, Verteilen, Ändern
                                oder
                                Verwenden des Inhalts dieser Website ohne Zustimmung des Autors ist strengstens
                                untersagt.</span>
                        </p>
                        <h3 class="text-left text-white text-xl py-5">
                            <span class="content-fr">{{ __('Utilisation autorisée') }}</span>
                            <span class="content-en">{{ __('Permitted Use') }}</span>
                            <span class="content-nl">{{ __('Toegestaan gebruik') }}</span>
                            <span class="content-de">{{ __('Zulässige Verwendung') }}</span>
                        </h3>
                        <p class="text-left text-white text-l py-5">
                            <span class="content-fr">Il est strictement prohibé d'utiliser BELGICART dans le but de
                                diffuser du contenu illégal, discrimination, ou immoral. En utilisant ce site web,
                                vous
                                vous
                                engagez à respecter les lois et réglementations.</span>
                            <span class="content-en">It is strictly prohibited to use BELGICART for the purpose of
                                disseminating illegal, discriminatory, or immoral content. By using this website,
                                you
                                agree
                                to comply with laws and regulations.</span>
                            <span class="content-nl">Het is ten strengste verboden BELGICART te gebruiken voor het
                                verspreiden van illegale, discriminerende of immorele inhoud. Door deze website te
                                gebruiken, stemt u in met het naleven van wetten en voorschriften.</span>
                            <span class="content-de">Es ist strengstens untersagt, BELGICART für die Verbreitung
                                illegaler,
                                diskriminierender oder unmoralischer Inhalte zu nutzen. Durch die Nutzung dieser
                                Website
                                erklären Sie sich damit einverstanden, Gesetze und Vorschriften einzuhalten.</span>
                        </p>

                        <h3 class="text-left text-white text-xl py-5">
                            <span class="content-fr">{{ __('Protection des données personnelles') }}</span>
                            <span class="content-en">{{ __('Protection of Personal Data') }}</span>
                            <span class="content-nl">{{ __('Bescherming van persoonsgegevens') }}</span>
                            <span class="content-de">{{ __('Schutz personenbezogener Daten') }}</span>
                        </h3>
                        <p class="text-left text-white text-l py-5">
                            <span class="content-fr">L'auteur et l'équipe de BELGICART s'engagent à respecter vos
                                données
                                personnelles. Celles-ci seront considérées conformément aux règles de
                                confidentialité.</span>
                            <span class="content-en">The author and the BELGICART team are committed to respecting
                                your
                                personal data. They will be treated in accordance with privacy rules.</span>
                            <span class="content-nl">De auteur en het BELGICART-team zetten zich in om uw
                                persoonlijke
                                gegevens te respecteren. Ze zullen worden behandeld volgens de privacyregels.</span>
                            <span class="content-de">Der Autor und das BELGICART-Team verpflichten sich, Ihre
                                persönlichen
                                Daten zu respektieren. Diese werden gemäß den Datenschutzbestimmungen
                                behandelt.</span>
                        </p>
                        <h3 class="text-left text-white text-xl py-5">
                            <span class="content-fr">{{ __('Comptes des utilisateurs') }}</span>
                            <span class="content-en">{{ __('User Accounts') }}</span>
                            <span class="content-nl">{{ __('Gebruikersaccounts') }}</span>
                            <span class="content-de">{{ __('Benutzerkonten') }}</span>
                        </h3>
                        <p class="text-left text-white text-l py-5">
                            <span class="content-fr">L'auteur et l'équipe de BELGICART se réservent le droit de
                                supprimer
                                tout utilisateur dont le compte ne respecte pas la confidentialité des informations
                                d'identification.</span>
                            <span class="content-en">The author and the BELGICART team reserve the right to delete
                                any
                                user
                                whose account does not respect the confidentiality of identification
                                information.</span>
                            <span class="content-nl">De auteur en het BELGICART-team behouden zich het recht voor
                                om
                                elke
                                gebruiker te verwijderen wiens account de vertrouwelijkheid van
                                identificatiegegevens
                                niet
                                respecteert.</span>
                            <span class="content-de">Der Autor und das BELGICART-Team behalten sich das Recht vor,
                                jeden
                                Benutzer zu löschen, dessen Konto den Schutz der Vertraulichkeit von
                                Identifikationsinformationen nicht respektiert.</span>
                        </p>

                        <h3 class="text-left text-white text-xl py-5">
                            <span class="content-fr">{{ __('Limitation de responsabilité') }}</span>
                            <span class="content-en">{{ __('Limitation of Liability') }}</span>
                            <span class="content-nl">{{ __('Aansprakelijkheidsbeperking') }}</span>
                            <span class="content-de">{{ __('Haftungsbeschränkung') }}</span>
                        </h3>
                        <p class="text-left text-white text-l py-5">
                            <span class="content-fr">BELGICART est régulièrement mis à jour et son contenu évolue
                                au
                                fil du
                                temps, toutefois l'auteur et l'équipe de BELGICART ne se tiennent pas responsables
                                de
                                son
                                exactitude et de son actualité.</span>
                            <span class="content-en">BELGICART is regularly updated and its content evolves over
                                time,
                                however, the author and the BELGICART team are not responsible for its accuracy and
                                timeliness.</span>
                            <span class="content-nl">BELGICART wordt regelmatig bijgewerkt en de inhoud ervan
                                evolueert
                                in
                                de loop van de tijd, echter de auteur en het BELGICART-team zijn niet
                                verantwoordelijk
                                voor
                                de nauwkeurigheid en actualiteit ervan.</span>
                            <span class="content-de">BELGICART wird regelmäßig aktualisiert und sein Inhalt
                                entwickelt
                                sich
                                im Laufe der Zeit weiter. Der Autor und das BELGICART-Team übernehmen jedoch keine
                                Verantwortung für die Richtigkeit und Aktualität.</span>
                        </p>

                        <h3 class="text-left text-white text-xl py-5">
                            <span class="content-fr">{{ __("Modification des droits d'utilisation") }}</span>
                            <span class="content-en">{{ __('Modification of Terms of Use') }}</span>
                            <span class="content-nl">{{ __('Wijziging van Gebruiksvoorwaarden') }}</span>
                            <span class="content-de">{{ __('Änderung der Nutzungsbedingungen') }}</span>
                        </h3>
                        <p class="text-left text-white text-l py-5">
                            <span class="content-fr">L'auteur et l'équipe de BELGICART se réservent le droit de
                                modifier
                                ces conditions d'utilisation à tout moment. Il est recommandé de lire régulièrement
                                ces
                                conditions afin que l'utilisateur reste à jour.</span>
                            <span class="content-en">The author and the BELGICART team reserve the right to modify
                                these
                                terms of use at any time. It is recommended to regularly review these terms to stay
                                updated.</span>
                            <span class="content-nl">De auteur en het BELGICART-team behouden zich het recht voor
                                om
                                deze
                                gebruiksvoorwaarden op elk moment te wijzigen. Het wordt aanbevolen om deze
                                voorwaarden
                                regelmatig te lezen om up-to-date te blijven.</span>
                            <span class="content-de">Der Autor und das BELGICART-Team behalten sich das Recht vor,
                                diese
                                Nutzungsbedingungen jederzeit zu ändern. Es wird empfohlen, diese Bedingungen
                                regelmäßig
                                zu
                                lesen, um auf dem neuesten Stand zu bleiben.</span>
                        </p>

                        <h3 class="text-left text-white text-xl py-5">
                            <span class="content-fr">{{ __('Loi applicable et juridiction') }}</span>
                            <span class="content-en">{{ __('Applicable Law and Jurisdiction') }}</span>
                            <span class="content-nl">{{ __('Toepasselijk recht en jurisdictie') }}</span>
                            <span class="content-de">{{ __('Anwendbares Recht und Gerichtsstand') }}</span>
                        </h3>
                        <p class="text-left text-white text-l py-5">
                            <span class="content-fr">Ces conditions d'utilisation sont régies par la loi belge.
                                Tout
                                litige
                                découlant de ces conditions d'utilisation sera soumis à la juridiction des tribunaux
                                belges.</span>
                            <span class="content-en">These terms of use are governed by Belgian law. Any dispute
                                arising
                                from these terms of use will be subject to the jurisdiction of the Belgian
                                courts.</span>
                            <span class="content-nl">Deze gebruiksvoorwaarden vallen onder de Belgische wetgeving.
                                Geschillen die voortvloeien uit deze gebruiksvoorwaarden vallen onder de bevoegdheid
                                van
                                de
                                Belgische rechtbanken.</span>
                            <span class="content-de">Diese Nutzungsbedingungen unterliegen belgischem Recht.
                                Etwaige
                                Streitigkeiten im Zusammenhang mit diesen Nutzungsbedingungen unterliegen der
                                Gerichtsbarkeit der belgischen Gerichte.</span>
                        </p>

                        <x-secondary-button x-on:click="$dispatch('close')"
                            class='font-display text-black bg-yellow-300 hover:bg-yellow-500 focus:bg-yellow-500 active:bg-yellow-500 px-3 py-3
                        focus:ring-2 focus:ring-yellow-100 focus:ring-offset-2 col-span-1'>
                            {{ __('OK') }}
                        </x-secondary-button>
                    </div>
                </x-modal>

                <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'mentions')"
                    class='font-display text-slate-900 bg-yellow-300 hover:bg-yellow-500 focus:bg-yellow-500 active:bg-yellow-500 px-3 py-6
                    focus:ring-2 focus:ring-yellow-100 focus:ring-offset-2 col-span-1'>
                    <span class="content-fr">{{ __('Mentions légales') }}</span>
                    <span class="content-en">{{ __('Legal Notice') }}</span>
                    <span class="content-nl">{{ __('Juridische vermelding') }}</span>
                    <span class="content-de">{{ __('Impressum') }}</span>
                </x-primary-button>
                <x-modal name="mentions" focusable>
                    <div class="shadow-lg p-6 bg-slate-900 border-4 border-yellow-300 rounded-sm ">
                        <h2 class="border-b border-white py-5 text-2xl font-classic text-white">
                            <span class="content-fr">Droit d'auteur</span>
                            <span class="content-en">Copyright</span>
                            <span class="content-nl">Auteursrecht</span>
                            <span class="content-de">Urheberrecht</span>
                        </h2>
                        <p class="text-left text-white text-l py-5">
                            <span class="content-fr"><span class="italic">www.belgicart.be</span> est un site
                                protégé
                                par
                                le droit d'auteur, par conséquent son contenu l'est également. Quelconque
                                retranscription
                                d'une partie de ce site ou de l'intégralité de son contenu est strictement prohibé
                                sans
                                l'autorisation de l'auteur. Une infraction à ces droits sera valable de poursuites
                                civiles
                                ou pénales.</span>
                            <span class="content-en"><span class="italic">www.belgicart.be</span> is a site
                                protected
                                by
                                copyright, therefore its content is as well. Any reproduction of part of this site
                                or
                                its
                                entire content is strictly prohibited without the author's authorization.
                                Infringement
                                of
                                these rights may result in civil or criminal proceedings.</span>
                            <span class="content-nl"><span class="italic">www.belgicart.be</span> is een website
                                beschermd
                                door auteursrecht, dus de inhoud ervan is dat ook. Elke reproductie van een deel van
                                deze
                                site of de gehele inhoud ervan is strikt verboden zonder de toestemming van de
                                auteur.
                                Inbreuk op deze rechten kan leiden tot civiele of strafrechtelijke
                                procedures.</span>
                            <span class="content-de"><span class="italic">www.belgicart.be</span> ist eine
                                Website,
                                die
                                durch Urheberrecht geschützt ist. Daher ist auch ihr Inhalt geschützt. Jegliche
                                Vervielfältigung eines Teils dieser Website oder ihres gesamten Inhalts ist ohne die
                                Zustimmung des Autors strengstens untersagt. Verstöße gegen diese Rechte können
                                zivil-
                                oder
                                strafrechtliche Konsequenzen haben.</span>
                        </p>
                        <h3 class="text-left text-white text-xl py-5">
                            <span class="content-fr">Dénominations commerciales</span>
                            <span class="content-en">Trade Names</span>
                            <span class="content-nl">Handelsnamen</span>
                            <span class="content-de">Handelsnamen</span>
                        </h3>
                        <p class="text-left text-white text-l py-5">
                            <span class="content-fr">Les logos et autres éléments visuels sur ce site sont des
                                marques
                                légalement protégées. Quelconque utilisation ou copie conforme de ces éléments est
                                strictement prohibé sans un accord de l'auteur.</span>
                            <span class="content-en">The logos and other visual elements on this site are legally
                                protected
                                trademarks. Any use or exact copy of these elements is strictly prohibited without
                                the
                                author's consent.</span>
                            <span class="content-nl">De logo's en andere visuele elementen op deze site zijn
                                wettelijk
                                beschermde handelsmerken. Elk gebruik of exacte kopie van deze elementen is strikt
                                verboden
                                zonder toestemming van de auteur.</span>
                            <span class="content-de">Die Logos und anderen visuellen Elemente auf dieser Website
                                sind
                                rechtlich geschützte Marken. Jegliche Verwendung oder genaue Kopie dieser Elemente
                                ist
                                ohne
                                Zustimmung des Autors strengstens untersagt.</span>
                        </p>
                        <h3 class="text-left text-white text-xl py-5">
                            <span class="content-fr">Contact</span>
                            <span class="content-en">Contact</span>
                            <span class="content-nl">Contact</span>
                            <span class="content-de">Kontakt</span>
                        </h3>
                        <p class="text-left text-white text-l py-5">
                            <span class="content-fr">Je suis joignable via l'adresse email suivante : <span
                                    class="italic">nicolas.carre@ifosup.wavre.be</span></span>
                            <span class="content-en">You can reach me at the following email address: <span
                                    class="italic">nicolas.carre@ifosup.wavre.be</span></span>
                            <span class="content-nl">U kunt contact met mij opnemen via het volgende e-mailadres:
                                <span class="italic">nicolas.carre@ifosup.wavre.be</span></span>
                            <span class="content-de">Sie können mich unter folgender E-Mail-Adresse erreichen:
                                <span class="italic">nicolas.carre@ifosup.wavre.be</span></span>
                        </p>
                        <h3 class="text-left text-white text-xl py-5">
                            <span class="content-fr">Hébergement</span>
                            <span class="content-en">Hosting</span>
                            <span class="content-nl">Hosting</span>
                            <span class="content-de">Hosting</span>
                        </h3>
                        <p class="text-left text-white text-l py-5">
                            <span class="content-fr">OVH<br>2 rue Kellermann<br>59100 Roubaix -
                                France<br>www.ovh.com</span>
                            <span class="content-en">OVH<br>2 rue Kellermann<br>59100 Roubaix -
                                France<br>www.ovh.com</span>
                            <span class="content-nl">OVH<br>2 rue Kellermann<br>59100 Roubaix -
                                Frankrijk<br>www.ovh.com</span>
                            <span class="content-de">OVH<br>2 rue Kellermann<br>59100 Roubaix -
                                Frankreich<br>www.ovh.com</span>
                        </p>
                        <h3 class="text-left text-white text-xl py-5">
                            <span class="content-fr">Utilisation des cookies</span>
                            <span class="content-en">Use of Cookies</span>
                            <span class="content-nl">Gebruik van Cookies</span>
                            <span class="content-de">Verwendung von Cookies</span>
                        </h3>
                        <p class="text-left text-white text-l py-5">
                            <span class="content-fr">Un cookie est un fichier texte déposé sur le disque dur de
                                votre
                                ordinateur, de votre appareil mobile ou de votre tablette lors de la visite d'un
                                site ou
                                de
                                la consultation d'une publicité. Il a pour but de collecter des informations
                                relatives à
                                votre navigation et de vous adresser des services adaptés à votre terminal. Le
                                cookie
                                contient un code unique permettant de reconnaître votre navigateur lors de votre
                                visite
                                sur
                                le site web ou lors de futures visites répétées. Les cookies peuvent être placés par
                                le
                                serveur du site web que vous visitez ou par des partenaires avec lesquels ce site
                                web
                                collabore. Le serveur d'un site web peut uniquement lire les cookies qu'il a
                                lui-même
                                placés
                                et n'a accès à aucune autre information se trouvant sur votre ordinateur ou sur
                                votre
                                appareil mobile. Les cookies assurent une interaction généralement plus aisée et
                                plus
                                rapide
                                entre le visiteur et le site web. En effet, ils mémorisent vos préférences (la
                                langue
                                choisie ou un format de lecture par exemple) et vous permettent ainsi d'accélérer
                                vos
                                accès
                                ultérieurs au site et de faciliter vos visites. De plus, ils vous aident à naviguer
                                entre
                                les différentes parties du site web. Les cookies peuvent également être utilisés
                                pour
                                rendre
                                le contenu d'un site web ou la publicité présente plus adaptés au choix, goûts
                                personnels et
                                aux besoins du visiteur. Les informations ainsi récoltées sont anonymes et ne
                                permettent
                                pas
                                votre identification en tant que personne. En effet, les informations liées aux
                                cookies
                                ne
                                peuvent pas être associées à un nom et/ou prénom parce qu'elles ne contiennent pas
                                de
                                données à caractère personnel. Les cookies sont gérés par votre navigateur internet.
                                L'utilisation des cookies nécessite votre consentement préalable et explicite. Vous
                                pourrez
                                toujours revenir ultérieurement sur celui-ci et refuser ces cookies et/ou les
                                supprimer
                                à
                                tout moment, en modifiant les paramètres de votre navigateur.</span>
                            <span class="content-en">A cookie is a text file deposited on the hard drive of your
                                computer,
                                mobile device, or tablet when visiting a website or viewing an advertisement. Its
                                purpose is
                                to collect information about your browsing and provide you with services adapted to
                                your
                                device. The cookie contains a unique code that allows the website or its partners to
                                recognize your browser during your visit or for future repeated visits. Cookies can
                                be
                                placed by the server of the visited website or by partners collaborating with the
                                website.
                                The server of a website can only read the cookies it has placed and has no access to
                                any
                                other information on your computer or mobile device. Cookies facilitate a generally
                                smoother
                                and faster interaction between the visitor and the website. They remember your
                                preferences
                                (such as the chosen language or reading format) and allow you to accelerate your
                                future
                                access to the site and facilitate your visits. They also help you navigate between
                                different
                                parts of the website. Cookies can also be used to make the content of a website or
                                the
                                displayed advertisement more tailored to the visitor's choices, personal
                                preferences,
                                and
                                needs. The information collected is anonymous and does not allow your identification
                                as
                                an
                                individual. Indeed, cookie-related information cannot be associated with a name
                                and/or
                                first
                                name because it does not contain personal data. Cookies are managed by your internet
                                browser. The use of cookies requires your prior and explicit consent. You can always
                                review
                                and refuse these cookies and/or delete them at any time by modifying your browser
                                settings.</span>
                            <span class="content-nl">Een cookie is een tekstbestand dat wordt geplaatst op de harde
                                schijf
                                van uw computer, mobiele apparaat of tablet tijdens het bezoeken van een website of
                                het
                                bekijken van een advertentie. Het heeft tot doel informatie te verzamelen over uw
                                surfgedrag
                                en u diensten aan te bieden die zijn afgestemd op uw apparaat. De cookie bevat een
                                unieke
                                code waarmee de website of zijn partners uw browser kunnen herkennen tijdens uw
                                bezoek
                                of
                                bij toekomstige herhaalde bezoeken. Cookies kunnen worden geplaatst door de server
                                van
                                de
                                bezochte website of door partners waarmee de website samenwerkt. De server van een
                                website
                                kan alleen de cookies lezen die hij zelf heeft geplaatst en heeft geen toegang tot
                                andere
                                informatie op uw computer of mobiele apparaat. Cookies vergemakkelijken over het
                                algemeen
                                een soepelere en snellere interactie tussen de bezoeker en de website. Ze onthouden
                                uw
                                voorkeuren (zoals de gekozen taal of leesformaat) en stellen u in staat om uw
                                toekomstige
                                toegang tot de site te versnellen en uw bezoeken te vergemakkelijken. Ze helpen u
                                ook om
                                te
                                navigeren tussen verschillende delen van de website. Cookies kunnen ook worden
                                gebruikt
                                om
                                de inhoud van een website of de weergegeven advertentie meer op maat te maken voor
                                de
                                keuzes, persoonlijke voorkeuren en behoeften van de bezoeker. De verzamelde
                                informatie
                                is
                                anoniem en maakt uw identificatie als persoon niet mogelijk. Informatie die verband
                                houdt
                                met cookies kan immers niet worden gekoppeld aan een naam en/of voornaam omdat deze
                                geen
                                persoonlijke gegevens bevatten. Cookies worden beheerd door uw internetbrowser. Het
                                gebruik
                                van cookies vereist uw voorafgaande en expliciete toestemming. U kunt deze cookies
                                altijd
                                bekijken en weigeren en/of op elk moment verwijderen door uw browserinstellingen aan
                                te
                                passen.</span>
                            <span class="content-de">Ein Cookie ist eine Textdatei, die auf der Festplatte Ihres
                                Computers,
                                Mobilgeräts oder Tablets abgelegt wird, wenn Sie eine Website besuchen oder eine
                                Anzeige
                                anzeigen. Der Cookie sammelt Informationen über Ihr Surfverhalten und bietet Ihnen
                                services,
                                die auf Ihr Gerät abgestimmt sind. Der Cookie enthält einen eindeutigen Code, mit
                                dem
                                die
                                Website oder ihre Partner Ihren Browser während Ihres Besuchs oder bei zukünftigen
                                wiederholten Besuchen erkennen können. Cookies können vom Server der besuchten
                                Website
                                oder
                                von Partnern, die mit der Website zusammenarbeiten, platziert werden. Der Server
                                einer
                                Website kann nur die Cookies lesen, die er selbst platziert hat, und hat keinen
                                Zugriff
                                auf
                                andere Informationen auf Ihrem Computer oder Mobilgerät. Cookies erleichtern im
                                Allgemeinen
                                eine reibungslosere und schnellere Interaktion zwischen dem Besucher und der
                                Website.
                                Sie
                                erinnern sich an Ihre Einstellungen (wie die gewählte Sprache oder das Leseformat)
                                und
                                ermöglichen es Ihnen, Ihren zukünftigen Zugriff auf die Website zu beschleunigen und
                                Ihre
                                Besuche zu erleichtern. Sie helfen Ihnen auch bei der Navigation zwischen
                                verschiedenen
                                Teilen der Website. Cookies können auch verwendet werden, um den Inhalt einer
                                Website
                                oder
                                die angezeigte Anzeige an die Auswahl, persönlichen Vorlieben und Bedürfnisse des
                                Besuchers
                                anzupassen. Die gesammelten Informationen sind anonym und ermöglichen keine
                                Identifizierung
                                Ihrer Person. Tatsächlich können cookiebezogene Informationen nicht mit einem Namen
                                und/oder
                                Vornamen verknüpft werden, da sie keine personenbezogenen Daten enthalten. Cookies
                                werden
                                von Ihrem Internetbrowser verwaltet. Die Verwendung von Cookies erfordert Ihre
                                vorherige
                                und
                                ausdrückliche Zustimmung. Sie können diese Cookies jederzeit überprüfen und ablehnen
                                und/oder löschen, indem Sie Ihre Browsereinstellungen anpassen.</span>
                        </p>

                        <p class="text-left text-white text-l py-5">
                            <span class="content-fr">La plupart des navigateurs internet sont automatiquement
                                configurés
                                pour accepter les cookies. Cependant, vous pouvez configurer votre navigateur afin
                                d'accepter ou de bloquer les cookies.</span>
                            <span class="content-en">Most internet browsers are automatically configured to accept
                                cookies.
                                However, you can configure your browser to accept or block cookies.</span>
                            <span class="content-nl">De meeste internetbrowsers zijn automatisch geconfigureerd om
                                cookies
                                te accepteren. U kunt uw browser echter zo configureren dat cookies worden
                                geaccepteerd
                                of
                                geblokkeerd.</span>
                            <span class="content-de">Die meisten Internetbrowser sind standardmäßig so eingestellt,
                                dass
                                sie Cookies akzeptieren. Sie können Ihren Browser jedoch so konfigurieren, dass
                                Cookies
                                akzeptiert oder blockiert werden.</span>
                        </p>
                        <p class="text-left text-white text-l py-5">
                            <span class="content-fr">Je ne peux cependant vous garantir l'accès à tous les services
                                de
                                mon
                                site internet en cas de refus d'enregistrement de cookies.</span>
                            <span class="content-en">However, I cannot guarantee access to all services on my
                                website
                                if
                                you refuse to accept cookies.</span>
                            <span class="content-nl">Ik kan echter geen garantie geven voor toegang tot alle
                                services
                                op
                                mijn website als u weigert cookies te accepteren.</span>
                            <span class="content-de">Ich kann jedoch keinen Zugriff auf alle Dienste auf meiner
                                Website
                                garantieren, wenn Sie die Annahme von Cookies ablehnen.</span>
                        </p>
                        <x-secondary-button x-on:click="$dispatch('close')"
                            class='font-display text-black bg-yellow-300 hover:bg-yellow-500 focus:bg-yellow-500 active:bg-yellow-500 px-3 py-3
                        focus:ring-2 focus:ring-yellow-100 focus:ring-offset-2 col-span-1'>
                            {{ __('OK') }}
                        </x-secondary-button>
                    </div>
                </x-modal>
            </div>

            <div class="grid sm:grid-cols-3 place-items-center py-5 text-2xl">
                <a target='_blank' href="https://twitter.com/imSepara" class="rounded-full sm:hover:animate-ping">
                    <x-bi-twitter class="w-10 h-10 text-yellow-300" />
                </a>

                <a target='_blank' href='https://github.com/SeparaLeVrai' class="rounded-full sm:hover:animate-ping">
                    <x-bi-github class="w-10 h-10 text-yellow-300" />
                </a>

                <p class='grid grid-cols-1 place-items-center'>
                    <x-feathericon-mail class="w-10 h-10 text-yellow-300" />
                    <span class="text-yellow-300 font-display">nicolas.carre@ifosup.wavre.be</span>
                </p>
            </div>
        </footer>

        {{-- <script>
            import Vue from "vue";
            import ToTheTop from '../../../js/ToTheTop.vue';
            new Vue({
                el: "#ttt",
                components: {
                    ToTheTop,
                },
            });
        </script> --}}
    </div>
</body>


</html>

<style>
    /* Styles pour le modal */
    .modal {
        display: none;
        position: fixed;
        z-index: 9999;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .modal-content {
        text-align: center;
    }

    .modal-overlay {
        display: none;
        position: fixed;
        z-index: 9998;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
    }

    a.active {
        color: goldenrod;
    }

    .slider-wrapper {
        margin: 1rem;
        position: relative;
        overflow: hidden;
        width: 100vh;
        border: goldenrod 2px ridge;
        border-radius: 4em;
    }

    .slides-container {
        height: calc(100vh - 2rem);
        width: 100%;
        display: flex;
        list-style: none;
        margin: 0;
        padding: 0;
        overflow: scroll;
        scroll-behavior: smooth;
        filter: grayscale(100%);
    }

    .slide {
        width: 100%;
        height: 100%;
        flex: 1 0 100%;
    }

    .slides-container img {
        object-fit: cover;
        width: 100%;
        height: 100%;
    }

    .slides-container::-webkit-scrollbar {
        width: 0;
        height: 0;
    }



    .back-to-top {
        display: none;
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 50px;
        height: 50px;
        background-color: #e3dc16;
        color: #303047;
        text-align: center;
        line-height: 50px;
        font-size: 18px;
        cursor: pointer;
        border-radius: 100%;
        z-index: 9999;

    }
</style>

<script>
    // Récupérer les éléments de contenu
    const contentFr = document.querySelectorAll('.content-fr');
    const contentEn = document.querySelectorAll('.content-en');
    const contentNl = document.querySelectorAll('.content-nl');
    const contentDe = document.querySelectorAll('.content-de');

    // Récupérer les boutons de la navigation
    const btnFr = document.getElementById('btn-fr');
    const btnEn = document.getElementById('btn-en');
    const btnNl = document.getElementById('btn-nl');
    const btnDe = document.getElementById('btn-de');

    // Fonction pour définir la langue sélectionnée
    function setLangue(langue) {
        // Cacher tous les éléments de contenu
        contentFr.forEach(element => element.style.display = 'none');
        contentEn.forEach(element => element.style.display = 'none');
        contentNl.forEach(element => element.style.display = 'none');
        contentDe.forEach(element => element.style.display = 'none');

        // Afficher le contenu dans la langue sélectionnée
        if (langue === 'fr') {
            contentFr.forEach(element => element.style.display = 'inline');
        } else if (langue === 'en') {
            contentEn.forEach(element => element.style.display = 'inline');
        } else if (langue === 'nl') {
            contentNl.forEach(element => element.style.display = 'inline');
        } else if (langue === 'de') {
            contentDe.forEach(element => element.style.display = 'inline');
        }


        // COOKIES ----------------------------------------------


        // Enregistrer la langue sélectionnée dans un cookie
        document.cookie = `langue=${langue}; expires=Fri, 31 Dec 9999 23:59:59 GMT`;
    }

    // Fonction pour obtenir la valeur d'un cookie par son nom
    function getCookie(name) {
        const cookies = document.cookie.split(';');
        for (let i = 0; i < cookies.length; i++) {
            const cookie = cookies[i].trim();
            if (cookie.startsWith(name + '=')) {
                return cookie.substring(name.length + 1);
            }
        }
        return null;
    }

    // Récupérer la langue sélectionnée dans le cookie (si existant)
    const langueSelectionnee = getCookie('langue');

    // Gestionnaires d'événements pour les boutons de la navigation
    btnFr.addEventListener('click', function() {
        setLangue('fr');
    });

    btnEn.addEventListener('click', function() {
        setLangue('en');
    });

    btnNl.addEventListener('click', function() {
        setLangue('nl');
    });

    btnDe.addEventListener('click', function() {
        setLangue('de');
    });

    // Restaurer la langue sélectionnée lors du chargement de la page
    if (langueSelectionnee) {
        setLangue(langueSelectionnee);
    } else {
        // Par défaut, afficher le contenu en français
        setLangue('fr');
    }

    // Récupérer les éléments du modal
    const modal = document.getElementById('cookieModal');
    const modalOverlay = document.getElementById('modalOverlay');
    const closeModalBtn = document.getElementById('closeModalBtn');

    // Fonction pour ouvrir le modal
    function openModal() {
        modal.style.display = 'block';
        modalOverlay.style.display = 'block';
    }

    // Fonction pour fermer le modal
    function closeModal() {
        modal.style.display = 'none';
        modalOverlay.style.display = 'none';
        // Stocker un cookie indiquant que le modal a déjà été affiché
        document.cookie = 'cookieModalShown=true; path=/';
    }

    // Vérifier si le cookie existe
    function checkCookie() {
        const cookies = document.cookie.split(';');
        for (let i = 0; i < cookies.length; i++) {
            const cookie = cookies[i].trim();
            if (cookie.indexOf('cookieModalShown=') === 0) {
                // Si le cookie existe, ne pas afficher le modal
                return;
            }
        }
        // Si le cookie n'existe pas, ouvrir le modal
        openModal();
    }

    // Gestionnaire d'événement pour fermer le modal
    closeModalBtn.addEventListener('click', closeModal);
    modalOverlay.addEventListener('click', closeModal);

    // Exécuter la vérification du cookie au chargement de la page
    checkCookie();


    document.addEventListener('DOMContentLoaded', function() {
        var nav = document.querySelector('.firstNav');

        window.addEventListener('scroll', function() {
            var scrollTop = window.pageYOffset;

            if (scrollTop > 0) {
                nav.classList.add('bg-slate-900');
                nav.classList.remove('bg-transparent');
            } else {
                nav.classList.remove('bg-slate-900');
                nav.classList.add('bg-transparent');
            }
        });

        // Ajouter une classe pour activer la transition
        nav.classList.add('transition-colors', 'duration-300', 'ease-in-out');
    });



    window.addEventListener('scroll', function() {
        var backToTopBtn = document.getElementById('backToTopBtn');
        if (window.pageYOffset > 100) {
            backToTopBtn.style.display = 'block';
        } else {
            backToTopBtn.style.display = 'none';
        }
    });

    document.getElementById('backToTopBtn').addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
</script>
