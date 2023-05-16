<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    
    protected $table="cihazlar";

    protected $fillable=["id","ip","port","cihazname","firmaCihazName","type"];
}
