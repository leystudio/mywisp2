<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use App\Models\Nota;
use Illuminate\Http\Request;

class NotasController extends Controller
{
    //store
    public function create(Request $request, Nota $nota)
    {
        $empresa_id = Empresa::where('user_id', Auth()->user()->id)->select('id')->get()[0]['id']; //id de la empresa
        $request['empresa_id'] = $empresa_id;
        if ($nota->create($request->all())) {
            return 1;
        }
    }

    //load

    public function load()
    {
        $empresa_id = Empresa::where('user_id', Auth()->user()->id)->select('id')->get()[0]['id']; //id de la empresa
        $notas = Nota::where('empresa_id', $empresa_id)
            ->select('id', 'nota', 'created_at')
            ->get();
        return datatables($notas)->toJson();
    }

    //eliminar

    public function eliminar(Request $request)
    {

        $nota = Nota::find($request->id);
        $nota->delete();
        return 1;
    }
}
