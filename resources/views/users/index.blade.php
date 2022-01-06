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
                    <div class="p-2">
                        <div class="inline-flex items-center bg-white leading-none text-purple-600 rounded-full p-2 shadow text-teal text-sm">
                            <a class="inline-flex bg-indigo-200 text-black rounded-full h-6 px-3 justify-center items-center" href="{{route('users.create')}}">{{trans('New')}}</a>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-sm p-2 text-center flex flex-col gap-5">
                        <h1 class="bg-lime-500">{{trans('Table of users')}}</h1>

                        <table>
                            <thead>
                            <th>{{trans('ID')}}</th>
                            <th>{{trans('Name')}}</th>
                            <th>{{trans('Email')}}</th>
                            <th>{{trans('Role')}}</th>
                            <th>{{trans('Status')}}</th>
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
                                    <td>
                                        @if($user->disabled_at == null)
                                            {{trans('Enabled')}}
                                        @else
                                            {{trans('Disabled')}}
                                        @endif
                                    </td>
                                    <td class="inline-flex">
                                        <div class="p-2">
                                            <div class="inline-flex items-center bg-white leading-none text-purple-600 rounded-full p-2 shadow text-teal text-sm">
                                                <a class="inline-flex bg-teal-300 text-black rounded-full h-6 px-3 justify-center items-center" href="{{ route('users.edit', $user->id) }}">{{trans('Edit')}}</a>
                                            </div>
                                        </div>

                                    <td class="inline-flex">
                                        <div class="p-2">
                                            <div class="inline-flex items-center bg-white leading-none text-purple-600 rounded-full p-2 shadow text-teal text-sm">
                                                {!! Form::open(['method'=>'DELETE', 'route'=>['users.destroy', $user->id]]) !!}
                                                {!! Form::submit(trans('Delete')) !!}
                                                {!! Form::close() !!}
                                            </div>
                                        </div>


                                    <td class="inline-flex">
                                        <div class="p-2">
                                            <div class="inline-flex items-center bg-white leading-none text-black-600 rounded-full p-2 shadow text-teal text-sm">
                                                <form action="{{ route('changeUserStatus', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" >{{trans('Change status')}}</button>
                                                </form>
                                            </div>
                                        </div>

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
