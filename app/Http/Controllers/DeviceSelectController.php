<?php

namespace App\Http\Controllers;

use App\Models\PDKSdevice;
use Illuminate\Http\Request;

class DeviceSelectController extends Controller
{
    public function data(){
        $value = PDKSdevice::get();
        foreach($value as $val){
            $data []=[
                "id"=>$val->id,
                "entry_ip"=>$val->entry_ip,
                "exit_ip"=>$val->exit_ip,
                "entry_port"=>$val->entry_port,
                "exit_port"=>$val->exit_port,
                "door_name"=>$val->door_name,
             
            ];
        }
        return view("deviceSelect",["data" => $data,"sayac"=> 1]);
    }
}
