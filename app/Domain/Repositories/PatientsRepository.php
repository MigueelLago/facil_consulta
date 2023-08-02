<?php

namespace App\Domain\Repositories;

use App\Models\Pacientes;

class PatientsRepository{
    
    private $pacientes;
    
    public function __construct(
        Pacientes $pacientes
    ){
        $this->pacientes = $pacientes;
    }

    public function find(int $id){

        return $this->pacientes
            ->where('id', $id)
            ->first();
    }

    public function getPatientByCpf(string $cpf){
        
        return $this->pacientes
            ->where('cpf', $cpf)
            ->first();
    }

    public function store(array $data){

        return $this->pacientes
            ->create($data);
    }

    public function update(int $id, array $data){

        return $this->pacientes
            ->where('id', $id)
            ->update($data);
    }
}