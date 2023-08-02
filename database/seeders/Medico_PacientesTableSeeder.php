<?php

namespace Database\Seeders;

use App\Models\MedicoPaciente;
use App\Models\Medicos;
use App\Models\Pacientes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Medico_PacientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pacientes = Pacientes::pluck('id')->random(10);
        $medicos = Medicos::pluck('id')->random(10);

        for ($i = 0; $i < 10; $i++) {
            MedicoPaciente::create([
                'paciente_id' => $pacientes[$i],
                'medico_id' => $medicos[$i],
            ]);
        }
    }
}
