<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pantalla Principal') }}
        </h2>
    </x-slot>
 
     

    <div class="py-12">
  
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @if(Session::has('Mensaje')) <div class="alert alert-success" role="alert">
                <h4 class="alert-heading"> {{
         
                    Session::get('Mensaje')
                }}!</h4>
                        <p>Funcionando de maravilla.</p>
                        <hr>
                        <p class="mb-0">Registro contable guardado satisfactoriamente</p>
                    </div>
                @endif
                <x-jet-welcome />
            </div>
        </div>
    </div>
</x-app-layout>
