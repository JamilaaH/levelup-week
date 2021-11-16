@extends('layouts.index')

@section('content')

    <div class="px-6 py-8">
        <div class="container flex justify-between mx-auto">
            <div class="w-full lg:w-8/12">
                <div class="flex items-center">
                    <h1 class="text-xl font-bold text-gray-700 md:text-2xl">Les notes</h1>
                </div>
                @forelse ($notes as $note)
                    <div class="mt-6">
                        <div class="max-w-4xl px-10 py-6 mx-auto bg-white rounded-lg shadow-md">
                            <div class="flex items-center justify-between"><span class="font-light text-gray-600">Jun 1,
                                    2020</span>
                                    @foreach ($note->tags as $tag)
                                    <span  class="badge bg-success">{{$tag->nom}}</span>
                                    @endforeach
    
                            </div>
                            <div class="mt-2">
                                <p class="mt-2 text-gray-600">{{$note->post}}</p>
                            </div>
                            <div class="flex items-center justify-around mt-4"><a href="#"
                                    class="text-green-500 hover:underline">Read more</a>
                                    @auth
                                    <a class="btn btn-primary mx-2"> 
                                        like
                                    </a>
                                    
                                @endauth
                                @if (count($note->likes) > 0 )
                                    <span>
                                        <i class="bi bi-heart-fill text-danger"></i> {{count($note->likes)}} J'aime
                                    </span>
                                @endif
    
                                <div><a href="#" class="flex items-center">
                                        <h1 class="font-bold text-gray-700 hover:underline">{{$note->user->prenom}} {{$note->user->nom }}</h1>
                                    </a></div>
                            </div>
                        </div>
                    </div>
    
                @empty 
                    <p>pas de notes disponibles</p>
                @endforelse
    
                {{-- pagination --}}
                {{-- <div class="mt-8">
                    <div class="flex">
                        <a href="#" class="px-3 py-2 mx-1 font-medium text-gray-500 bg-white rounded-md cursor-not-allowed">
                            previous
                        </a>
                    
                        <a href="#" class="px-3 py-2 mx-1 font-medium text-gray-700 bg-white rounded-md hover:bg-blue-500 hover:text-white">
                            1
                        </a>
                    
                        <a href="#" class="px-3 py-2 mx-1 font-medium text-gray-700 bg-white rounded-md hover:bg-blue-500 hover:text-white">
                            2
                        </a>
                    
                        <a href="#" class="px-3 py-2 mx-1 font-medium text-gray-700 bg-white rounded-md hover:bg-blue-500 hover:text-white">
                            3
                        </a>
                    
                        <a href="#" class="px-3 py-2 mx-1 font-medium text-gray-700 bg-white rounded-md hover:bg-blue-500 hover:text-white">
                            Next
                        </a>
                    </div>
                </div> --}}
            </div>
            @include('partials.tag')
        </div>
    </div>

@endsection