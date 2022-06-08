<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mercatodo</title>
    <link href="{{ asset('scss/app.scss') }}" rel="stylesheet"/>
    <link rel="shortcut icon" href="icon.svg" type="svg/x-icon">
</head>
<body>
<div class="w-full">
    <div class="bg-gradient-to-b from-teal-800 to-teal-400 h-96"></div>
    <div class="max-w-5xl mx-auto px-6 sm:px-6 lg:px-8 mb-12">
        <div class="bg-white w-full shadow rounded p-8 sm:p-12 -mt-72">
            <form action="{{route('admin.export.payments')}}" method="GET">
                @csrf
                <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                    <label>{{trans('admin.export.payments.fields.status')}} </label>
                    <select name='status'>
                        <option value=''>{{trans('admin.export.payments.fields.all')}}</option>
                        <option value='pending'>{{trans('admin.export.payments.fields.pending')}}</option>
                        <option value='rejected'>{{trans('admin.export.payments.fields.rejected')}}</option>
                        <option value='successful'>{{trans('admin.export.payments.fields.successful')}}</option>
                    </select>
                </div>
                <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                    <label>{{trans('admin.export.payments.fields.since')}}</label>
                    <input name='dates[initial]' type='date' value={{$fechaNow}}>
                    <label>{{trans('admin.export.payments.fields.to')}}</label>
                    <input name='dates[end]' type='date' value={{$fechaNow}}>
                </div>
                <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                    <button type="submit"
                            class='w-auto bg-gradient-to-b from-teal-800 to-teal-400 rounded-lg shadow-xl font-medium text-white px-4 py-2'>
                        {{trans('admin.export.payments.fields.done')}}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
