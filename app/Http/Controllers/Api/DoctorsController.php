<?php

namespace App\Http\Controllers\Api;

use App\Domain\UseCases\Doctors\GetDoctorByCityUseCase;
use App\Domain\UseCases\Doctors\GetDoctorUseCase;
use App\Domain\UseCases\Doctors\GetPatientsByDoctorUseCase;
use App\Domain\UseCases\Doctors\IndexDoctorsUseCase;
use App\Domain\UseCases\Doctors\StoreDoctorsUseCase;
use App\Domain\UseCases\Doctors\StorePatientAndDoctorUseCase;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\StorePatientForDoctorRequest;

class DoctorsController extends Controller
{
    
    protected $indexDoctorsUseCase;
    protected $getDoctorUseCase;
    protected $getDoctorByCityUseCase;
    protected $storeDoctorUseCase;
    protected $storePatientForDoctorUseCase;
    protected $getPatientsByDoctorUseCase;

    public function __construct(
        IndexDoctorsUseCase $indexDoctorsUseCase,
        GetDoctorUseCase $getDoctorUseCase, 
        GetDoctorByCityUseCase $getDoctorByCityUseCase,
        StoreDoctorsUseCase $storeDoctorsUseCase,
        StorePatientAndDoctorUseCase $storePatientAndDoctorUseCase,
        GetPatientsByDoctorUseCase $getPatientsByDoctorUseCase){
        
        $this->indexDoctorsUseCase = $indexDoctorsUseCase;
        $this->getDoctorUseCase = $getDoctorUseCase;
        $this->getDoctorByCityUseCase = $getDoctorByCityUseCase;
        $this->storeDoctorUseCase = $storeDoctorsUseCase;
        $this->storePatientForDoctorUseCase = $storePatientAndDoctorUseCase;
        $this->getPatientsByDoctorUseCase = $getPatientsByDoctorUseCase;
    }

    public function index(){

        try {
            
            $doctors = $this->indexDoctorsUseCase->handle();

            return response()->json($doctors);

        } catch (\Throwable $th) {
            
            return response()->json([
                'msg' => 'Houve um erro ao realizar essa operação.',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    public function show($id){

        try {
            
            $doctor = $this->getDoctorUseCase->handle($id);

            return response()->json($doctor);

        } catch (\Throwable $th) {
            
            return response()->json([
                'msg' => 'Houve um erro ao realizar essa operação.',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    public function findByCity($cityId){

        try {
            
            $doctor = $this->getDoctorByCityUseCase->handle($cityId);

            return response()->json($doctor);

        } catch (\Throwable $th) {
            
            return response()->json([
                'msg' => 'Houve um erro ao realizar essa operação.',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    public function store(StoreDoctorRequest $request){
        
        $data = $request->validated();

        try {
            
            $doctor = $this->storeDoctorUseCase->handle($data);
            
            if($doctor == null){
                
                return response()->json([
                    'msg' => 'Não foi possível salvar as informações, pois não existe nenhuma cidade cadastrada com esse ID',
                    'status' => 422  
                ], 422);
            }

            return response()->json($doctor, 201);

        } catch (\Throwable $th) {
            
            return response()->json([
                'msg' => 'Houve um erro ao realizar essa operação.',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    public function storePatientForDoctor(StorePatientForDoctorRequest $request){
        
        $data = $request->validated();

        try {
            
            $patientForDoctor = $this->storePatientForDoctorUseCase->handle($data);
            
            if($patientForDoctor == null){
                
                return response()->json([
                    'msg' => 'Não foi possível salvar as informações, pois não o paciente e/ou médico informado não existe.',
                    'status' => 422  
                ], 422);
            }

            return response()->json($patientForDoctor, 201);

        } catch (\Throwable $th) {
            
            return response()->json([
                'msg' => 'Houve um erro ao realizar essa operação.',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    public function getPatients($id){

        try {
            
            $patientForDoctor = $this->getPatientsByDoctorUseCase->handle($id);

            return response()->json($patientForDoctor, 201);

        } catch (\Throwable $th) {
            
            return response()->json([
                'msg' => 'Houve um erro ao realizar essa operação.',
                'error' => $th->getMessage()
            ], 500);
        }
    }
}
