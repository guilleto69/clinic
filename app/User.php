<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
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

        public function role_assigment( $request)
        {            
            $this->permission_mass_assigment($request->roles);
            $this->roles()->sync($request->roles);            
            
            $this->verify_permission_integrity($request->roles); /* USER: Quita los permisos de Roles No asignados */
            toast('Roles Asignados!','success', 'top-right');
        }
        
    //VALIDACION

        public function is_admin()
        {
            $admin = config('app.admin_role');
            if ($this->has_role($admin) ){
                return true;
            } else {
                return false;
            }
        }
       
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

        
    //RECUPERACION DE INFORMACION

    //OTRAS OPERACIONES
                //REtira los PErsmios si el Rol No esta asignado al Usuario
    public function verify_permission_integrity(array $roles)
    {
        $permissions = $this->permissions;
        foreach( $permissions as $permission ){
            if ( !in_array($permission->role->id, $roles)){
                $this->permissions()->detach($permission->id);
            }
        }
    }

    public function permission_mass_assigment( array $roles)
    {
        foreach ($roles as $role){
            if ( !$this->has_role($role) ){
                $role_obj= \App\Role::findOrFail($role);
                $permissions = $role_obj->permissions;
                $this->permissions()->syncWithoutDetaching($permissions);
            }
        }
    }


}
