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
        <form method="post" action="{{route('detalle.updated',$detalle)}}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="actividad">Actividad</label>
                <input id="actividad" type="text" class="form-control" name="actividad" value="{{$detalle->actividad}}" placeholder="Actividad ">
                </div>
                <div class="form-group col-md-4">
                    <label for="horasUtilizadas">horas Utilizadas</label>
                    <input id="horasUtilizadas" type="number"  class="form-control" value="{{$detalle->horasUtilizadas}}" name="horasUtilizadas" placeholder="horas Utilizadas">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>

        </form>

 
</x-app-layout>
