<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registro Contable') }}
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
        <form method="post" action="{{route('hoja.update',$hojatrabajo)}}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <table id="editable" class="table">
                <thead>
                  <tr>
                    <th scope="col" class="d-none">ID</th>
                
                    <th scope="col" >Nombres</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Salario Nominal</th>
                    <th scope="col">Salario Real</th>
                    <th scope="col" >Seleccionar</th>
                   
                  </tr>
                </thead>
                <tbody>
                  @foreach($empleados as $row)
                  <tr>
                    <td class="d-none">{{ $row->id }}</td>
                    <td>{{ $row->Nombres }}</td>
                    <td>{{ $row->Apellidos }}</td>
                    <td>{{ $row->Correo }}</td>
                    <td>{{ $row->salarioNominalDia }}</td>
                    <td>
                      {{isset($row->salarioRealDia)?$row->salarioRealDia:'No ha sido calculado'}}
                    </td>
                    <td>
                    <input class="form-check-input" type="checkbox" name="empleado[]" value="{{ $row->id }}"  id="inlineCheckbox1">

                    </td>
                  </tr>
                  @endforeach
                  <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <th ><b></b></th>
                      <th><b></b></th>
                      <th class="text-right"> 
                        <button type="submit" class="btn btn-primary">Agregar</button>
                        </th>

                  </tr>
                </tbody>
              </table>
        </form>  
        <table id="editable" class="table">
            <thead>
              <tr>
                
            
                <th scope="col" >Nombre</th>
                <th scope="col">Actividad</th>
                <th scope="col">Horas Utilizadas</th>
                <th scope="col" >Acciones</th>
               
              </tr>
            </thead>
            <tbody>
              @foreach($detalle as $row)
              <tr>
                
              <td>{{ $row->empleados->Nombres }}{{__(', ')  }}{{$row->empleados->Apellidos}}</td>
                
                <td>{{ $row->actividad }}</td>
                <td>{{ $row->horasUtilizadas }}</td>
                <td>
                    <a href="{{ route('detalle.editd',$row->id) }}" class="badge badge-info">Editar Empleado</a>
                    <a href="{{ route('detalle.destroy',$row->id) }}" class="badge badge-info">Eliminar Empleado</a>
                </td>
              </tr>
              @endforeach
              <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <th ><b></b></th>
                  <th><b></b></th>


              </tr>
            </tbody>
          </table>


 
</x-app-layout>


