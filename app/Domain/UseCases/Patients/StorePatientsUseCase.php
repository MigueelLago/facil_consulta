<?php

namespace App\Domain\UseCases\Patients;

use App\Domain\Repositories\PatientsRepository;

class StorePatientsUseCase{

    protected $patientsRepository;

    public function __construct(
        PatientsRepository $patientsRepository,
        ){
        
        $this->patientsRepository = $patientsRepository;
    }

    public function handle(array $data){

        // Verifica se existe um paciente com o CPF informado.
        $havePatient = $this->patientsRepository->getPatientByCpf($data['cpf']);
        
        if($havePatient != null){

            return null;
        }

        // Cria o paciente
        $patient = $this->patientsRepository->store($data);
        
        return $patient;     
    }
}