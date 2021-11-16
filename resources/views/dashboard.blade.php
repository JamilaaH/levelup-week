<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mes notes') }}
        </h2>
        <span  x-data="{ simple : false }">
            @empty(Auth::user()->tags)
                créer d'abord un tag
                <a href="{{route('create.tag')}}">tag</a>
            @endempty
            @if (!empty(Auth::user()->tags))
                    <!-- Button -->
                    <button @click="simple = !simple" class="bg-blue-400 text-white font-bold px-4 py-2 text-sm uppercase rounded tracking-wider focus:outline-none hover:bg-blue-500">Mes Tags</button>
            
                    @include('partials.modal.tag')
                <button class="px-4 py-2 rounded-md text-sm font-medium border-b-2 focus:outline-none focus:ring transition text-white bg-purple-500 border-purple-800 hover:bg-purple-600 active:bg-purple-700 focus:ring-purple-300">Ajouter une note</button>
            @endif
        </span>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <table class="min-w-full border-collapse block md:table">
                <thead class="block md:table-header-group">
                    <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                        <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Notes</th>
                        <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Likes</th>
                        <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell"></th>
                    </tr>
                </thead>
                <tbody class="block md:table-row-group">
                    @forelse (Auth::user()->notes as $note)
                        <tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-2/3  ">{{$note->post}}</span> </td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-2/3  ">{{(count($note->likes) > 0 )? count($note->likes) : '0'  }} J'aime</span></td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell ">
                                <span class="inline-block 1/3">
                                    <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">edit</button>
                                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">del</button>
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">share</button>
                                </span>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td>
                            Vous n'avez pas encore écrit de notes
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>        
        </div>
    </div>
</x-app-layout>
