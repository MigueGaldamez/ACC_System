<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hoja de trabajo ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{--<x-jet-welcome />--}}
                      @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif



        @if(Session::has('Mensaje')){{
          Session::get('Mensaje')
        }}
        @endif

        <div class="container">
        <br><br>
          <h2><b></b>Hojas de trabajo Actualmente en el sistema.</h2>

             <div  class="">
            @csrf
            <table id="editable" class="table">
              <thead>
                <tr>
                  <th scope="col" class="d-none">ID</th>
              
                  <th scope="col" >Cliente</th>
                  <th scope="col">Servicio</th>
                  <th scope="col">Fecha Inicio</th>
                  <th scope="col">Fecha Fin</th>
                  <th scope="col" class="text-center">Acciones</th>
                 
                </tr>
              </thead>
              <tbody>
                @foreach($hoja as $row)
                <tr>
                  <td class="d-none">{{ $row->id }}</td>
                  <td>{{ $row->cliente }}</td>
                  <td>{{ $row->servicio}}</td>
                  <td>{{ $row->fechainicio }}</td>
                  <td>{{ $row->fechafin }}</td>
                  <td>
                    <a href="{{ route('hoja.edit',$row->id) }}" class="badge badge-info">+|- Empleados</a>
                    <a href="{{ route('hoja.edith',$row->id) }}" class="badge badge-info">Editar Hoja</a>
                    <a href="{{ route('hoja.destroy',$row->id) }}" class="badge badge-info">Eliminar</a>
                    @if ($row->fechafin != NULL)
                    <a href="{{ route('hoja.table',$row->id) }}" class="badge badge-dark">Ver Tabla</a>
                    @else
                    <a href="{{ route('hoja.end',$row->id) }}" class="badge badge-success">Finalizar</a>

                    @endif
                    


                  </td>
                </tr>
                @endforeach
                <tr>
                  <td></td>
                    <td></td>
                    <th ><b></b></th>
                    <th><b></b></th>
                    <th class="text-right"> 
                    <a href="{{route('hoja.create')}}" >Crear hoja de trabajo</a>
                    </th>
                </tr>
              </tbody>
            </table>
          </div>
       
    </div>
        </div>
</x-app-layout>


