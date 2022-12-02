<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function propietario()
    {
        return $this->belongsTo('App\Models\Propietario');
    }

    public function materiales()
    {
        return $this->belongsTo('App\Models\Materiale');
    }

    public function instalation()
    {
        return $this->belongsTo('App\Models\Instalation');
    }
}
