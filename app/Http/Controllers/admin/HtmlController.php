<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HtmlController extends Controller
{
    public function tabla001()
    {
        return
            "
        <table id='tabla_seleccionar_materiales' class='table table-sm table-responsive-sm table-secondary'>
        <thead>
            <th>#</th>
            <th>Marca</th>
            <th>modelo</th>
        </thead>
    </table>
        ";
    }
}
