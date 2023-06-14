<x-guest-layout>
    @if ($users->avatar)
        <img src='{{ asset($users->avatar) }}' width="100" height="100">
    @endif
    <h1>{{ $users->pseudo }}</h1>
    <p>Pays de résidence : {{ $users->pays->pays }}</p>
</x-guest-layout>
