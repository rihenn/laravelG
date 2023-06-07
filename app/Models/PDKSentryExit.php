<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PDKSentryExit extends Model
{
    use HasFactory;
    protected $table="pdks_entry_exit";
    protected $fillable=[
        
        'person_id',
        'name_surname',
        'device_id',
        'date_record',
        'input_output',
    ];
}
