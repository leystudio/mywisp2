<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function user()
    {
        $user = User::find($this->user_id);
        return $this->belongsTo('App\Models\User');
    }
    public function clientes()
    {
        return $this->hasMany('App\Models\Cliente');
    }
    public function notas()
    {

        return $this->hasMany('App\Models\Nota');
    }

    public function cuentasbancaria()
    {
        return $this->hasMany('App\Models\Cuentabancaria');
    }

    public function materiales()
    {
        return $this->hasMany('App\Models\Materiale');
    }
    //relacion uno a muchos polimorfica
    public function telefonos()
    {
        return $this->morphMany('App\Models\Telefonos', 'telefonoable');
    }

    //relacion uno a uno polimorfica
    public function image(){
        return $this->morphOne('App\Models\Image','imageable');
    }
}
