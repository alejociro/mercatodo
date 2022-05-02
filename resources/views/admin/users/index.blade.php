<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ trans('admin.users.titles.index') }}
            </h2>
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <x-nav-link :href="route('admin.payment')" :active="request()->routeIs('admin.payment')">
                    {{ trans('admin.users.titles.payments') }}
                </x-nav-link>
            </div>
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <x-nav-link :href="route('admin.actions')" :active="request()->routeIs('admin.actions')">
                    {{ trans('admin.users.titles.actions') }}
                </x-nav-link>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="p-2">
                        <div
                            class="inline-flex items-center bg-white leading-none text-purple-600 rounded-full p-2 shadow text-teal text-sm">
                            <a class="inline-flex bg-indigo-200 text-black rounded-full h-6 px-3 justify-center items-center"
                               href="{{route('admin.users.create')}}">{{trans('admin.users.fields.new')}}</a>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-sm p-2 text-center flex flex-col gap-5">
                        <h1 class="bg-orange-400">{{trans('admin.users.titles.index')}}</h1>

                        <table>
                            <thead>
                            <th>{{trans('admin.users.fields.id')}}</th>
                            <th>{{trans('admin.users.fields.name')}}</th>
                            <th>{{trans('admin.users.fields.email')}}</th>
                            <th>{{trans('admin.users.fields.rol')}}</th>
                            <th>{{trans('admin.users.fields.status')}}</th>
                            <th>{{trans('admin.users.fields.actions')}}</th>
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
                                                <a class="inline-flex bg-teal-300 text-black rounded-full h-6 px-3 justify-center items-center"
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
                                                    <button type="submit">{{trans('admin.users.fields.delete')}}</button>
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
                                                    <button type="submit">{{trans('admin.users.fields.change status')}}</button>
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

