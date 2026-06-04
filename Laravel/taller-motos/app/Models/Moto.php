<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Moto extends Model
{
    protected $table = 'motos';
    protected $fillable = ['user_id', 'marca_id', 'modelo', 'año', 'matricula', 'kilometros'];

    // Una moto pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Una moto pertenece a una marca
    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }

    // Una moto tiene muchos pedidos de reparación
    public function pedidosReparacion()
    {
        return $this->hasMany(PedidoReparacion::class);
    }
}