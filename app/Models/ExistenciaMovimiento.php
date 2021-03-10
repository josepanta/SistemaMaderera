<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExistenciaMovimiento extends Model
{
    use HasFactory;

    protected $fillable = ['cantidad', 'existencia_id', 'movimiento_id'];

    function existencia(){
        return $this->belongsTo(Existencia::class);
    }

    function movimiento(){
        return $this->belongsTo(Movimiento::class);
    }
}
