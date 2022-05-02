<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        </h2>
    </x-slot>
    <div class="flex justify-center my-6">
        <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
            <div class="flex-1">
                <h1 class="flex justify-center w-full px-10 py-4 mt-6 font-bold text-white uppercase text-xl bg-green-800 rounded-full shadow item-center focus:shadow-outline focus:outline-none">{{trans('Payment-show')}}</h1>
                <table class="w-full text-sm lg:text-base" cellspacing="0">
                    <thead>
                    <tr class="h-12 uppercase">
                        <th class="">{{trans('client.payment.fields.image')}}</th>
                        <th class="text-left">{{trans('client.payment.fields.product')}}</th>
                        <th class="lg:text-right text-left pl-5 lg:pl-0">
                            <span class="lg:hidden" title="Quantity">CANT</span>
                            <span class="hidden lg:inline">{{trans('client.payment.fields.quantity')}}</span>
                        </th>
                        <th class="hidden text-right md:table-cell">{{trans('client.payment.fields.unit value')}}</th>
                        <th class="text-right">{{trans('client.payment.fields.total value')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($shoppingCart->shoppingCartItems as $product)
                        <tr>
                            <td class=" pb-4">
                                <img src="/image/{{$product->product->image}}" alt=""
                                     class="rounded-t-lg bg-gray-100 w-48">
                            </td>
                            <td>
                                <a href="#">
                                    <p class="mb-2 md:ml-4">{{$product->product->name}}</p>
                                </a>
                            </td>
                            <td class="hidden text-right md:table-cell">
                                     <span class="text-sm lg:text-base font-medium">
                                            {{$product->quantity}}
                                     </span>
                            </td>
                            <td class="hidden text-right md:table-cell">
                                    <span class="text-sm lg:text-base font-medium">
                                       {{$product->product->price_format}}
                                    </span>
                            </td>
                            <td class="text-right">
                                     <span class="text-sm lg:text-base font-medium">
                                            {{$product->total_format}}{{$currency}}
                                     </span>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <hr class="pb-6 mt-6">
                <div class="my-4 mt-6 -mx-2 lg:flex">
                    <div class="lg:px-2 lg:w-1/2">
                        <div class="p-4 bg-gray-100 rounded-full">
                            <h1 class="ml-2 font-bold uppercase">{{trans('client.payment.fields.status transfer')}}</h1>
                        </div>
                        <div class="p-4">
                            <p class="mb-4 italic">{{trans('client.payment.fields.description status')}}</p>
                            <div class="justify-center md:flex">
                                <form action="" method="POST">
                                    <div
                                        class="flex items-center w-full h-13 pl-3 bg-white bg-gray-100 border rounded-full">
                                        <div class="p-4 bg-green-400 rounded-full">
                                            <h1 class="ml-2 font-bold uppercase">{{trans('client.payment.fields.successful')}}</h1>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="lg:px-2 lg:w-1/2">
                        <div class="p-4 bg-gray-100 rounded-full">
                            <h1 class="ml-2 font-bold uppercase">{{trans('client.payment.fields.order details')}}</h1>
                        </div>
                        <div class="p-4">
                            <div class="flex justify-between border-b">
                                <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                                    {{trans('client.payment.fields.subtotal')}}
                                </div>
                                <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                                    {{$payment->amount_format}} {{$currency}}
                                </div>
                            </div>
                            <div class="flex justify-between pt-4 border-b">
                                <div class="flex lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-gray-800">
                                    <form action="" method="POST">
                                        <button type="submit" class="mr-2 mt-1 lg:mt-2">
                                            <svg aria-hidden="true" data-prefix="far" data-icon="trash-alt"
                                                 class="w-4 text-red-600 hover:text-red-800"
                                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                <path fill="currentColor"
                                                      d="M268 416h24a12 12 0 0012-12V188a12 12 0 00-12-12h-24a12 12 0 00-12 12v216a12 12 0 0012 12zM432 80h-82.41l-34-56.7A48 48 0 00274.41 0H173.59a48 48 0 00-41.16 23.3L98.41 80H16A16 16 0 000 96v16a16 16 0 0016 16h16v336a48 48 0 0048 48h288a48 48 0 0048-48V128h16a16 16 0 0016-16V96a16 16 0 00-16-16zM171.84 50.91A6 6 0 01177 48h94a6 6 0 015.15 2.91L293.61 80H154.39zM368 464H80V128h288zm-212-48h24a12 12 0 0012-12V188a12 12 0 00-12-12h-24a12 12 0 00-12 12v216a12 12 0 0012 12z"/>
                                            </svg>
                                        </button>
                                    </form>
                                    {{trans('client.payment.fields.coupon')}}
                                </div>
                                <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-green-700">
                                    {{$payment->amount_format}} {{$currency}}
                                </div>
                            </div>
                            <div class="flex justify-between pt-4 border-b">
                                <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                                    {{trans('client.payment.fields.tax')}}
                                </div>
                                <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                                    0.0
                                </div>
                            </div>
                            <div class="flex justify-between pt-4 border-b">
                                <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                                    {{trans('client.payment.fields.total')}}
                                </div>
                                <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                                    {{$payment->amount_format}} {{$currency}}
                                </div>
                            </div>
                            <a href="{{route('payments.index')}}"
                               class="flex justify-center w-full px-10 py-3 mt-6 font-medium text-white uppercase bg-blue-300 rounded-full shadow item-center hover:bg-blue-700 focus:shadow-outline focus:outline-none">
                                <svg aria-hidden="true" data-prefix="far" data-icon="credit-card" class="w-8"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                    <path fill="currentColor"
                                          d="M527.9 32H48.1C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48.1 48h479.8c26.6 0 48.1-21.5 48.1-48V80c0-26.5-21.5-48-48.1-48zM54.1 80h467.8c3.3 0 6 2.7 6 6v42H48.1V86c0-3.3 2.7-6 6-6zm467.8 352H54.1c-3.3 0-6-2.7-6-6V256h479.8v170c0 3.3-2.7 6-6 6zM192 332v40c0 6.6-5.4 12-12 12h-72c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h72c6.6 0 12 5.4 12 12zm192 0v40c0 6.6-5.4 12-12 12H236c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h136c6.6 0 12 5.4 12 12z"/>
                                </svg>
                                <span class="ml-2 mt-5px">{{trans('client.payment.fields.back')}}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
