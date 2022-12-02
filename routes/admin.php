<?php

use App\Http\Controllers\admin\CajaController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\clientesController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\DdpController;
use App\Http\Controllers\admin\FacturasController;
use App\Http\Controllers\admin\FilesController;
use App\Http\Controllers\admin\GastoController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\HtmlController;
use App\Http\Controllers\admin\MaterialController;
use App\Http\Controllers\admin\NotasController;
use App\Http\Controllers\admin\PlanesController;
use App\Http\Controllers\admin\searchController;
use App\Http\Controllers\admin\EstadosController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EstadosController as ControllersEstadosController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Auth;
use Laravel\Jetstream\Rules\Role;

//Route::get('', [HomeController::class, 'index'])->name('admin-empresa');
Route::controller(EmpresaController::class)->group(function () {
    Route::get('empresa', 'mostrar')->name('empresa.mostrar');

    Route::post('editar_empresa', 'editar');
    Route::post('nombre-empresa', 'nombre');
});
Route::controller(clientesController::class)->group(function () {

    Route::get('create-client', 'create')
        ->name('create-client'); //crear clientes

    Route::get('show-client', function () {
        return view('admin.clientes.mostrarClientes');
    })->name('show-client'); //crear clientes

    Route::get('clientes_ajax', 'show_ajax');

    Route::post('store', 'store');

    Route::post('eliminar_cliente', 'eliminar');
    Route::post('editar_cliente', 'editar');
    Route::post('store_editar_cliente', 'store_editar');
    Route::post('seleccionar_cliente', 'seleccionar');
});


Route::controller(GastoController::class)->group(function () {
    Route::post('gasto_store', 'store');
});

Route::controller(MaterialController::class)->group(function () {
    Route::post('v_material', 'verifica_eliminar');
    Route::post('eliminar_material', 'eliminar');
    Route::post('material_store', 'store');
    Route::get('materiales', 'show')->name('material.show');
    Route::get('cargar_materiales', 'load');
});
Route::controller(PlanesController::class)->group(function () {
    Route::post('nuevo', 'store');
    Route::post('editar', 'edit');
    Route::get('load_planes', 'load');
    Route::post('v_plan', 'plan_libre');
    Route::post('elimina_plan', 'plan_eliminar');
    Route::get('planes', 'show')->name('planes.mostrar');
    Route::post('listarPlanes', 'listar');
});
Route::controller(NotasController::class)->group(function () {
    Route::post('nueva_nota', 'create');
    Route::get('notas', function () {
        return view('admin.notas.notas');
    })->name('notas.mostrar');
    Route::get('cargar_notas', 'load');
    Route::post('eliminar_nota', 'eliminar');
});

Route::controller(GastoController::class)->group(function () {
    Route::post('eliminar_gasto', 'eliminar');
});

Route::controller(HtmlController::class)->group(function () {
    Route::post('tabla_001', 'tabla001');
});

Route::controller(FacturasController::class)->group(function () {
    Route::get('facturas', 'generar_facturas');
});
Route::controller(CajaController::class)->group(function () {
    Route::get('cobrar_dt', 'cobrar_data');
    Route::post('ver_facturas', 'facturas');
    Route::get('caja-cobrar', function () {
        return view('admin.caja.cobrar.cobrar');
    })->name('caja.cobrar');
    Route::post('cobrar_factura', 'cobrar');
});

Route::controller(DdpController::class)->group(function () {

    Route::get('ddp', function () {
        return view('admin.ddp.mostrar');
    })->name('ddp.mostrar');

    Route::post('nuevo_ddp', 'create');
    Route::get('cargar_ddp', 'load'); //datatable
    Route::post('listarDiapago', 'listar'); ///ajax

    Route::post('eliminar_ddp', 'eliminar');
    Route::post('editar_ddp', 'editar');
    Route::post('v_uso_ddp', 'uso');
});

Route::controller(FilesController::class)->group(function () {
    Route::post('empresa', 'logo_empresas')->name('empresa.logo');
    Route::get('empresa-logo', 'eliminar_logo')->name('empresa.eliminar_logo');
    Route::post('logo-url', 'url_logo');
});

Route::controller(EstadosController::class)->group(function () {
    Route::get('clientes-estados', 'estados')->name('clientes.estados');
    Route::get('clientes_activos', 'activos');
    Route::get('clientes_suspendidos', 'suspendidos');
    Route::get('suspendedor-estados', 'suspender');//si
});

Route::controller(DashboardController::class)->group(function () {
    route::get('', 'dashboard')->name('admin.dashboard');//ok
});
