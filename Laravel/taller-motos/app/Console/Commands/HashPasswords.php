<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class HashPasswords extends Command
{
    protected $signature = 'users:hash-passwords';
    protected $description = 'Hash all plain text passwords in the users table';

    public function handle()
    {
        $users = User::all();
        $count = 0;

        foreach ($users as $user) {
            // Check if password is NOT bcrypt (doesn't start with $2y$, $2a$, or $2b$)
            if (!preg_match('/^\$2[aby]\$/', $user->contraseña)) {
                $this->info("Hashing password for: {$user->email}");
                $user->contraseña = Hash::make($user->contraseña);
                $user->save();
                $count++;
            } else {
                $this->info("Password already hashed for: {$user->email}");
            }
        }

        $this->info("\n✓ Total passwords hashed: {$count}");
    }
}
