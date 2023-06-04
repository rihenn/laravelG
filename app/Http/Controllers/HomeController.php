<?php

namespace App\Http\Controllers;

use App\Models\DiveceUsers;
use App\Models\Users;
use App\Models\Veri;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Carbon\Carbon;


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
        return view("home",["profilurl"=>$profilurl]);
    }
}
