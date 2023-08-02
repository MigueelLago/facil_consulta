<?php

namespace App\Domain\Repositories;

use App\Models\Medicos;

class DoctorsRepository{
    
    private $medicos;

    public function __construct(Medicos $medicos){
        
        $this->medicos = $medicos;
    }

    public function getAll(){

        return $this->medicos
            ->get();

    }

    public function find(int $id){

        return $this->medicos
            ->where('id', $id)
            ->first();
    }

    public function findByCity(int $id){

        return $this->medicos
            ->where('cidade_id', $id)
            ->get();
    }

    public function store(array $medico){

        return $this->medicos
            ->create($medico);
    }
}