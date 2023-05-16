<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Rats\Zkteco\Lib\ZKTeco;

class ProfilController extends Controller
{
    function profil(){
        $sid = Session::get('sid');
      
        $veriler = DB::table("kullaniciler")
                ->where("id", "=", $sid)
                ->get();
                $allData=[];
            foreach ($veriler as  $value) {
                $url =public_path('img\photo-1497366754035-f200968a6e72.png');
                $data=[
                "ad" => $value->nameSurename,
                "mail" => $value->mail,
                "tel"    => $value->tel,
                "profil"    => $value->profilurl,
                "görev"    => $value->görev,
                "url" =>$url,
                ];
                $allData[]=$data;
               
            }  
           
   
          
            return view("Profil",["allData"=>$allData]);
    }
    
}
