
    <label for="CidogoCuenta">{{'CodigoCuenta'}}</label>
    <input class="form-control" type="text" name="CodigoCuenta" id="CodigoCuenta" value="{{ isset($cuenta->CodigoCuenta)?$cuenta->CodigoCuenta:''}}">

    <label for="NombreCuenta">{{'NombreCuenta'}}</label>
    <input class="form-control" type="text" name="NombreCuenta" id="NombreCuenta"  value="{{ isset($cuenta->NombreCuenta)?$cuenta->NombreCuenta:''}}">

    <label for="TipoCuenta">{{'TipoCuenta'}}</label>
    <input class="form-control" type="text" name="TipoCuenta" id="TipoCuenta"  value="{{ isset($cuenta->TipoCuenta)?$cuenta->TipoCuenta:''}}">




    <input class="btn btn-primary" type="submit" value="{{$Modo =='crear' ? 'Agregar':'Modificar'}}">

    <a href="{{ url('cuentas')}}">Regresar</a>