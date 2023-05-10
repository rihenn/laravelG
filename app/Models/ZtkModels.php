<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZtkModels extends Model
{
    use HasFactory;

    protected $table ="Cihazlar";
    
    protected $fillable = ['id','ip','port','cihazname'];
}
