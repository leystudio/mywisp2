<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Gasto;
use Illuminate\Http\Request;

class GastoController extends Controller
{
    //eliminar
    public function eliminar(Request $request)
    {
        $nota = Gasto::find($request->id);
        $nota->delete();
        return 1;
    }

    //store
    public function store(Request $request,Gasto $gasto){
       $gasto= $gasto->create($request->all());
            return $gasto->where('id',$gasto->id)->select('id')->get()[0];
  
    }
}
