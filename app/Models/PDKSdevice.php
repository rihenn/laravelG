<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PDKSdevice extends Model
{
    use HasFactory;

    protected $table="pdks_door";

    protected $fillable=["id","giris_ip","cikis_ip","giris_port","cikis_port","door_name","company_name"];
}
