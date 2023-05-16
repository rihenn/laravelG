<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DeviceController extends Controller
{
    public function DiveceData(){
        $cihazAllData = [];
        $cihazdata = DB::table("cihazlar")
          ->get();
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
