<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

   
    protected $hidden = [
        'password', 'remember_token',
    ];

    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //RELACIONES
        public function permissions()
        {
            return $this->belogsToMany('App\Permission');
        }

        public function roles()
        {
            return $this->belongsToMany('App\Role')->withTimestamps();
        }

    //ALMACENAMIENTO

    //VALIDACION

    //RECUPERACION DE INFORMACION

    //OTRAS OPERACIONES
}
