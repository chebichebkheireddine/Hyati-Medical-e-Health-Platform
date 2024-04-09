<?php

use App\Http\Controllers\Doctor\SessionController;
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
//Doctor ro
// This is main page
Route::get("/login/doctor", [SessionController::class, 'index'])->name("doctor.login");