<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table = 'marcas';
    protected $fillable = ['nombre', 'pais'];

    // Una marca tiene muchas motos
    public function motos()
    {
        return $this->hasMany(Moto::class);
    }
}