<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear roles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if($errors->any())
                        <div class="alert alert-dark alert-dimissible fade show" role="alert">
                            <strong>Revise los campos!</strong>
                            @foreach($errors->all() as $error)
                                <span class="badge badge-danger">{{$error}}</span>
                            @endforeach
                            <button type="button" class="close" data-dimiss="alert" aria-label="close">
                                <span aria-hidden="true">&times</span>
                            </button>
                        </div>
                    @endif
                    {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                    <div>
                        <div>
                            <label>Nombre del Rol</label>
                            {!! Form::text('name', '', array('class'=>'form-control')) !!}
                        </div>
                    </div>
                    <div>
                        <div>
                            <label>Permisos para ester Rol:</label>
                            <br/>
                            @foreach($permission as $value)
                                <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                    {{$value->name}}</label>
                                <br/>
                            @endforeach

                        </div>
                    </div>
                </div>
                <button>Guardar</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</x-app-layout>
