<div class="hidden w-4/12 -mx-8 lg:block">
    <div class="px-8 mt-10">
        <h1 class="mb-4 text-xl font-bold text-gray-700">Tag</h1>
        <div class="flex flex-col max-w-sm px-4 py-6 mx-auto bg-white rounded-lg shadow-md">
            <ul>
                @forelse ($tags as $tag)
                        <li><a href="#" class="mx-1 font-bold text-gray-700 hover:text-gray-600 hover:underline">-
                        {{ ucfirst($tag->nom) }}</a></li>
                @empty
                            <li>Pas de tag </li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
