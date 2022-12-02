<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instalation extends Model
{
    use HasFactory;
    public function cliente(){
        return $this->hasOne('App\Models\Cliente');
    }
    public function materiales(){
        return $this->belongsToMany('App\Models\Materiale');
    }
    

}
