<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ trans('Edit an user') }}
        </h2>
    </x-slot>
    <div class="w-full">
        <div class="bg-gradient-to-b from-orange-800 to-orange-400 h-96"></div>
        <div class="max-w-5xl mx-auto px-6 sm:px-6 lg:px-8 mb-12">
            <div class="bg-white w-full shadow rounded p-8 sm:p-12 -mt-72">
                <p class="text-3xl font-bold leading-7 text-center">Editar un usuario</p>
                <form action="{{route('users.update', $user)}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="md:flex items-center mt-12">
                        <div class="w-full md:w-1/2 flex flex-col">
                            <label class="font-semibold leading-none">{{trans('Name')}}</label>
                            <input id="name" name="name"
                                   class="leading-none text-gray-900 p-3 focus:outline-none focus:border-blue-700 mt-4 bg-gray-100 border rounded border-gray-200"
                                   @class(['form-control', 'is-invalid' => $errors->has('name')]) value="{{$user->name}}"
                                   type="text" required/>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="w-full md:w-1/2 flex flex-col md:ml-6 md:mt-0 mt-4">
                            <label class="font-semibold leading-none">{{trans('Email')}}</label>
                            <input id="email" name="email"
                                   class="leading-none text-gray-900 p-3 focus:outline-none focus:border-blue-700 mt-4 bg-gray-100 border rounded border-gray-200"
                                   @class(['form-control', 'is-invalid' => $errors->has('name')]) value="{{$user->email }}"
                                   type="text" required/>
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="md:flex items-center mt-12">
                        <div class="w-full md:w-1/2 flex flex-col">
                            <label class="font-semibold leading-none">{{trans('Password')}}</label>
                            <input type="password" id="password" name="password"
                                   class="leading-none text-gray-900 p-3 focus:outline-none focus:border-blue-700 mt-4 bg-gray-100 border rounded border-gray-200"
                                   @class(['form-control', 'is-invalid' => $errors->has('password')]) value="{{ old('password') }}"
                                   type="text" required/>
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="w-full md:w-1/2 flex flex-col md:ml-6 md:mt-0 mt-4">
                            <label class="font-semibold leading-none">{{trans('Confirm password')}}</label>
                            <input type="password" id="confirm-password" name="confirm-password"
                                   class="leading-none text-gray-900 p-3 focus:outline-none focus:border-blue-700 mt-4 bg-gray-100 border rounded border-gray-200"
                                   @class(['form-control', 'is-invalid' => $errors->has('confirm-password')]) value="{{ old('confirm-password') }}"
                                   type="text" required/>
                            @error('confirm-password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex items-center justify-center w-full">
                            <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                                <a href="{{ route('users.index') }}"
                                   class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>{{trans('Cancel')}}</a>
                                <button type="submit"
                                        class='w-auto bg-gradient-to-b from-orange-800 to-orange-400 hover:bg-purple-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>{{trans('Update')}}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
