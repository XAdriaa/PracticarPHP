<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PedidoReparacion extends Model
{
    protected $table = 'pedidos_reparacion';

    protected $fillable = ['moto_id', 'mecanico_id', 'descripcion', 'status', 'fecha_entrada', 'fecha_salida'];

    // Un pedido pertenece a una moto
    public function moto()
    {
        return $this->belongsTo(Moto::class);
    }

    // Un pedido pertenece a un mecánico
    public function mecanico()
    {
        return $this->belongsTo(Mecanico::class);
    }

    // Un pedido tiene muchos servicios (tabla pivote)
    public function servicios()
    {
        return $this->belongsToMany(Servicio::class, 'servicios_pedidos_reparacion', 'pedido_reparacion_id', 'servicios_id')
                    ->withPivot('cantidad', 'precio')
                    ->withTimestamps();
    }
}