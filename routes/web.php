<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/login', function () {
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('database/dashboard');
});

Route::get('/profile', function () {
    return view('database/profile');
});

Route::get('/crequest', function () {
    return view('database/client-request');
});

Route::get('/request', function () {
    return view('database/request');
});

Route::get('/vulnerability', function () {
    return view('database/vulnerability');
});


// modal content
Route::get('/inbox', function () {
    return view('components/contents/inbox');
});

Route::get('/input', function () {
    return view('components/contents/input');
});

Route::get('/detailrequest', function () {
    return view('components/contents/detailrequest');
});

Route::get('/add', function () {
    return view('components/contents/add');
});

Route::get('/vulinsert', function () {
    return view('components/contents/vulinsert');
});
