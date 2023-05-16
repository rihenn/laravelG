<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $table = 'kullaniciler';
  
    protected $fillable = [
        'id',
        'nameSurename',
        'mail',
        'tel',
        'username',
        'password',
        'görev',
        'profilurl',
        'admin',

    ];
}
