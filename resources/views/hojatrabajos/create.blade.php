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


        <form method="post" action="{{route('hoja.guardar')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="cliente">Cliente</label>
                <input id="cliente" type="text" value="{{old('cliente')}}" class="form-control" name="cliente" placeholder="Nombre del cliente ">
                </div>
                <div class="form-group col-md-4">
                    <label for="servicio">Servicio</label>
                    <input id="servicio" type="text" value="{{old('servicio')}}" class="form-control" name="servicio" placeholder="Servicio">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
</x-app-layout>


