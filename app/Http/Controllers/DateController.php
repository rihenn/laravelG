<?php

namespace App\Http\Controllers;

use App\Models\Veri;
use Illuminate\Http\Request;


class DateController extends Controller
{

    public function date(Request $request)
    {
        $kul = $request->input('kullad');
        if ($kul == null)   {
            $kul ="YUSUF CAN YÜCE STJ";
            
        }
       
        function foo($trh,$kul)
        {
            $d = false;
          


            $e = 1;
            $toplam_dakika = 0;
            $toplam_saat = 0;
            $unix_timestamp2 = 0;
            $unix_timestamp1 = 0;
            $toplam_saat = 0;
            $toplam_dakika = 0;
            
            $veriler =Veri::where("ad_soyad", "=", $kul)
                ->get();
            foreach ($veriler as  $value) {
                $tarih = $value->tarih;
                $giriscikis = $value->GC;
                $saat    = $value->saat;
                if (!$d) {
                    $ilkSaat =  $saat;
                 }
                
                if ($tarih == $trh) {
                   
                    if ($giriscikis == "Giriş" && $e == 1) {
                       

                        $unix_timestamp1 = strtotime($tarih . " " . $saat);


                        $e--;
                    } else if ($giriscikis == "Çıkıs" && $e == 0) {
                        
                        $unix_timestamp2 = strtotime($tarih . " " . $saat);

                        $e++;
                    }
                }

                if ($unix_timestamp2 !== 0 && $unix_timestamp1 !== 0) {

                    $fark = $unix_timestamp2 - $unix_timestamp1;
                    $dakika = $fark / 60;
                    $saniye_farki = floor($fark - (floor($dakika) * 60));
                    $saat = $dakika / 60;
                    $dakika_farki = floor($dakika - (floor($saat) * 60));
                    $gun = $saat / 24;
                    $saat_farki = floor($saat - (floor($gun) * 24));
                    $toplam_dakika += $dakika_farki;
                    $toplam_saat += $saat_farki;

                    if ($toplam_dakika > 60) {


                        $toplam_saat += ($toplam_dakika - ($toplam_dakika % 60)) / 60;
                        $toplam_dakika = $toplam_dakika % 60;
                    }




                    $unix_timestamp2 = 0;
                    $unix_timestamp1 = 0;
                }

                $time = date("Y-m-d", strtotime($trh));
                $time1 = date("Y-m-d", strtotime($tarih));

                if ($time !== $time1) {

                    if ($toplam_dakika != 0 && $toplam_saat != 0) {

                        $day = date("d.m.Y ", strtotime($tarih));
                        $day1 = date("D", strtotime($tarih));


                        switch ($day1) {
                            case "Mon":
                                $day1 = "Pazartesi";
                                break;
                            case "Tue":
                                $day1 = "Salı";
                                break;
                            case "Wed":
                                $day1 = "Çarşamba";
                                break;
                            case "Thu":
                                $day1 = "Perşembe";
                                break;
                            case "Fri":
                                $day1 = "Cuma";
                                break;
                            case "Sat":
                                $day1 = "Cumartesi";
                                break;
                            case "Sun":
                                $day1 = "Pazar";
                                break;
                            default:;
                        }


                        $obj = ["ts" => $toplam_saat, "td" => $toplam_dakika, "d" => $day, "d1" => $day1,"iS" =>$ilkSaat];

                        $toplam_dakika = 0;
                        $toplam_saat = 0;

                        return $obj;
                    }
                }
            }
        }
        
        $max = date('Y.m.d');
        $min = '0000.00.00';
        if (isset($_GET["min"])) {
            if ($min != null && $max != null) {
                $min = $request->input('min');
                $max = $request->input('max');
            }
            if ($min == null && $max == null) {
                $max = date('Y.m.d');
                $min = '0000.00.00';
            }
        }

    
        $veriler = Veri::where("ad_soyad", "=", "ERTEGUN FIDAN" )
            ->whereBetween('tarih', [$min, $max])
            ->select("tarih","ad_soyad")
            ->distinct()
            ->get();
        $allData = [];
        // dd($veriler);
        foreach ($veriler as $value) {
            
            $trh1 = $value->tarih;
            
            $süre = foo($trh1,$kul);
            if (isset($süre["ts"])) {
                $data = [
                    "toplamsaat" => $süre["ts"],
                    "toplamdakika" => $süre["td"],
                    "day" => $süre["d"],
                    "iS" => $süre["iS"],
                    "day1" => $süre["d1"],
                    "adsoyad" => $value->ad_soyad
                ];
                $allData[] = $data;
            }
        };


        $veriler = Veri::select("ad_soyad")
            ->distinct()
            ->get();

        $data1 = [];
        foreach ($veriler as $value) {
            if (isset($value->ad_soyad)) {
                $data = [
                    "ad_soyad" => $value->ad_soyad
                ];
            }
            $data1[] = $data;
        }
        
        

        return view("Daydate", ["allData" => $allData, "data" => $data1]);
    }
}
