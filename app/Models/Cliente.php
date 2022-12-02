<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function instalation()
    {
        return $this->belongsTo('App\Models\Instalation');
    }
    public function empresa()
    {
        return $this->belongsTo('App\Models\Empresa');
    }
    //relacion uno a muchos polimorfica
    public function telefonos()
    {
        return $this->morphMany('App\Models\Telefono', 'telefonoable');
    }

    public function plan()
    {
        return $this->belongsTo('App\Models\Plan');
    }

    public function estado()
    {
        return $this->belongsTo('App\Models\Estado');
    }
    public function ddp()
    {
        return $this->belongsTo('App\Models\Ddp');
    }
    public function facturas()
    {
        return $this->hasMany('App\Models\Factura');
    }
}
