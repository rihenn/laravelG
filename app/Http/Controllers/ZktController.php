<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Rats\Zkteco\Lib\ZKTeco;
use Illuminate\Http\Request;

class ZktController extends Controller
{
  public function index(Request $request)
  {
    $id = $request->input('cihazId');
    $cihazdata = DB::table("cihazlar")
      ->where("id", "=", $id)
      ->get();
    foreach ($cihazdata as $dat) {
      $ip = $dat->ip;
      $port = $dat->port;
    }
    $zk = new ZKTeco($ip, $port);
    $zk->connect();
    $zk->disableDevice();
    $users = $zk->getUser();
    $attendaces = $zk->getAttendance();
    $devicegetTime = $zk->getTime();


    foreach ($users as $user) {
      DB::table('deviceUsers')->insert([
        [
          'id' => $user['userid'],
          'uid' => $user['uid'],
          'name' => $user['name'],
          'role' => $user['role'],
          'password' => $user['password'],
          'CardNo' => $user['cardno'],
          'cihazId' => $id
        ]
      ]);
    }
    return back();
  }


  public function Userdata(Request $request)
  {
    $ip = "192.168.1.123";
    $port = "4370";
    $id = $request->input('sırala');
    $cihazAllData = [];
    $cihazdata = DB::table("cihazlar")
      ->get();
    foreach ($cihazdata as $dat) {
      $cihazData = [
        "id" => $dat->id,
        "cihazname" => $dat->cihazname,
        "ip" => $dat->ip,
      ];
      $cihazAllData[] = $cihazData;
      $cihaz_id = $dat->id;
      if ($id == $cihaz_id) {
        $port = $dat->port;
        $ip = $dat->ip;

        $cihazname = $dat->cihazname;
      }
    }


    $zk = new ZKTeco($ip, $port);
    $zk->connect();
    $zk->disableDevice();
    $users = $zk->getUser();

    return view("userList", ["users" => $users, "cihazAllData" => $cihazAllData, "cihazname" => $cihazname, "Cihazid" => $id]);
  }


  public function addUser(Request $request)
  {

    $zk = new ZKTeco('192.168.1.123', 4370);
    $uid = $request->input('uid');
    $id = $request->input('id');
    $name = $request->input('name');
    $role = $request->input('role');
    $password = $request->input('password');
    $cardno = $request->input('CardNo');

    $zk->connect();
    $zk->disableDevice();
    $zk->setUser($uid, $id, $name, $password, $role, $cardno);
    $zk->enableDevice();

    return back();
  }



  public function removeUser()
  {

    $uid = 9999;

    $zk = new ZKTeco('192.168.1.123', 4370);
    $zk->connect();
    $zk->disableDevice();
    $zk->removeUser($uid);
    return redirect("/data")->with('success_message', 'User added to device successfully.');
  }

  public function güncelle(Request $request)
  {
    $CihazId = $request->input('Cid');
    $cihazdata = DB::table("cihazlar")
      ->where("id", $CihazId)
      ->get();
    foreach ($cihazdata as $dat) {

      $port = $dat->port;
      $ip = $dat->ip;
    }
    $zk = new ZKTeco($ip, $port);
    $uid = $request->input('uid');
    $id = $request->input('id');


    $name = $request->input('name');
    $role = $request->input('role');
    $password = $request->input('password');
    if (!isset($password)) {
      $password = "";
    }
    $cardno = $request->input('CardNo');
    DB::table('deviceusers')
      ->where('id', "=", $id)
      ->where("cihazId", "=", $CihazId)
      ->update(['uid' => $uid, 'id' => $id, 'name' => $name, 'role' => $role, 'password' => $password, 'CardNo' => $cardno]);
    $zk->connect();
    $zk->disableDevice();
    $zk->setUser($uid, $id, $name, $password, $role, $cardno);
    $zk->enableDevice();

    return back();
  }

  public function TimeData()
  {
    $cihazdata = DB::table("cihazlar")
      ->get();
    foreach ($cihazdata as $dat) {
      $port = $dat->port;
      $ip = $dat->ip;
      $deviceId = $dat->id;
      $zk = new ZKTeco($ip, $port);
      $zk->connect();
      $zk->disableDevice();
      $attendaces = $zk->getAttendance();
      foreach ($attendaces as $user) {
        DB::table('userdata')->insert([
          [
            'uid' => $user['uid'],
            'id' => $user['id'],
            'state' => $user['state'],
            'type' => $user['type'],
            'timestamp' => $user['timestamp'],
            'device_id' =>$deviceId
          ]
        ]);
      }


    }
  }
}
