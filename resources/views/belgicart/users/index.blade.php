<x-guest-layout>
    <h1>Nos membres</h1>
    <ul>
        @foreach ($users as $user)
            <li class="@if ($user->niveau_id === 1) text-red-600 @endif"><a
                    href="{{ route('users.profile', ['pseudo' => $user->pseudo]) }}">
                    {{ $user->pseudo }}
                </a></li>
        @endforeach
    </ul>
</x-guest-layout>
