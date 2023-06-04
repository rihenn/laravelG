<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Device;

class DeviceAdd extends Controller
{  
    public function AddDivece(Request $request){
        $ip = $request->input('ip');
        $port = $request->input('port');
        $firmaCihazName = $request->input('firmaCihazName');
        $cihazname = $request->input('cihazname');
        if (isset($cihazname)) {
            if (isset($firmaCihazName)) {
                if (isset($ip)) {
                    if (isset($port)) {
                        $data=[
                            "divece_name"=>$cihazname,
                            "ip"=>$ip,
                            "port"=>$port,
                            "company_device_name"=>$firmaCihazName
                           ];
                           Device::create($data);
                           $htmlMessage = '<div class="alert alert-success" role="alert">
                           kayıt işlemleri başarılı bir şekilde gerçekleştirilmiştir .
                         </div>';
                               Session::flash('message', $htmlMessage);
                           return redirect()->back();
                    }else {
                        //ip
                        $htmlMessage = '<div class="alert alert-danger" role="alert">
                        lütfen port giriniz .
                       </div>';
                             Session::flash('message', $htmlMessage);
                             return redirect()->back();
                    }
                }else {
                    //ip
                    $htmlMessage = '<div class="alert alert-danger" role="alert">
                    lütfen ip giriniz .
                   </div>';
                         Session::flash('message', $htmlMessage);
                         return redirect()->back();
                }
            }else {
                //ip
                $htmlMessage = '<div class="alert alert-danger" role="alert">
                lütfen bölgeyi giriniz .
               </div>';
                     Session::flash('message', $htmlMessage);
                     return redirect()->back();
            }
        }else {
            //ip
            $htmlMessage = '<div class="alert alert-danger" role="alert">
                          lütfen  cihaz adını giriniz .
                         </div>';
                               Session::flash('message', $htmlMessage);
                               return redirect()->back();
        }
       
    }
}
