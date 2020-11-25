<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Costeo') }}
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
            <br>
            <h2><b>Calcular Salario real de empleado</b></h2>
            <h6> Seleccione el empleado</h6>
               <div class="input-group col-md-6 mb-3">
                    <form action="{{route('salario')}}" method="POST">
                                @csrf   
                        <select class="form-control" name="idempleado" id="idempleado">
                            @foreach ($empleados as $empleado)     
                                <option value="{{$empleado->id}}" >{{$empleado->Nombres}}, {{$empleado->Apellidos}} </option>
                            @endforeach
                        </select>
                        

                        <br>

                        <button type="submit" class="btn btn-primary">Cargar datos</button>
                    </form>
                </div>
                    
        </div>
        <div class="container">
            <h6><b>calculo de salario real de : </b> {{$data->Nombres}} {{$data->Apellidos}}  </h6>
        </div>




      
</x-app-layout>

