<?php

namespace App\Http\Controllers;

use App\Models\Veri;
use Illuminate\Http\Request;
use DataTables;

class Veriler extends Controller
{
    public function index()
    {
      

        $users = Veri::query();
    
        return DataTables::of($users)->make(true);
    }
}
