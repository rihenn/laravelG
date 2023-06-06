<?php

use App\Exceptions\Handler;
use App\Http\Controllers\AddUserViewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExelController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DateController;
use App\Http\Controllers\DetayController;
use App\Http\Controllers\DeviceAdd;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\DüzenleController;
use App\Http\Controllers\Goback;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\Veriler;
use App\Http\Controllers\WeekWorkController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\SifreGüncellemeController;
use App\Http\Controllers\UserAddWebController;
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

Route::get('/', function () {
    return view('login');
})->name("login");

Route::get('/cıkıs', function () {
    session()->invalidate();
    return redirect()->route('login');
})->name("cikis");

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
})->name("excelekleme")->middleware('checklogin');


Route::post('/detaylar', [DetayController::class , "detaylar"])->name("detaylar");
Route::get('/detay', function(){ return view("detay") ;})->name("detay");

Route::get('/diveceuseradd',[AddUserViewController::class,"DeviceAddUserView"])->name("userUpdate")->middleware('checklogin');
Route::get('/userlist', [ZktController::class,'Userdata'])->name('UserData')->middleware('checklogin');


Route::get('/home', [HomeController::class,'value'])->name("anasayfa");

//web kullanıcı ekle
Route::get('/kullanıcı-ekle',function(){ return view("UserAddWeb"); })->name("webadduser");
Route::post('/kullanıcıEkle',[UserAddWebController::class,"AddWebUser"])->name("addUserWeb");


//cihaz ekle
Route::post('/deviceadd',[DeviceAdd::class,"AddDivece"])->name("diveceAdd");
Route::get('/cihazekleme',function(){ return view("deviceadd"); })->name("DiveceAdd");

//sifre güncelleme
route::get('güncelleme',[SifreGüncellemeController::class,'güncelle'])->name("güncelleme"); 
Route::group(['middleware' => 'sifre.yenileme'], function () {
    Route::get('/SifreYenileme', function () {
        return view('sifreYenileme');
    })->name("sifreYenileme");
});

//mail gönderme 
route::get('send',[MailController::class,'send'])->name("send-mail");
Route::get('/sifreYenileme', function () {
    return view('mailGonder');
})->name("SifreMail");


//günlük süre
Route::get('/DayWork',[DateController::class,'date'])->name('DayTime')->middleware('checklogin');
Route::post('/DayWorkDay',[DateController::class,'date'])->name('daytime')->middleware('checklogin');

//haftalık süre
Route::get('/WeekWork',[WeekWorkController::class,'date'])->name('WeekWork')->middleware('checklogin');

//profil kısmı
Route::get('/ProfilController',[ProfilController::class,'profil'])->name('ProfilController')->middleware('checklogin');

//düzenleme kısmı
Route::post('/düzenle-kayıt',[DüzenleController::class,'düzenle'])->name('güncelle')->middleware('checklogin');
Route::post('/imgdüzenle-kayıt',[DüzenleController::class,'profilimg'])->name('imggüncelle')->middleware('checklogin');
Route::get('/düzenle',[DüzenleController::class,'getValue'])->name('düzenleme')->middleware('checklogin');

//login 
Route::post('/dogrulama',[LoginController::class,'login'])->name('user');

//excel verisini database atma için
Route::post('/excel', [ExelController::class, 'import'])->name('excel')->middleware('checklogin');

//admin paneli için 
Route::get('/usertimedata',[ZktController::class,"TimeData"])->name('timeData')->middleware('checklogin');

Route::post('/userWrite',[ZktController::class,"DataBaseTimeData"])->name('databasetimedata')->middleware('checklogin');


//zktcihaz okuma
Route::post("/data",[ZktController::class,"index"])->name("data")->middleware('checklogin');

//zkt kullanıcı ekleme ve güncelleme
Route::post("/addUser",[ZktController::class,"addUser"])->name("diveceAddUser")->middleware('checklogin');

Route::post('/guncelle', [ZktController::class, 'güncelle'])->name('diveceUserUpdate')->middleware('checklogin');
Route::post('/remove', [ZktController::class, 'remove'])->name('diveceUserRemove')->middleware('checklogin');

Route::get('/device', [DeviceController::class, 'DiveceData'])->name('deviceData')->middleware('checklogin');


