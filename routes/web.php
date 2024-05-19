<?php

use App\Http\Controllers\CVController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\ProfessionalController;
use App\Http\Controllers\RegisterController;
use App\Models\CV;
use App\Models\Professional;
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
    return view('content.index');
})->middleware('guest');

Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/home', [CVController::class, 'home'])->middleware('auth');

Route::resource('/cv', CVController::class)->middleware('auth');
Route::put('/cv/education/{id}', [CVController::class, 'updateEducation'])->middleware('auth');
Route::put('/cv/organisation/{id}', [CVController::class, 'updateOrganisation'])->middleware('auth');
Route::put('/cv/other/{id}', [CVController::class, 'updateOther'])->middleware('auth');

Route::resource('/personal', PersonalController::class)->middleware('auth');
Route::resource('/professional', ProfessionalController::class)->middleware('auth');
Route::resource('/education', EducationController::class)->middleware('auth');