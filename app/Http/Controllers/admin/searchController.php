<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Empresa;
use Illuminate\Http\Request;

class searchController extends Controller
{
    public function searchResults(Request $request)
    {
        $empresa_id = Empresa::where('user_id', Auth()->user()->id)->select('id')->get()[0]['id'];
        //Obtener la palabra clave de búsqueda.
        $keyword = $request->input('searchVal');

        return  Cliente::all()->where('empresa_id', $empresa_id)
          //  ->where('nombre', 'LIKE', "{$keyword}%")
            ->take(10);
            //->get();
        //return view('admin/search');
    }
}
