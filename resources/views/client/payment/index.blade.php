<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ trans('client.payment.titles.payments') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="p-2">
                        <div class="bg-white rounded-lg shadow-sm text-center flex flex-col">
                            <h1 class="bg-teal-500">{{trans('client.payment.titles.table')}}</h1>
                            <table>
                                <thead>
                                <th>{{trans('client.payment.fields.request')}}</th>
                                <th>{{trans('client.payment.fields.value')}}</th>
                                <th>{{trans('client.payment.fields.status')}}</th>
                                <th>{{trans('client.payment.fields.paid at')}}</th>
                                <th>{{trans('client.payment.fields.actions')}}</th>
                                </thead>
                                <tbody>
                                @foreach ($payments as $payment)
                                    <tr>
                                        <td>{{$payment->request_id}}</td>
                                        <td>{{$payment->amount_format}}</td>
                                        <td>@if($payment->status == 'successful')
                                                {{trans('client.payment.fields.successful')}}
                                            @endif
                                            @if($payment->status == 'rejected')
                                                {{trans('client.payment.fields.rejected')}}
                                            @endif
                                            @if($payment->status == 'pending')
                                                {{trans('client.payment.fields.pending')}}
                                            @endif

                                        </td>
                                        <td>{{$payment->paid_at}}</td>
                                        <td>
                                            @if($payment->status === 'successful')
                                                <div class="inline-flex p-2">
                                                    <a href="{{ route('payments.show', $payment) }}"
                                                       class="inline-flex items-center bg-white leading-none text-green-600 rounded-full p-2 shadow text-teal text-sm">
                                                        {{trans('client.payment.fields.show')}}
                                                    </a>
                                                </div>
                                            @endif
                                            @if($payment->status === 'rejected')
                                                <form method="POST" action="{{route('trypayment', $payment)}}}">
                                                    @csrf
                                                    <div class="inline-flex p-2">
                                                        <button
                                                            class="inline-flex items-center bg-white leading-none text-purple-600 rounded-full p-2 shadow text-teal text-sm">
                                                            <span class="ml-2 mt-5px">{{trans('client.payment.fields.try')}}</span>
                                                        </button>
                                                    </div>
                                                </form>
                                            @endif
                                            @if($payment->status === 'pending')
                                                <div class="inline-flex p-2">
                                                    <a href="{{$payment->process_url}}"
                                                       class="inline-flex items-center bg-white leading-none text-green-600 rounded-full p-2 shadow text-teal text-sm">
                                                        {{trans('client.payment.fields.continue')}}
                                                    </a>
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
