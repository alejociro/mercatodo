<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ trans('admin.reports.payments.titles.payments') }}
        </h2>
    </x-slot>

    <div class="w-full">
        <div class="bg-gradient-to-b from-teal-800 to-teal-400 h-96"></div>
        <div class="max-w-5xl mx-auto px-6 sm:px-6 lg:px-8 mb-12">
            <div class="bg-white w-full shadow rounded p-8 sm:p-12 -mt-72">
                <p class="text-3xl font-bold leading-7 text-center">{{trans('admin.reports.payments.fields.graph')}}</p>
            <div id="barChart"/>
            </div>
        </div>
    </div>
</x-app-layout>
