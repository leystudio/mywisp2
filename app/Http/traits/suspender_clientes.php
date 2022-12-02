<?php
trait estado_suspendido
{
    /* public function suspender_clientes()
    {
        $empresa_id = Empresa::where('user_id', Auth()->user()->id)->select('id')->get()[0]['id']; //id de la empresa

        $facturas = Factura::where('empresa_id', $empresa_id)->get();
        $fecha_actual = strtotime(date('Y-m-d'), time());
        foreach ($facturas as $factura) {

            $fecha_limite = strtotime($factura->vence, time());
            if ($fecha_limite < $fecha_actual) { // que hacer cuando se vence una factura
                Factura::find($factura->id)->update([ //pasar factura a estado vencida
                    'estado' => 0
                ]);
                Cliente::find($factura->cliente_id)->update([ //pasar factura a estado vencida
                    'estado' => 0
                ]);
            }
        }
    } */
}
