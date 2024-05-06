<?php

use App\Http\Controllers\API\MedicalRecord\CurrentMedicationController;
use App\Http\Controllers\API\MedicalRecord\famelyController;
use App\Http\Controllers\API\MedicalRecord\FamilyMemberController;
use App\Http\Controllers\API\Patientcontroller;
use App\Http\Controllers\CommuneController;
use App\Http\Controllers\WilayaController;
use App\Models\Commune;
use App\Models\MedicalRecords\CurrentMedication;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/wilayas', [WilayaController::class, 'index']);
Route::get('/wilayas/baldya/{id}', [WilayaController::class, 'showbaldya']);
Route::post('/wilayas', [WilayaController::class, 'store']);
Route::get('/wilayas/{id}', [WilayaController::class, "show"]);
Route::put('/wilayas/{id}', [WilayaController::class, 'update']);
Route::delete('/wilayas/{id}', [WilayaController::class, 'destroy']);
Route::put('/wilayas/{id}', [WilayaController::class, 'edit']);
// This route API for communes in algeria
Route::get('/communes', [CommuneController::class, 'index']);
Route::post('/communes', [CommuneController::class, 'store']);
Route::post('/communesW/{id}', [CommuneController::class, 'showcommun']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/test/{id}', [WilayaController::class, "show"]);
});
Route::post('/login', [Patientcontroller::class, 'login']);

// Create a medical record
Route::get('/medicalRecord/CurrentMedication/{id}', [CurrentMedicationController::class, 'index']);
Route::post('/medicalRecord/CurrentMedication/{id}', [CurrentMedicationController::class, 'store']);
Route::put('/medicalRecord/CurrentMedication/{id}', [CurrentMedicationController::class, 'update']);
Route::delete('/medicalRecord/CurrentMedication/{id}', [CurrentMedicationController::class, 'destroy']);
Route::put('/medicalRecord/CurrentMedication/changeState/{id}', [CurrentMedicationController::class, 'changeState']);
// Create a family 
Route::get('/medicalRecord/family/{name}', [famelyController::class, 'show']);
Route::post('/medicalRecord/family', [famelyController::class, 'store']);
Route::put('/medicalRecord/family/{name}', [famelyController::class, 'update']);
// Type of family medical history
Route::get('/medicalRecord/familyMember/{id}', [FamilyMemberController::class, 'showFamily']);
// make you oun
Route::get('/medicalRecord/familyMember/{patientid}/familyType/{typeMember}', [FamilyMemberController::class, 'createFamilyMember']);
