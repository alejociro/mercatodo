<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ trans('admin.categories.titles.edit') }}
        </h2>
    </x-slot>

    <div class="w-full">
        <div class="bg-gradient-to-b from-teal-800 to-teal-400 h-96"></div>
        <div class="max-w-5xl mx-auto px-6 sm:px-6 lg:px-8 mb-12">
            <div class="bg-white w-full shadow rounded p-8 sm:p-12 -mt-72">
                <p class="text-3xl font-bold leading-7 text-center">{{ trans('admin.categories.titles.edit') }}</p>
                <form action="{{route('admin.categories.update', $category)}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="md:flex items-center mt-12">
                        <div class="w-full md:w-1/2 flex flex-col">
                            <label class="font-semibold leading-none">{{trans('admin.categories.fields.name')}}</label>
                            <input id="name" name="name"
                                   class="leading-none text-gray-900 p-3 focus:outline-none focus:border-blue-700 mt-4 bg-gray-100 border rounded border-gray-200"
                                   @class(['form-control', 'is-invalid' => $errors->has('name')]) value="{{$category->name}}"
                                   type="text" required/>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="md:flex items-center mt-8">
                        <div class="w-full flex flex-col">
                            <label
                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">{{trans('admin.categories.fields.description')}}</label>
                            <input id="description" name="description"
                                   class="leading-none text-gray-900 p-3 focus:outline-none focus:border-blue-700 mt-4 bg-gray-100 border rounded border-gray-200"
                                   @class(['form-control', 'is-invalid' => $errors->has('description')]) value="{{$category->description}}"
                                   type="text" required/>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                        <a href="{{ route('admin.categories.index') }}"
                           class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>{{trans('admin.categories.fields.cancel')}}</a>
                        <button type="submit"
                                class='w-auto bg-gradient-to-b from-teal-800 to-teal-400 rounded-lg shadow-xl font-medium text-white px-4 py-2'>{{trans('admin.categories.fields.edit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
