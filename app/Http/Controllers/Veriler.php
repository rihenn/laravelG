<?php

namespace App\Http\Controllers;

use App\Models\Veri;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;


class Veriler extends Controller
{
    public function index()
    {
        $users = DB::table('giriscikis')
            ->get();

        return json_encode($users);
    }
}
