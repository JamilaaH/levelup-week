<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Détails') }}
            </h2>
            <div>
                <a href="{{route('edit.note', $note->id)}}" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">edit</a>

            </div>


        </div>
    </x-slot>
    <div class="px-20 ">
        <div class="m-10 bg-white rounded-lg shadow-md relative ">
            <form action="{{route('destroy.note', $note->id)}}" method="post" class="absolute right-0">
                @csrf
                @method('DELETE')
                <button type ="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"><i class="bi bi-trash-fill"></i></button>
            </form>

            <div class="p-5">
                <span class="text-2xl font-bold text-gray-700 hover:underline">{{$note->titre}}</span>
                <p>{!!$note->post!!}</p>
                
            </div>
            <div class="p-10">
                <span class="text-l font-bold text-gray-700 ">Ceux qui ont aimé</span>
                <ul class="ml-6">
                    @forelse ($meslikes as $pseudo)
                        <li> <i class="bi bi-hand-thumbs-up-fill"></i> {{ucfirst($pseudo->user->prenom)}} {{ucfirst($pseudo->user->nom)}}</li>
                    @empty
                        <li>Personne n'a aimé la note</li>
                    @endforelse

                </ul>

            </div>
            
        </div>
    </div>

</x-app-layout>
