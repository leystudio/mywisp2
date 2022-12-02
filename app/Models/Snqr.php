<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Snqr extends Model
{
    protected $guarded = [];
    function factura()
    {
        return $this->belongsTo('App\Models\Factura');
    }
    use HasFactory;
}
