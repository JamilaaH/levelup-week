<!-- Modal Background -->
<div x-show="simple"
    class="fixed text-gray-500 flex items-center justify-center overflow-auto z-50 bg-black bg-opacity-40 left-0 right-0 top-0 bottom-0"
    x-transition:enter="transition ease duration-300" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition ease duration-300"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
    <!-- Modal -->
    <div x-show="simple" class="bg-white rounded-xl shadow-2xl p-6 sm:w-6/12 mx-10" @click.away="simple = false"
        x-transition:enter="transition ease duration-100 transform"
        x-transition:enter-start="opacity-0 scale-90 translate-y-1"
        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
        x-transition:leave="transition ease duration-100 transform"
        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
        x-transition:leave-end="opacity-0 scale-90 translate-y-1">
        <!-- Title -->
        <span class="font-bold block text-2xl mb-3">Mes tags</span>
        <table class="text-left w-full border-collapse">
            <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
            <thead>
                <tr>
                    <th
                        class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                        Nom</th>
                    <th
                        class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                        Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach (Auth::user()->tags as $tag)
                    <tr class="hover:bg-grey-lighter">
                        <td class="py-4 px-6 border-b border-grey-light">{{$tag->nom}}</td>
                        <td class="py-4 px-6 border-b border-grey-light">
                            <a href="{{route('edit.tag', $tag->id)}}"
                                class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark">Edit</a>
                            <form action="{{route('destroy.tag', $tag->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-blue hover:bg-blue-dark">Delete</button>
                            </form>
                        </td>
                    </tr>
                    
                @endforeach
            </tbody>
            </table>

            <!-- Buttons -->
            <div class="text-right space-x-5 mt-5">
                <a href="{{route('create.tag')}}" class="bg-green-600 text-white font-bold px-4 py-2 text-sm uppercase rounded tracking-wider focus:outline-none hover:bg-green-700 mt-3 mb-3 my-3">ajout</a>
                <button @click="simple = !simple"
                    class="bg-red-600 text-white font-bold px-4 py-2 text-sm uppercase rounded tracking-wider focus:outline-none hover:bg-red-700 mt-3 mb-3 my-3">Cancel</button>
            </div>
    </div>
</div>
