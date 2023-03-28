<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veri extends Model
{
    use HasFactory;

    protected $table="giriscikis";
    protected $fillable=[
        'id',
        'ad_soyad',
        'firma',
        'firmaGC',
        'tarih',
        'saat',
        'GC',
    ];
}
