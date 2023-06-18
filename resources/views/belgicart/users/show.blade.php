<x-guest-layout>
    <div class='py-20 grid grid-cols-1'>
        <h1 class="font-title not-italic font-bold text-yellow-300 text-8xl">{{ $users->pseudo }}</h1>
        @if ($users->avatar)
            <img src='{{ asset($users->avatar) }}' width="100" height="100">
        @endif
        <p class="text-white font-xl font-display">Pays de résidence : {{ $users->pays->paysFr }}</p>
        <p class="text-white font-xl font-display">Date d'inscription : {{ $users->created_at->format('d-m-Y') }}</p>
        <p class="text-white font-xl font-display">Rôle : {{ $users->niveaux->niveau }}</p>
    </div>
</x-guest-layout>
