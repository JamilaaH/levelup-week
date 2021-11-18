@php
    $users = App\Models\User::all()->where('id', "!=" , Auth::user()->id);
@endphp
<!-- Modal Background -->
<div x-show="share"
    class="fixed text-gray-500 flex items-center justify-center overflow-auto z-50 bg-black bg-opacity-40 left-0 right-0 top-0 bottom-0"
    x-transition:enter="transition ease duration-300" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition ease duration-300"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
    <!-- Modal -->
    <div x-show="share" class="bg-white rounded-xl shadow-2xl p-6 sm:w-6/12 mx-10" @click.away="share = false"
        x-transition:enter="transition ease duration-100 transform"
        x-transition:enter-start="opacity-0 scale-90 translate-y-1"
        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
        x-transition:leave="transition ease duration-100 transform"
        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
        x-transition:leave-end="opacity-0 scale-90 translate-y-1">
        <!-- Title -->
        <span class="font-bold block text-2xl mb-3">A qui voulez-vous envoyer ?</span>
            <form action="{{route('share',$note->id )}}" method="post">
                @csrf
                <select name="share" id="share" class="bg-gray-50 border-1  rounded-r px-4 py-2 w-full">
                    <option value="">Sélectionnez une personne</option>
                    @foreach ($users as $user)
                        <option value="{{$user->id}}">{{ucfirst($user->prenom)}} {{ucfirst($user->nom)}}</option>
                    @endforeach
                </select>
                <button type="submit"
                class="bg-green-600 text-white font-bold px-4 py-2 text-sm uppercase rounded tracking-wider focus:outline-none hover:bg-green-700 mt-3 mb-3 my-3">Envoyer</button>

            </form>
            <!-- Buttons -->
            <div class="text-right space-x-5 mt-5">
                <button @click="share = !share"
                    class="bg-red-600 text-white font-bold px-4 py-2 text-sm uppercase rounded tracking-wider focus:outline-none hover:bg-red-700 mt-3 mb-3 my-3">Cancel</button>
            </div>
    </div>
</div>
