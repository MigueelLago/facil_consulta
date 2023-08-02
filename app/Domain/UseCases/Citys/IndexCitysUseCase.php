<?php

namespace App\Domain\UseCases\Citys;

use App\Domain\Repositories\CitysRepository;

class IndexCitysUseCase{

    protected $citysRepository;

    public function __construct(CitysRepository $citysRepository){
        
        $this->citysRepository = $citysRepository;
    }

    public function handle(){

        return $this->citysRepository->getAll();
    }
}