<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materiale extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function instalations(){
        return $this->belongsToMany('App\Models\Instalation');
    }

    public function propietario(){
        return $this->belongsToMany('App\Models\Propietario');
    }

    public function empresa(){
        return $this->belongsTo('App\Models\Empresa');
    }
}
