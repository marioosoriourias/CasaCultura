<div>
    <div class="container">
        <h1 class="text-3xl text-center pb-8 pt-2">Alumnos del taller <strong>{{$this->course->name}}</strong> del periodo <strong>{{$this->course->period->name}}</strong></h1>
         
        @if (session('info'))
            <div class="card">
                <div class="card-body bg-green-600">
                    <p class="text-white">{{session('info')}}</p>
                </div>
            </div>
        @endif

        <x-table-responsive>
            <div class="px-6 py-4 flex ">
                <input wire:keydown="limpiar_page" wire:model="search" class="flex-1 form-group h-10 w-full border-gray-300  border-2"  placeholder="Ingrese el nombre de un alumno...">
                <a href="{{route('students.create')}}" class="btn btn-danger ml-2">Agregar nuevo alumno</a>
            </div>


            @if($students->count())    
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                            Id
                        </th>
                       
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                            Nombre
                        </th>

                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                            Edad
                        </th>

                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                            Sexo
                        </th>
                    </tr>
                    </thead>
                   
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($students as $student)
                            <tr>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{$student->id}}</div>                   
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">    
                                    <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-base font-medium text-gray-900">
                                            {{$student->name}}
                                        </div>
                                    </div>
                                    </div>
                                </td>
                              
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{$student->age}}</div>                   
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">{{$student->gender}}</div> 
                                </td>                                                    
                               

                            </tr>                 
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-2">
                    {{$students->links()}}
                </div>
            
            @else
            <div class="px-6 py-4">
                No hay ningun registro coincidente...
            </div>
            @endif
        </x-table-responsive>
    </div>
</div>
