<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500"/>
            </a>
        </x-slot>
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <h1 class="text-xl md:text-2xl font-bold leading-tight mt-12 mb-3">{{ trans('auth.register_title') }}</h1>

            <div>
                <x-label for="name" :value="trans('auth.name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

             <div>
                <x-label for="surname" :value="trans('auth.surname')" />

                <x-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="old('surname')" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="email" :value="trans('auth.email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-label for="document" :value="trans('auth.document')" />

                <x-input id="document" class="block mt-1 w-full" type="text" name="document" :value="old('document')" required />
            </div>

            <div class="mt-4">
                <x-label for="phone" :value="trans('auth.phone')" />

                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required />
            </div>

            <div class="mt-4">
                <x-label for="password" :value="trans('auth.field_password')" />

                <x-input id="password" class="block mt-1 w-full"
                         type="password"
                         name="password"
                         required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" :value="trans('auth.password_confirmation')" />
                <x-input id="password_confirmation" class="block mt-1 w-full"
                         type="password"
                         name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="w-full block bg-purple-500 hover:bg-purple-400 focus:bg-purple-400 text-white font-semibold rounded-lg px-4 py-3"> {{ trans('auth.register') }}</button>
            </div>
            <div class="mt-4 text-center">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ trans('auth.already_register') }}
                </a>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
