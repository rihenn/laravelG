<?php

namespace App\Http\Controllers;

use App\Models\Veri;
use Carbon\Carbon;
use Illuminate\Http\Request;


class DetayController extends Controller
{

    public function detaylar(Request $request)
    {


        $ad = $request->input("adSoyad");
        $tarihV = $request->input("tarih");
        $mesai = $request->input("mesaiS");
        $gun = date("d", strtotime($tarihV));
        $ay = date("m", strtotime($tarihV));
        $yil = date("Y", strtotime($tarihV));
        
        $data = Veri::whereMonth("date_record", $ay)
            ->whereYear("date_record", $yil)
            ->whereDay("date_record", $gun)
            ->where("name_surname", $ad)
            ->orderBy("date_record", "asc")
            ->get();
        
        $giris = null;
        $e = 0;
        $saat = 0;
        $dakika = 0;
        $saniye = 0;
        $alldata = [];
        
        foreach ($data as $dat) {
            if ($dat->input_output == 'Giriş' && $e == 0) {
                $giris = Carbon::parse($dat->date_record);
                $e = 1;
                
            } else if ($dat->input_output == 'Çıkış' && $giris != null) {
                $e = 0;
                $cikis = Carbon::parse($dat->date_record);
        
                $saniye_farki = $giris->diffInSeconds($cikis, false);
                $dakika_farki = $giris->diffInMinutes($cikis, false);
              
        
                
                $saat +=($saniye_farki - ($saniye_farki %60))/60/60/60;
                $dakika += ( $saniye_farki-($saniye_farki % 60))/60;
                $saniye += $saniye_farki % 60;
                if ($saniye >= 60) {
                    $saniye_farki = $saniye_farki % 60;
                    $dakika += ($saniye-($saniye % 60)) / 60;
                    $saniye = $saniye % 60;
                }
                
                if ($dakika >= 60) {
                    $dakika_farki = $dakika_farki % 60;
                
                    $saat += ($dakika-($dakika % 60)) / 60;
                    $dakika = $dakika % 60;
                }
        
            }
        }
        $date = [
            "saat" => intval($saat),
            "dakika" => $dakika,
            "saniye" => $saniye,
            
        ];
     


        return view("detay", ["ad_soyad" => $ad, "tarih" => $tarihV, "mesai" => $mesai,"saat" => intval($saat), "dakika" => $dakika,"saniye" => $saniye,]);
    }
}
