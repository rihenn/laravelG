<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\DiveceUsers;
use App\Models\Veri;
use Illuminate\Support\Facades\Schema;
use Rats\Zkteco\Lib\ZKTeco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class ZktController extends Controller
{
  public function index(Request $request)
  {
    $id = $request->input('cihazId');

    if (!Schema::hasTable('pdks_divece_users')) {
      DiveceUsers::where('divece_number', $id)->delete();
    }
    $cihazdata = Device::where("id", "=", $id)
      ->get();
    foreach ($cihazdata as $dat) {
      $ip = $dat->ip;
      $port = $dat->port;
    }
    $zk = new ZKTeco($ip, $port);
    $zk->connect();
    $zk->disableDevice();
    $users = $zk->getUser();
    $data = [];
    foreach ($users as $user) {
      $data[] = [
        'id' => $user['userid'],
        'uid' => $user['uid'],
        'name' => $user['name'],
        'role' => $user['role'],
        'password' => $user['password'],
        'card_number' => $user['cardno'],
        'divece_id' => $id
      ];
    }
    DiveceUsers::insert($data);
    return back();
  }


  public function Userdata(Request $request)
  {
    
    $diveceData  = Device::first();
    $diveceId = $diveceData->id;
    $ip = $diveceData->ip;
    $port = $diveceData->port;
    $cihazname = $diveceData->divece_name;
    session(['cihazId' => $diveceId]);
    $id = $request->input('sırala');
    session()->put('cihazId', $id);
    $cihazAllData = [];
    $cihazdata = Device::get();
    foreach ($cihazdata as $dat) {
      $cihazData = [
        "id" => $dat->id,
        "cihazname" => $dat->divece_name,
        "ip" => $dat->ip,
      ];

      $cihazAllData[] = $cihazData;
      $cihaz_id = $dat->id;
      if ($id == $cihaz_id) {
        $port = $dat->port;
        $ip = $dat->ip;

        $cihazname = $dat->divece_name;
      }
    }


    $zk = new ZKTeco($ip, $port);
    $zk->connect();
    $zk->disableDevice();
    //  $name=$zk->deviceName();
    $users = $zk->getUser();
    $users = (array) $users;
    // dd($users);
    // dd($name);
    return view("userList", ["users" => $users, "cihazAllData" => $cihazAllData, "cihazname" => $cihazname, "Cihazid" => $id]);
  }


  public function addUser(Request $request)
  {
    function ID($sayilar)
    {
      sort($sayilar); // Sayıları küçükten büyüğe sırala
      $eksikSayi = null;

      for ($i = 0; $i < count($sayilar) - 1; $i++) {
        if ($sayilar[$i + 1] - $sayilar[$i] > 1) {
          $eksikSayi = $sayilar[$i] + 1;
          break;
        }
      }


      if ($eksikSayi === null) {
        $eksikSayi = end($sayilar) + 1;
      }

      return $eksikSayi;
    }
    $veriler = $request->input('veriler');
    $seciliVeriler = [];
    if (isset($veriler)) {

      $cihazdata = Device::get();
      foreach ($cihazdata as $dat) {

        foreach ($veriler as $veri) {

          if ($veri == $dat->id) {


            $ip = $dat->ip;
            $zk = new ZKTeco($ip, 4370);

            $name = $request->input('name');
            $role = $request->input('role');
            $password = $request->input('password');
            $cardno = $request->input('CardNo');
            if (isset($name) && isset($role) && isset($cardno)) {


              $zk->connect();
              $zk->disableDevice();
              $users = $zk->getUser();

              $userId = [];
              $userUID = [];

              foreach ($users as $user) {
                $userId[] = intval($user["userid"]);
                $userUID[] = $user["uid"];
              }
              $id = ID($userId);
              $uid = ID($userUID);


              $zk->setUser($uid, $id, $name, $password, $role, $cardno);
              $zk->enableDevice();

              $htmlMessage = '<div class="alert alert-danger" role="alert">
              başarılı bir şekilde kayıt yapıldı.
            </div>';
              Session::flash('success_message', $htmlMessage);

              return redirect()->back();
            } else {
              $htmlMessage = '<div class="alert alert-danger" role="alert">
              lütfen alanları doldurunuz seçiniz.
            </div>';
              Session::flash('success_message', $htmlMessage);
              return redirect()->back();
            }
          }
        }
      }
    } else {

      $htmlMessage = '<div class="alert alert-danger" role="alert">
  lütfen cihaz seçiniz.
</div>';
      Session::flash('success_message', $htmlMessage);
      return redirect()->back();
    }
  }


  public function remove(Request $request)
  {
    $CihazId = session('cihazId');
    $ip = "192.168.1.123";
    $port = "4370";


    $cihazdata = Device::where("id", $CihazId)
      ->get();
    foreach ($cihazdata as $dat) {

      $port = $dat->port;
      $ip = $dat->ip;
    }
    $zk = new ZKTeco($ip, $port);
    $uid = $request->input('uid');
    $zk->connect();
    $zk->disableDevice();
    $zk->removeUser($uid);

    return redirect()->back();
  }


  public function güncelle(Request $request)
  {
    // dd($request);
    $CihazId = session('cihazId');
    $ip = "192.168.1.123";
    $port = "4370";
    $id = $request->input('sırala');

    $cihazdata = Device::where("id", $CihazId)
      ->get();
    foreach ($cihazdata as $dat) {

      $port = $dat->port;
      $ip = $dat->ip;
    }

    $zk = new ZKTeco($ip, $port);
    $uid = $request->input('uid');
    $id = $request->input('userid');
    $name = $request->input('name');
    $role = $request->input('role');
    $password = $request->input('password');

    if (!isset($password)) {
      $password = "";
    }
    $cardno = $request->input('cardno');


    DiveceUsers::where('id', "=", $id)
      ->where("divece_id", "=", $CihazId)
      ->update(['uid' => $uid, 'id' => $id, 'name' => $name, 'role' => $role, 'password' => $password, 'card_number' => $cardno]);
    $zk->connect();
    $zk->disableDevice();
    $zk->setUser($uid, $id, $name, $password, $role, $cardno);
    return redirect()->back();
  }

  public function TimeData(Request $request)
  {
    $ip = "192.168.1.123";
    $port = "4370";
    $cihazname = "Giriş";
    $id = $request->input('sırala');
    $cihazAllData = [];
    $cihazdata = Device::get();
    foreach ($cihazdata as $dat) {
      $cihazData = [
        "id" => $dat->id,
        "cihazname" => $dat->divece_name,
        "ip" => $dat->ip,
      ];

      $cihazAllData[] = $cihazData;
      $cihaz_id = $dat->id;
      if ($id == $cihaz_id) {
        $port = $dat->port;
        $ip = $dat->ip;

        $cihazname = $dat->cihaz_name;
      }
    }


    $zk = new ZKTeco($ip, $port);
    $zk->connect();
    $zk->disableDevice();
    $attendaces = $zk->getAttendance();
    $users = $zk->getUser();

    return view("timedata", ["attendaces" => $attendaces, "users" => $users, "cihazAllData" => $cihazAllData, "cihazname" => $cihazname, "Cihazid" => $id]);
  }


  public function DataBaseTimeData(Request $request)
  {
    // dd($request);
    $ip = "192.168.1.123";
    $port = "4370";

    $id = $request->input('sırala');

    $cihazdata = Device::get();
    foreach ($cihazdata as $dat) {

      $cihaz_id = $dat->id;
      if ($id == $cihaz_id) {
        $port = $dat->port;
        $ip = $dat->ip;
        $diveceId = $dat->id;
        $cihazName = $dat->divece_name;
      }
    }


    $zk = new ZKTeco($ip, $port);
    $zk->connect();
    $zk->disableDevice();
    $attendaces = $zk->getAttendance();
    $Alldata = [];
    $veriler = DiveceUsers::where("divece_id", "=", $cihaz_id)->get();
    foreach ($veriler as $veri) {
      $name = $veri->name;
      $Userid = $veri->id;
     

      foreach ($attendaces as $data) {

        $Timeuid = $data["uid"];
        $Timeid = $data["id"];
        
        $Timestamp = $data["timestamp"];
        if ($Timeid == $Userid) {
          $tarih = Carbon::parse($Timestamp)->format('Y-m-d');
          $saat = Carbon::parse($Timestamp)->format('H:i:s');
          
          $Alldata []= [
            "person_id" => $Timeid,
            'uid' => $Timeuid,
            'name_surname' => $name,
            'divece_id' => $diveceId,
            'date_record' => $tarih . " " . $saat,
            'input_output' => $cihazName,

          ];

        }
      }
    }
    
    Veri::insertOrIgnore($Alldata);
    return redirect()->back();
  }
}
