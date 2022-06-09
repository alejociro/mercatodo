<x-app-layout>
    <div class="flex justify-center">
        <ul class="menu flex flex-row bg-base-100 rounded-box p-2 shadow-lg">
            <li><a href="{{route('admin.payment')}}">{{ trans('admin.users.titles.payments') }}</a></li>
            <li><a href="{{route('admin.actions')}}">{{ trans('admin.users.titles.actions') }}</a></li>
        </ul>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="bg-white rounded-lg shadow-sm p-2 text-center flex flex-col gap-5">
                        <div class="overflow-x-auto">
                            <table class="table w-full">
                                <thead>
                                <th>{{trans('admin.users.fields.id')}}</th>
                                <th>{{trans('admin.users.fields.name')}}</th>
                                <th>{{trans('admin.users.fields.email')}}</th>
                                <th>{{trans('admin.users.fields.rol')}}</th>
                                <th>{{trans('admin.users.fields.status')}}</th>
                                <th class='flex justify-between'>{{trans('admin.users.fields.actions')}}
                                    <a class="text-black rounded-full"
                                       href="{{route('admin.users.create')}}">{{trans('admin.users.fields.new')}}</a>
                                </th>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            @if($user->email == 'mercatodo@mercatodo.com')
                                                {{trans('admin.users.fields.super')}}
                                            @endif
                                            @if(!empty($user->getRoleNames()))
                                                @foreach($user->getRoleNames() as $rolName)
                                                    <h5>{{$rolName}}</h5>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td class="text-xs">
                                            @if($user->disabled_at == null)
                                                {{trans('admin.users.fields.enabled')}}
                                            @else
                                                {{trans('admin.users.fields.disabled')}}} {{$user->disabled_at}}
                                            @endif
                                        </td>
                                        <td class="inline-flex">
                                            <div class="p-2">
                                                <div
                                                    class="inline-flex items-center bg-white leading-none text-purple-600 rounded-full p-2 shadow text-teal text-sm">
                                                    <a class="inline-flex text-black rounded-full h-6 px-3 justify-center items-center"
                                                       href="{{ route('admin.users.edit', $user->id) }}">{{trans('admin.users.fields.edit')}}</a>
                                                </div>
                                            </div>

                                        <td class="inline-flex">
                                            <div class="p-2">
                                                <div
                                                    class="inline-flex items-center bg-white leading-none text-purple-600 rounded-full p-2 shadow text-teal text-sm">
                                                    <form action="{{route('admin.users.destroy', $user->id)}}"
                                                          method="POST" class="formDelete">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            type="submit">{{trans('admin.users.fields.delete')}}</button>
                                                    </form>
                                                </div>
                                            </div>
                                        <td class="inline-flex">
                                            <div class="p-2">
                                                <div
                                                    class="inline-flex items-center bg-white leading-none text-black-600 rounded-full p-2 shadow text-teal text-sm">
                                                    <form action="{{ route('admin.change.user.status', $user) }}"
                                                          method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <button
                                                            type="submit">{{trans('admin.users.fields.change status')}}</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div>
                            {!! $users->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

