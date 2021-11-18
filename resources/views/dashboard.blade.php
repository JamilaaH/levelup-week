<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mes notes') }}
        </h2>
        <span x-data="{ simple : false }">
            @if (Auth::user()->tags->isEmpty())
                créer d'abord un tag
                <a href="{{ route('create.tag') }}"
                    class="bg-blue-400 text-white font-bold px-2 py-1 text-sm uppercase rounded tracking-wider focus:outline-none hover:bg-blue-500">+</a>
            @endempty
            @if (Auth::user()->tags->isNotEmpty())
                <!-- Button -->
                <button @click="simple = !simple"
                    class="bg-blue-400 text-white font-bold px-4 py-2 text-sm uppercase rounded tracking-wider focus:outline-none hover:bg-blue-500">Mes
                    Tags</button>

                @include('partials.modal.tag')
                <a class="px-4 py-2 rounded-md text-sm font-medium border-b-2 focus:outline-none focus:ring transition text-white bg-purple-500 border-purple-800 hover:bg-purple-600 active:bg-purple-700 focus:ring-purple-300"
                    href="{{ route('create.note') }}">Ajouter une note</a>
            @endif
    </span>
</x-slot>
<div class="lg:py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @include('layouts.flash')
        <table class="min-w-full border-collapse block md:table">
            <thead class="block md:table-header-group">
                <tr
                    class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                    <th
                        class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                        Notes</th>
                    <th
                        class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                        Likes</th>
                    <th
                        class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    </th>
                </tr>
            </thead>
            <tbody class="block md:table-row-group">
                @forelse (Auth::user()->notes as $note)
                    <tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                class="inline-block w-2/3  ">
                                <p class="text-l font-bold text-gray-700">{{ ucfirst($note->titre) }}</p>
                                {!! substr($note->post, 0, 200) !!} {{ strlen($note->post) > 200 ? '...' : '' }}
                            </span> </td>
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                class="inline-block w-1/3  ">{{ $note->likes > 0 ? $note->likes : '0' }}
                                <i class="bi bi-heart-fill text-red-500 text-sm"></i> </span></td>
                        <td x-data="{ share : false }" class="p-2 md:border md:border-grey-500 text-left block md:table-cell w-1/3 flex">
                            <a href="{{ route('edit.note', $note->id) }}"
                                class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">edit</a>
                            <a href="{{ route('show.note', $note->id) }}"
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">show</a>
                            <!-- Button -->
                            <button @click="share = !share"
                                class="bg-blue-500 text-white font-bold px-4 py-2 rounded tracking-wider focus:outline-none hover:bg-blue-500">share</button>
                                @include('partials.modal.share')
                            <form action="{{ route('destroy.note', $note->id) }}" method="post"
                                class="mt-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class=" text-red-700 font-italic">delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="bg-gray-300 " colspan="3">
                            <div class="flex content-center justify-items-center flex-col pb-3">
                                <span>Vous n'avez pas encore écrit de notes</span>
                                <img src="{{asset('img/empty.svg')}}" alt="" class="w-60 h-60 mx-auto">

                            </div>

                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
</x-app-layout>
