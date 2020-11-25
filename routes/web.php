<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CuentasController;
use App\Http\Controllers\EmpleadosController;
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

Route::get('/cuentas/costeo', function () {
    return view('cuentas.costeo');
});



Route::resource('cuentas', 'App\Http\Controllers\CuentasController');
Route::resource('empleados', 'App\Http\Controllers\EmpleadosController');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::post('cuentas/action', 'App\Http\Controllers\CuentasController@action')->name('cuentas.action');


Route::post('dashboard/cuentas/auxiliar', [CuentasController::class,'auxiliar'])->name('auxiliar.auxiliar');
Route::get('dashboard/cuentas/auxiliar', [CuentasController::class,'auxiliar'])->name('auxiliar.auxiliar');


Route::post('cuentas/balance', [CuentasController::class,'balance'])->name('balance');
Route::get('cuentas/balance', [CuentasController::class,'balance'])->name('balance');

Route::post('cuentas/salario', [EmpleadosController::class,'calcularsalario'])->name('salario');
Route::get('cuentas/salario', [EmpleadosController::class,'calcularsalario'])->name('salario');

Route::post('cuentas/prueba', 'App\Http\Controllers\CuentasController@prueba')->name('cuentas.prueba');

Route::post('cuentas/movimiento', 'App\Http\Controllers\CuentasController@guardarMovimiento')->name('cuentas.guardarMovimiento');

