<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CertificadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Certificado::factory(10)->create();
    }
}
