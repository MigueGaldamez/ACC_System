<form method="post" action="{{url('/cuentas/' . $cuenta->id)}}" enctype="multipart/form-data">
    {{ csrf_field()}}
    {{method_field('PATCH')}}
    @include('cuentas.form',['Modo'=>'editar'])
    
</form>