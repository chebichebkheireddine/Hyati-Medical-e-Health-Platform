<?php

// use App\Http\Controllers\API\PatientController;

use App\Http\Controllers\AuthControllerF;
use App\Http\Controllers\ChatController;
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
use Illuminate\Http\Request;

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
    return view('admin.index', ["tag" => Doctor::all(), "permissions" => Permission::all(), "users" => User::all()]);
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
Route::post('admin/config/permissions/add', [PermissionController::class, 'create'])
    ->name('admin.config.permissions.create');
Route::patch('admin/config/permissions/edit/{permissions}', [PermissionController::class, 'update'])
    ->name('admin.config.permissions.update');
Route::delete('admin/config/permissions/delete/{permissions}', [PermissionController::class, 'delete'])
    ->name('admin.config.permissions.delete');
// Route for the role
Route::post('admin/config/role/add', [RoleController::class, 'create'])
    ->name('admin.config.role.create');
Route::patch('admin/config/role/edit/{roles}', [RoleController::class, 'update'])
    ->name('admin.config.role.update');
Route::delete('admin/config/role/delete/{roles}', [RoleController::class, 'delete'])
    ->name('admin.config.role.delete');
// This Route for Assing the permistion to the role
Route::post('admin/config/role/permissions/add/{role}', [RoleController::class, 'assignPermission'])
    ->name('admin.config.role.permissions.create');

Route::patch('admin/config/role/permissions/update/{role}', [RoleController::class, 'syncPermission'])
    ->name('admin.config.role.permissions.update');

Route::patch('admin/config/role/permissions/delet/{role}', [RoleController::class, 'deletePermission'])
    ->name('admin.config.role.permissions.Delete');


Route::get('admin/healthcare', [HealthcareController::class, "index"])->name('admin.healthcare.index');

// Doctor controler
Route::get("admin/healthcare/doctor", [DoctorManageController::class, 'index'])
    ->name('admin.doctor.index');
Route::get("admin/healthcare/doctor/config", [SpecializationController::class, 'index'])
    ->name('admin.doctor.index.config');


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
Route::patch("admin/users/edit/{user}", [UserController::class, 'update'])
    ->name('admin.users.update');
Route::patch("admin/users/accept/{user}", [UserController::class, 'acceptuser'])
    ->name('admin.users.accept');

Route::patch("admin/users/removeaccept/{user}", [UserController::class, 'removeacceptuser'])
    ->name('admin.users.removeaccept');
Route::delete("admin/users/delete/{user}", [UserController::class, 'delete'])->name('admin.users.delete');
// This is for handel User permissien
Route::post("admin/users/permissions/add/{user}", [UserController::class, 'assignPermission'])
    ->name('admin.users.permissions.create');


Route::post("admin/users/permissions/sync/{user}", [UserController::class, 'syncPermission'])
    ->name('admin.users.permissions.sync');


// specialization Doctor
Route::delete("admin/healthcare/doctor/specialization/add", [SpecializationController::class, 'create'])
    ->name("admin.specialization.create");
Route::patch("admin/healthcare/doctor/specialization/update/{specialization}", [SpecializationController::class, 'update'])
    ->name("admin.specialization.update");

Route::delete("admin/healthcare/doctor/specialization/delete/{specialization}", [SpecializationController::class, 'delete'])
    ->name("admin.specialization.delete");

Route::get("admin/chat", [ChatController::class, 'index'])
    ->name("admin.chat.index");

// TODO: change the Conntroller
Route::Post("/admin/config", [UserController::class, 'create'])->name('admin.config.index');

// Crate  the user
Route::get("/register/admin", [SessionController::class, 'register'])
    ->middleware('guest')->name('Register.admin.index');

Route::post("/register/admin", [SessionController::class, 'create'])
    ->middleware('guest')->name('Register.admin');

// logout the users from The nav
Route::get("admin/logout", [SessionController::class, 'destroy'])->name('admin.logout');

// login page
Route::get("admin/login", [SessionController::class, 'display'])
    ->middleware('guest')->name('admin.login');
Route::post("admin/login", [sessionController::class, 'login'])->middleware(['guest'])
    ->name('admin.login_post');


Route::get('admin/qrcode', function () {
    $qr = QrCode::generate('Hyati Medical');
    return view("qrcode", ['qr' => $qr]);
});
