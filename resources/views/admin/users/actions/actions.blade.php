<x-app-layout>

    <div class="flex justify-center">
        <ul class="menu flex flex-row bg-base-100 rounded-box p-2 shadow-lg">
            <li><a href="{{route('admin.export.actions.form')}}">{{ trans('admin.actions.titles.actions') }}</a></li>
        </ul>
    </div>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="bg-white rounded-lg shadow-sm p-2 text-center flex flex-col gap-5">
                        <h1>{{trans('admin.actions.titles.index')}}</h1>
                        <div class="overflow-x-auto">
                            <table class="table w-full">
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
                        </div>
                        <div>
                            {!! $actions->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
