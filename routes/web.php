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


//RUTA POR DEFECTO
Route::get('/', [App\Http\Controllers\Auth\LoginController::class,'showLoginForm']);
//USUARIO NO AUTENTICADO
	Route::get('/login', [App\Http\Controllers\Auth\LoginController::class,'showLoginForm'])->name('login');
    Route::post('/login', [App\Http\Controllers\Auth\LoginController::class,'login']);
    

    //SOLO USUARIO LOGUIADOS
	Route::middleware(['auth','web'])->group(function () {
		Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');
        Route::get('/home', [App\Http\Controllers\HomeController::class,'index'])->name('home');


        //RUTAS DE EMPLEADOS
        Route::get('/empleados',[App\Http\Controllers\EmpleadoController::class,'index'])->name('empleados.index');
        Route::get('/empleados/create',[App\Http\Controllers\EmpleadoController::class,'create'])->name('empleados.create');
        Route::post('/empleados/store',[App\Http\Controllers\EmpleadoController::class,'store'])->name('empleados.store');
        Route::get('/empleados/delete/{id}',[App\Http\Controllers\EmpleadoController::class,'destroy'])->name('puestos.destroy');
        Route::get('/empleados/edit/{id}',[App\Http\Controllers\EmpleadoController::class,'edit'])->name('empleados.edit');

        //RUTAS DE PUESTOS
        Route::get('/puestos',[App\Http\Controllers\PuestoController::class,'index'])->name('puestos.index');
        Route::get('/puestos/create',[App\Http\Controllers\PuestoController::class,'create'])->name('puestos.create');
        Route::post('/puestos/store',[App\Http\Controllers\PuestoController::class,'store'])->name('puestos.store');
        Route::get('/puestos/delete/{id}',[App\Http\Controllers\PuestoController::class,'destroy'])->name('puestos.destroy');
        Route::get('/puestos/edit/{id}',[App\Http\Controllers\PuestoController::class,'edit'])->name('puestos.edit');
    });



