<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Empresa;
use App\Models\Plane;
use Illuminate\Http\Request;

class PlanesController extends Controller
{
    public function show()
    {
        return view('admin.planes.mostrar');
    }

    //lista con datatablet
    public function load(Request $request)
    {
        $empresa_id = Empresa::where('user_id', Auth()->user()->id)->select('id')->get()[0]['id']; //id de la empresa
        $planes = Plane::where('empresa_id', $empresa_id)
            ->select('id', 'nombre', 'up',  'down', 'precio')
            ->orderBy('id', 'desc')
            ->get();
        if ($request->view == 'ajax') {
            return $planes;
        }
        return datatables($planes)->toJson();
    }
    //lista con ajax
    public function listar()
    {
        $empresa_id = Empresa::where('user_id', Auth()->user()->id)->select('id')->get()[0]['id']; //id de la empresa
        $planes = Plane::where('empresa_id', $empresa_id)
            ->select('id', 'nombre', 'up',  'down', 'precio')
            ->orderBy('id', 'desc')
            ->get();
        return $planes;
    }


    public function plan_libre(Request $request)
    {
        $dato = Cliente::where('plan_id', $request->id)->get();
        return $dato;
    }

    //elimar plan
    public function plan_eliminar(Request $request, Plane $plan)
    {
        $id = json_decode($request->id);
        $elPlan = Plane::find($request->id);

        if ($elPlan->delete()) {
            return 1;
        }
    }
    ///nuevo plan
    public function nuevo()
    {
        // return view('admin.planes.nuevo');
    }

    public function store(Request $request, Plane $plan)
    {
        $empresa_id = Empresa::where('user_id', Auth()->user()->id)->select('id')->get()[0]['id']; //id de la empresa
        $request['empresa_id'] = $empresa_id;

        if ($plan->create($request->all())) {

            return 1;
        } else {
            return 0;
        }
    }
    public function edit(Request $request)
    {
        $plan = Plane::find($request->id);
        if ($plan->update($request->all())) {

            return 1;
        }
    }
}
