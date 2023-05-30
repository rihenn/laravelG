<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiveceUsers extends Model
{
    use HasFactory;

  

    protected $table="pdks_divece_users";

    protected $fillable=["id","uid","name","role","password","card_number","divece_id"];
}
