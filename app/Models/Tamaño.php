<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamaño extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','ancho','alto','grueso'];

    function existencia(){
        return $this->hasMany(Existencia::class);
    }
}
