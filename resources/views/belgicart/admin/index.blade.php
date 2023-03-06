<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <h1>
                        Liste des utilisateurs
                    </h1>

                    <div class="mt-6 text-gray-500">
                        <table class="table-auto w-full">
                            <thead>
                                <tr class="uppercase text-left">
                                    <th class="px-4 py-2 border">Avatar</th>
                                    <th class="px-4 py-2 border">Pseudo</th>
                                    <th class="px-4 py-2 border">Email</th>
                                    <th class="px-4 py-2 border">Pays de résidence</th>
                                    <th class="px-4 py-2 border">Niveau</th>
                                    <th class="px-4 py-2 border">Dernière modification</th>
                                    {{-- <th class="px-4 py-2 border">Actions</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="hover:bg-gray-50 odd:bg-gray-100 hover:odd:bg-gray-200 transition">
                                        <td class="border px-4 py-2">
                                            <img src='{{ asset($user->avatar) }}'</td>
                                        <td class="border px-4 py-2">
                                            {{ $user->pseudo }}</td>
                                        <td class="border px-4 py-2">
                                            {{ $user->email }}</td>
                                        <td class="border px-4 py-2">
                                            {{ $user->pays->pays }}</td>
                                        {{-- <td class="border px-4 py-2">
                                            {{ $user->niveau->grade }}</td> --}}
                                        <td class="border px-4 py-2">
                                            {{ $user->updated_at->diffForHumans() }}</td>
                                        {{-- <td class="border px-4 py-2 space-x-4">
                                            <a href="{{ route('articles.edit', $article->id) }}"
                                                class="text-blue-400">Edit</a>
                                            <form action="{{ route('articles.destroy', $article->id) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-400">Delete</button>
                                            </form>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
