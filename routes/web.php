<?php

use Illuminate\Support\Facades\Route;

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


Route::resource('cuentas', 'App\Http\Controllers\CuentasController');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::post('cuentas/action', 'App\Http\Controllers\CuentasController@action')->name('cuentas.action');

Route::post('cuentas/prueba', 'App\Http\Controllers\CuentasController@prueba')->name('cuentas.prueba');

Route::post('cuentas/movimiento', 'App\Http\Controllers\CuentasController@guardarMovimiento')->name('cuentas.guardarMovimiento');

