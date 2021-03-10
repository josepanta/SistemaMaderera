<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Existencia extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'cantidad','tamaño_id'];

    function tamaño(){
        return $this->belongsTo(Tamaño::class, 'tamaño_id', 'id');
    }

    function existencia_movimiento(){
        return $this->hasMany(ExistenciaMovimiento::class);
    }
}
