<div class="container">
    <Br>
    <div class="row">
    <label for="Nombres">{{'Nombres'}}</label>
    <input class="form-control" type="text" name="Nombres" id="Nombres" value="{{ isset($empleado->Nombres)?$empleado->Nombres:''}}">

    <label for="Apellidos">{{'Apellidos'}}</label>
    <input class="form-control" type="text" name="Apellidos" id="Apellidos"  value="{{ isset($empleado->Apellidos)?$empleado->Apellidos:''}}">

    <label for="Correo">{{'Correo'}}</label>
    <input class="form-control" type="email" name="Correo" id="Correo"  value="{{ isset($empleado->Correo)?$empleado->Correo:''}}">

    
    <label for="salarioNominalDia">{{'salarioNominalDia'}}</label>
    <input class="form-control" type="number" name="salarioNominalDia" id="salarioNominalDia"  value="{{ isset($empleado->salarioNominalDia)?$empleado->salarioNominalDia:''}}">

    <br>
    <br>
    <input class="btn btn-primary" type="submit" value="{{$Modo =='crear' ? 'Agregar':'Modificar'}}">

    <a href="{{ url('empleados')}}">Regresar</a>
    
    </div>
    <br>
    <br>
</div>


