<?php

namespace App\Http\Controllers\Api;

use App\Domain\UseCases\Patients\StorePatientsUseCase;
use App\Domain\UseCases\Patients\UpdatePatientsUseCase;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    
    protected $storePatientUseCase;
    protected $updatePatientUseCase;

    public function __construct(
        StorePatientsUseCase $storePatientsUseCase,
        UpdatePatientsUseCase $updatePatientsUseCase
    ){
        $this->storePatientUseCase = $storePatientsUseCase;  
        $this->updatePatientUseCase = $updatePatientsUseCase;
    }

    public function store(StorePatientRequest $request){

        $data = $request->validated();

        try {

            $patient = $this->storePatientUseCase->handle($data);
            
            if($patient == null){
                
                return response()->json([
                    'msg' => 'Não foi possível salvar as informações, pois já existe um cadastro com esse CPF.',
                    'status' => 422  
                ], 422);
            }

            return response()->json($patient, 201);

        } catch (\Throwable $th) {
            
            return response()->json([
                'msg' => 'Houve um erro ao realizar essa operação.',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    public function update($id, UpdatePatientRequest $request){

        $data = $request->validated();

        try {

            $patient = $this->updatePatientUseCase->handle($id, $data);
            
            if($patient == null){
                
                return response()->json([
                    'msg' => 'Não foi possível salvar as informações, pois não existe um paciente cadastrado com esse ID.',
                    'status' => 422  
                ], 422);
            }

            return response()->json($patient, 200);

        } catch (\Throwable $th) {
            
            return response()->json([
                'msg' => 'Houve um erro ao realizar essa operação.',
                'error' => $th->getMessage()
            ], 500);
        }
    }
}
