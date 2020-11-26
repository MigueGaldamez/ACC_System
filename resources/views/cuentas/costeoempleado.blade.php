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
            <form action="{{route('salario')}}" method="POST">
               <div class="row">
                    <div class="col-sm">
                    
                                @csrf   
                        <select class="form-control" name="idempleado" id="idempleado">
                            @foreach ($empleados as $empleado)     
                                <option value="{{$empleado->id}}" >{{$empleado->Nombres}}, {{$empleado->Apellidos}} </option>
                            @endforeach
                        </select>
                
                    </div>
                     <div class="col-sm">
                       <button type="submit" class="btn btn-primary">Cargar datos</button>
                     </div>
                </div>
            </form>
                    
        </div>
        <br>
        <div class="container">
        
            <h5><b>calculo de salario real de : </b> {{isset($data->Nombres)?$data->Nombres:''}} {{isset($data->Apellidos)?$data->Apellidos:''}}</h5>
            <div class="container">
                <div class="row">
                        <div class="col-sm">
                            <label> Nombres</label>
                            <input class="form-control" disabled type="text" name="CodigoCuenta" id="CodigoCuenta" value="{{ isset($data->Nombres)?$data->Nombres:''}}">
                        </div>
                        <div class="col-sm">
                            <label>Apellidos</label>
                            <input class="form-control" disabled type="text" name="CodigoCuenta" id="CodigoCuenta" value="{{ isset($data->Apellidos)?$data->Apellidos:''}}">
                        </div>
                        
                    </div>
            </div>
            <br>
     
            <div class="container">
                <div class="row">
                    <div class="col-sm d-none">
                        
                         <input class="form-control" disabled type="number" name="Codigo" id="Codigo" value="{{ isset($data->id)?$data->id:''}}">
                    </div>
                    <div class="col-sm">
                         <label> Salario Nominal Diario</label>
                         <input class="form-control" disabled type="number" name="salarioNominalDia" id="salarioNominalDia" value="{{ isset($data->salarioNominalDia)?$data->salarioNominalDia:''}}">
                    </div>
                    <div class="col-sm">
                        <label> Jornada en Dias</label>
                         <input class="form-control" type="number" name="dias" id="dias" value="">
                    </div>
                       <div class="col-sm">
                         <label>Jornada menos dias no trabajados</label>
                         <input class="form-control"  type="number" name="diassin" id="diassin" value="">
                    </div>
                    
                </div>
                <br>
                 <div class="row">
                 
                    <div class="col-sm">
                        <label>Horas trabajadas</label>
                         <input class="form-control" type="number" name="horas" id="horas" value="">
                    </div>
                      <div class="col-sm">
                         <label>Dias de Aguinaldo</label>
                         <input class="form-control"  type="number" name="aguinaldo" id="aguinaldo" value="">
                    </div>
                    <div class="col-sm">
                        <div class="row">
                            <div class="col-sm">
                                <label>Dias de Vacaciones</label>
                                <input class="form-control" type="number" name="diasvacacion" id="diasvacacion" value="">
                            </div>
                            <div class="col-sm">
                                <label>% para vacaciones</label>
                                <input class="form-control" type="number" name="porcentaje" id="porcentaje" value="">
                            </div>
                        </div>
                        
                          
                    </div>
                    
                </div>
             
                <br>
                 <div class="row">
                    <div class="col-sm">
                         <label>Eficiencia</label>
                         <input class="form-control"  type="number" name="eficiencia" id="eficiencia" value="">
                    </div>
                    <div class="col-sm">
                        <label>Prestaciones Contractuales</label>
                         <input class="form-control" type="number" name="contractuales" id="contractuales" value="">
                    </div>
                    
                </div>
                <br>
                <div class="row">
                    <div class="col-sm">
                        <div class="row">
                            <div class="col-sm text-right">
                              <button class="btn btn-primary" id="calculo">Calcular</button>
                            </div>
                             <div class="col-sm">
                                <form method="post" action="{{route('costeo')}}">
                                    @csrf 
                                    <input class="d-none form-control" step="any" type="number" name="Codigo" id="Codigo" value="{{ isset($data->id)?$data->id:''}}">
                                    <input class="d-none form-control" step="any" type="number" name="nominalhoraIN" id="nominalhoraIN" value="">
                                    <input class="d-none form-control" step="any" type="number" name="realdiaIN" id="realdiaIN" value="">
                                    <input class="d-none form-control" step="any" type="number" name="realhoraIN" id="realhoraIN" value="">
                                
                                    <button type="submit" class="btn btn-secondary">Guardar</button>
                                </form>
                            </div>
                        </div>
                      
                        
                        
                    </div> 
                    <div class="col-sm">
                        <div class="row">
                          <div class="col-sm">
                            Salario real por dia: <b id="diarioR">$</b>
                            <br>
                            Salario real por hora: <b id="horaR">$</b>
                          </div>
                          <div class="col-sm">
                            Factor de recargo: <b id="frR">$</b>
                            <br>
                            Factor recargo con eficiencia: <b id="freR">$</b>
                          </div>
                        </div>
                      
                    </div>
                     
                    
                </div>
            </div>
            <br>
            <br>
                  

                

            

        </div>




      
</x-app-layout>

<script type="text/javascript">
  $('#calculo').on('click',function(event){
        event.preventDefault();
        diario = document.getElementById("salarioNominalDia").value;
        dias = document.getElementById("dias").value;
        diassin = document.getElementById("diassin").value;
        aguinaldo = document.getElementById("aguinaldo").value;
        diasvacacion =document.getElementById("diasvacacion").value;
        porcentaje =document.getElementById("porcentaje").value;
        contractuales = document.getElementById("contractuales").value;
        horas = document.getElementById("horas").value;
        eficiencia = document.getElementById("eficiencia").value;

        vacacionesCalc = ((diario * diasvacacion) + (diario * diasvacacion*(porcentaje/100)))/52 ;
        salud = ((diario*dias)+ vacacionesCalc)*0.075;
        AFP = ((diario*dias)+ vacacionesCalc)*0.0775;
        semanal = (diario*dias)+((aguinaldo * diario)/52)+vacacionesCalc + salud + AFP;
        diarioreal = semanal/diassin;
        hora = diarioreal/horas;
        diarioreal = Math.round((diarioreal + Number.EPSILON) * 100) / 100;
        hora = Math.round((hora + Number.EPSILON) * 100) / 100;
        semanal = Math.round((semanal + Number.EPSILON) * 100) / 100;       

        FR = semanal/(diario*diassin);
        FRE = (semanal)/((diario*diassin)*(eficiencia/100));

        FR = Math.round((FR + Number.EPSILON) * 100) / 100;
        FRE = Math.round((FRE + Number.EPSILON) * 100) / 100;

        nominalhora = diario/horas; 
        $('#diarioR').text(diarioreal);
        $('#horaR').text(hora);
        $('#frR').text(FR);
        $('#freR').text(FRE);

        $('#nominalhoraIN').val(nominalhora);
        $('#realdiaIN').val(diarioreal);
        $('#realhoraIN').val(hora);
        



       
        
    });

</script>