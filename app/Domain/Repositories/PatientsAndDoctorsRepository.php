<?php

namespace App\Domain\Repositories;

use App\Models\MedicoPaciente;

class PatientsAndDoctorsRepository{
    
    private $medicoPaciente;
    
    public function __construct(
        MedicoPaciente $medicoPaciente
    ){
        $this->medicoPaciente = $medicoPaciente;
    }

    public function store(array $data){

        return $this->medicoPaciente
            ->create($data);
    }

    public function find(int $id){

        return $this->medicoPaciente
            ->where('id', $id)
            ->with('paciente', 'medico')
            ->first();
    }

    public function getPatientsBy(int $id){

        return $this->medicoPaciente
            ->where('medico_id', $id)
            ->with('paciente')
            ->get();
    }
}