<?php

namespace App\Domain\Repositories;

use App\Models\Cidades;

class CitysRepository{
    
    private $cidades;

    public function __construct(Cidades $cidades){
        
        $this->cidades = $cidades;
    }

    public function getAll(){

        return $this->cidades
            ->get();
    }

    public function find(int $id){

        return $this->cidades
            ->where('id', $id)
            ->first();
    }
}