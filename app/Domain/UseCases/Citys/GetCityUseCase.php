<?php

namespace App\Domain\UseCases\Citys;

use App\Domain\Repositories\CitysRepository;

class GetCityUseCase{

    protected $citysRepository;

    public function __construct(CitysRepository $citysRepository){
        
        $this->citysRepository = $citysRepository;
    }

    public function handle(int $id){

        $city = $this->citysRepository->find($id);

        if($city == null){
            
            return [];
        }

        return $city;
    }
}