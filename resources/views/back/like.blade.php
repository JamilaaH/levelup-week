<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notes aimées') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <table class="min-w-full border-collapse block md:table">
                <thead class="block md:table-header-group">
                    <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                        <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Notes</th>
                        <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Auteur</th>
                        <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell"></th>
                    </tr>
                </thead>
                <tbody class="block md:table-row-group">
                    
                    @forelse ($notes as $like)
                        <tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-2/3  ">{!!$like->note->post!!}</span> </td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-2/3  ">{{$like->note->user->prenom}}</span></td>
                            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell ">
                                <span class="inline-block 1/3">
                                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">del</button>
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>
                            
                                Pas de notes aimées
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>        
        </div>
    </div>
</x-app-layout>
