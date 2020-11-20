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

        <div class="container">
        <br>
        <h2><b>Empresa:</b> Sistemas SopitaMaruchanJS</h2>
        <h4><b>Movi. #: {{$idmov}}</b></h4>
        <div class="form-inline">
          <div class="form-group">
            <h6><b>Fecha:</b></h6> 
            &nbsp;&nbsp;
            <input type="date" id="fechainter" name="fechainter"  class="form-control disabled">
          </div>
        </div>
        <br>
             <h6> <b>Agregar Cuenta</b></h6>
           <form  id="plosi"  >
             
              <div class="input-group col-md-6 mb-3">
            <div class="input-group-prepend">
              <div class="input-group-text">Codigo, Cuenta</div>
            </div> 
            <select class="form-control" name="idCodigoCuenta" id="idCodigoCuenta">
            @foreach ($cuentas as $cuenta)     
              <option value="{{$cuenta->id}}" > {{$cuenta->CodigoCuenta}}, {{$cuenta->NombreCuenta}} </option>
            @endforeach
            </select>&nbsp;&nbsp;
          <button id="sipi" class="btn btn-primary" type="submit" value="Agregar">
                   
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bookmark-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
              <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5V6H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V7H6a.5.5 0 0 1 0-1h1.5V4.5A.5.5 0 0 1 8 4z"/>
              </svg>
            </button> 
              
        

           </form>
           <form id="sipis">
           &nbsp;&nbsp;
           <button  class="btn btn-primary" id="activador" name="activador" type="submit">
              refresh
              </button>
            </form>
              </div>
        

        

 {{--

        

        --}}
      </div>
        <div class="container">   
          <div class="table-container" id="tablita" name="tablita">
            @include('cuentas.table')
          </div>
        </div>
      </div>
    </div>
</x-app-layout>


 <script type="text/javascript">

    $('#plosi').on('submit',function(event){
        event.preventDefault();
      
        idCodigoCuenta = $('#idCodigoCuenta option:selected').val();
          
        $.ajax({
          url: "/laravel/SIC/Sistema_Contable/public/cuentas/prueba",
          type:"POST",
          data:{
            "_token": "{{ csrf_token() }}",
            idCodigoCuenta:idCodigoCuenta
           
          },
          success:function(response){
        
          }
         })
        
        });

        $('#sipis').on('submit',function(event){
           refreshTable();
        });

        function refreshTable() {
            $('div.tablita').fadeOut();
            $('div.tablita').load(url, function() {
                $('div.tablita').fadeIn();
            });
          }
      </script>
      
      


