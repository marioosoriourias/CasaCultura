<x-app-layout>
    <div class="container py-8 ">
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-bold text-center">Asignar nuevo taller</h1>       
            
                <hr class="mt-2 mb-6">

                {!! Form::open(['route'=>'student-course-save']) !!}

                <div class="mb-4">
                    {!! Form::label('name', 'Nombre del alumno') !!}
                    {!! Form::text('name', $student->name, ['class' => 'form-input block w-full mt-1', 'disabled']) !!}
                    @error('name')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>
                
                {!! Form::hidden('student_id', $student->id, ['class' => 'form-input block w-full mt-1']) !!}
                
                <div class="mb-4">
                    {!! Form::label('course_id', 'Taller') !!}

                    
                    {!! Form::select('course_id', $courses->count() ? $courses : ['No hay ningun taller disponible'], 'null', ['class' => 'form-input block w-full mt-1']) !!}
                    @error('course_id')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>
                

                <div class="flex justify-between">
                    <a href="{{route('student-courses', $student)}}" class="btn btn-danger cursor-pointer" href="">Cancelar</a>
                    @if (!$courses->count())
                        <button class="btn btn-primary cursor-default pointer-events-none" disabled>Asignar nuevo taller</button>
                    @else
                        {!! Form::submit('Asignar nuevo taller', ['class' => 'btn btn-primary cursor-pointer']) !!}
                    @endif
                                        
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</x-app-layout>