<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Support\Facades\Session;


class ProfilController extends Controller
{
    function profil(){
        $sid = Session::get('sid');
      
        $veriler = Users::where("id", "=", $sid)
                ->get();
                $allData=[];
            foreach ($veriler as  $value) {
                $url =public_path('img\photo-1497366754035-f200968a6e72.png');
                $data=[
                "ad" => $value->name_surname,
                "mail" => $value->mail,
                "tel"    => $value->telephone,
                "profil"    => $value->profile_url,
                "görev"    => $value->task,
                "url" =>$url,
                ];
                $allData[]=$data;
               
            }  
           
   
          
            return view("Profil",["allData"=>$allData]);
    }
    
}
