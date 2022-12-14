<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente');
    }
    function snqr()
    {
        return $this->hasOne('App\Models\Snqr');
    }
}
