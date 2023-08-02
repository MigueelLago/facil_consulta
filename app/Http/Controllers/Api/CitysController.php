<?php

namespace App\Http\Controllers\Api;

use App\Domain\UseCases\Citys\GetCityUseCase;
use App\Domain\UseCases\Citys\IndexCitysUseCase;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CitysController extends Controller
{
    
    protected $indexCitysUseCase;
    protected $getCityUseCase;

    public function __construct(
        IndexCitysUseCase $indexCitysUseCase,
        GetCityUseCase $getCityUseCase){
        
        $this->indexCitysUseCase = $indexCitysUseCase;
        $this->getCityUseCase = $getCityUseCase;
    }

    public function index(){

        try {
            
            $citys = $this->indexCitysUseCase->handle();

            return response()->json($citys);

        } catch (\Throwable $th) {
            
            return response()->json([
                'msg' => 'Houve um erro ao realizar essa operação.',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    public function show($id){

        try {
            
            $city = $this->getCityUseCase->handle($id);

            return response()->json($city);

        } catch (\Throwable $th) {
            
            return response()->json([
                'msg' => 'Houve um erro ao realizar essa operação.',
                'error' => $th->getMessage()
            ], 500);
        }
    }
}
