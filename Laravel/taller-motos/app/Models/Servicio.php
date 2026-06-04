<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicios';
    protected $fillable = ['servicios_categoria_id', 'nombre', 'descripcion', 'precio_base'];

    // Un servicio pertenece a una categoría
    public function categoria()
    {
        return $this->belongsTo(ServicioCategoria::class, 'servicios_categoria_id');
    }

    // Un servicio puede estar en muchos pedidos (tabla pivote)
    public function pedidosReparacion()
    {
        return $this->belongsToMany(PedidoReparacion::class, 'servicios_pedidos_reparacion', 'servicios_id', 'pedido_reparacion_id')
                    ->withPivot('cantidad', 'precio')
                    ->withTimestamps();
    }
}