<?php

namespace App\Imports;


use App\Models\ExcelModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;



class ExcelImports implements ToModel,WithHeadingRow
{ 
    
    /**
     * @param array $row
     *
     * @return ExcelModel|null
     */
    public function model(array $row)
    {
        date_default_timezone_set("Europe/Istanbul");
        

        if ($row[0] !== null) {
        $date1 = str_replace('/', '-', $row['5']);
        $saat = date("H:i:s", strtotime($date1));
        
        return new ExcelModel([
           'ad_soyad'     => $row[0],
           'firma'    => $row[1], 
           'firmaGC' => $row[3],
           'tarih' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['4']),
           'saat' => $saat,
           'GC' => $row[6],
        
        ]);
    }
    
    }
}