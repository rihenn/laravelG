<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AddUserViewController extends Controller
{
    public function checkboxValue(){
        $cihazdata = DB::table("cihazlar")
        ->get();
        $AllData=[];
      foreach ($cihazdata as $dat) {
        $data=[
        "id" => $dat->id,
        "name" => $dat->cihazname,

        ];  
        $AllData []=$data; 
    }
      return view("zkt-update",["allData"=>$AllData]);
    }
}
