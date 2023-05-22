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
            "cihazname" => $dat->cihazname,
            "ip" => $dat->ip,
            "port" => $dat->port,
            "type" => $dat->type,
          ];
      
          $cihazAllData[] = $cihazData;
        }
        return view("diveceData",["cihazData"=>$cihazAllData]);
    }
}
