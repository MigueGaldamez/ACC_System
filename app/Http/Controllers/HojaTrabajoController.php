<?php

namespace App\Http\Controllers;

use App\Models\Detalle;
use App\Models\DetalleHojaTrabajo;
use App\Models\Empleados;
use Illuminate\Http\Request;
use App\Models\HojaTrabajo;

class HojaTrabajoController extends Controller
{
    public function index()
    {
        $hoja =HojaTrabajo::all();
        return view('hojatrabajos.index',compact('hoja'));
    }
    public function create()
    {
        return(view('hojatrabajos.create'));
    }
    public function guardar(Request $request)
    {
        $hoja = new HojaTrabajo();
        $hoja->cliente =$request->cliente;
        $hoja->servicio=$request->servicio;
        $hoja->fechainicio=date('Y-m-d');
        $hoja->save();
        return redirect()->route('hoja.index');
    }
    public function edithoja(HojaTrabajo $hojatrabajo)
    {
        return view('hojatrabajos.edit',compact('hojatrabajo'));
    }
    public function updatehoja(Request $request, HojaTrabajo $hojatrabajo)
    {
        $hojatrabajo->cliente =$request->cliente;
        $hojatrabajo->servicio=$request->servicio;
        $hojatrabajo->factor=$request->factor;
        $hojatrabajo->save();
        return redirect()->route('hoja.index');
        
    }
    public function editdetalle(HojaTrabajo $hojatrabajo)
    {
        $empleados = Empleados::all();
        $var =  $hojatrabajo->id;
        $detalle= DetalleHojaTrabajo::where('hojatrabajo_id', $var)->get();
        return view('hojatrabajos.editdetalle',compact('hojatrabajo','empleados','detalle'));
    }
    public function updatdetalle(Request $request, HojaTrabajo $hojatrabajo)
    {
        $empleados = $request->input('empleado');
        //dd($empleados);
        $hojatrabajo->empleados()->attach($empleados);
        return redirect()->route('hoja.edit',[$hojatrabajo->id]);
    }
    public function editedetalle(DetalleHojaTrabajo $detalle)
    {
        return view('hojatrabajos.editempleado',compact('detalle'));
    }
    public function updateedetalle(Request $request, DetalleHojaTrabajo $detalle)
    {

        $detalle->actividad=$request->actividad;
        $detalle->horasUtilizadas=$request->horasUtilizadas;
        $detalle->save();
        return redirect()->route('hoja.edit',[$detalle->hojatrabajo_id]);
    }
    public function edestroy(DetalleHojaTrabajo $detalle)
    {
        $detalle->delete();
        return redirect()->route('hoja.edit',[$detalle->hojatrabajo_id]);
    }
    public function destroy(HojaTrabajo $hojatrabajo)
    {
        $hojatrabajo->delete();
        return redirect()->route('hoja.index');
    }
    public function end(HojaTrabajo $hojatrabajo)
    {
        $hojatrabajo->fechafin=date('Y-m-d');
        $hojatrabajo->save();
        return redirect()->route('hoja.index');
    }
    public function table(HojaTrabajo $hojatrabajo)
    {
        $var =  $hojatrabajo->id;
        $detalle= DetalleHojaTrabajo::where('hojatrabajo_id', $var)->get();
        return view('hojatrabajos.table',compact('hojatrabajo','detalle'));
    }
}
