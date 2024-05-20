<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\IndustriController;
use App\Http\Controllers\PelamarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LamaranController;


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
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'admin'], function() {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/jurusan', [JurusanController::class, 'index'])->name('jurusan');
    Route::get('/mitra', [IndustriController::class, 'index'])->name('mitra');
    Route::get('/lowongan', [JobController::class, 'index'])->name('lowongan');
    Route::get('/pelamar', [PelamarController::class, 'index'])->name('pelamar');
    Route::resource('users', UserController::class);

    Route::get('/lamaran', [lamaranController::class, 'index'])->name('lamaran');


});

