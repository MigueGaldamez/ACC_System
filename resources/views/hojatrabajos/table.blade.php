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
          <h2><b></b>Hojas de trabajo .</h2>

             <div  class="">
            @csrf
            <table id="editable" class="table table-bordered text-center">
                <thead>
                <tr>
                  <th colspan="6">Proyectos, S.A. de C.V.</th>
                </tr>
                <tr>
                  <th colspan="5">Hoja de control de ordenes de servicio</th>
                <th colspan="1"> No. {{$hojatrabajo->id}}</th>
                </tr>
                <tr>
                  <th colspan="5">Cliente: {{$hojatrabajo->cliente}}</th>
                  <th colspan="1">Fecha Inicio: {{$hojatrabajo->fechainicio}}</th>
                </tr>
              
                <tr>
                  <th colspan="5">Servicio: {{$hojatrabajo->servicio}} </th>
                  <th colspan="1">Fecha Fin: {{$hojatrabajo->fechafin}}</th>
                </tr>
                
                <tr>
                  <th>No </th>
                  <th>Responsable: </th>
                  <th>Actividad: </th>
                  <th>Horas Utilizadas: </th>
                  <th>Valor hora hombre:</th>
                  <th>Costo Total: </th>
                </tr>
            </thead>
            
            <?php
            $numero =0;
            $sumahoras=0;
            $sumacosto=0;
            ?>
            @foreach ($detalle as $item)
            <?php
            $numero++;
            $sumahoras =$sumahoras+$item->horasUtilizadas;
            $sumacosto= $sumacosto + ($item->empleados->salarioRealHora * $item->horasUtilizadas);
            ?>
            <tr>
                <td>{{$numero}}</td>
                <td>{{ $item->empleados->Nombres }}{{__(', ')  }}{{$item->empleados->Apellidos}}</td>
                <td>{{$item->actividad}}</td>
                <td>{{$item->horasUtilizadas}}</td>
                <td>{{ $item->empleados->salarioRealHora }}</td>
                <td>$ {{ $item->empleados->salarioRealHora * $item->horasUtilizadas}}</td>
              </tr>
            @endforeach
                  <tr>
                  <td>{{$numero+1}}</td>
                    <td>CIF asignacion</td>
                  <td>Factor app: {{$hojatrabajo->factor}} %</td>
                  <td>{{$sumahoras}}</td>
                  <td>{{$sumahoras*($hojatrabajo->factor/100)}}</td>
                  <td>$ {{$sumahoras*($hojatrabajo->factor/100)}}</td>
                </tr>
                  </tr>
                  <tr>
                  <td colspan="5">Total</td>
                  <td>$ {{$sumacosto + $sumahoras*($hojatrabajo->factor/100)}}</td>
                </tr>
              </table>
          </div>
       
    </div>
        </div>
</x-app-layout>


