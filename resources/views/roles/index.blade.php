<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @can('crear-rol')
                        <a href="{{ route('roles.create') }}">Crear</a>
                    @endcan
                    <table >
                        <thead >
                        <th >Rol</th>
                        <th >Acciones</th>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{ $role->name }}</td>
                                <td>
                                    @can('editar.rol')
                                        <a href="{{ route('roles.edit', $role->id) }}">Editar</a>
                                    @endcan

                                    @can('borrar-rol')
                                        {!! Form::open(['method'=>'DELETE','route'=> ['roles.destroy', $role->id]]) !!}
                                        {!! Form::submit('Borrar') !!}
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
