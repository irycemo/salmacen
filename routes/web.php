<?php

use App\Livewire\Admin\Roles;
use App\Livewire\Admin\Permisos;
use App\Livewire\Admin\Usuarios;
use App\Livewire\Admin\Categorias;
use App\Livewire\Entradas\Entradas;
use App\Livewire\Reportes\Reportes;
use App\Livewire\Almacen\AlmacenRPP;
use App\Livewire\Articulos\Articulos;
use Illuminate\Support\Facades\Route;
use App\Livewire\Almacen\AlmacenGeneral;
use App\Livewire\Almacen\AlmacenCatastro;
use App\Livewire\Seguimiento\Seguimiento;
use App\Livewire\Solicitudes\Solicitudes;
use App\Http\Controllers\ManualController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SetPasswordController;
use App\Livewire\Solicitudes\CrearEditarSolicitud;

Route::get('/', function () {
    return redirect('login');
});


Route::group(['middleware' => ['auth', 'esta.activo']], function(){

    /* Dashboard */
    Route::get('dashboard', DashboardController::class)->name('dashboard');

    Route::get('roles', Roles::class)->middleware('permission:Lista de roles')->name('roles');
    Route::get('permisos', Permisos::class)->middleware('permission:Lista de permisos')->name('permisos');
    Route::get('usuarios', Usuarios::class)->middleware('permission:Lista de usuarios')->name('usuarios');
    Route::get('categorias', Categorias::class)->middleware('permission:Lista de categorías')->name('categorias');

    Route::get('articulos', Articulos::class)->middleware('permission:Lista de artículos')->name('articulos');

    Route::get('entradas', Entradas::class)->middleware('permission:Lista de entradas')->name('entradas');

    Route::get('almacen_general', AlmacenGeneral::class)->middleware('permission:Almacén general')->name('almacen_general');
    Route::get('almacen_rpp', AlmacenRPP::class)->middleware('permission:Almacén rpp')->name('almacen_rpp');
    Route::get('almacen_catastro', AlmacenCatastro::class)->middleware('permission:Almacén catastro')->name('almacen_catastro');

    Route::get('solicitudes', Solicitudes::class)->middleware('permission:Lista de solicitudes')->name('solicitudes');
    Route::get('solicitud/{solicitud?}', CrearEditarSolicitud::class)->middleware('permission:Editar solicitud')->name('solicitud');

    Route::get('seguimiento', Seguimiento::class)->middleware('permission:Seguimiento')->name('seguimiento');

    Route::get('reportes', Reportes::class)->middleware('permission:Reportes')->name('reportes');

    /* Manual */
    Route::get('manual', ManualController::class)->name('manual');

});

/* Actualización de contraseña */
Route::get('setpassword/{email}', [SetPasswordController::class, 'create'])->name('setpassword');
Route::post('setpassword', [SetPasswordController::class, 'store'])->name('setpassword.store');