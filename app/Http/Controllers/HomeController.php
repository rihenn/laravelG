<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function value(Request $request)
    {
        
        $profilurl = "";
        $veriler = DB::table('kullaniciler')
            ->where("id", "=", 2)
            ->get();
        foreach ($veriler as $veri) {
            $profilurl = $veri->profilurl;
        };
        $ay = date("m");
        $yil =date('Y');
     
        $once = $request->input('önce');
        $sonra = $request->input('sonra');
        $bu_ay = $request->input('bu_ay');
        $buAy = $request->input('ay');


        $bu_yil = $request->input('yil');
        $Yil_önce = $request->input('Yilönce');
        $Yil_sonra = $request->input('Yilsonra');
        $buYil = $request->input('buYil');
        if (isset($once)) {

            $ay  = $buAy - 1;
         
        }
        if (isset($sonra)) {
           
            $ay =$buAy+1;
        }
        if (isset($bu_ay)) {
            $bu_ay =date('m');
            $ay = date('m');
          
        }


        if (isset($Yil_önce)) {

            $yil  = $bu_yil-1;
       
        }
        if (isset($Yil_sonra)) {

            $yil = $bu_yil+1;
          
        }
        if (isset($buYil)) {

            $bu_yil =date('Y');
            $yil = date('Y');
     
            
          
        }


        // İlgili tarih

        $trhv = DB::table('giriscikis')
        ->whereYear('tarih', '=', $yil)
        ->whereMonth("tarih", "=", $ay)
        ->select("tarih", "ad_soyad", "firmaGC")
        ->distinct()
        ->get();
        $veri = [];
    
        foreach ($trhv as $key) {
            
            $tarih = $key->tarih;
            $ad_soyad = $key->ad_soyad;
            $firma = $key->firmaGC;

            $ilkKayit = DB::table('giriscikis')
                ->whereDate('tarih', $tarih)
                ->where('ad_soyad', $ad_soyad)
                ->where("GC", "=", "Giris")
                ->orderBy('saat', 'asc')
                ->first();

            $sonKayit = DB::table('giriscikis')
                ->whereDate('tarih', $tarih)
                ->where('ad_soyad', $ad_soyad)
                ->where("GC", "=", "Çıkış")
                ->orderBy('saat', 'desc')
                ->first();

            if ($ilkKayit && $sonKayit) {
                $ilkSaat = $ilkKayit->saat;
                $sonSaat = $sonKayit->saat;
                $ilkS = Carbon::parse($ilkKayit->saat);
                $sonS = Carbon::parse($sonKayit->saat);

                $saniye_farki = $ilkS->diffInSeconds($sonS, false);

                $saatFarki = gmdate('H:i:s', $saniye_farki);
                if ($ilkS < $sonS) {
                    $saat = date("H", strtotime($saatFarki));
                    $dakika = date("i", strtotime($saatFarki));

                    $data = [
                        'ad_soyad' => $ad_soyad,
                        'firmaGC' => $firma,
                        'trh' => $tarih,
                        'giris' => $ilkSaat,
                        'cikis' => $sonSaat,
                        'mesaiSüresi' => $saat . " sa " . $dakika . " dk",
                    ];
                } else {
                    $data = [
                        'ad_soyad' => $ad_soyad,
                        'firmaGC' => $firma,
                        'trh' => $tarih,
                        'giris' => $ilkSaat,
                        'cikis' => $sonSaat,
                        'mesaiSüresi' => "!",
                    ];
                }   

                $veri[] = $data;
            } elseif ($ilkKayit && !$sonKayit) {
                $ilkSaat = $ilkKayit->saat;

                $data = [
                    'ad_soyad' => $ad_soyad,
                    'firmaGC' => $firma,
                    'trh' => $tarih,
                    'giris' => $ilkSaat,
                    'cikis' => "!",
                    'mesaiSüresi' => "!",
                ];

                $veri[] = $data;
            } elseif (!$ilkKayit && $sonKayit) {
                $sonKayit = $sonKayit->saat;

                $data = [
                    'ad_soyad' => $ad_soyad,
                    'firmaGC' => $firma,
                    'trh' => $tarih,
                    'giris' => "!",
                    'cikis' => $sonKayit,
                    'mesaiSüresi' => "!",
                ];

                $veri[] = $data;
            }
        }





        return view("home", ["profilurl" => $profilurl, "veri" => $veri,"ay"=>$ay,"yil"=>$yil]);
    }
}
