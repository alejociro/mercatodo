<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ trans('Payments') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="p-2">
                        <div class="bg-white rounded-lg shadow-sm text-center flex flex-col">
                            <h1 class="bg-teal-500">{{trans('Table of payments')}}</h1>
                            <table>
                                <thead>
                                <th>{{trans('Request')}}</th>
                                <th>{{trans('Value')}}</th>
                                <th>{{trans('Payer document')}}</th>
                                <th>{{trans('Status')}}</th>
                                <th>{{trans('Paid at')}}</th>
                                <th>{{trans('Actions')}}</th>
                                </thead>
                                <tbody>
                                @foreach ($payments as $payment)
                                    <tr>
                                        <td>{{$payment->request_id}}</td>
                                        <td>{{$payment->amount_format}}</td>
                                        <td>{{$payment->payer_document}}</td>
                                        <td>{{$payment->status}}</td>
                                        <td>{{$payment->paid_at}}</td>
                                        <td>
                                            @if($payment->status === 'successful')
                                                <div class="inline-flex p-2">
                                                    <a href="{{ route('payments.show', $payment) }}"
                                                       class="inline-flex items-center bg-white leading-none text-green-600 rounded-full p-2 shadow text-teal text-sm">Ver
                                                        factura</a>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                            <div>
                                {!! $payments->links() !!}
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
