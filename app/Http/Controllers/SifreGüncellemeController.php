<?php

namespace App\Http\Controllers;

use App\Models\SifreKodModels;
use App\Models\Users;
use Illuminate\Http\Request;


class SifreGüncellemeController extends Controller
{
    public function güncelle(Request $request)
    {        
       
        $adres = url()->previous();
        $kod = strstr($adres, '=', false);
        $kod1 = str_replace("=", " ", $kod); 
        $kod2 = str_replace("%24", "$", $kod1);
        $kod3 = str_replace("%2F", "/", $kod2);

        $kod4 = trim($kod3);

        $sifre = $request->input('password');
        $sifret = $request->input('passwordt');
        $veriler = SifreKodModels::where("yenilemeKodu", "=", $kod4)
            ->get();


        foreach ($veriler as $value) {
            $mail = $value->gmail;
            $durumu = $value->durumu;
        }


        if ($durumu == 1) {
        

            if ($sifre == $sifret) {


                if (isset($sifre)) {
                    $veriler = Users::where("mail", "=", $mail)
                        ->get();
                    foreach ($veriler as $value) {
                        $sifreler = $value->password;
                    }

                    if ($sifreler == $sifre) {
                        return back();
                    } else {

                        Users::where("mail", $mail)->update([
                            "password" => $sifre,

                        ]);
                        SifreKodModels::where("yenilemeKodu", $kod4)->update([
                            "durumu" => 0,

                        ]);


                        return view("onay");
                    }
                } else {
                    return view("Red");

                }
            } else {
                $mesaj = ' <div class="alert alert-danger"><strong>UYARI!</strong> şifreniz eski şifrenizle aynı olamaz.</div>';
                return view("sifreYenileme", ["mesaj" => $mesaj]);
            }
        } else {
            
            return view("Red");
        }

    }
    
}
