<?php

namespace Database\Seeders;

use App\Models\Pacientes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PacientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        
        $i = 0;

        for ($i=0; $i <= 10  ; $i++) { 

            Pacientes::create([
                'nome' => $faker->firstName(),
                'cpf' => $faker->numerify("###.###.###-##"),
                'celular' => $faker->numerify("(##)#####-####")
            ]);
        }
    }
}
