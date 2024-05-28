<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CVController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\ProfessionalController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\OrganisationController;
use App\Http\Controllers\OtherController;
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

Route::group(['middleware' => ['guest']], function () {
    Route::get('/', function () {
        return view('content.index');
    });

    Route::post('/register', [RegisterController::class, 'store']);

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
});

Route::group(['middleware' => ['auth', 'rolelevel:1']], function () {
    Route::post('/logout', [LoginController::class, 'logout']);

    Route::get('/home', [CVController::class, 'home']);

    Route::resource('/cv', CVController::class);
    Route::put('/cv/education/{id}', [CVController::class, 'updateEducation']);
    Route::put('/cv/organisation/{id}', [CVController::class, 'updateOrganisation']);
    Route::put('/cv/other/{id}', [CVController::class, 'updateOther']);

    Route::resource('/personal', PersonalController::class);
    Route::resource('/professional', ProfessionalController::class);
    Route::resource('/education', EducationController::class);
    Route::resource('/organisation', OrganisationController::class);
    Route::resource('/other', OtherController::class);

    // export PDF
    Route::get('cv/export/{id}', [CVController::class, 'export']);

    Route::get('cv/share/{id}', [CVController::class, 'share']);
});

Route::group(['middleware' => ['auth', 'rolelevel:0']], function () {
    
    Route::get('/dashboard', [AdminController::class, 'index']);
    
    Route::resource('/admin', AdminController::class);
});

Route::group(['middleware' => ['auth', 'rolelevel:0,1']], function () {
    Route::post('/logout', [LoginController::class, 'logout']);
});

Route::resource('/user', UserController::class);
