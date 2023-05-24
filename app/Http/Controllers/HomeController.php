<?php

namespace App\Http\Controllers;

use App\Models\DiveceUsers;
use App\Models\Users;
use App\Models\Veri;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DateTime;

class HomeController extends Controller
{
    public function value(Request $request)
    {
        $sid = Session::get('sid');

        $profilurl = "";
        $veriler = Users::where("id", "=", $sid)
            ->get();
        foreach ($veriler as $veri) {
            $profilurl = $veri->profilurl;
        };




        $ay = date("m");
        $yil = date('Y');

        $once = $request->input('önce');
        $sonra = $request->input('sonra');
        $bu_ay = $request->input('bu_ay');
        $buAy = $request->input('ay');


        // $bu_yil = $request->input('yil');
        // $Yil_önce = $request->input('Yilönce');
        // $Yil_sonra = $request->input('Yilsonra');
        // $buYil = $request->input('buYil');
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
        function hesaplaCalismaSure($veriler)
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



        $sid = Session::get('sid');
        if (session('adminlik') == 0) {
            $users = Users::where("id", "=", $sid)->first();
            $cardno = $users->cardno;
            $diveceusers = DiveceUsers::where("cardno", "=", $cardno)->first();

            $trhv = Veri::where("ad_soyad", "=", $diveceusers->name)
                ->whereYear('tarih', '=', $yil)
                ->whereMonth("tarih", "=", $ay)
                ->select("tarih", "ad_soyad", "firmaGC")
                ->distinct()
                ->get();
        } else
            $trhv = Veri::whereYear('tarih', '=', $yil)
                ->whereMonth("tarih", "=", $ay)
                ->select("tarih", "ad_soyad", "firmaGC")
                ->distinct()
                ->get();

        $veri = [];

      
        foreach ($trhv as $key) {

            $id = $key->pId;
            $tarih = $key->tarih;
            $ad_soyad = $key->ad_soyad;
            $firma = $key->firmaGC;

            $ilkKayit = Veri::whereDate('tarih', $tarih)
                ->where('ad_soyad', $ad_soyad)
                ->where("GC", "=", "Giris")
                ->orderBy('saat', 'asc')
                ->first();

            $sonKayit = Veri::whereDate('tarih', $tarih)
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
                    foreach ($süreler as $Tdata) {
                        $süre = $Tdata["süre"];
                        if ($ad_soyad == $Tdata["ad_soyad"] && $tarih == $Tdata["tarih"] ) {


                            $data = [
                                'ad_soyad' => $ad_soyad,
                                'firmaGC' => $firma,
                                'trh' => $tarih,
                                'giris' => $ilkSaat,
                                'cikis' => $sonSaat,
                                'mesaiSüresi' => $saat . " sa " . $dakika . " dk",
                                "ofisZaman" => $süre
                            ];
                        }
                    };
                } else {

                    foreach ($süreler as $Tdata) {
                        $süre = $Tdata["süre"];
                        
                        if ($ad_soyad == $Tdata["ad_soyad"] && $tarih == $Tdata["tarih"] ) {


                            $data = [
                                'ad_soyad' => $ad_soyad,
                                'firmaGC' => $firma,
                                'trh' => $tarih,
                                'giris' => $ilkSaat,
                                'cikis' => $sonSaat,
                                'mesaiSüresi' => "!",
                                "ofisZaman" => $süre
                            ];
                            $veri[] = $data;
                        }
                    };
                }

            } elseif ($ilkKayit && !$sonKayit) {
                $ilkSaat = $ilkKayit->saat;
                foreach ($süreler as $Tdata) {
                    $süre = $Tdata["süre"];
                    if ($ad_soyad == $Tdata["ad_soyad"] && $tarih == $Tdata["tarih"] ) {


                        $data = [
                            'ad_soyad' => $ad_soyad,
                            'firmaGC' => $firma,
                            'trh' => $tarih,
                            'giris' => $ilkSaat,
                            'cikis' => "!",
                            'mesaiSüresi' => "!",
                            "ofisZaman" => $süre
                        ];
                        $veri[] = $data;
                    }
                };

            } elseif (!$ilkKayit && $sonKayit) {
                $sonSaat = $sonKayit->saat;

                foreach ($süreler as $Tdata) {
                    $süre = $Tdata["süre"];
                    if ($ad_soyad == $Tdata["ad_soyad"] && $tarih == $Tdata["tarih"] ) {


                        $data = [
                            'ad_soyad' => $ad_soyad,
                            'firmaGC' => $firma,
                            'trh' => $tarih,
                            'giris' => "!",
                            'cikis' => $sonSaat,
                            'mesaiSüresi' => "!",
                            "ofisZaman" => $süre
                        ];
                        $veri[] = $data;
                    }
                };


            }
        }





        return view("home", ["profilurl" => $profilurl, "veri" => $veri, "ay" => $ay, "yil" => $yil]);
    }
}
