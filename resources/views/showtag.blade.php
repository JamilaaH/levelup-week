@extends('layouts.index')

@section('content')
@auth
    @php
        $likes = Auth::user()->likes;
    @endphp
    
@endauth
    <div class="px-6 py-8">
        <div class="container flex justify-between mx-auto">
            <div class="w-full lg:w-8/12">
                <div class="flex items-center">
                    <h1 class="text-xl font-bold text-gray-700 md:text-2xl">Voir plus "{{$untag->nom}}"</h1>
                </div>
                @forelse ($notes as $note)
                    <div class="mt-6 relative">
                        <div class="max-w-4xl px-10 py-6 mx-auto bg-white rounded-lg shadow-md">
                            <div class="flex items-center justify-between"><span class="font-light text-gray-600"> {{ date('d M Y', strtotime($note->created_at)) }}</span>
                                @foreach ($note->note->tags as $tag)
                                    <span class="badge bg-success">{{ $tag->nom }}</span>
                                @endforeach

                            </div>
                            <div class="mt-2">
                                <span class="text-2xl font-bold text-gray-700 hover:underline">{{ $note->note->titre }}</span>
                                <p class="mt-2 text-gray-600">{!! $note->note->post !!}</p>
                            </div>
                            <div class="flex items-center justify-around mt-4"><a href="#"
                                    class="text-green-500 hover:underline">Read more</a>
                                @auth
                                    @if(!$likes->contains("note_id", $note->note->id))
                                        <form action="{{route('like', $note->note->id)}}" method="post">
                                            @csrf
                                            <button type="submit"> <i class="bi bi-suit-heart"></i> J'aime </button>
                                        </form>
                                    @elseif($likes->contains("note_id", $note->note->id))
                                        <form action="{{route('dislike', $note->note->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"> <i class="bi bi-suit-heart-fill text-danger"></i> Je n'aime plus </button>
                                        </form>

                                    @endif
                                @endauth

                                <div><a href="#" class="flex items-center">
                                        <h1 class="font-bold text-gray-700 hover:underline">{{ ucfirst($note->note->user->prenom) }}
                                            {{ ucfirst($note->note->user->nom) }}</h1>
                                    </a></div>
                            </div>
                            <div class="absolute bottom-2 right-14">
                                @if ($note->note->likes > 0)
                                <span>
                                    <i class="bi bi-heart-fill text-danger"></i> {{ $note->note->likes }} J'aime
                                </span>
                            @endif
    
                            </div>
                        </div>
                    </div>

                @empty
                    <p>pas de notes disponibles</p>
                @endforelse

            </div>
            @include('partials.tag')
        </div>
    </div>

@endsection
