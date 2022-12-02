<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function empresa(){
        return $this->belongsTo('App\Models\Empresa','empresa_id');
    }
}
