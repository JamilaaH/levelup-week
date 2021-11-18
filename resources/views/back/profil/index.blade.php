<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mon compte') }}
        </h2>
    </x-slot>

    <div class="container p-5 ">
        <div class="md:flex no-wrap md:-mx-2 ">
            <!-- Left Side -->
            <div class="w-full md:w-1/3 md:mx-2">
                <!-- Profile Card -->
                <div class="bg-white ml-6 p-3 border-t-4 border-green-400">
                    <div class="image overflow-hidden">
                    </div>
                    <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{ucfirst(Auth::user()->nom)}} {{ucfirst(Auth::user()->prenom)}}</h1>
                    <h3 class="text-gray-600 font-lg text-semibold leading-6">{{count(Auth::user()->notes) == 0 ? 'Pas de notes écrites' : count(Auth::user()->notes)." notes" }}  </h3>
                    <ul
                        class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                        <li class="flex items-center py-3">
                            <span>Role</span>
                            <span class="ml-auto"><span
                                    class="bg-green-500 py-1 px-2 rounded text-white text-sm">{{Auth::user()->role->nom}}</span></span>
                        </li>
                        <li class="flex items-center py-3">
                            <span>Member since</span>
                            <span class="ml-auto"> {{ date('d M Y', strtotime(Auth::user()->created_at)) }}</span>
                        </li>
                    </ul>
                </div>
                <!-- End of profile card -->
                <div class="my-4"></div>
            </div>
            <!-- Right Side -->
            <div class="w-full md:w-2/3 h-64">
                <!-- Profile tab -->
                <!-- About Section -->
                <div class="bg-white p-3 shadow-sm rounded-sm">
                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                        <span clas="text-green-500">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        <span class="tracking-wide">About</span>
                    </div>
                    <div class="text-gray-700">
                        <div class="grid md:grid-cols-2 text-sm">
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Prénom</div>
                                <div class="px-4 py-2">{{ucfirst(Auth::user()->prenom)}}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Nom</div>
                                <div class="px-4 py-2">{{ucfirst(Auth::user()->nom)}}</div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Genre</div>
                                @switch(Auth::user()->genre_id)
                                    @case(1)
                                        <div class="px-4 py-2">Femme</div>                                  
                                        @break
                                    @case(2)
                                        <div class="px-4 py-2">Homme</div>                                      
                                        @break
                                    @case(3)
                                        <div class="px-4 py-2">Autre </div>                                      
                                        @break
                                    @default
                                        
                                @endswitch
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Email.</div>
                                <div class="px-4 py-2">
                                    <a class="text-blue-800" href="mailto:jane@example.com">{{Auth::user()->email}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of about section -->

                <div class="my-4"></div>

                <!-- End of profile tab -->
            </div>
        </div>
    </div>

</x-app-layout>