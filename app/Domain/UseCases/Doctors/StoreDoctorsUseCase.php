<?php

namespace App\Domain\UseCases\Doctors;

use App\Domain\Repositories\CitysRepository;
use App\Domain\Repositories\DoctorsRepository;

class StoreDoctorsUseCase{

    protected $doctorsRepository;
    protected $citysRepository;

    public function __construct(
        DoctorsRepository $doctorsRepository,
        CitysRepository $citysRepository){
        
        $this->doctorsRepository = $doctorsRepository;
        $this->citysRepository = $citysRepository;
    }

    public function handle(array $data){

        // Verifica se existe uma cidade com esse id

        $city = $this->citysRepository->find($data['cidade_id']);

        if($city == null){

            return null;
        }

        // Cria o médico
        $doctor = $this->doctorsRepository->store($data);

        return $doctor;     
    }
}