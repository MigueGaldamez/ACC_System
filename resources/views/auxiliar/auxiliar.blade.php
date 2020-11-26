
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registro auxiliar') }}
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
            <h2><b>Registro auxiliar</b></h2>
         
                <form action="{{route('auxiliar.auxiliar')}}" method="POST">
                    @csrf
                    <div class="row">
                    <div class="col-sm">
                        <label for="cuenta">cuenta</label>
                        <select class="custom-select mr-sm-2" id="cuenta" name="cuenta">
                            <option selected>Seleccione</option>
                            @foreach ($cuentas as $item)
                            @if ($cuenta==$item->id)
                                <option value="{{$item->id}}" selected>{{$item->NombreCuenta}}</option>
                            @else
                                <option value="{{$item->id}}" >{{$item->NombreCuenta}}</option>
                            @endif
    
                        @endforeach
                        </select>
                    </div>
                    <div class="col-sm">
                        <label for="cuenta">fecha</label>
                    <input class="form-control" type="month" name="fechafiltro" value="{{$mes}}"  id="fechafiltro"> 
                    </div>
                     </div>
                     <br>
                    <button type="submit" class="btn btn-primary">Generar</button>
                </form>
           <br>
        <div class="container">
            <h4><b>Detalle de Registro desde el:  </b>1ro de {{date("M",strtotime($mes))}} hasta el 31 de {{date("M",strtotime($mes))}}</h4>
        </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">fecha movimiento</th>
                        <th scope="col">debe</th>
                        <th scope="col">haber</th>
                        <th scope="col">concepto</th>
                    </tr>
                </thead>
                <tbody>
               
                    @foreach ($data as $item)
                    <tr>
                        

                    </tr>
                    <tr>
                        <td>{{$item->movimiento->fechaMovimiento }}</td>
                        @if ($item->debeCuenta>= $item->haberCuenta)
                        <td>{{$item->debeCuenta-$item->habeCuenta }}</td>
                        <td>-</td>
                        @endif
                        @if ($item->haberCuenta>= $item->debeCuenta)
                        <td>-</td>
                        <td>{{$item->haberCuenta- $item->debeCuenta }}</td>
                        @endif
                        <td>{{$item->concepto }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td>Total:</td>
                        <?php
                            $sumaDebe=0;
                            $sumaHaber=0;
                            foreach ($data as $item) 
                            {
                                $sumaDebe= $sumaDebe+$item->debeCuenta;
                                $sumaHaber= $sumaHaber+$item->haberCuenta;
                            }
                       
                        ?>
                        @if ($sumaDebe>= $sumaHaber)
                        <td>{{$sumaDebe-$sumaHaber }}</td>
                        <td>-</td>
                        @endif
                        @if ($sumaHaber>= $sumaDebe)
                        <td>-</td>
                        <td>{{$sumaHaber- $sumaDebe }}</td>
                        @endif
                        <td>-</td>
                    </tr>
                </tbody>
            </table>            
        </div>
    

 {{--

        

        --}}
      
</x-app-layout>
