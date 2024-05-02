<?php

use App\Http\Controllers\Doctor\DoctorManageController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\sessionController;
use App\Http\Controllers\Specialization\SpecializationController;
use App\Http\Controllers\UserController;
use App\Models\Doctor;
use App\Models\Specialization;
use App\Models\User;
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
// This is main page
Route::get("/", [SessionController::class, 'index'])
    ->middleware('guest')->name('welcome.index');

// // this route for add user
Route::get(
    '/admin/create',
    [UserController::class, 'create']
)->middleware('can:create-users');

//  gropu of the admin
Route::get('/admin', function () {
    return view('admin.index', ["tag" => Doctor::all()]);
})->name('admin.dashboard');
// List of user page
Route::get('/admin/config', function () {
    return view('admin.index');
})->name('admin.config');


// Doctor controler
Route::get("admin/doctor", [DoctorManageController::class, 'index'])
    ->name('admin.doctor.index');

Route::post("admin/doctor/add", [DoctorManageController::class, 'create'])
    ->name("admin.doctor.create");

Route::delete("admin/doctor/delete/{doctor}", [DoctorManageController::class, 'delete'])
    ->name("admin.doctor.delete");
Route::patch("admin/doctor/update/{doctor}", [DoctorManageController::class, 'update'])
    ->name("admin.doctor.update");

//Users controller
Route::get("admin/users", [UserController::class, 'index'])

    ->name('admin.users.index');
Route::post("admin/users/add", [UserController::class, 'create'])
    ->name('admin.users.create');


// specialization Doctor
Route::delete("admin/specialization/add", [SpecializationController::class, 'create'])
    ->name("admin.specialization.create");
Route::delete("admin/specialization/delete/{specialization}", [SpecializationController::class, 'delete'])
    ->name("admin.specialization.delete");

// TODO: change the Conntroller
Route::Post("/admin/config", [UserController::class, 'create'])->name('admin.config.index');

// Crate  the user
Route::get("/register/admin", [SessionController::class, 'register'])
    ->middleware('guest')->name('Register.admin');

Route::post("/register/admin", [SessionController::class, 'store'])
    ->middleware('guest')->name('Register.admin');

// logout the users from The nav
Route::get("/logout", [SessionController::class, 'destroy'])
    ->middleware('auth')->name('logout');

// login page
Route::get("/login/admin", [SessionController::class, 'display'])
    ->middleware('guest')->name('admin.login');
Route::post("/login/admin", [sessionController::class, 'login'])->middleware('guest')
    ->name('admin.login_post');
