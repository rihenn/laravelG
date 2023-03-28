<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class DateController extends Controller
{




    public function date()
    {
        function foo($trh)
        {

            $e = 1;
            $toplam_dakika = 0;
            $toplam_saat = 0;
            $unix_timestamp2 = 0;
            $unix_timestamp1 = 0;
            $toplam_saat = 0;
            $toplam_dakika = 0;
            $veriler = DB::table("giriscikis")
                ->where("ad_soyad", "=", "YUSUF CAN YÜCE STAJYER KARTI")
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
                    
                    $süre=  '<div class="card"><div class="card2">' . "</br>" . '<p>' . $day . $day1 . " günü </br>" . $toplam_saat . " saat " . $toplam_dakika . " dakika " . ' </div></div>';
                    

                    $toplam_dakika = 0;
                    $toplam_saat = 0;
        
                    return $süre;
                    
                }
            }
        }
    }
    

        $veriler = DB::table("giriscikis")
            ->where("ad_soyad", "=", "YUSUF CAN YÜCE STAJYER KARTI",)
            ->select("tarih")
            ->distinct()
            ->get();

        foreach ($veriler as $value) {
            $trh1 = $value->tarih;
           
             $süre=foo($trh1);
            //  echo $süre;
        
         $myarray = array();
         array_push($myarray,$süre);
        //  print_r($myarray);
         $myobj=([
            'süre'=>$myarray,
         ]);
        };
        return view("Daydate",$myobj);
       
    }
}
