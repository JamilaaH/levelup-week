<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Détails') }}
        </h2>
    </x-slot>
    <div class="px-20 ">
        <div class="m-10 bg-white rounded-lg shadow-md">
            <div class="p-3">
                <span class="text-2xl font-bold text-gray-700 hover:underline">{{$note->titre}}</span>
                <p>{!!$note->post!!}</p>
                
            </div>

        </div>
    </div>

</x-app-layout>
