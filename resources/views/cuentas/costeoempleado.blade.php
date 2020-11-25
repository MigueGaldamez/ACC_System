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
                <input class="form-control" type="month" name="debeMovimiento" id="debeMovimiento"> &nbsp;&nbsp;
                <button type="submit" class="btn btn-primary">Generar</button>
            </div>
          
        </div>
        <div class="container">
            <h4><b>Balance de Comprobacion de: </b> Noviembre 2020  </h4>
        </div>


      
</x-app-layout>

