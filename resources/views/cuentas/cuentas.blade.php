<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cuentas') }}
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
          <h2><b>Catalogo de cuentas utilizadas en el sistema.</b></h2>
        <h4><b> </b></h4>
             <div  class="">
            @csrf
            <table id="editable" class="table table-sm">
              <thead>
                <tr>
                  <th scope="col" class="d-none">ID</th>
              
                  <th scope="col" >Codigo</th>
                  <th scope="col">Nombre Cuenta</th>
                  <th scope="col" class="text-center">Tipo Cuenta</th>
                  <th scope="col" class="text-center">Clase</th>
                  <th scope="col" class="text-center">Naturaleza</th>
                  <th scope="col" class="text-center d-none">Acciones</th>
                 
                </tr>
              </thead>
              <tbody>
                @foreach($cuentas as $row)
                @if( $row->clase === 1)
                 <tr class="table-info">
                @else
                 <tr>
                @endif
               
                  <td class="d-none">{{ $row->id }}</td>
                  <td>{{ $row->CodigoCuenta }}</td>
                  <td>{{ $row->NombreCuenta }}</td>
                  <td class="text-center">
                      @if( $row->TipoCuenta === 1)
                      <span class="badge badge-primary">Activo</span>
                         
                      @endif
                       @if( $row->TipoCuenta === 0)
                         Pasivo
                      @endif
                       @if( $row->TipoCuenta === 2)
                         Capital
                      @endif
                       @if( $row->TipoCuenta === 3)
                         Costos
                      @endif
                       @if( $row->TipoCuenta === 5)
                     
                           <span class="badge badge-success">Ingresos</span>
                      @endif                  
                       
                       
                   </td>
                  <td class="text-center">
                      @if( $row->clase === 1)
                      <span class="badge badge-secondary">Acumuladora</span>
                         
                      @endif
                       @if( $row->clase === 0)
                          <span class="badge badge-warning">Registro</span>
                      
                      @endif
                  
                  
                  </td>
                  <td class="text-center">
                  
                      @if( $row->naturaleza === 1)
                      <span class="badge badge-secondary">Deudora</span>
                         
                      @endif
                       @if( $row->naturaleza === 0)
                          <span class="badge badge-warning">Acreedora</span>
                      
                      @endif
                  
                  </td>

                <td class="d-none">
                    <div class="btn-toolbar ">
                   
                    
                    <a href="{{url('/empleados/'.$row->id.'/edit/')}}" class="btn btn-primary btn-sm">
                    Editar</a>
                      &nbsp;&nbsp;
                    <form method="post" action="{{url('/empleados/'.$row->id)}}">
                    {{csrf_field()}}
                    {{ method_field('DELETE')}}
                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('¿Borrar?');">Borrar</button>
                    </form>
                    </div>
                </td>
                 
                </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    
                    <th ><b></b></th>
                    <th><b></b></th>
                    <th class="text-right"> 
                    
                   
                <a href="{{ url('cuentas/create')}}" >Agregar Cuenta</a>
                    
                    
                   
                    
                    
                    </th>
                </tr>
              </tbody>
            </table>
          </div>
       
    </div>
        </div>
</x-app-layout>


