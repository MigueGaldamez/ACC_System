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



  
  
            <div class="bg-white  sm:rounded-lg">
                @if(Session::has('Mensaje')) <div class="alert alert-success" role="alert">
                <h4 class="alert-heading"> {{
         
                    Session::get('Mensaje')
                }}!</h4>
                      {{  Session::get('Complemento')}}
                    </div>
                @endif               
            </div>
       
        <div class="container">
        
       

        <br><br>
          <h2><b></b> Empleados Actualmente en el sistema.</h2>
        <h4><b>Cant Empleados. #: </b></h4>
             <div  class="">
            @csrf
            <table id="editable" class="table">
              <thead>
                <tr>
                  <th scope="col" class="d-none">ID</th>
              
                  <th scope="col" >Nombres</th>
                  <th scope="col">Apellidos</th>
                  <th scope="col">Correo</th>
                  <th scope="col">Salario Nominal Diario</th>
                  <th scope="col">Salario Real Diario</th>
                  <th scope="col" class="text-center">Acciones</th>
                 
                </tr>
              </thead>
              <tbody>
                @foreach($empleados as $row)
                <tr>
                  <td class="d-none">{{ $row->id }}</td>
                  <td>{{ $row->Nombres }}</td>
                  <td>{{ $row->Apellidos }}</td>
                  <td>{{ $row->Correo }}</td>
                  <td class="text-center">{{ $row->salarioNominalDia }}</td>
                  <td class="text-center">
                  
                    {{isset($row->salarioRealDia)?$row->salarioRealDia:'No ha sido calculado'}}
                  
                  </td>

                <td>
                    <div class="btn-toolbar">
                   
                    
                    <a href="{{url('/empleados/'.$row->id.'/edit/')}}" class="btn btn-primary">
                    Editar</a>
                      &nbsp;&nbsp;
                    <form method="post" action="{{url('/empleados/'.$row->id)}}">
                    {{csrf_field()}}
                    {{ method_field('DELETE')}}
                    <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?');">Borrar</button>
                    </form>
                    </div>
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
                    
                   
                <a href="{{ url('empleados/create')}}" >Agregar Empleado</a>
                    
                    
                   
                    
                    
                    </th>
                </tr>
              </tbody>
            </table>
          </div>
       
    </div>
        </div>
</x-app-layout>


