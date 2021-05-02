<x-app-layout>
    <div class="container py-8 ">
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-bold text-center">Editar periodo</h1>   
                                 
                @if (session('info'))
                    <div class="card">
                        <div class="card-body bg-green-600">
                            <p class="text-white">{{session('info')}}</p>
                        </div>
                    </div>
                @endif
            
                <hr class="mt-2 mb-6">

                {!! Form::model($period, ['route'=>['periods.update', $period], 'method' => 'put']) !!}

                <div class="mb-4">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-input block w-full mt-1']) !!}
                    @error('name')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>
                             
                {!! Form::hidden('id') !!}
                
                <div class="mb-4">
                    {!! Form::label('start_date', 'Fecha de termino') !!}
                    {!! Form::date('start_date', null, ['class' => 'form-input block w-full mt-1']) !!}
                    @error('start_date')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>
                
                <div class="mb-4">
                    {!! Form::label('end_date', 'Fecha de inicio') !!}
                    {!! Form::date('end_date', null, ['class' => 'form-input block w-full mt-1']) !!}
                    @error('end_date')
                        <span class="text-red-600">{{$message}}</span>
                    @enderror
                </div>
                

                <div class="flex justify-between">
                    <a href="{{route('periods.index')}}" class="btn btn-danger cursor-pointer" href="">Cancelar</a>
                    {!! Form::submit('Editar periodo', ['class' => 'btn btn-primary cursor-pointer']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</x-app-layout>