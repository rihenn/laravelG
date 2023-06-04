<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class deviceUsers extends Model
{
    use HasFactory;

  
    public $timestamps = true;
    protected $table="pdks_device_users";

    protected $fillable=["id","uid","name","role","password","card_number","device_id"];
}
