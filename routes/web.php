<?php

use App\Http\Controllers\sessionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/doctor', function () {
//     return view('index');
// })->name('doctor');
// sessionController

Route::get('/admin', function () {
    return view('index');
})->name('Dashboard')->middleware('auth');
// rejuster the uaer
Route::get("/register", [sessionController::class, 'register'])->middleware('guest')->name('Register');
Route::post("/register", [sessionController::class, 'registerSave'])->middleware('guest')->name('Register');
// logout the user from the nav
Route::get("/logout", [sessionController::class, 'logout'])->middleware('auth')->name('logout');

Route::get("/", [sessionController::class, 'start'])->middleware('guest')->name('login');
Route::get("/login", [sessionController::class, 'start'])->middleware('guest')->name('login');
Route::post("/login", [sessionController::class, 'create'])->middleware('guest')->name('login_post');




// Route for Users
// Route::get("/users", [::class, 'users'])->middleware('auth')->name('users');
