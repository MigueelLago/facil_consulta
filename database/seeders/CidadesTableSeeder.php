<?php

namespace Database\Seeders;

use App\Models\Cidades;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $cidades = [
            ['nome' => 'Teixeira de Freitas', 'estado' => 'Bahia'],
            ['nome' => 'Itamaraju', 'estado' => 'Bahia'],
            ['nome' => 'Prado', 'estado' => 'Bahia'],
            ['nome' => 'Porto Seguro', 'estado' => 'Bahia'],
            ['nome' => 'Curitiba', 'estado' => 'Paraná'],
            ['nome' => 'São Paulo', 'estado' => 'São Paulo'],
            ['nome' => 'Porto Alegre', 'estado' => 'Rio Grande do Sul'],
            ['nome' => 'Belo Horizonte', 'estado' => 'Minas Gerais'],
            ['nome' => 'Serra', 'estado' => 'Espírito Santo'],
            ['nome' => 'Vitória', 'estado' => 'Espírito Santo']
        ];

        foreach($cidades as $cidade){
            Cidades::create($cidade);
        }
    }
}
