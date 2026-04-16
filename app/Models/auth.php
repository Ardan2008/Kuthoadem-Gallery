<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// Ubah dari 'auth' menjadi 'User' atau setidaknya 'Auth' (kapital)
class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users'; // Nama tabel di database

    protected $fillable = [
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}