<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    //crea y actualiza logo
    public function logo_empresas(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|max:5240',
        ]);

        $image = $request->file('logo')->store('public/empresas/logos');
        $url = Storage::url($image);
        //return $url;    
        $empresa = Empresa::where('user_id', Auth()->user()->id)->get()[0]; //id de la empresa

        if ($empresa->image !== null) {
            $path = public_path() . $empresa->image['url'];
            unlink($path);


            if ($empresa->image()->update(['url' => $url])) {
                return redirect()->route('empresa.mostrar');
            }
        } else {
            if ($empresa->image()->create(['url' => $url])) {
                return redirect()->route('empresa.mostrar');
            }
        }
    }
    //eliminar logo
    public function eliminar_logo()
    {
        if (Auth::user()->id) {

            $empresa = Empresa::where('user_id', Auth()->user()->id)->get()[0]; //id de la empresa
            if ($empresa->image()->delete()) {
                return redirect()->route('empresa.mostrar');
            }
        } else {
            return redirect()->route('login');
        }
    }

    //url logo
    public function url_logo()
    {
        $empresa = Empresa::where('user_id', Auth()->user()->id)->get(); //id de la empresa

        if ($empresa[0]->image) {

            return [$empresa[0]->image->url, $empresa[0]->nombre];
        } else {
            return ['', $empresa[0]->nombre];
        }
    }
}
