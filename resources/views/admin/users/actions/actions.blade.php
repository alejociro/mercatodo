<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ trans('admin.actions.titles.index') }}
            </h2>
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <x-nav-link :href="route('admin.payment')" :active="request()->routeIs('admin.payment')">
                    {{ trans('admin.actions.titles.actions') }}
                </x-nav-link>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="bg-white rounded-lg shadow-sm p-2 text-center flex flex-col gap-5">
                        <h1 class="bg-orange-400">{{trans('admin.actions.titles.index')}}</h1>
                        <table>
                            <thead>
                            <th>{{trans('admin.actions.fields.user')}}</th>
                            <th>{{trans('admin.actions.fields.name')}}</th>
                            <th>{{trans('admin.actions.fields.email')}}</th>
                            <th>{{trans('admin.actions.fields.rol')}}</th>
                            <th>{{trans('admin.actions.fields.document')}}</th>
                            <th>{{trans('admin.actions.fields.action')}}</th>
                            <th>{{trans('admin.actions.fields.date')}}</th>
                            </thead>
                            <tbody>
                            @foreach($actions as $action)
                                <tr>
                                    <td>{{$action->user->id}}</td>
                                    <td>{{$action->user->name}}</td>
                                    <td>{{$action->user->email}}</td>
                                    <td>@if(!empty($action->user->getRoleNames()))
                                            @foreach($action->user->getRoleNames() as $rolName)
                                                <h5>{{$rolName}}</h5>
                                            @endforeach
                                        @endif</td>
                                    <td>{{$action->user->document}}</td>
                                    <td>{{$action->name}}</td>
                                    <td>{{$action->created_at}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div>
                            {!! $actions->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
