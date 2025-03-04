<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
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


Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Dashboard berdasarkan roleAuth::routes();

// Redirect setelah login berdasarkan role
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Proses login dengan metode POST
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.process');


// Dashboard berdasarkan role
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('auth/admin/dashboard');
});

Route::middleware(['auth', 'role:customer'])->group(function () {
    Route::get('/customer', [CustomerController::class, 'index'])->name('auth/customer/dashboard');
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');
