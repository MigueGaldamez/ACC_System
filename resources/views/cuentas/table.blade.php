   <div  class="">
            @csrf
            <table id="editable" class="table">
              <thead>
                <tr>
                  <th scope="col" class="d-none">ID</th>
              
                  <th scope="col" >Codigo</th>
                  <th scope="col">Cuenta</th>
                  <th scope="col">Concepto</th>
                  <th scope="col">Debe</th>
                  <th scope="col">Haber</th>
                  <th scope="col" class="text-right">Acciones</th>
                 
                </tr>
              </thead>
              <tbody>
                @foreach($data as $row)
                <tr>
                  <td class="d-none">{{ $row->id }}</td>
                  <td>{{ $row->CodigoCuenta }}</td>
                  <td>{{ $row->NombreCuenta }}</td>
                  <td>{{ $row->Concepto }}</td>
                  <td>{{ $row->debe }}</td>
                  <td>{{ $row->haber }}</td>

                  <th class="text-right">
                  <div class="btn-group">
                  <button type="button" class="tabledit-edit-button btn btn-sm btn-default btn-success"> Editar</button>
                      &nbsp;&nbsp;
                 
                  </div>
                  </th>
                 
                </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <th ><b>{{$debe}}</b></th>
                    <th><b>{{$haber}}</b></th>
                    <th class="text-right"> 
                    
                   
                    <form method="post" action="{{url('/cuentas/movimiento')}}" enctype="multipart/form-data">
                       {{ csrf_field()}}

                
                      <input class="form-control d-none" type="text" name="debeMovimiento" id="debeMovimiento" value="{{$debe}}">
                    
                      <input class="form-control d-none" type="text" name="haberMovimiento" id="haberMovimiento"  value="{{ $haber}}">

                      <input class="form-control d-none" type="date" name="fechaMovimiento" id="fechaMovimiento"  value="">

                    <button class="btn btn-primary" type="submit"> guardar</button>
                    </form>
                    
                    
                   
                    
                    
                    </th>
                </tr>
              </tbody>
            </table>
          </div>
       
    </div>

<style>
.tabledit-delete-button {
 background:red;
 width: 20px;
    height: 30px;
}
.clicki{
   background:red;
}

</style>
    <script type="text/javascript">

  
$(document).ready(function(){
  
  var now = new Date();

  var day = ("0" + now.getDate()).slice(-2);
  var month = ("0" + (now.getMonth() + 1)).slice(-2);

  var today = now.getFullYear()+"-"+(month)+"-"+(day) ;

  
  $('#fechaMovimiento').val(today);
  $('#fechainter').val(today);
  
  $("#fechainter").on('change', function(event){
      event.stopPropagation();
      event.stopImmediatePropagation();
      //(... rest of your JS code)
      var x =document.getElementById("fechainter").value;
       $('#fechaMovimiento').val(x);
  });
  

  $(".clicki").on('click', function(event){
      event.stopPropagation();
      event.stopImmediatePropagation();
      //(... rest of your JS code)
      alert('siuu');
  });
    
  $.ajaxSetup({
    headers:{
      'X-CSRF-Token' : $("input[name=_token]").val()
    }
  });

  $('#editable').Tabledit({
    url:'{{ route("cuentas.action") }}',
    dataType:"json",
    columns:{
      identifier:[0, 'id'],
      editable:[[3,'Concepto'], [4, 'debe'], [5, 'haber']],
      noneditable:[[1,'CodigoCuenta'], [2, 'NombreCuenta']]
    },
    restoreButton:false,
    onSuccess:function(data, textStatus, jqXHR)
    {
      if(data.action == 'delete')
      {
        $('#'+data.id).remove();
      }
    }
  });

});  
</script>
