<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PDKSpasswordReset extends Model
{
    use HasFactory;

    protected $table = 'pdks_password_reset';

    protected $fillable = [
        'mail',
        'refresh_token',
        'refresh_status',
    ];
}
