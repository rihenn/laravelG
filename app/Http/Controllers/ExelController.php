<?php

namespace App\Http\Controllers;

use App\Imports\ExcelImports;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExelController extends Controller
{
    public function import(Request $request) 
    {
        $file=$request->import_file;
        Excel::import(new ExcelImports, $file,'s3');
       
        return view('excel'); 
       
    }
}
