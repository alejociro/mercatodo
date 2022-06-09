<x-app-layout>
    <div class="flex justify-center">
        <ul class="menu flex flex-row bg-base-100 rounded-box p-2 shadow-lg">
            <li><a href="{{route('admin.categories.index')}}">{{trans('admin.products.fields.category')}}</a></li>
            <li><a href="{{route('admin.report.products')}}">{{trans('admin.products.fields.top')}}</a></li>
            <li><a href="{{route('admin.import.products.form')}}">{{trans('admin.products.fields.import')}}</a></li>
            <li><a href="{{route('admin.export.products.form')}}">{{trans('admin.products.fields.export')}}</a></li>
        </ul>
    </div>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="p-2">
                        <div class="flex p-6 justify-center">
                            <form action="{{route('admin.products.index')}}" method="GET">
                                <div class="flex items-center">
                                    <div>
                                                <span
                                                    class="text-danger">@error('queryUser'){{ $message }} @enderror</span>
                                        <input type="text" class="form-control rounded-full m-2" name="query"
                                               value="{{ request()->input('queryUser') }}"
                                               class="w-full border rounded-md pl-10 pr-4 py-2 focus:border-blue-500 focus:outline-none focus:shadow-outline"
                                               type="text"
                                               placeholder="{{trans('client.products.fields.search description')}}">
                                    </div>
                                    <div class="flex sm:flex-row">
                                        <label
                                            class="self-center">{{trans('client.products.fields.categories')}}</label>
                                        <select class="m-3 rounded-full p-3" id="category_id" name="category_id">
                                            <option value=''>Todas</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit"
                                            class="bg-gray-500 rounded-full font-bold text-white px-4 py-3 transition duration-300 ease-in-out hover:bg-gray-600 mr-6">{{trans('client.products.fields.search')}}</button>

                                </div>
                            </form>
                        </div>
                        <div class="bg-white rounded-lg shadow-sm text-center flex flex-col">
                            <h1>{{trans('admin.products.titles.title')}}</h1>


                            <div class="overflow-x-auto w-full">
                                <table class="table w-full">
                                    <thead>
                                    <th>ID</th>
                                    <th>{{trans('admin.products.fields.name')}}</th>
                                    <th>{{trans('admin.products.fields.value')}}</th>
                                    <th>{{trans('admin.products.fields.stock')}}</th>
                                    <th>{{trans('admin.products.fields.category')}}</th>
                                    <th>{{trans('admin.products.fields.status')}}</th>
                                    <th class='flex justify-between'>{{trans('admin.products.fields.actions')}}
                                        <a class=" text-black rounded-full"
                                           href="{{ route('admin.products.create') }}">{{trans('admin.products.fields.new')}}</a>
                                    </th>

                                    </thead>
                                    <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{$product->id}}</td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->price_format}}{{$currency}}</td>
                                            <td>{{$product->stock}}</td>
                                            <td>{{$product->category->name}}</td>
                                            <td>
                                                @if($product->disabled_at == null)
                                                    {{trans('Enabled')}}
                                                @else
                                                    Desactivado desde: {{$product->disabled_at}}
                                                @endif
                                            </td>
                                            <td>
                                                <div class="inline-flex p-2">
                                                    <a href="{{ route('admin.products.edit', $product->id) }}"
                                                       class="inline-flex items-center bg-white leading-none text-green-600 rounded-full p-2 shadow text-teal text-sm">{{trans('admin.products.fields.edit')}}</a>
                                                    <div
                                                        class="inline-flex items-center bg-white leading-none text-purple-600 rounded-full p-2 shadow text-teal text-sm">
                                                        <form action="{{ route('admin.products.destroy', $product) }}"
                                                              method="POST" class="formEliminar">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button
                                                                type="submit">{{trans('admin.products.fields.delete')}}</button>
                                                        </form>

                                                    </div>
                                                    <div
                                                        class="inline-flex items-center bg-white leading-none text-black-600 rounded-full p-2 shadow text-teal text-sm">
                                                        <form
                                                            action="{{ route('admin.change.product.status', $product) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <button
                                                                type="submit">{{trans('admin.products.fields.change status')}}</button>
                                                        </form>
                                                    </div>
                                                    <a href="{{ route('admin.products.show', $product) }}"
                                                       class="inline-flex items-center bg-white leading-none text-green-600 rounded-full p-2 shadow text-teal text-sm">
                                                        {{trans('admin.products.fields.show')}}</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                            <div>
                                {!! $products->links() !!}
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<script>
    (function() {
        'use strict';
        //debemos crear la clase formEliminar dentro del form del boton borrar
        //recordar que cada registro a eliminar esta contenido en un form
        var forms = document.querySelectorAll('.formEliminar');
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    event.preventDefault();
                    event.stopPropagation();
                    Swal.fire({
                        title: '¿CONFIRMA LA ELIMINACIÓN DEL PRODUCTO?',
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonColor: '#20c997',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'CONFIRMAR'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.submit();
                            Swal.fire('¡ELIMINADO!', 'EL PRODUCTO HA SIDO ELIMINADO EXITOSAMENTE.', 'success');
                        }
                    });
                }, false);
            });
    })();
</script>


