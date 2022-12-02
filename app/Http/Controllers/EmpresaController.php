<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Empresa;
use App\Models\Plane;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmpresaController extends Controller
{
    /*  public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    } */
    public function store(Request $request)
    {
        $request->validate([
            // 'logo' => 'required|image|max:10240',
            'nombre' => 'required'
        ]);
        $request['user_id'] = Auth::user()->id;
        /*  $image = $request->file('logo')->store('public/empresas/logos');
        $url = Storage::url($image);
        $request['logo'] = $url;
        return $request->file('logo'); */
        $nueva_empresa = Empresa::create($request->all());
        //crear plan basico
        Plane::create([
            'nombre' => 'basico',
            'up' => 4000,
            'down' => 4000,
            'precio' => 1000,
            'empresa_id' => $nueva_empresa->id,
        ]);
        return redirect()->route('dashboard');
    }

    public function mostrar()
    {
        $empresa = Empresa::where('user_id', Auth()->user()->id)->with('image')->get(); //id de la empresa
        return view('admin.empresa.mostrar.mostrar', compact('empresa'));
    }


    public function editar(Request $request, Empresa $empresa)
    {

        $id = Empresa::where('user_id', Auth()->user()->id)->select('id')->get()[0]['id']; //id de la empresa
        $empresa = $empresa->find($id);

        if ($empresa->update($request->all())) {
            return $request;
        }
    }
    public function nombre()
    {
        return Empresa::where('user_id', Auth()->user()->id)->select('nombre')->get()[0];
    }
}
