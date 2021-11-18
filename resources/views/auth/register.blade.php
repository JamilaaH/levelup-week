<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="nom" :value="__('Nom')" />

                <x-input id="nom" class="block mt-1 w-full" type="text" name="nom" :value="old('nom')" required autofocus />
            </div>

            <!-- Prenom -->
            <div>
                <x-label for="prenom" :value="__('Prenom')" />

                <x-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required autofocus />
            </div>
            <!-- Genre -->
            <div class="mt-4">
                <x-label for="genre" :value="__('Genre')" />

                <select name="genre" id="genre" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option >{{$genre->nom}}</option>
                    @foreach ($genres as $genre)
                        <option value="{{$genre->id}}">{{$genre->nom}}</option>
                    @endforeach
                </select>
            </div>
            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
