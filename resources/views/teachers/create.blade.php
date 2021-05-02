<x-app-layout>
    <div class="container py-8 ">
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-bold text-center">Agregar nuevo maestro</h1>       
            
                <hr class="mt-2 mb-6">

                {!! Form::open(['route'=>'teachers.store']) !!}

                <div class="mb-4">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-input block w-full mt-1']) !!}
                    @error('name')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    {!! Form::label('teacher_type_id', 'Tipo de maestro') !!}
                    {!! Form::select('teacher_type_id', $teacher_type, 'null', ['class' => 'form-input block w-full mt-1']) !!}
                    @error('gender')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>
  
                
                <div class="mb-4">
                    {!! Form::label('age', 'Edad') !!}
                    {!! Form::number('age', null, ['class' => 'form-input block w-full mt-1',  'max'=>'999']) !!}
                    @error('age')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>
                
                <div class="mb-4">
                    {!! Form::label('gender', 'Sexo') !!}
                    {!! Form::select('gender', ['Masculino' ,'Femenimo'], 'null', ['class' => 'form-input block w-full mt-1']) !!}
                    @error('gender')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>
                
                <div class="mb-4">
                    {!! Form::label('phone', 'Telefono') !!}
                    {!! Form::number('phone', null, ['class' => 'form-input block w-full mt-1']) !!}
                    @error('phone')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    {!! Form::label('address', 'Dirección') !!}
                    {!! Form::textarea('address', null, ['class' => 'form-input block w-full mt-1', 'rows' => '3']) !!}
                    @error('address')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>
                
                <div class="mb-4">
                    {!! Form::label('email', 'Correo Electronico') !!}
                    {!! Form::Email('email', null, ['class' => 'form-input block w-full mt-1']) !!}
                    @error('email')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>
                

                <div class="flex justify-between">
                    <a href="{{route('teachers.index')}}" class="btn btn-danger cursor-pointer" href="">Cancelar</a>
                    {!! Form::submit('Agregar nuevo maestro', ['class' => 'btn btn-primary cursor-pointer']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</x-app-layout>