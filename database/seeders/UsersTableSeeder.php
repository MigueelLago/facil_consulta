<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $name = 'Facil Consulta';
        $email = 'facil_consulta@admin.com';
        $password = Hash::make('123456789');

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password
        ]);
        
    }
}
