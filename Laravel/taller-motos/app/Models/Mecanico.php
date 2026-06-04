<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mecanico extends Model
{
    protected $table = 'mecanicos';
    protected $fillable = ['nombre', 'especialidad_id', 'telefono'];

    // Un mecánico pertenece a una especialidad
    public function especialidad()
    {
        return $this->belongsTo(Especialidad::class);
    }

    // Un mecánico tiene muchos pedidos de reparación
    public function pedidosReparacion()
    {
        return $this->hasMany(PedidoReparacion::class);
    }
}