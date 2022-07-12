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
        $user1 = User::create(['tipoId'=>'CC', 'numIdentificacion'=>'1061','name' => 'KEVIN', 'lastname' => 'ALARCON','email' => 'kevin@mail.com', 'password' =>Hash::make('12345678')])->assignRole('user');
        $user1 = User::create(['tipoId'=>'CC', 'numIdentificacion'=>'1062','name' => 'CARLOS', 'lastname' => 'HOYOS','email' => 'carlos@mail.com', 'password' =>Hash::make('12345678')])->assignRole('user');
        $admin = User::create(['tipoId'=>'CC', 'numIdentificacion'=>'1063','name' => 'ADMINISTRADOR', 'lastname' => 'TOTAl','email' => 'admin@admin.com', 'password' =>Hash::make('12345678')])->assignRole('admin');
        //$admin = User::create(['name' => 'ADMINISTRADOR', 'email' => 'admin@admin.com', 'password' =>Hash::make('12345678')])->assignRole('user');

        
    }
}
