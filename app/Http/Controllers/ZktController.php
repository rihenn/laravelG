<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\DeviceUsers;
use App\Models\Veri;

use Rats\Zkteco\Lib\ZKTeco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class ZktController extends Controller
{
  public function index(Request $request)
  {
    $id = $request->input('id');

    $dat = Device::where("id", "=", $id)
      ->first();


    $ipG = $dat->giris_ip;
    $portG = $dat->giris_port;
    $ipC = $dat->cikis_ip;
    $portC = $dat->cikis_port;

    $zk = new ZKTeco($ipG, $portG);
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
        'device_id' => "giris"
      ];
    }

    $zk = new ZKTeco($ipC, $portC);
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
        'device_id' => "cikis"
      ];
    }

    DeviceUsers::insertOrIgnore($data);
    return back();
  }


  public function Userdata(Request $request)
  {

    $diveceData  = Device::first();

    $companyDoorId = $diveceData->id;
    $ip = $diveceData->giris_ip;
    $port = $diveceData->giris_port;
    $company_name = $diveceData->company_name;
    $cihazname = $diveceData->door_name . " Giriş";

    session(['cihazId' => $companyDoorId]);

    $ID = $request->input('sırala');
    if (isset($ID)) {
      $id = $ID;
    }else{
      $id = $companyDoorId;
    }
    $ipler = $request->input('ip');

    session()->put('cihazId', $id);

    $cihazAllData = [];

    $cihazdata = Device::get();

    foreach ($cihazdata as $dat) {

      $cihazData = [
        "id" => $dat->id,
        "company_name" => $company_name,
        "giris_devicename" => $dat->door_name . "giris",
        "giris_ip" => $dat->giris_ip,
        "cikis_devicename" => $dat->door_name . "cikis",
        "cikis_ip" => $dat->cikis_ip,
      ];

      $cihazAllData[] = $cihazData;
      if ($ipler == $dat->giris_ip) {
        $ip = $ipler;
        $port = $dat->giris_port;
        $id = $dat->id;
        $cihazname = $dat->door_name . " Giriş";
      } elseif ($ipler == $dat->cikis_ip) {
        $ip = $ipler;
        $port = $dat->cikis_port;
        $id = $dat->id;
        $cihazname = $dat->door_name . " Çıkış";
      }
    }


    $zk = new ZKTeco($ip, $port);
    $zk->connect();
    $zk->disableDevice();

    $users = $zk->getUser();
    $users = (array) $users;

    return view("userList", ["users" => $users, "cihazAllData" => $cihazAllData, "cihazname" => $cihazname, "idDoor" => $id,"ip"=>$ip]);
  }


  public function addUser(Request $request)
  {


    function ID($sayilar)
    {
      sort($sayilar);
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
    $door_id = $request->input('door_id');
    // dd($door_id);
    if (isset($veriler)) {

      $cihazdata = Device::where("id",$door_id)->get();


      foreach ($cihazdata as $dat) {

        // dd(isset($veriler));


        if ($veriler == $dat->giris_ip || $veriler == $dat->cikis_ip) {
          
          $ip = $veriler;
          if($ip == $dat->giris_ip ){
            $port = $dat->giris_port;
          }
          elseif($ip == $dat->cikis_ip ){
            $port = $dat->cikis_port;
          }
          $zk = new ZKTeco($ip, $port);

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

            $htmlMessage = '<div class="alert alert-success" role="alert">
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
        }else{
          $htmlMessage = '<div class="alert alert-danger" role="alert">
          lütfen alanları doldurunuz seçiniz.
        </div>';
        Session::flash('success_message', $htmlMessage);
        return redirect()->back();
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


 
    $ip = $request->input('ipler');
    $firmaid = $request->input('firmaid');

    $cihazdata = Device::where('id', $firmaid)
    ->get();
    foreach ($cihazdata as $dat) {

      if ($dat->giris_ip == $ip) {
        $ip =$dat->giris_ip;
        $port =$dat->giris_port;
      }elseif($dat->cikis_ip == $ip){
        $ip =$dat->cikis_ip;
        $port =$dat->cikis_port;
      }
    
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
     
    $ip = $request->input('ipler');
    $firmaid = $request->input('firmaid');

    $ip = "192.168.1.123";
    $port = "4370";



    $cihazdata = Device::where("id", $firmaid)
      ->get();
    foreach ($cihazdata as $dat) {

      if ($dat->giris_ip == $ip) {
        $ip =$dat->giris_ip;
        $port =$dat->giris_port;
      }elseif($dat->cikis_ip == $ip){
        $ip =$dat->cikis_ip;
        $port =$dat->cikis_port;
      }
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


    DeviceUsers::where('id', "=", $id)
      ->where("device_id", "=", $firmaid)
      ->update(['uid' => $uid, 'id' => $id, 'name' => $name, 'role' => $role, 'password' => $password, 'card_number' => $cardno]);
    $zk->connect();
    $zk->disableDevice();
    $zk->setUser($uid, $id, $name, $password, $role, $cardno);
    return redirect()->back();
  }

  public function TimeData(Request $request)
  {
    $device_data = Device::first();
    $ip = $device_data->giris_ip;
    $port = $device_data->giris_port;
    $company_name = $device_data->company_name;
    $cihazname = $device_data->door_name ." Giris";

    $id = $request->input('sırala');
    $ipler = $request->input('ip');

    $cihazAllData = [];
    $cihazdata = Device::get();
    foreach ($cihazdata as $dat) {
      $cihazData = [
        "id" => $dat->id,
        "company_name" => $company_name,
        "giris_devicename" => $dat->door_name . "giris",
        "giris_ip" => $dat->giris_ip,
        "cikis_devicename" => $dat->door_name . "cikis",
        "cikis_ip" => $dat->cikis_ip,
      ];

      $cihazAllData[] = $cihazData;
      $cihaz_id = $dat->id;

      if ($ipler == $dat->giris_ip) {
        $ip = $ipler;
        $port = $dat->giris_port;
        $id = $dat->id;
        $cihazname = $dat->door_name . " Giriş";
      } elseif ($ipler == $dat->cikis_ip) {
        $ip = $ipler;
        $port = $dat->cikis_port;
        $id = $dat->id;
        $cihazname = $dat->door_name . " Çıkış";
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
      $id = $request->input('id');
    
      $device_data = Device::where("id", $id)->first();
      $ipG = $device_data->giris_ip;
      $portG = $device_data->giris_port;
      $ipC = $device_data->cikis_ip;
      $portC = $device_data->cikis_port;
  
      $zk = new ZKTeco($ipG, $portG);
      $zk->connect();
      $zk->disableDevice();
      $attendacesG = $zk->getAttendance();
      $zk->disconnect();
  
      $zk = new ZKTeco($ipC, $portC);
      $zk->connect();
      $zk->disableDevice();
      $attendacesC = $zk->getAttendance();
      $zk->disconnect();
  
      $GAlldata = [];
      $CAlldata = [];
      $veriler = DeviceUsers::get();
  
      foreach ($veriler as $veri) {
          $name = $veri->name;
          $Userid = $veri->id;
  
          foreach ($attendacesG as $data) {
              $Timeid = $data["id"];
              $Timestamp = $data["timestamp"];
              if ($Timeid == $Userid) {
                  $tarih = Carbon::parse($Timestamp)->format('Y-m-d');
                  $saat = Carbon::parse($Timestamp)->format('H:i:s');
  
                  $GAlldata[] = [
                      "person_id" => $Timeid,
                      'name_surname' => $name,
                      'device_id' => $id,
                      'date_record' => $tarih . " " . $saat,
                      'input_output' => "giris",
                  ];
                  if (count($GAlldata) === 1000) {
                    Veri::insertOrIgnore($GAlldata);
                    $GAlldata = []; // Alldata dizisini boşaltın
                }
              }
          }
  
          foreach ($attendacesC as $data) {
              $Timeid = $data["id"];
              $Timestamp = $data["timestamp"];
              if ($Timeid == $Userid) {
                  $tarih = Carbon::parse($Timestamp)->format('Y-m-d');
                  $saat = Carbon::parse($Timestamp)->format('H:i:s');
  
                  $CAlldata[] = [
                      "person_id" => $Timeid,
                      'name_surname' => $name,
                      'device_id' => $id,
                      'date_record' => $tarih . " " . $saat,
                      'input_output' => "cikis",
                  ];
                  if (count($CAlldata) === 1000) {
                    Veri::insertOrIgnore($CAlldata);
                    $CAlldata = []; // Alldata dizisini boşaltın
                }
              }
          }
      }
     
      Veri::insertOrIgnore($GAlldata);
      Veri::insertOrIgnore($CAlldata);
      return redirect()->back();
  }
  
}
