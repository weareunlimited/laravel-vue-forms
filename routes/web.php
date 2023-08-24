<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;

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
    return view('index');
});

Route::get('form-page', function () {
    return view('form-page');
});

Route::get('form-popup', function () {
    return view('index');
});

Route::post('/form-submit', [EmailController::class, 'sendEmail']);