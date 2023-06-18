<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white mt-5 overflow-hidden shadow-xl sm:rounded-lg">
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
                                    <th class="px-4 py-2 border">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="hover:bg-gray-50 odd:bg-gray-100 hover:odd:bg-gray-200 transition">
                                        <td class="border px-4 py-2">
                                            @if ($user->avatar)
                                                <img src='{{ asset($user->avatar) }}' width="100" height="100">
                                            @else
                                            @endif
                                        </td>
                                        <td class="border px-4 py-2">
                                            {{ $user->pseudo }}</td>
                                        <td class="border px-4 py-2">
                                            {{ $user->email }}</td>
                                        <td class="border px-4 py-2">
                                            {{ $user->pays->paysFr }}</td>
                                        <td class="border px-4 py-2">
                                            {{ $user->niveaux->niveau }}</td>
                                        <td class="border px-4 py-2">
                                            {{ $user->updated_at->diffForHumans() }}</td>
                                        <td class="border px-4 py-2 space-x-4">
                                            {{-- @can('delete', $user) --}}
                                            @if ($user->niveau_id === 2)
                                                <a href="{{ route('users.destroy', $user->id) }}"
                                                    onclick="event.preventDefault(); document.getElementById('delete-user-form-{{ $user->id }}').submit();">
                                                    <x-zondicon-trash
                                                        class="p-4 bg-red-600 text-white rounded-md
                                                    hover:text-red-600 hover:bg-white hover:border-4 border-red-600" />
                                                </a>
                                            @endif
                                            <form id="delete-user-form-{{ $user->id }}"
                                                action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            {{-- @endcan --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <h1>Ajout de questions</h1>
                    <form method="POST" action="{{ url('questions-add') }}"
                        class="flex flex-col space-y-4 text-gray-500">

                        @csrf

                        <!-- Question -->
                        <div>
                            <x-input-label for="question" :value="__('Intitulé de la question')" />
                            <x-text-input id="question" class="block mt-1 w-full" type="text" name="question"
                                :value="old('question')" autofocus />
                            <x-input-error :messages="$errors->get('question')" class="mt-2" />
                        </div>

                        <!-- Bonne réponse -->
                        <div>
                            <x-input-label for="reponse1" :value="__('Bonne réponse')" />
                            <x-text-input id="reponse1" class="block mt-1 w-full" type="text" name="reponse1"
                                :value="old('reponse1')" autofocus />
                            <x-input-error :messages="$errors->get('reponse1')" class="mt-2" />
                        </div>

                        <!-- Mauvaise réponse -->
                        <div>
                            <x-input-label for="reponse2" :value="__('Mauvaise réponse')" />
                            <x-text-input id="reponse2" class="block mt-1 w-full" type="text" name="reponse2"
                                :value="old('reponse2')" autofocus />
                            <x-input-error :messages="$errors->get('reponse2')" class="mt-2" />
                        </div>

                        <!-- Catégorie -->
                        <x-input-label for="categorie" :value="__('Catégorie')" />
                        <select name="categorie_id" class="form-control">
                            @foreach ($categories as $categorie)
                                <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                            @endforeach
                        </select>

                        <!-- Difficulté -->
                        <x-input-label for="diff" :value="__('Difficulté')" />
                        <select name="difficulte_id" class="form-control">
                            @foreach ($difficultes as $difficulte)
                                <option value="{{ $difficulte->id }}">{{ $difficulte->level }}</option>
                            @endforeach
                        </select>

                        <div class="flex justify-end">
                            <x-primary-button type="submit">
                                {{ __('Créer') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>

                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <h1>Ajout d'images</h1>
                    <form method="POST" action="{{ url('img-add') }}" class="flex flex-col space-y-4 text-gray-500"
                        enctype="multipart/form-data">

                        @csrf

                        <x-input-label for="img" :value="__('Image')" />
                        <input id="img" name="img" type="file" class="mt-1 block w-full" required autofocus
                            autocomplete="img" wire:model="img" />
                        <x-input-error class="mt-2" :messages="$errors->get('img')" />
                        <div class="flex justify-end">
                            <x-primary-button type="submit">
                                {{ __('Insérer') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
