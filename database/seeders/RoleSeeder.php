<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;

use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Creamos admin y user
        //admin => all
        // user => ver el listado de ofertas
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleUser = Role::create(['name' => 'user']);

        //Asignamos los permisos
        Permission::create(['name' => 'admin/home'])->assignRole($roleAdmin);
        Permission::create(['name' => 'admin/listOferta'])->assignRole($roleAdmin);
        Permission::create(['name' => 'admin/createOferta'])->assignRole($roleAdmin);
        Permission::create(['name' => 'admin/editOferta'])->assignRole($roleAdmin);
        Permission::create(['name' => 'admin/updateOferta'])->assignRole($roleAdmin);
        Permission::create(['name' => 'admin/deleteOferta'])->assignRole($roleAdmin);
    }
}
