<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- User Type Radio Buttons -->
        <div class="mt-4">
            <x-input-label for="usertype" :value="__('User Type')" />
            <div class="mt-2 space-y-2">
                <div>
                    <input type="radio" 
                           name="usertype" 
                           id="user" 
                           value="user" 
                           class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                           {{ old('usertype', 'user') === 'user' ? 'checked' : '' }}>
                    <label for="user" class="ml-2 text-sm text-gray-600">{{ __('Regular User') }}</label>
                </div>
                <div>
                    <input type="radio" 
                           name="usertype" 
                           id="admin" 
                           value="admin" 
                           class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                           {{ old('usertype') === 'admin' ? 'checked' : '' }}>
                    <label for="admin" class="ml-2 text-sm text-gray-600">{{ __('Admin') }}</label>
                </div>
            </div>
            <x-input-error :messages="$errors->get('usertype')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>