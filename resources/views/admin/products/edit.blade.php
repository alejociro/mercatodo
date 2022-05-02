<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ trans('admin.products.titles.edit a product') }}
        </h2>
    </x-slot>

    <div class="w-full">
        <div class="bg-gradient-to-b from-teal-800 to-teal-400 h-96"></div>
        <div class="max-w-5xl mx-auto px-6 sm:px-6 lg:px-8 mb-12">
            <div class="bg-white w-full shadow rounded p-8 sm:p-12 -mt-72">
                <p class="text-3xl font-bold leading-7 text-center">{{ trans('admin.products.titles.edit a product') }}</p>
                <form action="{{route('admin.products.update', $product)}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="md:flex items-center mt-12">
                        <div class="w-full md:w-1/2 flex flex-col">
                            <label class="font-semibold leading-none">{{trans('admin.products.fields.name')}}</label>
                            <input id="name" name="name"
                                   class="leading-none text-gray-900 p-3 focus:outline-none focus:border-blue-700 mt-4 bg-gray-100 border rounded border-gray-200"
                                   @class(['form-control', 'is-invalid' => $errors->has('name')]) value="{{$product->name}}"
                                   type="text" required/>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="w-full md:w-1/2 flex flex-col md:ml-6 md:mt-0 mt-4">
                            <label class="font-semibold leading-none">{{trans('admin.products.fields.price')}}</label>
                            <input id="price" name="price"
                                   class="leading-none text-gray-900 p-3 focus:outline-none focus:border-blue-700 mt-4 bg-gray-100 border rounded border-gray-200"
                                   @class(['form-control', 'is-invalid' => $errors->has('price')]) value="{{$product->price}}"
                                   type="text" required/>
                            @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="md:flex items-center mt-12">
                        <div class="w-full md:w-1/2 flex flex-col">
                            <label class="font-semibold leading-none">{{trans('admin.products.fields.stock')}}</label>
                            <input id="stock" name="stock"
                                   class="leading-none text-gray-900 p-3 focus:outline-none focus:border-blue-700 mt-4 bg-gray-100 border rounded border-gray-200"
                                   @class(['form-control', 'is-invalid' => $errors->has('stock')]) value="{{$product->stock}}"
                                   type="text" required/>
                            @error('stock')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="w-full md:w-1/2 flex flex-col md:ml-6 md:mt-0 mt-4">
                            <label class="font-semibold m-2 leading-none" for="category_id">{{trans('admin.products.fields.select category')}}</label>
                            <select class="form-control m-2 rounded-full" name="category_id" id="category_id">
                                <option disabled selected>{{trans('admin.products.fields.select category')}}</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="md:flex items-center mt-8">
                        <div class="w-full flex flex-col">
                            <label
                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">{{trans('admin.products.fields.description')}}</label>
                            <input id="description" name="description"
                                   class="leading-none text-gray-900 p-3 focus:outline-none focus:border-blue-700 mt-4 bg-gray-100 border rounded border-gray-200"
                                   @class(['form-control', 'is-invalid' => $errors->has('description')]) value="{{$product->description}}"
                                   type="text" required/>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <img id="imagenSeleccionada" style="max-height: 300px;" value="{{$product->image}}">
                    </div>

                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <label
                            class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">{{trans('admin.products.fields.upload image')}}</label>
                        <div class='flex items-center justify-center w-full'>
                            <label
                                class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group'>
                                <div class='flex flex-col items-center justify-center pt-7'>
                                    <svg class="w-10 h-10 text-purple-400 group-hover:text-purple-600" fill="none"
                                         stroke="currentColor" viewBox="0 0 24 24"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <p class='text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>{{trans('admin.products.fields.select image')}}</p>
                                </div>
                                <input name="image" id="image" type='file' class="hidden"/>
                            </label>
                        </div>
                    </div>

                    <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                        <a href="{{ route('admin.products.index') }}"
                           class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>{{trans('admin.products.fields.cancel')}}</a>
                        <button type="submit"
                                class='w-auto bg-gradient-to-b from-teal-800 to-teal-400 rounded-lg shadow-xl font-medium text-white px-4 py-2'>{{trans('admin.products.fields.save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function (e) {
        $('#image').change(function () {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#imagenSeleccionada').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>
