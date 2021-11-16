<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier le tag') }}
        </h2>

    </x-slot>
    <div class="py-12">
        <div class="container mx-auto max-w-md shadow-md hover:shadow-lg transition duration-300">
            <div class="py-12 p-10 bg-white rounded-xl">
                <form action="{{route('update.tag', $tag->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-6">
                        <label class="mr-4 text-gray-700 font-bold inline-block mb-2" for="name">Nom du tag</label>
                        <input type="text" name="nom" value="{{$tag->nom}}"
                            class="border bg-gray-100 py-2 px-4 w-96 outline-none focus:ring-2 focus:ring-indigo-400 rounded"
                            placeholder="Tag name" />
                    </div>
                    <button
                        class="w-full mt-6 text-indigo-50 font-bold bg-indigo-600 py-3 rounded-md hover:bg-indigo-500 transition duration-300" type="submit">Valider</button>
                </form>
            </div>
        </div>

    </div>
</x-app-layout>
