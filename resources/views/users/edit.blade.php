<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ trans('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if($errors->any())
                        <div class="alert alert-dark alert-dimissible fade show" role="alert">
                            <strong>{{trans('Check the fields')}}</strong>
                            @foreach($errors->all() as $error)
                                <span class="badge badge-danger">{{$error}}</span>
                            @endforeach
                            <button type="button" class="close" data-dimiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    {!! Form::model($user,['method'=> 'PATCH', 'route'=>['users.update', $user->id]]) !!}
                    <div>
                        <div >
                            <div>
                                <label for="name">{{trans('Name')}}</label>
                                {!! Form::text('name', null , array('class'=>'form-control')) !!}
                            </div>
                        </div>
                        <div>
                            <div >
                                <label for="email">{{trans('Email')}}</label>
                                {!! Form::text('email', null, array('class'=>'form-control')) !!}
                            </div>
                        </div>
                        <div>
                            <div>
                                <label>{{trans('Password')}}</label>
                                {!! Form::password('password', array('class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div>
                            <div>
                                <label for="">{{trans('Roles')}}</label>
                                {!! Form::select('roles[]', $roles,[], array('class'=>'form-control')) !!}
                            </div>
                        </div>
                        <div>
                            <button>{{trans('Save')}}</button>
                        </div>
                    </div>
                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
