<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Ddp;
use App\Models\Empresa;
use App\Models\Gasto;
use App\Models\Instalation;
use App\Models\Materiale;
use App\Models\Plane;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class clientesController extends Controller
{
    public function create()
    {
        $empresa_id = Empresa::where('user_id', Auth()->user()->id)->select('id')->get()[0]['id']; //id de la empresa

        $materiales = Materiale::where('empresa_id', $empresa_id)->get();
        $planes = Plane::where('empresa_id', $empresa_id)->get();
        $diaspago = Ddp::where('empresa_id', $empresa_id)->get();
        return view('admin/clientes/agregar/agregar', compact('materiales', 'planes', 'diaspago'));
    }

    public function show_ajax()
    {
        $empresa_id = Empresa::where('user_id', Auth()->user()->id)->select('id')->get()[0]['id']; //id de la empresa
        $clientes = Cliente::where('empresa_id', $empresa_id)
            ->select('nombre', 'apellido', 'id', 'telefono', 'plan_id')
            ->orderBy('id', 'desc')
            ->get();
        return datatables($clientes)->toJson();
    }

    public function edit()
    {
        return view('admin.clientes.create-client');
    }

    public function store(Request $request)
    {

        /*      $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'ddp_id' => 'required',
            'plan_id' => 'required',
        ]); */
        $plan_id = Plane::where('id', intval($request->plan_id))->select('id')->get(); //id del plan seleccionado
        if (count($plan_id) == 0) {
            $plan_id = 1;
        } else {
            $plan_id = $plan_id[0]['id'];
        }
        $empresa_id = Empresa::where('user_id', Auth()->user()->id)->select('id')->get()[0]['id']; //id de la empresa

        $instalacion = new Instalation(); //obj con request$request de la instalacion
        $instalacion->direccion = $request->direccion;
        $instalacion->gps = $request->gps;
        $instalacion->comentario = $request->comentario;
        $instalacion->costo = intval($request->costo);

        $instalacion->save();

        //gastos en materiales

        $grupo_materiales = $request->materialesIns;
        if ($grupo_materiales) {


            foreach ($request->materialesIns as  $item) {
                $gastos = new Gasto;
                $gastos->materiale_id = $item[0];
                $gastos->propietario_id = $item[2];
                $gastos->instalation_id = $instalacion->id;
                $gastos->save();
            }
        }

        $cliente = new Cliente(); //obj con request$request del cliente
        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        $cliente->telefono = $request->telefono;

        $cliente->ddp_id = intval($request->ddp);
        $cliente->empresa_id = $empresa_id;
        $cliente->plan_id = $plan_id;
        $cliente->instalation_id = $instalacion->id;
        $cliente->save();

        return  json_encode($cliente);
    }

    //elimar cliente
    public function eliminar(Request $request, Cliente $cliente)
    {
        $id = $request->id;
        if ($cliente->find($id)->delete()) {
            return 1;
        }
    }

    //editar cliente
    public function editar(Request $request)
    {
        $datos = [];
        $empresa_id = Empresa::where('user_id', Auth()->user()->id)->select('id')->get()[0]['id']; //id de la empresa
        $planes = Plane::where('empresa_id', $empresa_id)->select('id', 'nombre', 'up', 'down', 'precio')->get();

        $id = $request->id;

        $cliente = Cliente::find($id);
        $dia_pago = $cliente->ddp;
        $ddp = Ddp::where('empresa_id', $empresa_id)->select('id', 'dia', 'plazo')->get();

        $plan_cliente = Plane::find($cliente->plan_id);
        $instalacion = Instalation::find($cliente->instalation_id);
        $gasto = Gasto::where('instalation_id', $cliente->instalation_id)
            ->select('id', 'materiale_id', 'propietario_id')->get();
        if (count($gasto) > 0) {

            for ($i = 0; $i < count($gasto); $i++) {
                $material = Materiale::where('id', $gasto[$i]['materiale_id'])->select('id', 'marca', 'modelo')->get();

                if ($gasto[$i]['propietario_id'] == 1) {

                    $propietario = 'cliente';
                } else {
                    $propietario = 'proveedor';
                }
                $gastos[] = [
                    'material' => $material[0],
                    'propietario' => $propietario,
                    'gasto_id' => $gasto[$i]['id']
                ];
            }
        } else {
            $gastos = 0;
        }

        $datos['dia_pago'] = $dia_pago;
        $datos['ddp'] = $ddp;
        $datos['planes'] = $planes;
        $datos['cliente'] = $cliente;
        $datos['plan_cliente'] = $plan_cliente;
        $datos['instalacion'] = $instalacion;
        $datos['materiales'] = $gastos;


        return json_encode($datos);
    }
    //store editar cliente
    public function store_editar(Request $request)
    {
        $cliente = Cliente::find($request->id);
        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        $cliente->telefono = $request->telefono;
        $cliente->plan_id = $request->plan_id;
        $cliente->ddp_id = $request->ddp;
        $cliente->save();

        $instalacion = Instalation::find($request->instalation_id);
        $instalacion->direccion = $request->direccion;
        $instalacion->comentario = $request->comentario;
        $instalacion->save();
        return 1;
    }

    //seleccionar
    public function seleccionar(Cliente $cliente, Request $request)
    {
        $gastos = [];
        $datos = [];
        $cliente = $cliente->find($request->id);
        $dia_pago = $cliente->ddp;
        $plan_cliente = Plane::find($cliente->plan_id);
        $datos_instalacion = Instalation::find($cliente->instalation_id);
        $instalacion = Gasto::where('instalation_id', $cliente->instalation_id)->get();

        for ($i = 0; $i < count($instalacion); $i++) {
            $material = Materiale::where('id', $instalacion[$i]['materiale_id'])->select('marca', 'modelo')->get();

            if ($instalacion[$i]['propietario_id'] == 1) {

                $propietario = 'cliente';
            } else {
                $propietario = 'proveedor';
            }
            $gastos[] = [
                'material' => $material[0],
                'propietario' => $propietario
            ];
        }
        $datos['plan_cliente'] = $plan_cliente;
        $datos['dia_pago'] = $dia_pago;
        $datos['gastos'] = $gastos;
        $datos['cliente'] = $cliente;
        $datos['instalacion'] = $datos_instalacion;

        return $datos;
    }
}
