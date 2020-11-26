<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Generar Balance de comprobacion') }}
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
            <h2><b>Generar Balance de Comprobacion</b></h2>
            <h6> Seleccione el mes que desea generar el Balance de comprobacion</h6>
            <div class="input-group col-md-6 mb-3">
                <form action="{{route('balance')}}" method="POST">
                    @csrf
                    <input class="form-control" type="month" name="fechafiltro"  value="{{$mes}}" id="fechafiltro"> &nbsp;&nbsp;
                    <button type="submit" class="btn btn-primary">Generar</button>
                </form>
            </div>
         <div class="container">
            <h4><b>Balance de Comprobacion de: </b> {{date("M",strtotime($mes))}}  </h4>
            
        </div>


            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Cuenta</th>
                        <th scope="col">debe</th>
                        <th scope="col">haber</th>
                        
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{$item->cuentas->NombreCuenta}}</td>
                        @if ($item->debe>= $item->haber)
                        <td>{{$item->debe-$item->haber }}</td>
                        <td>-</td>
                        @endif
                        @if ($item->haber>= $item->debe)
                        <td>-</td>
                        <td>{{$item->haber- $item->debe }}</td>
                        @endif
                    </tr>
                    @endforeach
                    <tr>
                        <td>Total:</td>
                        <?php
                            $sumaDebe=0;
                            $sumaHaber=0;
                            foreach ($data as $item) 
                            {
                                $sumaDebe= $sumaDebe+$item->debe;
                                $sumaHaber= $sumaHaber+$item->haber;
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

                    </tr>

                </tbody>
            </table>            
        </div>

</x-app-layout>

