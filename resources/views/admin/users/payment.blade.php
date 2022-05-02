<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ trans('admin.users.titles.payments') }}
            </h2>
            <div class="px-4">
                <form action="{{route('admin.export.payments.form')}}" method="GET">
                    <div class='flex px-4 items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                        <button type="submit"
                                class='w-auto bg-gradient-to-b from-teal-800 to-teal-400 rounded-lg shadow-xl font-medium text-white px-4 py-2'>
                            {{ trans('admin.users.fields.exports') }}
                        </button>
                    </div>
                </form>
            </div>
            <div class="px-4">
                <form action="{{route('admin.report.payments')}}" method="GET">
                    <div class='flex px-4 items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                        <button type="submit"
                                class='w-auto bg-gradient-to-b from-blue-800 to-blue-400 rounded-lg shadow-xl font-medium text-white px-4 py-2'>
                            {{ trans('admin.users.fields.reports') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
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
                                <th>{{trans('admin.users.fields.request')}}</th>
                                <th>{{trans('admin.users.fields.value')}}</th>
                                <th>{{trans('admin.users.fields.payer document')}}</th>
                                <th>{{trans('admin.users.fields.status')}}</th>
                                <th>{{trans('admin.users.fields.paid at')}}</th>
                                <th>{{trans('admin.users.fields.actions')}}</th>
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
                                                       class="inline-flex items-center bg-white leading-none text-green-600 rounded-full p-2 shadow text-teal text-sm">
                                                        {{trans('admin.users.fields.see payment')}}
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
