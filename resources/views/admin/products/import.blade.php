<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mercatodo</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"/>
    <link rel="shortcut icon" href="icon.svg" type="svg/x-icon">
</head>
<body>
<div class="w-full">
    <div class="bg-gradient-to-b from-teal-800 to-teal-400 h-96"></div>
    <div class="max-w-5xl mx-auto px-6 sm:px-6 lg:px-8 mb-12">
        <div class="bg-white w-full shadow rounded p-8 sm:p-12 -mt-72">
            <p class="text-3xl font-bold leading-7 text-center">{{trans('admin.import.titles.title')}}</p>
            <form action="{{route('admin.import.products')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                    <a href="{{route('admin.products.index')}}"
                       class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>{{trans('admin.import.fields.cancel')}}</a>
                    <input name='file' type='file' accept='.xlsx,.xls'>
                    <button type="submit"
                            class='w-auto bg-gradient-to-b from-teal-800 to-teal-400 rounded-lg shadow-xl font-medium text-white px-4 py-2'>
                        {{trans('admin.import.fields.done')}}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
