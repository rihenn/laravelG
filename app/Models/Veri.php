<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veri extends Model
{
    use HasFactory;

    protected $table="pdks_entry_exit";
    protected $fillable=[
        
        'pId',
        'uid',
        'name_surname',
        'device_id',
        'date_record',
        'input_output',
    ];
}
