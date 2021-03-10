<?php

use App\Http\Controllers\ExistenciasController;
use App\Http\Controllers\MovimientosController;
use App\Http\Controllers\TamañosController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('existencias', ExistenciasController::class);
Route::resource('movimientos', MovimientosController::class);
Route::resource('tamanos', TamañosController::class);
