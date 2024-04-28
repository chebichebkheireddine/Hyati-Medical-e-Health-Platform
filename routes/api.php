<?php

use App\Http\Controllers\CommuneController;
use App\Http\Controllers\WilayaController;
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
Route::post('/wilayas', [WilayaController::class, 'store']);
Route::get('/wilayas/{id}', [WilayaController::class, "show"]);
Route::put('/wilayas/{id}', [WilayaController::class, 'update']);
Route::delete('/wilayas/{id}', [WilayaController::class, 'destroy']);
Route::put('/wilayas/{id}', [WilayaController::class, 'edit']);
// This route API for communes in algeria
Route::get('/communes', [CommuneController::class, 'index']);
Route::post('/communes', [CommuneController::class, 'store']);
