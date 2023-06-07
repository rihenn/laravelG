<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PDKSdevice extends Model
{
    use HasFactory;

    protected $table="pdks_door";

    protected $fillable=["id","entry_ip","exit_ip","entry_port","exit_port","door_name","company_name"];
}
