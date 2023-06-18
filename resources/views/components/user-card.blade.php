<a href="{{ route('users.profile', ['pseudo' => $user->pseudo]) }}"
    class='border-4 @if ($user->niveau_id === 2) border-yellow-300
@else
    border-red-700 @endif rounded-full'>
    @if ($user->avatar)
        <img src='{{ asset($user->avatar) }}' width='100' height='100' class='rounded-full' />
    @else
        <p class="text-white p-10 font-xl font-display">{{ $user->pseudo }}</p>
    @endif
</a>
