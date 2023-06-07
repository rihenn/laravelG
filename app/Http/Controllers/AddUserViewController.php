<?php

namespace App\Http\Controllers;


use App\Models\PDKSdevice;

class AddUserViewController extends Controller
{
    public function DeviceAddUserView(){
        $cihazdata = PDKSdevice::get();
        $AllData=[];
      foreach ($cihazdata as $dat) {
        $data=[
        "portG" => $dat->entry_port,
        "ipG" => $dat->entry_ip,
        "portC" => $dat->exit_port,
        "ipC" => $dat->exit_ip,
        "name" => $dat->door_name,
       
        

        ];  
        $AllData []=$data; 
    }
      return view("deviceUserAdd",["allData"=>$AllData, "door_id" => $dat->id]);
    }
}
