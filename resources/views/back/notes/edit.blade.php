<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier la note') }}
        </h2>
    </x-slot>
    @php
        $route =  Route::currentRouteName();
    @endphp
    <div class="lg:px-20">
        <form action="{{$route == "edit.note" ? route('update.note', $note->id) : route('update.share', $note->id)  }}" method="post"  class="my-5">
            @csrf
            @method('PUT')
            <div class="sm:flex pt-5">
                {{-- titre --}}
                <div class="w-full sm:w-2/4 sm:pt-0 py-5 sm:pr-5">
                    <label for="nom" class="font-semibold text-gray-700 block pb-1">Titre</label>
                    <div class="flex">
                        <input  id="titre"  name="titre"  value="{{$note->titre}}"  class="bg-gray-50 border-1  rounded-r px-4 py-2 w-full" type="text"/>
                    </div>
                    @error('titre')
                    <span class="feedback-invalid text-xs  text-red-700">{{$message}}</span>
                    @enderror
    
                </div>
                <div class="w-full sm:w-2/4 sm:pt-0 py-5 sm:pr-5">
                    <label for="nom" class="font-semibold text-gray-700 block pb-1">Tag</label>
                    <select name="tag" id="tag" class="bg-gray-50 border-1  rounded-r px-4 py-2 w-full"> 
                        <option value="" disabled selected>Sélectionner un tag</option>
                        @foreach ($tags as $tag)
                            <option value="{{$tag->id}}" {{$note->tags->first()->id == $tag->id? 'selected':''  }}>{{$tag->nom}}</option>
                        @endforeach
                    </select>
                    @error('tag')
                    <span class="feedback-invalid text-xs  text-red-700">{{$message}}</span>
                    @enderror
    
                </div>
            </div>
    
            <textarea cols="80" class="ckeditor" id="editeur" name="editeur" rows="10">
                {{$note->post}}
            </textarea>
            @error('editeur')
            <span class="feedback-invalid text-xs  text-red-700">{{$message}}</span>
            @enderror
            <div class="text-right mt-10">
                <button class="text-rigth bg-white text-gray-800 font-bold rounded border-b-2 border-green-500 hover:border-green-500 hover:bg-green-400 hover:text-white shadow-md py-2 px-6 inline-flex items-center">Valider</button>
            </div>
    
        </form>
    </div>

</x-app-layout>
