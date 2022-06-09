<x-app-layout>
    <div class="flex justify-center">
        <ul class="menu flex flex-row bg-base-100 rounded-box p-2 shadow-lg">
            <li><a href="{{route('admin.export.payments.form')}}">{{ trans('admin.users.fields.exports') }}</a></li>
            <li><a href="{{route('admin.report.payments')}}">{{ trans('admin.users.fields.reports') }}</a></li>
        </ul>
    </div>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="p-2">
                        <div class="bg-white rounded-lg shadow-sm text-center flex flex-col">
                            <h1>{{trans('Table of payments')}}</h1>
                            <div class="overflow-x-auto">
                                <table class="table w-full">
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
                            </div>
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
