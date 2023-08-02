<?php

namespace App\Domain\UseCases\Doctors;

use App\Domain\Repositories\DoctorsRepository;

class GetDoctorByCityUseCase{

    protected $doctorsRepository;

    public function __construct(DoctorsRepository $doctorsRepository){
        
        $this->doctorsRepository = $doctorsRepository;
    }

    public function handle(int $id){

        $doctor = $this->doctorsRepository->findByCity($id);

        if($doctor->isEmpty()){
            
            return [];
        }

        return $doctor;
    }
}