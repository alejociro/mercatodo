<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{route('users.create')}}">Nuevo</a>
                    <div class="bg-white rounded-lg shadow-sm p-4 text-center flex flex-col gap-5">
                        <h1>Tabla de usuarios</h1>

                        <table>
                            <thead>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>E-mail</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @if(!empty($user->getRoleNames()))
                                            @foreach($user->getRoleNames() as $rolName)
                                                <h5>{{$rolName}}</h5>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('users.edit', $user->id) }}">Editar</a>

                                        {!! Form::open(['method'=>'DELETE', 'route'=>['users.destroy', $user->id]]) !!}
                                        {!! Form::submit('Borrar') !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div>
                            {!! $users->links() !!}
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
