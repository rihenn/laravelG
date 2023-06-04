<?php

namespace App\Http\Controllers;

use App\Models\DiveceUsers;
use App\Models\Users;
use App\Models\Veri;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Symfony\Component\VarDumper\VarDumper;

class HomeController extends Controller
{
    public function value(Request $request)
    {

      

        $sid = Session::get('sid');

        $profilurl = "";
        $veriler = Users::where("id", "=", $sid)
            ->get();
        foreach ($veriler as $veri) {
            $profilurl = $veri->profile_url;
        };

        $test = $request->input('test');
    
        $ay = date("m");
        $yil = date('Y');

        $once = $request->input('önce');
        $sonra = $request->input('sonra');
        $bu_ay = $request->input('bu_ay');
        $buAy = $request->input('ay');
        if (isset($once)) {

            $ay  = $buAy - 1;
        }
        if (isset($sonra)) {

            $ay = $buAy + 1;
        }
        if (isset($bu_ay)) {
            $bu_ay = date('m');
            $ay = date('m');
        }


        // $bu_yil = $request->input('yil');
        // $Yil_önce = $request->input('Yilönce');
        // $Yil_sonra = $request->input('Yilsonra');
        // $buYil = $request->input('buYil');
      

        // if (isset($Yil_önce)) {

        //     $yil  = $bu_yil-1;

        // }
        // if (isset($Yil_sonra)) {

        //     $yil = $bu_yil+1;

        // }
        // if (isset($buYil)) {

        //     $bu_yil =date('Y');
        //     $yil = date('Y');



        // }
        /*    function hesaplaCalismaSure($veriler)
        {
            $dat = [];

            foreach ($veriler as $veri) {
                $toplamCalismaSaat = 0;
                $tarih = $veri["tarih"];
                $id = $veri["id"];
                $ad_soyad = $veri["ad_soyad"];
                $girisSaati = strtotime($veri["giris"]);
                $cikisSaati = strtotime($veri["cikis"]);

                if (!isset($dat[$tarih][$ad_soyad])) {
                    $dat[$tarih][$ad_soyad] = 0;
                }

                $calismaSuresi = $cikisSaati - $girisSaati;
                $dat[$tarih][$ad_soyad] += $calismaSuresi;
            }

            $sonuclar = [];
            foreach ($dat as $tarih => $veri) {
                foreach ($veri as $ad_soyad => $calismaSuresi) {
                    $toplamCalismaSaat = gmdate('H:i:s', $calismaSuresi);
                    $sonuclar[] = [
                        "id" => $id,
                        "tarih" => $tarih,
                        "ad_soyad" => $ad_soyad,
                        "süre" => $toplamCalismaSaat
                    ];
                }
            }

            return $sonuclar;
        }




        function hazirlaDataTableVerileri($ay, $yil)
        {
            $calisanlar = Veri::whereYear('tarih', '=', $yil)->whereMonth("tarih", "=", $ay)->get();

            $veriler = [];
            $e = 0;
            foreach ($calisanlar as $calisan) {
                $tarih = $calisan->tarih;
                $id = $calisan->pId;
                $GC = $calisan->GC;
                $saat = $calisan->saat;
                $ad_soyad = $calisan->ad_soyad;

                if ($e == 0 && $GC === "Giriş") {
                    $giris = $saat;
                    $e = 1;
                } if ($e == 1 && $GC === "Cıkış"){
                    $cikis = $saat;
                    $e = 0;
                }
                if (isset($giris) && isset($cikis)) {
                    $calismaSaati = hesaplaCalismaSaati($tarih, $giris, $cikis);

                    $veriler[] = [
                        'ad_soyad' => $ad_soyad,
                        'tarih' => $tarih,
                        'giris' => $giris,
                        'cikis' => $cikis,
                        'saat' => $calismaSaati,
                        'id' => $id,
                    ];
                }
            }

            return $veriler;
        }


        function hesaplaCalismaSaati($tarih, $giris, $cikis)
        {
            $baslangic = new DateTime($tarih . ' ' . $giris); 
            $bitis = new DateTime($tarih . ' ' . $cikis); 

            $calismaSuresi = $bitis->diff($baslangic)->format('%H:%I:%S'); 

            return $calismaSuresi;
        }

        $veriler = hazirlaDataTableVerileri($ay, $yil);
        $süreler = hesaplaCalismaSure($veriler);
    // dd($süreler);
*/
if (isset($test)) {
    // dd($test);

        $sid = Session::get('sid');
        if (session('adminlik') == 0) {
            $users = Users::where("id", "=", $sid)->first();
            $cardno = $users->card_number;
            $diveceusers = DiveceUsers::where("card_number", "=", $cardno)->first();
          
            $trhv = Veri::where("name_surname", "=", $diveceusers->name)
                ->whereYear('date_record', '=', $yil)
                ->whereMonth("date_record", "=", $ay)
                ->select("date_record", "name_surname", "divece_id")
                ->distinct()
                ->get();
        } else{
            $trhv = Veri::whereYear('date_record', '=', $yil)
                ->whereMonth("date_record", "=", $ay)
                ->select("date_record", "name_surname", "divece_id")
                ->distinct()
                ->get();
        }
        $veri = [];

        foreach ($trhv as $key) {
            $date_record = $key->date_record;
            $ad_soyad = $key->name_surname;
            $divece_id = $key->divece_id;
            $date = Carbon::parse($date_record);
        
            $day = $date->day; 
            $month = $date->month; 
            $year = $date->year; 
        
            $tarih = $year . '-' . $month . '-' . $day;
            $trh = sprintf("%02d", $day) . '-' . sprintf("%02d", $month) . '-' . sprintf("%04d", $year);
        
            $ilkKayit = Veri::where('name_surname', $ad_soyad)
                ->where("input_output", "=", "Giriş")
                ->whereDate("date_record", $tarih)
                ->orderBy('date_record', 'asc')
                ->first();
        
            $sonKayit = Veri::whereDate("date_record", $tarih)
                ->where('name_surname', $ad_soyad)
                ->where("input_output", "=", "Çıkış")
                ->orderBy('date_record', 'desc')
                ->first();
        

                if ($ilkKayit && $sonKayit) {
                    $ilkSaat = $ilkKayit->date_record;
                    $ilksa = (date("h:i:s",strtotime($ilkSaat)));
                    $sonSaat = $sonKayit->date_record;
                    $sonsa = (date("h:i:s",strtotime($sonSaat)));

                    $ilkS = Carbon::parse($ilkKayit->date_record);
                    $sonS = Carbon::parse($sonKayit->date_record);
                    $saniye_farki = $ilkS->diffInSeconds($sonS, false);
                    $saatFarki = gmdate('H:i:s', $saniye_farki);
                    
                    if ($ilkS < $sonS) {
                        $saat = date("H", strtotime($saatFarki));
                        $dakika = date("i", strtotime($saatFarki));
                        $saniye = date("s", strtotime($saatFarki));
                        $data[] = [
                            'ad_soyad' => $ad_soyad,
                            'firmaGC' => $divece_id,
                            'trh' => $trh,
                            'giris' => $ilksa,
                            'cikis' => $sonsa,
                            'mesaiSüresi' => $saat . " sa " . $dakika . " dk" .$saniye ." sn",
                        ];
                    } else {
                        $data []= [
                            'ad_soyad' => $ad_soyad,
                            'firmaGC' => $divece_id,
                            'trh' => $trh,
                            'giris' => $ilksa,
                            'cikis' => $sonsa,
                            'mesaiSüresi' => "!",
                        ];
                    }   
                    
                } elseif ($ilkKayit && !$sonKayit) {
                    $ilkSaat = $ilkKayit->saat;
                    $ilksa = (date("h:i:s",strtotime($ilkSaat)));
                    $data []= [
                        'ad_soyad' => $ad_soyad,
                        'firmaGC' => $divece_id,
                        'trh' => $trh,
                        'giris' => $ilksa,
                        'cikis' => "!",
                        'mesaiSüresi' => "!",
                    ];
                 
                } elseif (!$ilkKayit && $sonKayit) {
                    $sonSaat = $sonKayit->saat;
                    $sonsa = (date("h:i:s",strtotime($sonSaat)));
                    $data []= [
                        'ad_soyad' => $ad_soyad,
                        'firmaGC' => $divece_id,
                        'trh' => $trh,
                        'giris' => "!",
                        'cikis' => $sonsa,
                        'mesaiSüresi' => "!",
                    ];
                }
            }
            $veri[] = $data;
 
        }



        return view("home", ["profilurl" => $profilurl, "veri" => $veri, "ay" => $ay, "yil" => $yil]);
    }
}
