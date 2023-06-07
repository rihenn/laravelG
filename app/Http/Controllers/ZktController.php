<?php

namespace App\Http\Controllers;

use App\Models\PDKSdevice;
use App\Models\PDKSdeviceUsers;
use App\Models\PDKSentryExit;

use Rats\Zkteco\Lib\ZKTeco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class ZktController extends Controller
{
  public function index(Request $request)
  {
    $id = $request->input('id');

    $dat = PDKSdevice::where("id", "=", $id)
      ->first();


    $ipG = $dat->entry_ip;
    $portG = $dat->entry_port;
    $ipC = $dat->exit_ip;
    $portC = $dat->exit_port;

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
        'device_id' => $id
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
        'device_id' => $id
      ];
    }

    PDKSdeviceUsers::insertOrIgnore($data);
    return back();
  }


  public function Userdata(Request $request)
  {
    $door_id =  session::get("Device_id");
  
  
      
    $diveceData  = PDKSdevice::where("id",$door_id)->first();

   
    if (isset($diveceData)) {
    $companyDoorId = $diveceData->id;
    $ip = $diveceData->entry_ip;
    $port = $diveceData->entry_port;
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

    $cihazdata = PDKSdevice::get();

    foreach ($cihazdata as $dat) {

      $cihazData = [
        "id" => $dat->id,
        "company_name" => $company_name,
        "giris_devicename" => $dat->door_name . " giris",
        "giris_ip" => $dat->entry_ip,
        "cikis_devicename" => $dat->door_name . " cikis",
        "cikis_ip" => $dat->exit_ip,
      ];

      $cihazAllData[] = $cihazData;
      if ($ipler == $dat->entry_ip) {
        $ip = $ipler;
        $port = $dat->entry_port;
        $id = $dat->id;
        $cihazname = $dat->door_name . " Giriş";
      } elseif ($ipler == $dat->exit_ip) {
        $ip = $ipler;
        $port = $dat->exit_port;
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
    
  }else{

    session::flash("userAlert",true);
    return redirect()->route("anasayfa");
  }
  }


  public function addUser(Request $request)
  {

    $doorID =  session::get("Device_id");
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

      $cihazdata = PDKSdevice::where("id",$doorID)->get();

      if (isset($cihazdata)) {
  
      foreach ($cihazdata as $dat) {

        // dd(isset($veriler));


        if ($veriler == $dat->entry_ip || $veriler == $dat->exit_ip) {
          
          $ip = $veriler;
          if($ip == $dat->entry_ip ){
            $port = $dat->entry_port;
          }
          elseif($ip == $dat->exit_ip ){
            $port = $dat->exit_port;
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
    } else{
      session::flash("AddUserAlert",true);
    return redirect()->route("anasayfa");
    }
  

    }else {

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

    $cihazdata = PDKSdevice::where('id', $firmaid)
    ->get();
    foreach ($cihazdata as $dat) {

      if ($dat->entry_ip == $ip) {
        $ip =$dat->entry_ip;
        $port =$dat->entry_port;
      }elseif($dat->exit_ip == $ip){
        $ip =$dat->exit_ip;
        $port =$dat->exit_port;
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

    



    $cihazdata = PDKSdevice::where("id", $firmaid)
      ->get();
    foreach ($cihazdata as $dat) {

      if ($dat->entry_ip == $ip) {
        $ip =$dat->entry_ip;
        $port =$dat->entry_port;
      }elseif($dat->exit_ip == $ip){
        $ip =$dat->exit_ip;
        $port =$dat->exit_port;
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


    PDKSdeviceUsers::where('id', "=", $id)
      ->where("device_id", "=", $firmaid)
      ->update(['uid' => $uid, 'id' => $id, 'name' => $name, 'role' => $role, 'password' => $password, 'card_number' => $cardno]);
    $zk->connect();
    $zk->disableDevice();
    $zk->setUser($uid, $id, $name, $password, $role, $cardno);
    return redirect()->back();
  }

  public function TimeData(Request $request)
  {
    $door_id =  session::get("Device_id");
    $DeviceUserData = PDKSdeviceUsers::where("device_id",$door_id)->first();
    
    if(isset($DeviceUserData)){
      $device_data = PDKSdevice::where("id",$door_id)->first();
    $ip = $device_data->entry_ip;
    $port = $device_data->entry_port;
    $company_name = $device_data->company_name;
    $cihazname = $device_data->door_name ." Giris";

    $id = $request->input('sırala');
    $ipler = $request->input('ip');

    $cihazAllData = [];
    $cihazdata = PDKSdevice::get();
    foreach ($cihazdata as $dat) {
      $cihazData = [
        "id" => $dat->id,
        "company_name" => $company_name,
        "giris_devicename" => $dat->door_name . " giris",
        "giris_ip" => $dat->entry_ip,
        "cikis_devicename" => $dat->door_name . " cikis",
        "cikis_ip" => $dat->exit_ip,
      ];

      $cihazAllData[] = $cihazData;
      $cihaz_id = $dat->id;


      if ($ipler == $dat->entry_ip) {
        $ip = $ipler;
        $port = $dat->entry_port;
        $id = $dat->id;
        $cihazname = $dat->door_name . " Giriş";
      } elseif ($ipler == $dat->exit_ip) {
        $ip = $ipler;
        $port = $dat->exit_port;
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
  }else{
    session::flash("TimeDataAlert",true);
    return redirect()->route("anasayfa");
  }
  }


  public function DataBaseTimeData(Request $request)
  {
      $id = $request->input('id');
    
      $device_data = PDKSdevice::where("id", $id)->first();
      $ipG = $device_data->entry_ip;
      $portG = $device_data->entry_port;
      $ipC = $device_data->exit_ip;
      $portC = $device_data->exit_port;
  
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
      $veriler = PDKSdeviceUsers::get();
  
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
                    PDKSentryExit::insertOrIgnore($GAlldata);
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
                    PDKSentryExit::insertOrIgnore($CAlldata);
                    $CAlldata = []; // Alldata dizisini boşaltın
                }
              }
          }
      }
     
      PDKSentryExit::insertOrIgnore($GAlldata);
      PDKSentryExit::insertOrIgnore($CAlldata);
      return redirect()->back();
  }
  
}
