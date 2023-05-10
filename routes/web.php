<?php

use App\Exceptions\Handler;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExelController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DateController;
use App\Http\Controllers\DüzenleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\Veriler;
use App\Http\Controllers\WeekWorkController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\SifreGüncellemeController;
use App\Http\Controllers\ZktController;
use App\Http\Middleware\sifreYenilemeMiddleware;
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
})->name("login");

Route::get('/Red', function () {
    return view('red');
})->name("Red");
Route::get('/Red1', function () {
    return view('red1');
})->name("Red1");

Route::get('/Onay', function () {
    return view('onay');
})->name("onay");

Route::get('/excel', function () {
    return view('excel');
})->name("excelekleme");

Route::get('/user', function () {
    return view('user');
});
Route::get('/UserGüncelle', function(){
    return view('zkt-update');
});
Route::get('/userlist', [ZktController::class,'Userdata'])->name('UserData');


Route::get('/home', [HomeController::class,'value'])->name("anasayfa");



//sifre güncelleme
route::get('güncelleme',[SifreGüncellemeController::class,'güncelle'])->name("güncelleme"); 
Route::middleware([sifreYenilemeMiddleware::class])->get('/SifreYenileme', function () {
    return view('sifreYenileme');
})->name("sifreYenileme");
//mail gönderme 
route::get('send',[MailController::class,'send'])->name("send-mail");
Route::get('/sifreYenileme', function () {
    return view('mailGonder');
})->name("SifreMail");


//günlük süre
Route::get('/DayWork',[DateController::class,'date'])->name('DayTime');
Route::post('/DayWorkDay',[DateController::class,'date'])->name('daytime');

//haftalık süre
Route::get('/WeekWork',[WeekWorkController::class,'date'])->name('WeekWork');

//profil kısmı
Route::get('/ProfilController',[ProfilController::class,'profil'])->name('ProfilController');

//düzenleme kısmı
Route::post('/düzenle-kayıt',[DüzenleController::class,'düzenle'])->name('güncelle');
Route::post('/imgdüzenle-kayıt',[DüzenleController::class,'profilimg'])->name('imggüncelle');
Route::get('/düzenle',[DüzenleController::class,'getValue'])->name('düzenleme');

//login 
Route::post('/dogrulama',[LoginController::class,'login'])->name('user');

//excel verisini database atma için
Route::post('/excel', [ExelController::class, 'import'])->name('excel');

//admin paneli için 
Route::get('/usertimedata',[ZktController::class,"TimeData"]);

//datatable 
Route::get('users', [Veriler::class,'index'])->name('users.index');


//zktcihaz okuma
Route::post("/data",[ZktController::class,"index"])->name("data");
//zkt kullanıcı ekleme ve güncelleme
Route::post("/addUser",[ZktController::class,"güncelle"])->name("addUser");

Route::post('/güncelle', [ZktController::class, 'güncelle'])->name("güncelle");


//zkt kullanıcı silme
Route::get("/test2",[ZktController::class,"removeUser"]);