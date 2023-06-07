<?php

namespace App\Http\Controllers;


use App\Models\PDKSdevice;

class DeviceController extends Controller
{
    public function DiveceData(){
        $cihazAllData = [];
        $cihazdata = PDKSdevice::get();
        foreach ($cihazdata as $dat) {
          $cihazData = [
            "id" => $dat->id,
            "cihazname" => $dat->door_name,
            "ipC" => $dat->exit_ip,
            "ipG" => $dat->entry_ip,
            "portC" => $dat->exit_port,
            "portG" => $dat->entry_port,
        
          ];
      
          $cihazAllData[] = $cihazData;
        }
        return view("diveceData",["cihazData"=>$cihazAllData]);
    }
}
