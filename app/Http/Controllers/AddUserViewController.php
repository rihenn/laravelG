<?php

namespace App\Http\Controllers;

use App\Models\Device;




class AddUserViewController extends Controller
{
    public function checkboxValue(){
        $cihazdata = Device::get();
        $AllData=[];
      foreach ($cihazdata as $dat) {
        $data=[
        "id" => $dat->id,
        "name" => $dat->divece_name,

        ];  
        $AllData []=$data; 
    }
      return view("deviceUserAdd",["allData"=>$AllData]);
    }
}
