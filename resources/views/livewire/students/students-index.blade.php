<div>
    <div class="container">
        <h1 class="text-3xl text-center pb-8 pt-2">Alumnos</h1>
         
        @if (session('info'))
            <div class="card mb-4">
                <div class="card-body bg-green-600">
                    <p class="text-white">{{session('info')}}</p>
                </div>
            </div>
        @endif

        <a href="{{route('students-excel')}}" class="text-4xl text-green-600"><i class="fas fa-file-csv"></i></a>

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
                        
                        <th scope="col" class="text-center  px-6 py-3 text-xs font-medium text-gray-600 uppercase tracking-wider">
                            <p>Talleres</p>
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                            <p>Editar alumno</p>
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                            <p>Eliminar alumno</p>
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
                                    <div class="text-base font-medium text-gray-900">
                                        {{$student->name}}
                                    </div>
                                </td>
                              
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{$student->age}}</div>                   
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">{{$student->gender}}</div> 
                                </td>                                                    
                               

                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                    <a  href="{{route('student-courses', $student)}}" class="text-gray-500 cursor-pointer" ><i class="fas fa-address-book text-2xl"></i></a>
                                </td>                                                    
                               
                                <td width="10px" class="text-center px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a  href="{{route('students.edit', $student)}}" class="text-gray-500 cursor-pointer" ><i class="fas fa-user-edit text-2xl"></i></a>
                                </td>
                                        
                                <td width="10px" class="text-center px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <form action="{{route('students.destroy', $student)}}"    method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="text-red-500 hover:text-red-700 "  type="submit"><i class="fas fa-user-times text-2xl"></i></button>
                                    </form>
                                    <a ></a>
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
