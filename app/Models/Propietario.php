<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propietario extends Model
{
    use HasFactory;
   /*  public function Instalation_materiales(){
        return $this->hasMany('App\Models\Instalation_materiale');
    } */

    public function instalations(){
        return $this->belongsToMany('App\Models\Instalation');
    }
}
