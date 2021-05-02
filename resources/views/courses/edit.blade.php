<x-app-layout>
    <div class="container py-8 ">
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-bold text-center">Agregar nuevo taller</h1>     
                
                @if (session('info'))
                    <div class="card">
                        <div class="card-body bg-green-600">
                            <p class="text-white">{{session('info')}}</p>
                        </div>
                    </div>
                @endif
        
            
                <hr class="mt-2 mb-6">

                {!! Form::model($course, ['route'=>['courses.update', $course], 'method' => 'put']) !!}
        

                <div class="mb-4">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-input block w-full mt-1']) !!}
                    @error('name')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>

                {!! Form::hidden('id') !!}

                <div class="mb-4">
                    {!! Form::label('period_id', 'Periodo') !!}
                    {!! Form::select('period_id', $periods, null, ['class' => 'form-input block w-full mt-1']) !!}
                    @error('period_id')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>    

                <div class="mb-4">
                    {!! Form::label('teacher_id', 'Maestro') !!}
                    {!! Form::select('teacher_id', $teachers, null, ['class' => 'form-input block w-full mt-1', 'placeholder' => 'Selecciona una maestro']) !!}
                    @error('teacher_id')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>

                <div class="flex justify-between">
                    <a href="{{route('courses.index')}}" class="btn btn-danger cursor-pointer" href="">Cancelar</a>
                    {!! Form::submit('Editar taller', ['class' => 'btn btn-primary cursor-pointer']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</x-app-layout>