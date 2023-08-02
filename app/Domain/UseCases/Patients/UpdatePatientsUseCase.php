<?php

namespace App\Domain\UseCases\Patients;

use App\Domain\Repositories\PatientsRepository;

class UpdatePatientsUseCase{

    protected $patientsRepository;

    public function __construct(
        PatientsRepository $patientsRepository,
        ){
        
        $this->patientsRepository = $patientsRepository;
    }

    public function handle(int $id, array $data){

        // Verifica se existe um paciente com o ID informado.
        $havePatient = $this->patientsRepository->find($id);
        
        if($havePatient == null){

            return null;
        }

        // Atualiza o paciente
        $patient = $this->patientsRepository->update($id, $data);

        $patientUpdated = $this->patientsRepository->find($id);
        
        return $patientUpdated;     
    }
}