<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';

    protected $fillable = ['nombre', 'email', 'contraseña', 'rol', 'telefono'];

    protected $hidden = ['contraseña'];

    protected $casts = [
        'contraseña' => 'hashed',
    ];

    protected $authPasswordName = 'contraseña';

    public function getAuthPassword()
    {
        return $this->contraseña;
    }

    public function motos()
    {
        return $this->hasMany(Moto::class);
    }

    public function esAdmin(): bool
    {
        return $this->rol === 'admin';
    }

    public function esCliente(): bool
    {
        return $this->rol === 'cliente';
    }
}