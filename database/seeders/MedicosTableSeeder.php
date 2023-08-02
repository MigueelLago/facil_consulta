<?php

namespace Database\Seeders;

use App\Models\Cidades;
use App\Models\Medicos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class MedicosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        $cidades = Cidades::all();

        foreach($cidades as $cidade){

            $medicos = [
                ['nome' => 'Dr. '. $faker->firstNameMale(), 'especialidade' => 'Cardiologista', 'cidade_id' => $cidade->id],
                ['nome' => 'Dra. '. $faker->firstNameFemale(), 'especialidade' => 'Psiquiatria', 'cidade_id' => $cidade->id],
            ];

            foreach($medicos as $medico){
                Medicos::create($medico);
            }
        }
    }
}
