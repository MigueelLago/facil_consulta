<?php

use App\Http\Controllers\Api\CitysController;
use App\Http\Controllers\Api\DoctorsController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\PatientsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('login', [LoginController::class, 'login']);

// Routes protected
Route::middleware('jwt.verify')->group(function(){
    Route::post('pacientes', [PatientsController::class, 'store']);
    Route::put('pacientes/{id}', [PatientsController::class, 'update']);
    Route::post('medicos', [DoctorsController::class, 'store']);
    Route::get('medicos/{id}/pacientes', [DoctorsController::class, 'getPatients']);
    Route::post('medicos/{id}/pacientes', [DoctorsController::class, 'storePatientForDoctor']);
});

// Routes not protected
Route::get('cidades', [CitysController::class, 'index']);
Route::get('cidades/{id}', [CitysController::class, 'show']);
Route::get('medicos', [DoctorsController::class, 'index']);
Route::get('medicos/{id}', [DoctorsController::class, 'show']);
Route::get('cidades/{id}/medicos', [DoctorsController::class, 'findByCity']);