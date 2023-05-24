<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $table = 'pdks-web_users';
  
    protected $fillable = [
        'id',
        'name_surname',
        'card_number',
        'mail',
        'telephone',
        'user_name',
        'password',
        'task',
        'profile_url',
        'admin',
    ];
}
