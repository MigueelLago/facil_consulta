<?php

namespace App\Domain\UseCases\Doctors;

use App\Domain\Repositories\DoctorsRepository;
use App\Domain\Repositories\PatientsAndDoctorsRepository;
use App\Domain\Repositories\PatientsRepository;
use Carbon\Carbon;

class StorePatientAndDoctorUseCase{

    protected $doctorsRepository;
    protected $patientRepository;
    protected $doctorAndPacientRepository;

    public function __construct(
        DoctorsRepository $doctorsRepository,
        PatientsRepository $patientRepository,
        PatientsAndDoctorsRepository $patientsAndDoctorsRepository){
        
        $this->doctorsRepository = $doctorsRepository;
        $this->patientRepository = $patientRepository;
        $this->doctorAndPacientRepository = $patientsAndDoctorsRepository;
    }

    public function handle(array $data){

        $response = [
            'medico' => [],
            'paciente' => []
        ];

        // Verifica se existe um paciente com esse id

        $paciente = $this->patientRepository->find($data['paciente_id']);

        if($paciente == null){

            return null;
        }

        // Verifica se existe um médico com esse id

        $doctor = $this->doctorsRepository->find($data['medico_id']);

        if($doctor == null){

            return null;
        }

        // Vincula paciente ao médico

        $patientForDoctor = $this->doctorAndPacientRepository->store($data);
        
        if($patientForDoctor){

            $content = $this->doctorAndPacientRepository->find($patientForDoctor->id);
            
            $contentMedicoOriginal = $content->medico->getOriginal();
            $contentPacienteOriginal = $content->paciente->getOriginal();

            $response['medico'] = $contentMedicoOriginal;
            $response['medico']['created_at'] = $content->medico->created_at->toDateTimeString();
            $response['medico']['updated_at'] = $content->medico->updated_at->toDateTimeString();

            $response['paciente'] = $contentPacienteOriginal;
            $response['paciente']['created_at'] = $content->paciente->created_at->toDateTimeString();
            $response['paciente']['updated_at'] = $content->paciente->updated_at->toDateTimeString();

        }

        return $response;
    }
}