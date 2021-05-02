<div>
    <div class="container">
        <h1 class="text-3xl text-center pb-8 pt-2">Maestros</h1>
         
        @if (session('info'))
            <div class="card mb-4">
                <div class="card-body bg-green-600 ">
                    <p class="text-white">{{session('info')}}</p>
                </div>
            </div>
        @endif
        
        <a href="{{route('teachers-excel')}}" class="text-4xl text-green-600"><i class="fas fa-file-csv"></i></a>
    
        <x-table-responsive>
            <div class="px-6 py-4 flex ">
                <input wire:keydown="limpiar_page" wire:model="search" class="flex-1 form-group h-10 w-full border-gray-300  border-2"  placeholder="Ingrese el nombre de un maestro...">
                <a href="{{route('teachers.create')}}" class="btn btn-danger ml-2">Agregar nuevo maestro</a>
            </div>


            @if($teachers->count())    
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
                            Tipo de maestro
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                            Edad
                        </th>
                        
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                            <p>Telefono</p>
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                            <p>Talleres impartidos</p>
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                            <p>Editar maestro</p>
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">
                            <p>Eliminar maestro</p>
                        </th>
                    </tr>
                    </thead>
                   
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($teachers as $teacher)
                            <tr>

                                <td class="px-6 py-4 whitespace-nowrap">    
                                    <div class="text-base font-medium text-gray-900"><p> {{$teacher->id}}</p></div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">    
                                    <div class="text-base font-medium text-gray-900">
                                        {{$teacher->name}}
                                    </div>
                                </td>
                              

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{$teacher->teacherType->name}}</div>                   
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{$teacher->age}}</div>                   
                                </td>


                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">{{$teacher->phone}}</div> 
                                </td>                                                    

                               
                                <td width="10px" class="text-center px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a  href="{{route('teachers-courses', $teacher)}}" class="text-gray-500 cursor-pointer" ><i class="fas fa-book text-2xl"></i></a>
                                </td>

                                <td width="10px" class="text-center px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a  href="{{route('teachers.edit', $teacher)}}" class="text-gray-500 cursor-pointer" ><i class="fas fa-user-edit text-2xl"></i></a>
                                </td>
                              
                                
                                <td width="10px" class="text-center px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <form action="{{route('teachers.destroy', $teacher)}}"    method="POST">
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
                    {{$teachers->links()}}
                </div>
            
            @else
            <div class="px-6 py-4">
                No hay ningun registro coincidente...
            </div>
            @endif
        </x-table-responsive>
    </div>
</div>
