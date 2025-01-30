<?php

namespace Database\Seeders;

use App\Models\Consulta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConsultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Consulta::factory(70)->create();
    }
}
