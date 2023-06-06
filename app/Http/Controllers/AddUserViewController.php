<?php

namespace App\Http\Controllers;

use App\Models\Device;




class AddUserViewController extends Controller
{
    public function DeviceAddUserView(){
        $cihazdata = Device::get();
        $AllData=[];
      foreach ($cihazdata as $dat) {
        $data=[
        "portG" => $dat->giris_port,
        "ipG" => $dat->giris_ip,
        "portC" => $dat->cikis_port,
        "ipC" => $dat->cikis_ip,
        "name" => $dat->door_name,
       
        

        ];  
        $AllData []=$data; 
    }
      return view("deviceUserAdd",["allData"=>$AllData, "door_id" => $dat->id]);
    }
}
