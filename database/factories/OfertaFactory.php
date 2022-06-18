<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class OfertaFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->word(),
            'descripcion' => $this->faker->paragraph(),
            'tipo_pago' => $this->faker->word(),
            'unidad_academica' => $this->faker->sentence(),
            'imagen'=> $this->faker->imageUrl(640, 480, 'animals', true),
            'poblacion_objetivo' => $this->faker->sentence(),
            'id_categoria' => $this->faker->unique(true)->numberBetween(1, 8),
            'costo' => $this->faker->randomNumber(5, true),
            'fecha_inicio' => $this->faker->date(),
            'resolucion' => $this->faker->sentence(3),
            'intensidad_horario' => $this->faker->sentence(),
            'limite_cupos' => $this->faker->numberBetween(0, 100),
            'fecha_fin' => $this->faker->date(),
            'tipo_curso' => $this->faker->sentence(),
            'fecha_cierre_inscripcion' => $this->faker->date(),
            'id_certificado' => $this->faker->unique(true)->numberBetween(1, 10)
        ];
    }
}
