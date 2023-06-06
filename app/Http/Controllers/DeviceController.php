<?php

namespace App\Http\Controllers;

use App\Models\Device;


class DeviceController extends Controller
{
    public function DiveceData(){
        $cihazAllData = [];
        $cihazdata = Device::get();
        foreach ($cihazdata as $dat) {
          $cihazData = [
            "id" => $dat->id,
            "cihazname" => $dat->door_name,
            "ipC" => $dat->cikis_ip,
            "ipG" => $dat->giris_ip,
            "portC" => $dat->cikis_port,
            "portG" => $dat->giris_port,
        
          ];
      
          $cihazAllData[] = $cihazData;
        }
        return view("diveceData",["cihazData"=>$cihazAllData]);
    }
}
