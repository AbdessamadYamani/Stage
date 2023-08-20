<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

 
class utilisateur extends Authenticatable
{
    use Notifiable;
    protected $table = 'utilisateur'; 

    protected $primaryKey = 'id_user'; // Set the primary key field name

    protected $fillable = [
        'doti', 'email', 'nom', 'prenom', 'password', 'droit', 'cod_t_user', 'cin'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
