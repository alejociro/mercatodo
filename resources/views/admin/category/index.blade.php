<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ trans('admin.categories.titles.index') }}
            </h2>
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <x-nav-link :href="route('admin.products.index')" :active="request()->routeIs('admin.products.index')">
                    {{ trans('Products') }}
                </x-nav-link>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="p-2">
                        <div class="p-6 inline-flex">
                            <div class="inline-flex  bg-white p-2 ">
                                <a class="inline-flex bg-indigo-200 text-black rounded-full h-6 px-3 justify-center items-center"
                                   href="{{ route('admin.categories.create') }}">{{trans('admin.categories.fields.new')}}</a>
                            </div>
                        </div>
                        <div class="bg-white rounded-lg shadow-sm text-center flex flex-col">
                            <h1 class="bg-teal-500">{{trans('admin.categories.titles.index')}}</h1>
                            <table>
                                <thead>
                                <th>ID</th>
                                <th>{{trans('admin.categories.fields.name')}}</th>
                                <th>{{trans('admin.categories.fields.description')}}</th>
                                </thead>
                                <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->description}}</td>
                                        <td>
                                            <div class="inline-flex p-2">
                                                <div class="mx-2">
                                                    <a href="{{ route('admin.categories.edit', $category) }}"
                                                       class="inline-flex gap-2 items-center bg-white leading-none text-green-600 rounded-full p-2 shadow text-teal text-sm">{{trans('admin.categories.fields.edit')}}</a>
                                                </div>
                                                <div
                                                    class="inline-flex items-center bg-white leading-none text-purple-600 rounded-full px-4 shadow text-teal text-sm">
                                                    <form action="{{ route('admin.categories.destroy', $category) }}"
                                                          method="POST" class="formEliminar">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            type="submit">{{trans('admin.categories.fields.delete')}}</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

