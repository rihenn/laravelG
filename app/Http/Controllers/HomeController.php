<?php

namespace App\Http\Controllers;


use App\Models\PDKSdeviceUsers;
use App\Models\PDKSentryExit;
use App\Models\PDKSwebUsers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Carbon\Carbon;


class HomeController extends Controller
{
    public function value(Request $request)
    {

      

        $sid = Session::get('sid');

        $profilurl = "";
        $veriler = PDKSwebUsers::where("id", "=", $sid)
            ->get();
        foreach ($veriler as $veri) {
            $profilurl = $veri->profile_url;
        };

        $test = $request->input('search');
        $searchid = $request->input('id');
        $searchname = $request->input('nameSurname');
        $searchcardno = $request->input('cardno');

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

        $name_surname = PDKSentryExit::select("name_surname")->distinct()->get();

        foreach ($name_surname as $name) {
            $Namedata[] = [
                'name' => $name->name_surname,
            ];
        };

        if (isset($test) || session('adminlik') == 0) {

            $sid = Session::get('sid');
            if (session('adminlik') == 0) {
                $users = PDKSwebUsers::where("id", "=", $sid)->first();
                $cardno = $users->card_number;
                $diveceusers = PDKSdeviceUsers::where("card_number", "=", $cardno)->first();

                $trhv = PDKSentryExit::where("person_id", "=", $diveceusers->id)
                    ->whereYear('date_record', '=', $yil)
                    ->whereMonth("date_record", "=", $ay)
                    ->select("date_record", "name_surname", "divece_id")
                    ->distinct()
                    ->get();
            } else {
                $query = PDKSentryExit::query();
                if (isset($searchid)) {
                    $query->where('person_id', $searchid);
                }
                if (isset($searchcardno)) {
                    $diveceusers = PDKSdeviceUsers::where("card_number", "=", $searchcardno)->first();

                    $query->where("person_id", $diveceusers->id);
                }
                if (isset($searchname)) {
                    $query->where('name_surname', $searchname);
                }
                if (empty($searchcardno) && empty($searchid) && empty($searchname)) {
                    $mesaj = ' <div class="alert alert-danger"><strong>UYARI!</strong> lütfen kullanıcı bilgilerini doldurunuz .</div>';

                    return view("home", ["mesaj" => $mesaj, "profilurl" => $profilurl, "veri" => $veri, "ay" => $ay, "yil" => $yil, "namelist" => $Namedata]);
                }
              
            
                $trhv = $query->whereYear('date_record', '=', $yil)
                    ->whereMonth("date_record", "=", $ay)
                    ->select("date_record", "name_surname", "device_id")
                    ->distinct()
                    ->get();
                    if ($trhv->isEmpty()) {
                        $previousMonth = $ay - 1;
                        $previousYear = $yil;
                    
                        if ($previousMonth == 0) {
                            $previousMonth = 12;
                            $previousYear = $yil - 1;
                        }
                    
                        $trhv = $query->whereYear('date_record', '=', $previousYear)
                                      ->whereMonth("date_record", "=", $previousMonth)
                                      ->select("date_record", "name_surname", "device_id")
                                      ->distinct()
                                      ->get();
                    }
                
                // if ($trhv->isEmpty()) {
                //     $mesaj = ' <div class="alert alert-danger"><strong>UYARI!</strong> kullanıcı bilgilerini lütfen doğru giriniz .</div>';

                //     return view("home", ["mesaj" => $mesaj, "profilurl" => $profilurl, "veri" => $veri, "ay" => $ay, "yil" => $yil, "namelist" => $Namedata]);
                // }
            }
            $data = [];
            foreach ($trhv as $key) {
                // Verileri diziye aktar
                $data[] = [
                    'date_record' => $key->date_record,
                    'name_surname' => $key->name_surname,
                    'divece_id' => $key->device_id,
                ];
            }
            
            $veri = [];
            
            foreach ($data as $key) {
                $date_record = $key['date_record'];
                $ad_soyad = $key['name_surname'];
                $divece_id = $key['divece_id'];
                $date = Carbon::parse($date_record);
            
                $day = $date->day;
                $month = $date->month;
                $year = $date->year;
            
                $tarih = $year . '-' . $month . '-' . $day;
                $trh = sprintf("%02d", $day) . '-' . sprintf("%02d", $month) . '-' . sprintf("%04d", $year);
            
                $ilkKayit = PDKSentryExit::where('name_surname', $ad_soyad)
                    ->where("input_output", "giris")
                    ->whereDate("date_record", $tarih)
                    ->orderBy('date_record', 'asc')
                    ->first();
            
                $sonKayit = PDKSentryExit::where('name_surname', $ad_soyad)
                    ->where("input_output", "cikis")
                    ->whereDate("date_record", $tarih)
                    ->orderBy('date_record', 'desc')
                    ->first();
            
                if ($ilkKayit && $sonKayit) {
                    $ilkSaat = $ilkKayit->date_record;
                    $ilksa = date("H:i:s", strtotime($ilkSaat));
                    $sonSaat = $sonKayit->date_record;
                    $sonsa = date("H:i:s", strtotime($sonSaat));
            
                    $ilkS = Carbon::parse($ilkKayit->date_record);
                    $sonS = Carbon::parse($sonKayit->date_record);
                    $saniye_farki = $ilkS->diffInSeconds($sonS, false);
                    $saatFarki = gmdate('H:i:s', $saniye_farki);
            
                    if ($ilkS < $sonS) {
                        $saat = date("H", strtotime($saatFarki));
                        $dakika = date("i", strtotime($saatFarki));
                        $saniye = date("s", strtotime($saatFarki));
                        $newData = [
                            'ad_soyad' => $ad_soyad,
                            // 'firmaGC' => $divece_id,
                            'trh' => $trh,
                            'giris' => $ilksa,
                            'cikis' => $sonsa,
                            'mesaiSüresi' => $saat . " sa " . $dakika . " dk " . $saniye . " sn",
                        ];
                        $duplicate = false;
                        foreach ($veri as $item) {
                            if (empty(array_diff_assoc($item, $newData))) {
                                $duplicate = true;
                                break;
                            }
                        }
                        if (!$duplicate) {
                            $veri[] = $newData;
                        }
                    } else {
                        $newData = [
                            'ad_soyad' => $ad_soyad,
                            // 'firmaGC' => $divece_id,
                            'trh' => $trh,
                            'giris' => $ilksa,
                            'cikis' => $sonsa,
                            'mesaiSüresi' => "!",
                        ];
                        $duplicate = false;
                        foreach ($veri as $item) {
                            if (empty(array_diff_assoc($item, $newData))) {
                                $duplicate = true;
                                break;
                            }
                        }
                        if (!$duplicate) {
                            $veri[] = $newData;
                        }
                    }
                } elseif ($ilkKayit && !$sonKayit) {
                    $ilkSaat = $ilkKayit->date_record;
                    $ilksa = date("H:i:s", strtotime($ilkSaat));
                    $newData = [
                        'ad_soyad' => $ad_soyad,
                        // 'firmaGC' => $divece_id,
                        'trh' => $trh,
                        'giris' => $ilksa,
                        'cikis' => "!",
                        'mesaiSüresi' => "!",
                    ];
                    $duplicate = false;
                    foreach ($veri as $item) {
                        if (empty(array_diff_assoc($item, $newData))) {
                            $duplicate = true;
                            break;
                        }
                    }
                    if (!$duplicate) {
                        $veri[] = $newData;
                    }
                } elseif (!$ilkKayit && $sonKayit) {
                    $sonSaat = $sonKayit->date_record;
                    $sonsa = date("H:i:s", strtotime($sonSaat));
                    $newData = [
                        'ad_soyad' => $ad_soyad,
                        // 'firmaGC' => $divece_id,
                        'trh' => $trh,
                        'giris' => "!",
                        'cikis' => $sonsa,
                        'mesaiSüresi' => "!",
                    ];
                    $duplicate = false;
                    foreach ($veri as $item) {
                        if (empty(array_diff_assoc($item, $newData))) {
                            $duplicate = true;
                            break;
                        }
                    }
                    if (!$duplicate) {
                        $veri[] = $newData;
                    }
                }
            }
            
            
       $datadate[] = $veri;
      
            if (isset($sid)) {
                return view("home", ["profilurl" => $profilurl, "veri" => $datadate, "ay" => $ay, "yil" => $yil, "namelist" => $Namedata,"id"=>$sid]);
            }
            return view("home", ["profilurl" => $profilurl, "veri" => $datadate, "ay" => $ay, "yil" => $yil, "namelist" => $Namedata]);
        } else {
            if (isset($Namedata)) {
                return view("home", ["profilurl" => $profilurl, "veri" => $veri, "ay" => $ay, "yil" => $yil, "namelist" => $Namedata]);
            }
            $veri =[""];
            return view("home", ["profilurl" => $profilurl, "veri" => $veri, "ay" => $ay, "yil" => $yil]);
        }
    }
}
