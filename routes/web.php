<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminTController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StudentTController;
use App\Http\Controllers\TeacherTController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserProfileController;

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

Route::middleware([
    'auth'
])->group(function () {
    Route::get('/home', [DashboardController::class, 'index']);

    Route::get('/profile', function () {
        return view('profile.edit');
    });

    Route::get('/user/profile', [UserProfileController::class, 'show'])->name('profile.show');
    Route::get('/user/photo-delete/{user}', [UserProfileController::class, 'deletePhoto'])->name('profile.photo-delete');
    Route::post('request-schedule', [ConsultationController::class, 'requestSchedule']);

    Route::get('archive-schedule', [ConsultationController::class, 'archiveSchedule'])->name('archive-schedule');


});

Route::middleware([
    'auth', 'admin'
])->group(function () {
    Route::resource('admin', AdminTController::class);
    Route::resource('teacher', TeacherTController::class);
    Route::resource('student', StudentTController::class);
});

Route::middleware([
    'auth', 'teacher'
])->group(function () {
    Route::get('students', [StudentTController::class, 'index'])->name('students');
    Route::get('request-schedule', [ConsultationController::class, 'getRequest'])->name('get-request-schedule');
    Route::get('/request-form/{id}/{action?}', [ConsultationController::class, 'requestForm'])->name('request-form');
    Route::post('/accept-request/{id}', [ConsultationController::class, 'acceptRequest']);
    Route::post('/decline-request/{id}', [ConsultationController::class, 'declineRequest']);

});

Route::controller(SearchController::class)->group(function(){
    Route::get('findClass', 'findClass')->name('findClass');
    Route::get('findUser', 'findUser')->name('findUser');
    Route::get('resultUser/{id}', 'resultUser')->name('resultUser');
    Route::get('getTeacher', 'getTeacher')->name('getTeacher');
});