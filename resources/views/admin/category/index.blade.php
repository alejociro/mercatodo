<x-app-layout>

    <div class="flex justify-center">
        <ul class="menu flex flex-row bg-base-100 rounded-box p-2 shadow-lg">
            <li><a href="{{route('admin.products.index')}}">{{trans('Products')}}</a></li>
        </ul>
    </div>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="p-2">
                        <div class="bg-white rounded-lg shadow-sm text-center flex flex-col">
                            <div class="overflow-x-auto w-full">
                                <table class="table w-full">
                                    <thead>
                                    <th>ID</th>
                                    <th>{{trans('admin.categories.fields.name')}}</th>
                                    <th>{{trans('admin.categories.fields.description')}}</th>
                                    <th class='flex justify-between'>{{trans('admin.products.fields.actions')}}
                                        <a class="text-black rounded-full"
                                           href="{{ route('admin.categories.create') }}">{{trans('admin.categories.fields.new')}}</a>
                                    </th>
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
                                                        <form
                                                            action="{{ route('admin.categories.destroy', $category) }}"
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
    </div>
</x-app-layout>

