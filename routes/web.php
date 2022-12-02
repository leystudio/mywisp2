<?php

use App\Http\Controllers\EmpresaController;
use App\Models\Empresa;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use function Symfony\Component\String\u;

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


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/', function () {

        $empresas = Empresa::where('user_id', Auth::user()->id)->get(); //imprime todas las empresas que posee el usuario
        if (count($empresas)) { //si posee al menos una empresa 
            return view('welcome', compact('empresas')); //devuelve la vista dashboard con las empresas

        } else { //si no tiene ninguna empresa
            return view('admin.empresa.crearEmpresa');
        }
    })->name('welcome');
    
    Route::post('empresa-store', [EmpresaController::class, 'store'])->name('empresa.store');
});
