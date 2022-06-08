<x-app-layout>
    <div>
        <div class="carousel bg-neutral-500">
            <div class="carousel-item">
                <img
                    src="https://images.pexels.com/photos/245032/pexels-photo-245032.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                    width="400" height="200" alt="">
            </div>
            <div class="carousel-item">
                <img
                    src="https://images.pexels.com/photos/994523/pexels-photo-994523.jpeg"
                    width="400" height="200" alt="">
            </div>
            <div class="carousel-item">
                <img
                    src="https://images.pexels.com/photos/969462/pexels-photo-969462.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                    width="400" height="200" alt="">
            </div>
            <div class="carousel-item">
                <img
                    src="https://images.pexels.com/photos/93820/pexels-photo-93820.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                    width="400" height="200" alt="">
            </div>
            <div class="carousel-item">
                <img
                    src="https://images.pexels.com/photos/1080721/pexels-photo-1080721.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                    width="400" height="200" alt="">
            </div>
            <div class="carousel-item">
                <img
                    src="https://images.pexels.com/photos/1036856/pexels-photo-1036856.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                    width="400" height="200" alt="">
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-2 border-b border-gray-200">
                    <div class="rounded-lg shadow-sm text-center flex justify-center flex-col gap-5 bg-gray-50">
                        <div class="container mx-auto px-6 py-3">
                            <div class="relative mt-6 max-w-lg mx-auto">
                                <div>
                                    <form action="{{route('productos')}}" method="GET">
                                        <div class="flex items-center my-6">
                                            <div>
                                                <span
                                                    class="text-danger">@error('queryUser'){{ $message }} @enderror</span>
                                                <input name="query" type="text"
                                                       placeholder="{{trans('client.products.fields.search description')}}"
                                                       class="input input-bordered input-primary w-full max-w-xs"
                                                       value="{{ request()->input('queryUser') }}"/>
                                            </div>
                                            <div class="flex sm:flex-row mx-4 my-4">
                                                <select class="select select-primary w-full mx-4" id="category_id"
                                                        name="category_id">
                                                    <option value=''>Categorias</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                             <button type="submit"
                                                class="bg-gray-500 rounded-full font-bold text-white mx-4 px-4 py-3 transition duration-300 ease-in-out hover:bg-gray-600 mr-6">{{trans('client.products.fields.search')}}</button>
                                        </div>
                                       </form>
                                </div>
                            </div>
                        </div>


                        <div class=" px-10 flex">
                            <div
                                class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-y-10 gap-x-14 ">
                                @foreach ($products as $product)
                                    {{--                                    <div class="card w-96 bg-base-100 shadow-xl">--}}
                                    {{--                                        <figure class="px-10 pt-10">--}}
                                    {{--                                            <img src="/image/{{$product->image}}" alt="Shoes"--}}
                                    {{--                                                 class="rounded-xl" width="400" height="225"/>--}}
                                    {{--                                        </figure>--}}
                                    {{--                                        <div class="card-body items-center text-center">--}}
                                    {{--                                            <h2 class="card-title">{{$product->name}}</h2>--}}
                                    {{--                                            <p>{{$product->PriceFormat}}{{$currency}}</p>--}}
                                    {{--                                            <div class="card-actions">--}}
                                    {{--                                                <form method="POST"--}}
                                    {{--                                                      action="{{ route('shoppingCarts.items.store',['shoppingCart'=>$shoppingCart, 'product'=>$product]) }}">--}}
                                    {{--                                                    @csrf--}}
                                    {{--                                                    <input width="" id="quantity" name="quantity" type="number"--}}
                                    {{--                                                           min="1"--}}
                                    {{--                                                           class="w-28 my-2 border-2 border-black-300 rounded "--}}
                                    {{--                                                           placeholder="{{trans('client.products.fields.quantity')}}">--}}
                                    {{--                                                    <button class="btn btn-primary"--}}
                                    {{--                                                            type="submit"> {{trans('client.products.fields.add')}}</button>--}}
                                    {{--                                                </form>--}}
                                    {{--                                            </div>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                    <div class="card w-96 shadow-xl image-full mx-4 group bg-transparent">
                                        <figure><img src="/image/{{$product->image}}" alt="Shoes"
                                                     class="rounded-xl" width="400" height="225"/>
                                        </figure>
                                        <div class="card-body hidden group-hover:block  duration-100  hover-group:duration-300 group-hover:bg-gray-900 group-hover:bg-opacity-70">
                                            <h2 class="card-title">{{$product->name}}</h2>
                                            <p>{{$product->PriceFormat}}{{$currency}}</p>
                                            <div class="card-actions justify-end  ">
                                                <form method="POST"
                                                      action="{{ route('shoppingCarts.items.store',['shoppingCart'=>$shoppingCart, 'product'=>$product]) }}">
                                                    @csrf
                                                    <button
                                                        class="btn btn-primary my-4 ">{{trans('client.products.fields.add')}}</button>
                                                    <input id="quantity" name="quantity" type="number"
                                                           min="1"
                                                           placeholder="{{trans('client.products.fields.quantity')}}"
                                                           class="input input-ghost w-full max-w-xs "/>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <div>
                            {!! $products->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
