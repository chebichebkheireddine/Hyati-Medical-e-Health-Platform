<?php

use App\Http\Controllers\Doctor\SessionDoctorController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
// Doctor Routes
/*
|--------------------------------------------------------------------------
| Doctor Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Doctor route to do the code
Route::get("/hethecare/doctor", function () {
    return view("doctor.index");
})->name("heathcar.doctor.index");

// This is main page
Route::get("doctor/login", [SessionDoctorController::class, 'index'])->name("doctor.login");
Route::get("doctor/register", [SessionDoctorController::class, 'regesterpage'])->name("Register.doctor.index");

Route::post("doctor/login", [SessionDoctorController::class, 'login'])->name("admin.doctor.login");
Route::post("doctor/register", [SessionDoctorController::class, 'regester'])->name("Register.doctor");
Route::get("heathcar/doctor/logout", [SessionDoctorController::class, 'destroy'])
    ->middleware('auth:doctor')->name('doctor.logout');
