<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CuentasController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\HojaTrabajoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/cuentas/balance', function () {
    return view('cuentas.balance');
});

Route::get('/cuentas/salario', 'App\Http\Controllers\EmpleadosController@calcularsalario');

Route::post('empleados/costeo', [EmpleadosController::class,'costeo'])->name('costeo');
Route::get('empleados/costeo', [EmpleadosController::class,'costeo'])->name('costeo');


Route::get('/cuentas/costeo', function () {
    return view('cuentas.costeo');
});

Route::get('/cuentas/catalogo', 'App\Http\Controllers\CuentasController@catalogo')->name('cuentas.catalogo');



Route::resource('cuentas', 'App\Http\Controllers\CuentasController');
Route::resource('empleados', 'App\Http\Controllers\EmpleadosController');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::post('cuentas/action', 'App\Http\Controllers\CuentasController@action')->name('cuentas.action');


Route::post('dashboard/cuentas/auxiliar', [CuentasController::class,'auxiliar'])->name('auxiliar.auxiliar');
Route::get('dashboard/cuentas/auxiliar', [CuentasController::class,'auxiliar'])->name('auxiliar.auxiliar');

Route::post('dashboard/cuentas/auxiliar', [CuentasController::class,'auxiliar'])->name('auxiliar.auxiliar');
Route::get('dashboard/cuentas/auxiliar', [CuentasController::class,'auxiliar'])->name('auxiliar.auxiliar');

Route::get('dashboard/hojatrabajo', [HojaTrabajoController::class,'index'])->name('hoja.index');
Route::get('dashboard/hojatrabajo/create', [HojaTrabajoController::class,'create'])->name('hoja.create');
Route::post('dashboard/hojatrabajo/create', [HojaTrabajoController::class,'guardar'])->name('hoja.guardar');

Route::get('dashboard/hojatrabajo/{hojatrabajo}/hoja/edit', [HojaTrabajoController::class,'edithoja'])->name('hoja.edith');
Route::put('dashboard/hojatrabajo/{hojatrabajo}/hoja/edit', [HojaTrabajoController::class,'updatehoja'])->name('hoja.updateh');
Route::get('dashboard/hojatrabajo/{hojatrabajo}/hoja/delete', [HojaTrabajoController::class,'destroy'])->name('hoja.destroy');
Route::get('dashboard/hojatrabajo/{hojatrabajo}/hoja/end', [HojaTrabajoController::class,'end'])->name('hoja.end');
Route::get('dashboard/hojatrabajo/{hojatrabajo}/hoja/table', [HojaTrabajoController::class,'table'])->name('hoja.table');

Route::get('dashboard/hojatrabajo/{hojatrabajo}/detalle/edit', [HojaTrabajoController::class,'editdetalle'])->name('hoja.edit');
Route::put('dashboard/hojatrabajo/{hojatrabajo}/detalle/edit', [HojaTrabajoController::class,'updatdetalle'])->name('hoja.update');

Route::get('dashboard/hojatrabajo/{detalle}/edetalle/edit', [HojaTrabajoController::class,'editedetalle'])->name('detalle.editd');
Route::put('dashboard/hojatrabajo/{detalle}/edetalle/edit', [HojaTrabajoController::class,'updateedetalle'])->name('detalle.updated');
Route::get('dashboard/hojatrabajo/{detalle}/edetalle/delete', [HojaTrabajoController::class,'edestroy'])->name('detalle.destroy');


Route::post('cuentas/balance', [CuentasController::class,'balance'])->name('balance');
Route::get('cuentas/balance', [CuentasController::class,'balance'])->name('balance');

Route::post('cuentas/salario', [EmpleadosController::class,'calcularsalario'])->name('salario');
Route::get('cuentas/salario', [EmpleadosController::class,'calcularsalario'])->name('salario');

Route::post('cuentas/prueba', 'App\Http\Controllers\CuentasController@prueba')->name('cuentas.prueba');

Route::post('cuentas/movimiento', 'App\Http\Controllers\CuentasController@guardarMovimiento')->name('cuentas.guardarMovimiento');

