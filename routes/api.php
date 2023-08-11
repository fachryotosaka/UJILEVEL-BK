<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\editScheduleMobile;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\SearchController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('auth/login', [AuthController::class, 'login']);
Route::get('auth/user', [AuthController::class, 'index'])->middleware('auth:sanctum');
Route::post('auth/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('archive-schedule', [ConsultationController::class, 'archiveSchedule'])->middleware('auth:sanctum');
Route::put('edit-student/{id}', [editScheduleMobile::class, 'updateprofile'])->middleware('auth:sanctum');

Route::post('add-profile-photo', [UserProfileController::class, 'addProfilePhoto'])->middleware('auth:sanctum');
Route::post('request-schedule', [ConsultationController::class, 'requestSchedule'])->middleware('auth:sanctum');
Route::get('get-teacher', [SearchController::class, 'getTeacher'])->middleware('auth:sanctum');
Route::delete('delete-profile-photo', [UserProfileController::class, 'deleteProfilePhoto'])->middleware('auth:sanctum');
