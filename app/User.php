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
            return $this->belongsToMany('App\Permission');
        }

        public function roles()
        {
            return $this->belongsToMany('App\Role')->withTimestamps();
        }

    //ALMACENAMIENTO

    //VALIDACION
        public function has_role($id)
        {
            foreach($this->roles as $role){
                if ($role->id == $id || $role->slug==$id) return true;
            }
            return false;
        }

        public function has_permission($id)
        {
            foreach($this->permissions as $permission) {
                if ($permission->id == $id || $permission->slug == $id) return true;
            }
            return false;            
        }

        /* public function is_admin($id)
        {
            foreach($this->roles as $role){
                if ($role->id == 1 || $role->slug==$id) return true;
            }
            return false;
        } */

    //RECUPERACION DE INFORMACION

    //OTRAS OPERACIONES
}
