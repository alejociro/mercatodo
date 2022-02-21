<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ trans('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="p-2">
                        <div class="p-6 inline-flex">
                            <div class="inline-flex  bg-white p-2 ">
                                <a class="inline-flex bg-indigo-200 text-black rounded-full h-6 px-3 justify-center items-center"
                                   href="{{ route('products.create') }}">{{trans('New')}}</a>
                            </div>
                            <form action="{{route('products.index')}}" method="GET">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="query" placeholder="Search here....."
                                           value="{{ request()->input('query') }}">
                                    <span class="text-danger">@error('query'){{ $message }} @enderror</span>
                                    <button type="submit"
                                            class="btn btn-primary inline-flex items-center bg-white leading-none text-black-600 rounded-full p-2 shadow text-teal text-sm">{{trans('Search')}}</button>
                                </div>
                            </form>

                        </div>
                        <div class="bg-white rounded-lg shadow-sm text-center flex flex-col">
                            <h1 class="bg-teal-500">{{trans('Table of products')}}</h1>


                            <table>
                                <thead>
                                <th>ID</th>
                                <th>{{trans('Name')}}</th>
                                <th>{{trans('Value')}}</th>
                                <th>{{trans('Stock')}}</th>
                                <th>{{trans('Category')}}</th>
                                <th>{{trans('Status')}}</th>
                                <th>{{trans('Actions')}}</th>
                                </thead>
                                <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->price}}{{$currency}}</td>
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
                                                <!-- botón editar -->
                                                <a href="{{ route('products.edit', $product->id) }}"
                                                   class="inline-flex items-center bg-white leading-none text-green-600 rounded-full p-2 shadow text-teal text-sm">Editar</a>

                                                <!-- botón borrar -->
                                                <div
                                                    class="inline-flex items-center bg-white leading-none text-purple-600 rounded-full p-2 shadow text-teal text-sm">
                                                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="formEliminar">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" >Borrar</button>
                                                    </form>

                                                </div>
                                                <div
                                                    class="inline-flex items-center bg-white leading-none text-black-600 rounded-full p-2 shadow text-teal text-sm">
                                                    <form action="{{ route('changeProductStatus', $product->id) }}"
                                                          method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit">{{trans('Change status')}}</button>
                                                    </form>
                                                </div>
                                                <a href="{{ route('products.show', $product) }}"
                                                   class="inline-flex items-center bg-white leading-none text-green-600 rounded-full p-2 shadow text-teal text-sm">Ver
                                                    producto</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
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
    (function () {
        'use strict'
        //debemos crear la clase formEliminar dentro del form del boton borrar
        //recordar que cada registro a eliminar esta contenido en un form
        var forms = document.querySelectorAll('.formEliminar')
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    event.preventDefault()
                    event.stopPropagation()
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
                            Swal.fire('¡ELIMINADO!', 'EL PRODUCTO HA SIDO ELIMINADO EXITOSAMENTE.','success');
                        }
                    })
                }, false)
            })
    })()
</script>

{{--<x-app-layout>--}}
{{--    <x-slot name="header">--}}
{{--        <h2 class="font-semibold text-xl text-gray-800 leading-tight">--}}
{{--            {{ trans('Products') }}--}}
{{--        </h2>--}}
{{--    </x-slot>--}}

{{--    <div class="py-12">--}}
{{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
{{--            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">--}}
{{--                <div class="p-6 bg-white border-b border-gray-200">--}}
{{--                    <div class="p-2">--}}
{{--                        <div class="inline-flex items-center bg-white leading-none text-purple-600 rounded-full p-2 shadow text-teal text-sm">--}}
{{--                            <a type="button" href="{{ route('products.create') }}" class="inline-flex bg-indigo-200 text-black rounded-full h-6 px-3 justify-center items-center">{{trans('New')}}</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="bg-white rounded-lg shadow-sm p-2 text-center flex justify-center flex-col gap-5">--}}
{{--                        <h1 class="bg-orange-400">{{trans('Table of products')}}</h1>--}}


{{--                    </div>--}}

{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</x-app-layout>--}}
