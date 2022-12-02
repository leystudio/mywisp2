<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Empresa;
use App\Models\Gasto;
use App\Models\Instalation;
use App\Models\Materiale;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function create()
    {
        return view('admin.materiales.create');
    }

    public function store(Materiale $material, Request $request)
    {
        $empresa_id = Empresa::where('user_id', Auth()->user()->id)->select('id')->get()[0]['id']; //id de la empresa
        $request['empresa_id'] = $empresa_id;
        if ($material->create($request->all())) {
            return 1;
        }
    }


    public function show(Materiale $material)
    {
        $material = $material->paginate(10);
        return view('admin.materiales.show', compact('material'));
    }

    //datatable ajax
    public function load()
    {
        $empresa_id = Empresa::where('user_id', Auth()->user()->id)->select('id')->get()[0]['id']; //id de la empresa
        $materiales = Materiale::where('empresa_id', $empresa_id)
            ->select('id', 'marca', 'modelo', 'descripcion')
            ->get();
        return datatables($materiales)->toJson();
    }
    //verifica que el material no este en usu
    public function verifica_eliminar(Request $request)
    {
        $dato = Gasto::where('materiale_id', $request->id)->with('instalation')->get();
        $info['cantidad'] = count($dato);
        $info['cliente'] = Cliente::where('instalation_id', $dato[0]['instalation']['id'])->first();
        return $info;
    }
    //eliminar

    public function eliminar(Request $request)
    {

        $nota = Materiale::find($request->id);
        $nota->delete();
        return 1;
    }
}
