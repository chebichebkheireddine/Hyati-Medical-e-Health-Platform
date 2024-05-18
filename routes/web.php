<?php

// use App\Http\Controllers\API\PatientController;

use App\Http\Controllers\AuthControllerF;
use App\Http\Controllers\Doctor\DoctorManageController;
use App\Http\Controllers\Heathcare\HealthcareController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\sessionController;
use App\Http\Controllers\Specialization\SpecializationController;
use App\Http\Controllers\System\ConfigController;
use App\Http\Controllers\System\PermissionController;
// use App\Http\Controllers\PatientController;
use App\Http\Controllers\UserController;
use App\Models\Doctor;
use App\Models\Specialization;
use App\Models\System\Permission;
use App\Models\User;
use Facade\Ignition\Http\Controllers\HealthCheckController;
use Illuminate\Support\Facades\Route;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


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
    return view('admin.index', ["tag" => Doctor::all(), "permissions" => Permission::all()]);
})->name('admin.dashboard');
// This is for Patient information
Route::get('/admin/patient', [PatientController::class, 'index'])->name('admin.patients.index');
Route::post('/admin/patient/add', [PatientController::class, 'store'])->name('admin.patient.add');
// List of Configaraton System
Route::get('admin/config', [ConfigController::class, 'index'])->name('admin.config.index');
Route::post('admin/config/oganzation', [ConfigController::class, 'create'])->name('admin.config.oganzation');
Route::post('admin/config/oganzationType', [ConfigController::class, 'createType'])->name('admin.config.oganzationType');
Route::get('admin/config/permestion', [ConfigController::class, 'index'])->name('admin.config.permmistion.index');
// Route for the permmmistion
Route::post('admin/config/permissions/add', [PermissionController::class, 'create'])->name('admin.config.permissions.create');
Route::patch('admin/config/permissions/edit/{permissions}', [PermissionController::class, 'update'])
    ->name('admin.config.permissions.update');
Route::delete('admin/config/permissions/delete/{permissions}', [PermissionController::class, 'delete'])
    ->name('admin.config.permissions.delete');
// Route for the role
Route::post('admin/config/role/add', [RoleController::class, 'create'])->name('admin.config.role.create');
Route::patch('admin/config/role/edit/{roles}', [RoleController::class, 'update'])->name('admin.config.role.update');
Route::delete('admin/config/role/delete/{roles}', [RoleController::class, 'delete'])->name('admin.config.role.delete');

Route::get('admin/healthcare', [HealthcareController::class, "index"])->name('admin.healthcare.index');

// Doctor controler
Route::get("admin/healthcare/doctor", [DoctorManageController::class, 'index'])
    ->name('admin.doctor.index');

Route::post("admin/healthcare/doctor/add", [DoctorManageController::class, 'create'])
    ->name("admin.doctor.create");

Route::delete("admin/healthcare/doctor/delete/{doctor}", [DoctorManageController::class, 'delete'])
    ->name("admin.doctor.delete");
Route::patch("admin/healthcare/doctor/update/{doctor}", [DoctorManageController::class, 'update'])
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
Route::get("admin/logout", [SessionController::class, 'destroy'])->name('admin.logout');

// login page
Route::get("admin/login", [SessionController::class, 'display'])
    ->middleware('guest')->name('admin.login');
Route::post("admin/login", [sessionController::class, 'login'])->middleware('guest')
    ->name('admin.login_post');


Route::get('admin/qrcode', function () {
    $qr = QrCode::generate('Hyati Medical');
    return view("qrcode", ['qr' => $qr]);
});
