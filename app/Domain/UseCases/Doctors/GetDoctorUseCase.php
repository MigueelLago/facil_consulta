<?php

namespace App\Domain\UseCases\Doctors;

use App\Domain\Repositories\DoctorsRepository;

class GetDoctorUseCase{

    protected $doctorsRepository;

    public function __construct(DoctorsRepository $doctorsRepository){
        
        $this->doctorsRepository = $doctorsRepository;
    }

    public function handle(int $id){

        $doctor = $this->doctorsRepository->find($id);

        if($doctor == null){
            
            return [];
        }

        return $doctor;
    }
}