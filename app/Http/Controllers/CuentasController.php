<?php

namespace App\Http\Controllers;

use App\Models\Cuentas;
use App\Models\Movimiento;
use App\Models\Detalle;
use Dotenv\Repository\RepositoryInterface;
use GrahamCampbell\ResultType\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Delimiter\Processor\EmphasisDelimiterProcessor;
use Illuminate\Support\Facades\DB;

class CuentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function balance(Request $request)
    {
        $mes = $request->fechafiltro;
        $fecha=date("n", strtotime($request->fechafiltro));
        $data = Detalle::groupBy('idCuenta')->addSelect(DB::raw('idCuenta ,sum(debeCuenta) as debe,sum(haberCuenta) as haber'))->whereHas('movimiento', function($query) use ($fecha)
        {
            $query->whereMonth("fechaMovimiento","=",'09'); 
        })->get();
        //return $data;
        return view('cuentas.balance',compact('data','mes'));
        
        
/*         DB::connection()->enableQueryLog();
        $queries = DB::getQueryLog();
        return  $queries;   */      
    }
    public function auxiliar(Request $request)
    {
        $mes = $request->fechafiltro;
        $fecha=date("n", strtotime($request->fechafiltro));
        $cuenta = $request->cuenta;
        $nombreCuenta= Cuentas::find($cuenta);
        $cuentas = Cuentas::all();
        $data = Detalle::whereHas('movimiento', function($query) use ($fecha)
        {
            $query->whereMonth("fechaMovimiento","=",$fecha); 
        })->where('idCuenta','=',$cuenta)->get();
        //return $data;
        return view('auxiliar.auxiliar',compact('cuentas','data','mes','cuenta','nombreCuenta'));
    }
    public function index()
    {
        //
        $data = DB::table('auxiliar')->get();
        //return view('table_edit', compact('data'));
        $debe = DB::table('auxiliar')->sum('debe');
        $haber = DB::table('auxiliar')->sum('haber');
    
        $idmov= DB::table('movimientos')
       ->max('idMovimiento');

        $datos['cuentas']=  Cuentas::paginate(5);
        return view('cuentas.index',$datos,compact('data'))->with('debe', $debe)->with('haber', $haber)->with('idmov',$idmov);
        
        
    }
    function action(Request $request)
    {
    	if($request->ajax())
    	{
    		if($request->action == 'edit')
    		{
    			$data = array(
    				'Concepto'	=>	$request->Concepto,
    				'debe'		=>	$request->debe,
    				'haber'		=>	$request->haber
                );
                echo $request->Concepto;
    			DB::table('auxiliar')
    				->where('id', $request->id)
    				->update($data);
    		}
    		if($request->action == 'delete')
    		{
    			DB::table('auxiliar')
    				->where('id', $request->id)
    				->delete();
    		}
    		return response()->json($request);
    	}
    }
    function prueba(Request $request)
    {
        $datosCuenta = request()->except('_token');
        $codigo =$datosCuenta['idCodigoCuenta'];
        $esta = DB::select('select * from auxiliar where idCodigoCuenta = ?',[$codigo] );
      
        if(count($esta) === 0){
            $results = DB::select('select * from cuentas where id = ?',[$codigo] );
            $results = $results[0];
            
            DB::insert('insert into auxiliar (CodigoCuenta,NombreCuenta, idCodigoCuenta,Concepto) values (?, ?,?,?)', [$results->CodigoCuenta,$results->NombreCuenta ,$datosCuenta['idCodigoCuenta'],'']);
        
        }
        //return $results->CodigoCuenta;
    }
    function guardarMovimiento(Request $request)
    {
        $datosCuenta = request()->except('_token');
        $fecha =$datosCuenta['fechaMovimiento'];
        $debe = $datosCuenta['debeMovimiento'];

        $haber=$datosCuenta['haberMovimiento'];


        
        //if(count($esta) === 0){
        //$results = DB::select('select * from cuentas where id = ?',[$codigo] );
        //$results = $results[0];
            
        DB::insert('insert into movimientos(fechaMovimiento,debeMovimiento,haberMovimiento) values (?, ?,?)', [$fecha,$debe,$haber]);
        //$esta = DB::select('select idMovimiento from movimientos where fechaMovimiento = ? and debeMovimiento=? and haberMovimiento=?',[$fecha,$debe,$haber])->max('idMovimiento');;
        
        $idmov= DB::table('movimientos')
       ->where('fechaMovimiento', $fecha)
       ->max('idMovimiento');
        
       
       $data = DB::table('auxiliar')->get();
       $largo = count($data);
       $i =0;
       while($i<$largo)
       {
        DB::insert('insert into detalles(idMovimiento, idCuenta, debeCuenta, haberCuenta, concepto) values (?,?,?,?,?)', [$idmov,$data[$i]->idCodigoCuenta,$data[$i]->debe,$data[$i]->haber,$data[$i]->Concepto]);
        $i = $i+1;
       }
       DB::table('auxiliar')->delete();


        return redirect('dashboard')->with('Mensaje','Registro Agregado con exito');
        //}
        //return $results->CodigoCuenta;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cuentas.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //$datosCuenta=request()->all();
        $datosCuenta = request()->except('_token');   
        /*
        if($request->hasFile('Fotox ')){
            $datosCuenta['Foto']=$request->file('Foto')->store('uploads','public');
        }
        */
        Cuentas::insert($datosCuenta);

         
        //return response()->json($datosCuenta)->with('Mensaje','Cuenta agregado con exito');
        return redirect('cuentas')->with('Mensaje','Cuenta agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cuentas  $cuentas
     * @return \Illuminate\Http\Response
     */
    public function show(Cuentas $cuentas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cuentas  $cuentas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cuenta = Cuentas::findOrFail($id);
        return view('cuentas.edit', compact('cuenta'));
    }

    /** 
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cuentas  $cuentas
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

        Cuentas::where('id','=',$id)->update($datosCuenta);   

        //$cuenta = Cuentas::findOrFail($id);
        //return view('cuentas.edit', compact('cuenta'));

        return redirect('cuentas')->with('Mensaje','Empleado modificado con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cuentas  $cuentas
     * @return \Illuminate\Http\Response
     */ 
    public function destroy($id)
    {
        /*
        $cuenta = Cuentas::findOrFail($id);
    
        if(Storage::delete('public/'.$cuenta->Foto)){
            Cuentas::destroy($id);v 
        }
        */

        Cuentas::destroy($id);
        
        //return redirect('cuentas');

        return redirect('cuentas')->with('Mensaje','Empleado eliminado con exito');

    }
}
