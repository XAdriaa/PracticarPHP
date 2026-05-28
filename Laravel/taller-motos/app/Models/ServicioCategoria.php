<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicioCategoria extends Model
{
    protected $table = 'servicios_categorias';

    protected $fillable = ['nombre', 'descripcion'];

    // Una categoría tiene muchos servicios
    public function servicios()
    {
        return $this->hasMany(Servicio::class, 'servicios_categoria_id');
    }
}