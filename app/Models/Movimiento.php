<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    use HasFactory;

    protected $fillable = ['fecha','tipo_movimiento','usuario_id'];

    function user(){
        return $this->belongsTo(User::class, 'usuario_id', 'id');
    }

    function existencia_movimiento(){
        return $this->hasMany(ExistenciaMovimiento::class);
    }
}
