<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoria1 = Categoria::create(['id' => 1, 'nombre' => 'Cursos']);
        $categoria2 = Categoria::create(['id' => 2, 'nombre' => 'Cursos especilizados']);
        $categoria3 = Categoria::create(['id' => 3, 'nombre' => 'Talleres']);
        $categoria4 = Categoria::create(['id' => 4, 'nombre' => 'Diplomados']);
        $categoria5 = Categoria::create(['id' => 5, 'nombre' => 'Seminarios']);
        $categoria6 = Categoria::create(['id' => 6, 'nombre' => 'Congresos']);
        $categoria7 = Categoria::create(['id' => 7, 'nombre' => 'Simposios']);
        $categoria8 = Categoria::create(['id' => 8, 'nombre' => 'Otros']);
    }
}
