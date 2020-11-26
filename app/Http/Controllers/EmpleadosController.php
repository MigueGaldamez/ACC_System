<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['empleados']=  Empleados::paginate(500);
        return view('empleados.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('empleados.create');
    }
    public function calcularsalario(Request $request)
    {
        //
        $mes = $request->idempleado;
  
        $data = Empleados::where('id','=',$mes)->get()->first();   
        //$data = $data[0];
        $datos['empleados']=  Empleados::paginate(500)->where('salarioRealDia',null);
        return view('cuentas.costeoempleado',$datos,compact('data','mes'));
    }
    public function costeo(Request $request)
    {
        //
        $datos['empleados']=  Empleados::paginate(500);
      
        $id = $request->Codigo;
        $empleado = Empleados::find($id);
        $NominalHora = $request->nominalhoraIN;
        
        $RealDia = $request->realdiaIN;
        $RealHora = $request->realhoraIN;
        $mensaje="Error al Guardar";
        $complemento ="Ocurrio un error";
        if($NominalHora!=null && $RealDia!=null && $RealHora!=null)
        {   
            $empleado->salarioNominalHora = $NominalHora;
            $empleado->salarioRealDia = $RealDia;
            $empleado->salarioRealHora = $RealHora;
            $empleado->save();
            $mensaje = "Guardado con exito";
            $complemento ="exito, salario real calculado";
        }
      
        return redirect('empleados')->with('Mensaje',$mensaje)->with($datos)->with('Complemento',$complemento);

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //}
        $datosCuenta = request()->except('_token');   
        /*
        if($request->hasFile('Fotox ')){
            $datosCuenta['Foto']=$request->file('Foto')->store('uploads','public');
        }
        */
        Empleados::insert($datosCuenta);
        return redirect('empleados')->with('Mensaje','Empleado agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function show(Empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $empleado = Empleados::findOrFail($id);
        return view('empleados.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosCuenta = request()->except(['_token','_method']);

        /*
      if($request->hasFile('Fotox ')){
          $cuenta = Cuentas::findOrFail($id);

          
          Storage::delete('public/'.$cuenta->Foto);
          
          $datosCuenta['Foto']=$request->file('Foto')->store('uploads','public');
      }
      */

      Empleados::where('id','=',$id)->update($datosCuenta);   

      //$cuenta = Cuentas::findOrFail($id);
      //return view('cuentas.edit', compact('cuenta'));

      return redirect('empleados')->with('Mensaje','Empleado modificado con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Empleados::destroy($id);
        
        //return redirect('cuentas');

        return redirect('empleados')->with('Mensaje','Empleado eliminado con exito');
    }
}
