<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $empresa_id = Empresa::where('user_id', Auth::user()->id)->get();
        if (count($empresa_id)) {

            return view('admin.dashboard.dashboard', compact('empresa_id'));
        } else {
            return view('admin.empresa.crearEmpresa');
        }
    }
}
