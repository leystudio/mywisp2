<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ddp extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function clientes()
    {
        return $this->hasMany('App\Models\Cliente');
    }
}
