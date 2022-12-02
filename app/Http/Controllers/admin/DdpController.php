<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Empresa;
use App\Models\Ddp;
use Illuminate\Http\Request;

class DdpController extends Controller
{
    //store
    public function create(Request $request, Ddp $ddp)
    {
        $empresa_id = Empresa::where('user_id', Auth()->user()->id)->select('id')->get()[0]['id']; //id de la empresa
        $request['empresa_id'] = $empresa_id;

        return  $ddp->create($request->all());
    }

    //load

    public function load()
    {
        $empresa_id = Empresa::where('user_id', Auth()->user()->id)->select('id')->get()[0]['id']; //id de la empresa
        $ddp = Ddp::where('empresa_id', $empresa_id)
            ->select('id', 'dia', 'plazo')
            ->get();
        return datatables($ddp)->toJson();
    }
    public function listar()
    {
        $empresa_id = Empresa::where('user_id', Auth()->user()->id)->select('id')->get()[0]['id']; //id de la empresa
        $ddp = Ddp::where('empresa_id', $empresa_id)
            ->select('id', 'dia', 'plazo')
            ->get();
        return $ddp;
    }
    //editar
    public function editar(Request $request)
    {
        $plan = Ddp::find($request->id);
        if ($plan->update($request->all())) {

            return 1;
        }
    }
    //eliminar

    public function eliminar(Request $request)
    {

        $nota = Ddp::find($request->id);
        $nota->delete();
        return 1;
    }

    //uso
    public function uso(Request $request)
    {
        $dato = Cliente::where('ddp_id', $request->id)->get();
        return $dato;
    }
}
