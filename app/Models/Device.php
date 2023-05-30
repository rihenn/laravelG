<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    
    protected $table="pdks_devices";

    protected $fillable=["id","ip","port","divece_name","company_device_name","type"];
}
