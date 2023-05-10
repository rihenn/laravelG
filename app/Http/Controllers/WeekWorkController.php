<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Undefined;

class WeekWorkController extends Controller
{
    public function date(Request $request)
    {
        $kul = $request->input('kullad');
        if ($kul == null) {
            $kul = "YUSUF CAN YÜCE STAJYER KARTI";
        }

        function week($trh, $kul)
        {
            $e = 1;
            $toplam_dakika = 0;
            $toplam_saat = 0;
            $unix_timestamp2 = 0;
            $unix_timestamp1 = 0;
            $toplam_saat = 0;
            $toplam_dakika = 0;
            $veriler = DB::table("giriscikis")
                ->where("ad_soyad", "=", $kul)
                ->get();
            foreach ($veriler as  $value) {
                $tarih = $value->tarih;
                $giriscikis = $value->GC;
                $saat    = $value->saat;
              

                if ($tarih == $trh) {

                    if ($giriscikis == "Giriş" && $e == 1) {


                        $unix_timestamp1 = strtotime($tarih . " " . $saat);


                        $e--;
                    } else if ($giriscikis == "Çıkış" && $e == 0) {

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


                        $obj = ["ts" => $toplam_saat, "td" => $toplam_dakika, "d" => $day, "d1" => $day1, "trh" => $tarih];
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

        $ts = 0;
        $td = 0;
        $sayac = 0;
        $veriler = DB::table("giriscikis")

            ->where("ad_soyad", "=", $kul)
            ->whereBetween('tarih', [$min, $max])
            ->select("tarih", "ad_soyad")
            ->distinct()
            ->get();
        $allData = [];

        foreach ($veriler as $value) {
            $trh1 = $value->tarih;

            $süre = week($trh1, $kul);
            if (isset($süre["ts"])) {
                $sayac++;
                if ($süre["d1"] != "Cuma" || $sayac == 5) {
                    $ts += $süre["ts"];
                    $td += $süre["td"];
                    if ($td > 59) {
                        $ts += ($td - ($td % 60)) / 60;
                        $td = $td % 60;
                    }
                } else {

                    $data = [
                        "toplamsaat" => $ts,
                        "toplamdakika" => $td,
                        "day" => $süre["d"],
                        "day1" => $süre["d1"],
                    
                        "trh" => $süre["trh"],
                        "adsoyad" => $value->ad_soyad,
                        

                    ];
                    $ts = 0;
                    $td = 0;
                }
                if (isset($data)) {
                    $allData[] = $data;
                }
            }
        };


        $veriler = DB::table("giriscikis")
            ->select("ad_soyad")
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



        return view("WeekWork", ["allData" => $allData, "data" => $data1]);
    }
}
