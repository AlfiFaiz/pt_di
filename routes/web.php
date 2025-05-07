<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\CustomerFormController;
use App\Http\Controllers\AdminAircraftController;
use App\Http\Controllers\HomeController;
use App\Models\EngineeringOrder;
use App\Models\AircraftProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AircraftProgramController;
use App\Http\Controllers\EngineeringOrderController;




// Halaman utama
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/capabilities', function () {
    return view('capabilities');
})->name('capabilities');

Route::get('/certificates', function () {
    return view('certificates');
})->name('certificates');

// Auth Routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.process');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// Dashboard berdasarkan role
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('auth.admin.dashboard');
});

Route::middleware(['auth', 'role:customer'])->group(function () {
    Route::get('/customer', [CustomerFormController::class, 'index'])->name('auth/customer/qms/form');
});


// Halaman Admin
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/users', [AdminController::class, 'manageUsers'])->name('admin.users');
    Route::post('/users/{id}/delete', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
    Route::post('/users/{id}/update-role', [AdminController::class, 'updateRole'])->name('admin.users.updateRole');
    Route::post('/users/{id}/edit', [AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::get('/belumdisetujui', [AdminController::class, 'manageUsers1'])->name('admin.belumdisetujui');

});

// CRUD QMS Form (Admin)
Route::prefix('admin/qms')->group(function () {
    Route::get('/form', [FormController::class, 'index'])->name('admin.qms.form');
    Route::get('/form/create', [FormController::class, 'create'])->name('admin.qms.form.create');
    Route::post('/form', [FormController::class, 'store'])->name('admin.qms.form.store');
    Route::get('/form/{form}/edit', [FormController::class, 'edit'])->name('admin.qms.form.edit');
    Route::put('/form/{form}', [FormController::class, 'update'])->name('admin.qms.form.update');
    Route::delete('/form/{form}', [FormController::class, 'destroy'])->name('admin.qms.form.destroy');
});

// CRUD Aircraft (Admin)
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/aircrafts', [AdminAircraftController::class, 'index'])->name('admin.aircrafts.index');
    Route::get('/aircrafts/create', [AdminAircraftController::class, 'create'])->name('aircrafts.create');
    Route::post('/aircrafts', [AdminAircraftController::class, 'store'])->name('aircrafts.store');
    Route::get('/aircrafts/{aircraft}/edit', [AdminAircraftController::class, 'edit'])->name('aircrafts.edit');
    Route::put('/aircrafts/{aircraft}', [AdminAircraftController::class, 'update'])->name('aircrafts.update');
    Route::delete('/aircrafts/{aircraft}', [AdminAircraftController::class, 'destroy'])->name('aircrafts.destroy');
});


// Halaman Customer
// Customer QMS Form Routes
Route::get('/customer/qms/form', [CustomerFormController::class, 'index'])->name('auth/customer/qms/form');


Route::get('auth/customer/progress', function () {
    return view('auth/customer/progress');
})->name('progress');

Route::get('/auth/customer/project', [AircraftProgramController::class, 'index'])->name('auth/customer/project');
Route::get('/project/{id}', [AircraftProgramController::class, 'show'])->name('project.detail');


Route::get('auth/customer/audit', function () {
    return view('auth/customer/audit');
})->name('auth/customer/audit');
Route::get('auth/customer/info', function () {
    return view('auth/customer/info');
})->name('auth/customer/info');




Route::get('/project/{id}', function ($id) {
    $aircraft = AircraftProgram::findOrFail($id);
    $orders = EngineeringOrder::where('aircraft_id', $id)->get();
    return view('auth/customer/project_detail', compact('aircraft', 'orders'));
})->name('project.detail');



Route::get('/engineering-orders/pdf/{id}', [EngineeringOrderController::class, 'downloadPDF'])->name('engineering-orders.pdf');

Route::get('/admin/aircrafts/{id}/detail', [AdminAircraftController::class, 'show'])->name('admin.aircrafts.detail');
Route::delete('/admin/aircrafts/{id}', [AdminAircraftController::class, 'destroy'])->name('admin.aircrafts.destroy');

Route::post('/admin/orders/{id}/update', [EngineeringOrderController::class, 'update'])->name('orders.update');
Route::post('/admin/orders/{id}/delete', [EngineeringOrderController::class, 'destroy'])->name('orders.destroy');
Route::post('/admin/orders/store', [EngineeringOrderController::class, 'store']);
Route::post('/admin/aircrafts/{id}/update', [AdminAircraftController::class, 'updateAircraft']);

Route::post('/admin/approve-user/{id}', [AdminController::class, 'approveUser'])->name('admin.approve');