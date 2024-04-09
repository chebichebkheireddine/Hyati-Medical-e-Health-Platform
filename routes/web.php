<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\sessionController;
use App\Http\Controllers\UserController;
use App\Models\Doctor;
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
Route::get("/", [SessionController::class, 'index'])->middleware('guest')->name('welcome.index');

// // this route for add user
Route::get(
    '/admin/create',
    [UserController::class, 'create']
)->middleware('can:create-users');
//  gropu of the admin

Route::get('/admin', function () {
    return view('admin.index');
})->name('admin.dashboard');
// List of user page
Route::get('/admin/control', function () {
    return view('admin.index');
})->name('admin.control');
Route::get('admin/doctor/index', function () {
    return view('admin.index');
})->name('admin.doctor.index');

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
Route::post("/login/admin", [sessionController::class, 'login'])
    ->middleware('guest')->name('admin.login_post');

// Route::post("/role/add", [RoleController::class, 'create'])->middleware('auth')->name('role_add');