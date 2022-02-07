<x-guest-layout>
    <x-auth-card>
        <div class="w-20 h-20">
        <x-slot name="logo">
                <x-application-logo/>
        </x-slot>
        </div>
        <x-auth-session-status class="mb-4" :status="session('status')"/>
        <x-auth-validation-errors class="mb-4" :errors="$errors"/>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h1 class="text-xl md:text-2xl font-bold leading-tight mt-12 mb-3">{{ trans('auth.login_title') }}</h1>

            <form class="mt-6" action="#" method="POST">
                <div>
                    <x-label for="email" :value="trans('auth.email')"/>
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                             required autofocus/>
                </div>

                <div class="mt-4">
                    <div class="mt-4">
                        <x-label for="password" :value="trans('auth.field_password')"/>

                        <x-input id="password" class="block mt-1 w-full"
                                 type="password"
                                 name="password"
                                 required autocomplete="current-password"/>
                    </div>
                </div>

                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                               class="rounded border-gray-300 text-purple-600 shadow-sm focus:border-purple-300 focus:ring focus:ring-purple-200 focus:ring-opacity-50"
                               name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ trans('auth.remember') }}</span>
                    </label>
                </div>

                @if (Route::has('password.request'))
                    <div class="text-right mt-2">
                        <a href="{{ route('password.request') }}"
                           class="text-sm font-semibold text-gray-700 hover:text-blue-700 focus:text-blue-700">{{ trans('auth.forgot') }}</a>
                    </div>
                @endif
                <div class="flex justify-center items-center content center text center gap-6 mt-6">
                    <button type="submit"
                            class="w-full block bg-purple-500 hover:bg-purple-400 focus:bg-purple-400 text-white font-semibold rounded-lg px-4 py-3"> {{ trans('auth.login') }}</button>
                    Ó
                    <a href="{{route('register')}}"
                       class="text-center w-full block bg-gray-300 hover:bg-purple-200 focus:bg-purple-200 font-semibold rounded-lg px-4 py-3"> {{ trans('auth.register') }}</a>
                </div>
            </form>
        </form>
    </x-auth-card>
</x-guest-layout>
