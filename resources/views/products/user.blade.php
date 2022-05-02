<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ trans('client.products.titles.products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="p-2 bg-white border-b border-gray-200">
                    <div class="bg-white rounded-lg shadow-sm text-center flex justify-center flex-col gap-5">
                        <div class="container mx-auto px-6 py-3 ">
                            <div class="flex items-center justify-between">
                                <div class="hidden w-full text-gray-600 md:flex md:items-center">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M16.2721 10.2721C16.2721 12.4813 14.4813 14.2721 12.2721 14.2721C10.063 14.2721 8.27214 12.4813 8.27214 10.2721C8.27214 8.06298 10.063 6.27212 12.2721 6.27212C14.4813 6.27212 16.2721 8.06298 16.2721 10.2721ZM14.2721 10.2721C14.2721 11.3767 13.3767 12.2721 12.2721 12.2721C11.1676 12.2721 10.2721 11.3767 10.2721 10.2721C10.2721 9.16755 11.1676 8.27212 12.2721 8.27212C13.3767 8.27212 14.2721 9.16755 14.2721 10.2721Z"
                                              fill="currentColor"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M5.79417 16.5183C2.19424 13.0909 2.05438 7.39409 5.48178 3.79417C8.90918 0.194243 14.6059 0.054383 18.2059 3.48178C21.8058 6.90918 21.9457 12.6059 18.5183 16.2059L12.3124 22.7241L5.79417 16.5183ZM17.0698 14.8268L12.243 19.8965L7.17324 15.0698C4.3733 12.404 4.26452 7.97318 6.93028 5.17324C9.59603 2.3733 14.0268 2.26452 16.8268 4.93028C19.6267 7.59603 19.7355 12.0268 17.0698 14.8268Z"
                                              fill="currentColor"/>
                                    </svg>
                                    <span class="mx-1 text-sm">{{trans('client.products.fields.ubi')}}</span>
                                </div>
                            </div>

                            <div class="relative mt-6 max-w-lg mx-auto">
                                <div>
                                    <form action="{{route('productos')}}" method="GET">
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
                                                <label class="self-center">{{trans('client.products.fields.categories')}}</label>
                                                <select class="m-3 rounded-full p-3" id="category_id" name="category_id">
                                                    <option value=''>Todas</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <button type="submit"
                                                class="bg-gray-500 rounded-full font-bold text-white px-4 py-3 transition duration-300 ease-in-out hover:bg-gray-600 mr-6">{{trans('client.products.fields.search')}}</button>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <div class="bg-white py-5 px-10">
                            <div
                                class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 md:gap-x-10 xl-grid-cols-4 gap-y-10 gap-x-6  ">
                                @foreach ($products as $product)
                                    <div
                                        class="container mx-auto shadow-lg rounded-lg max-w-md hover:shadow-2xl transition duration-300  flex flex-row items-center bg-gray-100">
                                        <div class="flex px-2">
                                            <img src="/image/{{$product->image}}" width="50%" alt=""
                                                 class="w-full rounded-t-lg bg-gray-100 ">
                                        </div>
                                        <div class="p-6">
                                            <h1 class="md:text-1xl text-xl hover:text-indigo-600 transition duration-200  font-bold text-gray-900 ">{{$product->name}}</h1>
                                            <p class="text-gray-700 my-2 hover-text-900 ">{{$product->PriceFormat}}{{$currency}}</p>
                                            <div class="flex-grow">
                                                <div class="flex-column">
                                                    <form method="POST"
                                                          action="{{ route('shoppingCarts.items.store',['shoppingCart'=>$shoppingCart, 'product'=>$product]) }}">
                                                        @csrf
                                                        <button
                                                            class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                                            {{trans('client.products.fields.add')}}
                                                        </button>
                                                        <input width="" id="quantity" name="quantity" type="number"
                                                               min="1"
                                                               class="w-28 my-2 border-2 border-black-300 rounded "
                                                               placeholder="{{trans('client.products.fields.quantity')}}">
                                                    </form>
                                                </div>
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
