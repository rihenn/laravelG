<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

use Illuminate\Support\Facades\Session;


class DüzenleController extends Controller
{
    public function düzenle(Request $request){
       
        $id = Session::get('sid');
       
        if (isset($_POST["ad_soyad"])) {
            $isim = $request->input('ad_soyad');
            $gmail = $request->input('gmail');
            $tel = $request->input('tel');
            $görev = $request->input('görev');
        
            Users::whereId($id)->update([
                "name_surname"=>$isim,
                "mail"=>$gmail,
                "telephone"=>$tel,
                "task"=>$görev,
            ]);
        }
        
     return redirect()->route('ProfilController');
    }
    public function profilimg(Request $request){
        $id = Session::get('sid');
        $img1 = $request->input('img1');
        $img2 = $request->input('img2');
        $img3 = $request->input('img3');
        $img4 = $request->input('img4');
        $img5 = $request->input('img5');

        if(isset($img1)) {
            $url = "../img/icons8-person-female-skin-type-1-and-2-80.png";                     
           
            Users::whereId($id)->update([
                "profile_url"=>$url,
                
            ]);
           
        }
        else if (isset($img2)) {
            $url = "../img/icons8-person-male-skin-type-6-80.png";      
           
            Users::whereId($id)->update([
                "profile_url"=>$url,
                
            ]);
             
        }
        else if (isset($img3)) {
            $url = "../img/icons8-person-male-skin-type-4-80.png";     
           
            Users::whereId($id)->update([
                "profile_url"=>$url,
            ]);
           
        }
        else if (isset($img4)) {
            $url = "../img/icons8-person-male-skin-type-3-80.png";      
           
            Users::whereId($id)->update([
                "profile_url"=>$url,
                
            ]);
            
        }else if (isset($img5)) {
            $url = "../img/icons8-person-female-skin-type-5-80.png";
                 
            Users::whereId($id)->update([
                "profile_url"=>$url,
                
            ]);
        }else{
            echo "hiç bir input çalışmadı";
           }
           return back();
    }

    public function getValue(){
        $id = session('sid');
        $veriler = Users::where("id", "=", $id)
        ->get();
  
    foreach ($veriler as  $value) {
        $profilurl = $value->profile_url;
        $nameSurename = $value->name_surname;
        $mail = $value->mail;
        $tel = $value->telephone;
        $görev = $value->task; 

        
    }
    return view('düzenle',["profilurl"=>$profilurl,"name"=>$nameSurename,"mail"=>$mail,"tel"=>$tel,"görev"=>$görev]);
    }
  
}
