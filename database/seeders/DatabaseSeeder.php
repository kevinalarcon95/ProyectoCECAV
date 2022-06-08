<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        //Roles y permisos
        $this->call(RoleSeeder::class);
        //Usuarios base
        $this->call(UserSeeder::class);
    }
}
