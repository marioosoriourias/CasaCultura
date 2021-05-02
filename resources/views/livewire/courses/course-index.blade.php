<div>
    <div class="container">
        <h1 class="text-3xl text-center pb-8 pt-2">Talleres</h1>
         
        @if (session('info'))
            <div class="card">
                <div class="card-body bg-green-600">
                    <p class="text-white">{{session('info')}}</p>
                </div>
            </div>
        @endif

        <x-table-responsive>
           
            <div class="px-6 py-4 flex ">
                @if (!$periods->count())
                    <h1 class="text-2xl mx-auto">Primero debe agregar un periodo</h1>
                @else
                    <input wire:keydown="limpiar_page" wire:model="search" class="flex-1 form-group h-10 w-full border-gray-300  border-2"  placeholder="Ingrese el nombre de un taller...">
                    <a href="{{route('courses.create')}}" class="btn btn-danger ml-2">Agregar nuevo taller</a>
            
                @endif
            </div>
  

            @if($courses->count())    
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
                            Maestro
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                            Periodo
                        </th>

                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                            Alumnos
                        </th>

                        
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                            <p>Editar taller</p>
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                            <p>Eliminar taller</p>
                        </th>
                    </tr>
                    </thead>
                   
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($courses as $course)
                            <tr>

                                <td class="px-6 py-4 whitespace-nowrap">    
                                    <div class="text-base font-medium text-gray-900"><p> {{$course->id}}</p></div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">    
                                    <div class="text-base font-medium text-gray-900">
                                        <a href="{{route('course-students', $course->id)}}" class="bg-gray-200"> {{$course->name}}</a>  
                                    </div>
                                </td>
                              

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        @isset($course->teacher->name)
                                            <a href="{{route('teachers-courses', $course->teacher)}}" class="bg-gray-200"> {{$course->teacher->name}}</a>                                           
                                        @else
                                          <p class="text-red-500">No hay un maestro para ese curso</p>
                                        @endisset
                                        
                                    </div>                   
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">{{$course->period->name}}</div> 
                                </td>                                                    

                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">{{$course->students_count}}</div> 
                                </td> 
                                
                               
                                <td width="10px" class="text-center px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a  href="{{route('courses.edit', $course)}}" class="text-gray-500 cursor-pointer" ><i class="fas fa-edit text-2xl"></i></a>
                                </td>
                              
                                
                                <td width="10px" class="text-center px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <form action="{{route('courses.destroy', $course)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="text-red-500 hover:text-red-700 "  type="submit"><i class="fas fa-trash-alt text-2xl"></i></button>
                                    </form>
                                    <a ></a>
                                </td>
                            </tr>                 
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-2">
                    {{$courses->links()}}
                </div>
            
            @else
            <div class="px-6 py-4">
                No hay ningun registro coincidente...
            </div>
            @endif
        </x-table-responsive>
    </div>
</div>
