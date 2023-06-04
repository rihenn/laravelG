<?php

namespace App\Http\Controllers;

use App\Models\Veri;
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
            ->get();

        $ilk_giris = null;
        $toplam_sure = 0;

        foreach ($data as $dat) {
            if ($dat->input_output == 'Giriş') {
                $ilk_giris = strtotime($dat->date_record);
            } elseif ($dat->input_output == 'Çıkış' && $ilk_giris != null) {
                $cikis = strtotime($dat->date_record);
                $sure = $ilk_giris - $cikis;
                $toplam_sure += $sure;
                $ilk_giris = null;
            }
        }

        $toplam_sure_saat = floor($toplam_sure / 3600) . ":" . floor(($toplam_sure % 3600) / 60) . ":" . ($toplam_sure % 60); // Saat cinsinden

        return view("detay", ["ad_soyad" => $ad, "tarih" => $tarihV, "mesai" => $mesai, "ofisSüre" => $toplam_sure_saat]);
    }
}
