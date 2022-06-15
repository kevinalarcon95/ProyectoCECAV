<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create(['name' => 'KEVIN', 'email' => 'kevin@mail.com', 'password' =>Hash::make('12345678')]);
        $user1 = User::create(['name' => 'CARLOS', 'email' => 'carlos@mail.com', 'password' =>Hash::make('12345678')]);
        $admin = User::create(['name' => 'ADMINISTRADOR', 'email' => 'admin@admin.com', 'password' =>Hash::make('12345678')])->assignRole('admin');
        //$admin = User::create(['name' => 'ADMINISTRADOR', 'email' => 'admin@admin.com', 'password' =>Hash::make('12345678')])->assignRole('user');

        
    }
}
