<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ trans('Roles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="bg-white rounded-lg shadow-sm p-2 text-center flex flex-col gap-5">
                        <h1 class="bg-lime-500">{{trans('Table of users')}}</h1>
                    @can('create-rol')
                        <a href="{{ route('roles.create') }}">{{trans('Create')}}</a>
                    @endcan
                    <table >
                        <thead >
                        <th >{{trans('Rol')}}</th>
                        <th >{{trans('Actions')}}</th>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{ $role->name }}</td>
                                <td>
                                    @can('edit-rol')
                                        <a href="{{ route('roles.edit', $role->id) }}">{{trans('Edit')}}</a>
                                    @endcan

                                    @can('delete-rol')
                                        {!! Form::open(['method'=>'DELETE','route'=> ['roles.destroy', $role->id]]) !!}
                                        {!! Form::submit(trans('Delete')) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                    <div>
                        {!! $roles->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
