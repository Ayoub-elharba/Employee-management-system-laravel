<?php

use App\Http\Controllers\AttestationController;
use App\Http\Controllers\EmployesController;
use App\Http\Controllers\VacancController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');
    Route::resource('employes', 'EmployesController');
    // Route::resource('vacations', 'VacancController');
    Route::get('/vacation/{id}', [VacancController::class, 'index'])->name('vacance_show');
    Route::get('/certificate/{id}', [VacancController::class, 'show'])->name('attest_show');

    //////////////////////////////////////
    Route::resource('divisions', 'divisionController');
    Route::resource('servicess', 'serviceController');
    Route::resource('conges', 'CongeController');
    Route::resource('attestations', 'AttestationController');
});
