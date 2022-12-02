<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Empresa;
use App\Models\Factura;
use Illuminate\Http\Request;

class EstadosController extends Controller
{

    public function estados()
    {
        return view('admin.clientes.estados.mostrar.mostrar');
    }

    public function activos()
    {
        $empresa_id = Empresa::where('user_id', Auth()->user()->id)->select('id')->get()[0]['id']; //id de la empresa
        $activos = Cliente::where('empresa_id', $empresa_id)
            ->where('estado', 1)
            ->select('id', 'nombre', 'apellido')
            ->orderBy('id', 'desc')
            ->get();
        return datatables($activos)->toJson();
    }


    public function suspendidos()
    {
        $empresa_id = Empresa::where('user_id', Auth()->user()->id)->select('id')->get()[0]['id']; //id de la empresa
        $suspenddos = Cliente::where('empresa_id', $empresa_id)
            ->where('estado', 0)
            ->select('id', 'nombre', 'apellido')
            ->orderBy('id', 'desc')
            ->get();
        return datatables($suspenddos)->toJson();
    }

    public function suspender()
    {
        $empresa_id = Empresa::where('user_id', Auth()->user()->id)->select('id')->get()[0]['id']; //id de la empresa

        $facturas = Factura::where('empresa_id', $empresa_id)->get();
        $fecha_actual = strtotime(date('Y-m-d'), time());
        foreach ($facturas as $factura) {
            if ($factura->estado_id == 1) {

                $fecha_limite = strtotime($factura->vence, time());
                if ($fecha_limite < $fecha_actual) { // que hacer cuando se vence una factura
                    Factura::find($factura->id)->update([ //pasar factura a estado vencida
                        'estado' => 0
                    ]);
                    Cliente::find($factura->cliente_id)->update([ //pasar cliente a estado vencido
                        'estado' => 0
                    ]);
                }
            }
        }
    }
}
