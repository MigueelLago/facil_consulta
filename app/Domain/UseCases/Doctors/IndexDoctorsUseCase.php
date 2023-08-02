<?php

namespace App\Domain\UseCases\Doctors;

use App\Domain\Repositories\DoctorsRepository;

class IndexDoctorsUseCase{

    protected $doctorsRepository;

    public function __construct(DoctorsRepository $doctorsRepository){
        
        $this->doctorsRepository = $doctorsRepository;
    }

    public function handle(){

        return $this->doctorsRepository->getAll();
    }
}