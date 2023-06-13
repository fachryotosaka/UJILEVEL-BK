<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminTController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StudentTController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\VulnerabilityController;
use App\Http\Controllers\ClassroomTeacherTController;
use App\Http\Controllers\CounselingTeacherTController;
use App\Http\Controllers\ExportController;

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
});

Route::middleware([
    'auth'
])->group(function () {
    Route::get('/home', [DashboardController::class, 'index']);

    // Route::get('/profile', function () {
    //     return view('profile.edit');
    // });

    Route::get('/user/profile', [UserProfileController::class, 'show'])->name('profile.show');
    Route::get('/user/photo-delete/{user}', [UserProfileController::class, 'deletePhoto'])->name('profile.photo-delete');
    Route::post('request-schedule', [ConsultationController::class, 'requestSchedule']);

    Route::get('archive-schedule', [ConsultationController::class, 'archiveSchedule'])->name('archive-schedule');


});

Route::middleware([
    'auth', 'admin'
])->group(function () {
    Route::resource('admin', AdminTController::class);
    Route::resource('counseling-teacher', CounselingTeacherTController::class);
    Route::resource('classroom-teacher', ClassroomTeacherTController::class);
    Route::resource('student', StudentTController::class);
});

Route::middleware([
    'teacher'
])->group(function () {
    Route::get('students', [StudentTController::class, 'index'])->name('students');
    Route::get('vulnerability', [VulnerabilityController::class, 'index'])->name('vulnerability');
    Route::get('getVulnerabilityNames', [VulnerabilityController::class, 'getVulnerabilityNames'])->name('getVulnerabilityNames');
    Route::post('addVulnerability/{id}', [VulnerabilityController::class, 'addVulnerability'])->name('addVulnerability');
    Route::post('editVulnerability/{id}', [VulnerabilityController::class, 'editVulnerability'])->name('editVulnerability');
    Route::get('fetchStudentVulnerability', [VulnerabilityController::class, 'fetchStudentVulnerability'])->name('fetchStudentVulnerability');
});

Route::middleware([
    'auth', 'counseling_teacher'
])->group(function () {
    // Route::get('request-schedule', [ConsultationController::class, 'getRequest'])->name('get-request-schedule');
    Route::get('/request-form/{id}', [ConsultationController::class, 'requestForm'])->name('request-form');
    Route::get('/finish-request/{id}', [ConsultationController::class, 'finishForm'])->name('finish-request');
    Route::post('/finish-request/{id}', [ConsultationController::class, 'finishRequest'])->name('finish-request');
    Route::post('/accept-request/{id}', [ConsultationController::class, 'acceptRequest']);
    Route::post('/decline-request/{id}', [ConsultationController::class, 'declineRequest']);

});

Route::controller(SearchController::class)->group(function(){
    Route::get('findClass', 'findClass')->name('findClass');
    Route::get('findUser', 'findUser')->name('findUser');
    Route::get('findStudent', 'findStudent')->name('findStudent');
    Route::get('resultUser/{id}', 'resultUser')->name('resultUser');
    Route::get('getTeacher', 'getTeacher')->name('getTeacher');
    Route::get('getCounselingService', 'getCounselingService')->name('getCounselingService');
    Route::get('getVulnerabilityType', 'getVulnerabilityType')->name('getVulnerabilityType');
});

// export
Route::get('user-export', [ExportController::class, 'export'])->name('user.excel');
