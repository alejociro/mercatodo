<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ trans('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{route('users.create')}}">{{trans('New')}}</a>
                    <div class="bg-white rounded-lg shadow-sm p-2 text-center flex flex-col gap-5">
                        <h1 class="bg-lime-500">{{trans('Table of users')}}</h1>

                        <table>
                            <thead>
                            <th>{{trans('ID')}}</th>
                            <th>{{trans('Name')}}</th>
                            <th>{{trans('Email')}}</th>
                            <th>{{trans('Role')}}</th>
                            <th>{{trans('Actions')}}</th>
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
                                    <td class="inline-flex">
                                        <a href="{{ route('users.edit', $user->id) }}">{{trans('Edit')}}-</a>

                                        {!! Form::open(['method'=>'DELETE', 'route'=>['users.destroy', $user->id]]) !!}
                                        {!! Form::submit(trans('Delete')) !!}
                                        {!! Form::close() !!}

                                        <form action="{{ route('changeUserStatus', $user->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="bg-sky-500/75">-{{trans('Change status')}}</button>
                                        </form>
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
