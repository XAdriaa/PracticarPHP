<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear o actualizar usuario admin
        User::updateOrCreate(
            ['email' => 'admin@taller.com'],
            [
                'nombre'    => 'Admin',
                'contraseña' => Hash::make('admin123'),
                'rol'       => 'admin',
                'telefono'  => '123456789',
            ]
        );

        // Crear o actualizar usuario cliente
        User::updateOrCreate(
            ['email' => 'cliente@taller.com'],
            [
                'nombre'    => 'Cliente Test',
                'contraseña' => Hash::make('cliente123'),
                'rol'       => 'cliente',
                'telefono'  => '987654321',
            ]
        );
    }
}
