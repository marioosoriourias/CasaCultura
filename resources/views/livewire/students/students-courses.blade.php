<div>
    <div class="container">
        <h1 class="text-2xl text-center pb-8 pt-2">Talleres llevados por: <strong>{{$student->name}}</strong></h1>
         
        @if (session('info'))
            <div class="card">
                <div class="card-body bg-green-600">
                    <p class="text-white">{{session('info')}}</p>
                </div>
            </div>
        @endif

        <x-table-responsive>
            <div class="px-6 py-4 flex ">
                <input wire:keydown="limpiar_page" wire:model="search" class="flex-1 form-group h-10 w-full border-gray-300  border-2"  placeholder="Ingrese el nombre de un taller...">
                <a href="{{route('student-course-add', $student)}}" class="btn btn-danger ml-2">Asignar nuevo taller</a>
            </div>


            @if($courses->count())    
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
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
                            <p>Eliminar taller</p>
                        </th>
                    </tr>
                    </thead>
                   
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($courses as $course)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">    
                                    <div class="text-base font-medium text-gray-900">
                                        {{$course->name}}
                                    </div>
                                </td>
                              
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{$course->teacher->name}}</div>                   
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">{{$course->period->name}}</div> 
                                </td>                                                    
                                                                                                 
                                        
                                <td width="10px" class="text-center px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <form  wire:submit.prevent="delete({{$course->id}})">
                                        <button class="text-red-500 hover:text-red-700 "  type="submit"><i class="fas fa-user-times text-2xl"></i></button>
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
