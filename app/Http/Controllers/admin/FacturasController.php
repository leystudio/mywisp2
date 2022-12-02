<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Empresa;
use App\Models\Factura;
use App\Models\Flujo;
use App\Models\Plane;
use Illuminate\Http\Request;

class FacturasController extends Controller
{
    public function generar_facturas()
    {
        $planes = Plane::all();
        $diaspagos = Flujo::all();
        $clientes = Cliente::all();
        $factura = [];
        foreach ($clientes as $cliente) {
            $factura['cliente_id'] = $cliente->id;
            $factura['empresa_id']  = $cliente->empresa_id;
            foreach ($planes as $plan) {
                if ($cliente->plan_id == $plan->id) {

                    $factura['monto'] = $plan->precio;
                }
            }
            foreach ($diaspagos as $diapago) {
                if ($cliente->diaspago_id == $diapago->id) {

                    $plazo = $diapago->plazo;
                    $fecha_pago = date("Y-m-") . $diapago->dia;
                    $vence = date('Y-m-d', strtotime($fecha_pago . "+ " . $plazo . " days"));
                    $factura['fecha_pago']  = $fecha_pago;
                    $factura['vence']  = $vence;
                    Factura::create($factura);
                }
            }
        }
    }
}
