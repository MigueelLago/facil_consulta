<?php

namespace App\Domain\UseCases\Doctors;

use App\Domain\Repositories\PatientsAndDoctorsRepository;
use Carbon\Carbon;

class GetPatientsByDoctorUseCase{

    protected $doctorAndPacientRepository;

    public function __construct(
        PatientsAndDoctorsRepository $patientsAndDoctorsRepository){
        
        $this->doctorAndPacientRepository = $patientsAndDoctorsRepository;
    }

    public function handle(int $id){

        $response = [];

        $pacientes = $this->doctorAndPacientRepository->getPatientsBy($id);
        
        if(!$pacientes->isEmpty()){
            
            foreach($pacientes as $key => $paciente){

                $response[$key]['id'] = $paciente->paciente->id;
                $response[$key]['nome'] = $paciente->paciente->nome;
                $response[$key]['cpf'] = $paciente->paciente->cpf;
                $response[$key]['celular'] = $paciente->paciente->celular;
                $response[$key]['created_at'] = $paciente->paciente->created_at;
                $response[$key]['updated_at'] = $paciente->paciente->updated_at;
                $response[$key]['deleted_at'] = $paciente->paciente->deleted_at;
            }
        }

        return $response;
    }
}