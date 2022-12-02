<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\http\qr\qr_generador;
use App\Models\Cliente;
use App\Models\Empresa;
use App\Models\Factura;
use App\Models\Snqr;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class CajaController extends Controller
{
    // use qr_generador;

    public function cobrar_data()
    {
        $empresa_id = Empresa::where('user_id', Auth()->user()->id)->select('id')->get()[0]['id']; //id de la empresa
        $clientes = Cliente::where('empresa_id', $empresa_id)
            ->select('nombre', 'apellido', 'id', 'telefono')
            ->orderBy('id', 'desc')
            ->get();
        return datatables($clientes)->toJson();
    }

    public function facturas(Request $request)
    {
        $facturas = Factura::where('cliente_id', $request->id)
            ->select('id', 'monto', 'fecha_pago', 'vence', 'estado', 'updated_at')
            ->orderBy('estado', 'asc')
            ->get();
        return datatables($facturas)->toJson();
    }

    public function cobrar(Request $request)
    {
        $factura = Factura::find($request->id);
        $factura->update([
            'estado' => 1//pasar factura a estado activa
        ]);

        Cliente::find($request->cliente_id)->update([ 
            'estado' => 1
        ]);

        return  $factura;
    }
}
