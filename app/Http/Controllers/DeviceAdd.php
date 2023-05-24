<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;

class DeviceAdd extends Controller
{  
    public function AddDivece(Request $request){
        $ip = $request->input('ip');
        $port = $request->input('port');
        $firmaCihazName = $request->input('firmaCihazName');
        $cihazname = $request->input('cihazname');

        $data=[
            "divece_name"=>$cihazname,
            "ip"=>$ip,
            "port"=>$port,
            "company_device_name"=>$firmaCihazName
           ];
           Device::insertOrIgnore($data);

           return redirect()->back();
    }
}
