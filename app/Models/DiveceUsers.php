<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiveceUsers extends Model
{
    use HasFactory;

    protected $table="diveceusers";

    protected $fillable=["id","uid","name","role","password","cardno","cihazId"];
}
