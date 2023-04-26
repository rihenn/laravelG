<?php

use App\Exceptions\Handler;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExelController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DateController;
use App\Http\Controllers\Veriler;

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
Route::get('/login', function () {
    return view('login');
});

Route::get('/excel', function () {
    return view('excel');
})->name("excelekleme");

Route::get('/user', function () {
    return view('user');
});
Route::get('/home', function () {
    return view('home');
})->name("home");


Route::get('/DayWorkDay',[DateController::class,'date'])->name('DayTime');
Route::post('/DayWorkDay',[DateController::class,'date'])->name('daytime');


Route::post('/dogrulama',[LoginController::class,'login'])->name('user');

Route::post('/excel', [ExelController::class, 'import'])->name('excel');
Route::get('users', [Veriler::class,'index'])->name('users.index');
