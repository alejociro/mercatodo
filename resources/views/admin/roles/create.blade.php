<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ trans('Create roles') }}
        </h2>
    </x-slot>
    <div class="w-full">
        <div class="bg-gradient-to-b from-blue-800 to-blue-600 h-96"></div>
        <div class="max-w-5xl mx-auto px-6 sm:px-6 lg:px-8 mb-12">
            <div class="bg-white w-full shadow rounded p-8 sm:p-12 -mt-72">
                {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                <div>
                    <div>
                        <label>{{trans('Role name')}}</label>
                        {!! Form::text('name', '', array('class'=>'form-control')) !!}
                    </div>
                </div>
                <div>
                    <div>
                        <label>{{trans('Permissions for this role')}}</label>
                        <br/>
                        @foreach($permission as $value)
                            <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                {{$value->name}}</label>
                            <br/>
                        @endforeach
                    </div>
                </div>
                <button type="submit"
                        class='w-auto bg-purple-500 hover:bg-purple-700 rounded-lg shadow-xl font-medium text-white px-4 my-5'>{{trans('Save')}}</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    </div>
</x-app-layout>
