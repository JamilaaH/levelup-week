@if ($message = Session::get('success'))
    <div class="bg-green-100 border-t border-b border-green-500 text-green-700 px-4 py-1" role="alert">
        <p class="font-bold text-green-700">Message d'information</p>
        <p class="text-sm text-green-500">{{$message}}.</p>
    </div>

@endif

{{-- Message WARNING --}}
@if ($message = Session::get('warning'))
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
        <p class="font-bold text-red-700">Attention</p>
        <p class="text-red-500"> {{$message}}.</p>
    </div>
@endif