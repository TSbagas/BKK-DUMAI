<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\COPController;
use Illuminate\Support\Facades\Route;

// Rute registrasi dan login
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);


// Rute yang dilindungi oleh middleware auth
Route::middleware('auth')->group(function () {
    Route::get('bank_data',[DataController::class,'view'])->name('bank_data');
    Route::post('bank_data/import_data', [DataController::class, 'import_data'])->name('import_data');
    Route::get('/data', [DataController::class, 'getData'])->name('get_data');
    Route::get('cop', [COPController::class, 'index'])->name('cop');
    Route::get('home', function () {
        return view('home');
    })->name('home');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    
Route::post('/cop_data_umum_store', [COPController::class, 'store'])->name(name: 'cop.create');

});