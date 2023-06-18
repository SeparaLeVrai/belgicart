<x-guest-layout>
    <div class='py-10 text-center'>
        <h1 class="font-title not-italic font-bold text-yellow-300 text-8xl py-10">
            <span class="content-fr">Nos membres</span>
            <span class="content-en">Our Members</span>
            <span class="content-nl">Onze Leden</span>
            <span class="content-de">Unsere Mitglieder</span>
        </h1>
        <ul class="grid sm:grid-cols-3 gap-4 place-items-center">
            @foreach ($users as $user)
                <x-user-card :user="$user" />
            @endforeach
        </ul>
    </div>
</x-guest-layout>
