<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\sessionController;
use App\Http\Controllers\UserController;
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
Route::get("/", [sessionController::class, 'index'])->middleware('guest')->name('welcome.index');

// // this route for add user
Route::get(
    '/admin/create',
    [UserController::class, 'create']
)->middleware('can:create-users');
//  gropu of the admin

Route::get('/admin', function () {
    return view('admin.index');
})->name('Dashboard');
// List of user page
Route::get('/control', function () {
    return view('admin.index');
})->name('control');


// rejuster the uaer
Route::get("/register", [sessionController::class, 'register'])->middleware('guest')->name('Register');
Route::post("/register", [sessionController::class, 'store'])->middleware('guest')->name('Register');
// logout the user from the nav
Route::get("/logout", [sessionController::class, 'destroy'])->middleware('auth')->name('logout');

Route::get("/login", [sessionController::class, 'login'])->middleware('guest')->name('admin.login');
Route::post("/login", [sessionController::class, 'display'])->middleware('guest')->name('admin.login_post');

// Route::post("/role/add", [RoleController::class, 'create'])->middleware('auth')->name('role_add');