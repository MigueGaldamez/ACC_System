<x-guest-layout>
   

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif



        <form method="post" action="{{url('/cuentas')}}" enctype="multipart/form-data">
            {{ csrf_field()}}
            @include('cuentas.form',['Modo'=>'crear'])
            
        </form>


</x-guest-layout>
