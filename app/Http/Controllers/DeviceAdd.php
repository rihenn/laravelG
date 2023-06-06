<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Device;

class DeviceAdd extends Controller
{  
    public function AddDivece(Request $request){ 
        $ipG = $request->input('ipG');
        $ipC = $request->input('ipC');
        $portG = $request->input('portG');
        $portC = $request->input('portC');
        $firmaCihazName = $request->input('company_name');
        $cihazname = $request->input('doorName');
        if (isset($cihazname)) {
            if (isset($firmaCihazName)) {
                if (isset($ipG)) {
                    if (isset($portG)) {
                        $data=[
                            "door_name"=>$cihazname,
                            "company_name"=>$firmaCihazName,
                            "giris_ip"=>$ipG,
                            "cikis_ip"=>$ipC,
                            "cikis_port"=>$portG,
                            "giris_port"=>$portC
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
