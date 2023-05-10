<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function value(){
       $veriler = DB::table('kullaniciler')
        ->where("id","=",2)
        ->get();
        foreach($veriler as $veri){
            $profilurl=$veri->profilurl;
        };
        return view("home",["profilurl"=>$profilurl]);
    }
}
