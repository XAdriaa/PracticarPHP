<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    protected $fillable = ['nombre', 'descripcion'];

    // Una especialidad tiene muchos mecánicos
    public function mecanicos()
    {
        return $this->hasMany(Mecanico::class);
    }
}