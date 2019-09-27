<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash; 

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $fillable = [
        'name', 'dob', 'email', 'password',
    ];

   
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['dob'];


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
        public function store ($request)
        {
            $user = self::create($request->all());
            $user->update( ['password' =>  Hash::make($request->password) ] );
            $roles =[$request->role];
            $user->role_assigment(null, $roles);
            toast('Usuario Creado!','success', 'top-right');
            return $user;
        }

        public function role_assigment( $request, array $roles = null)
        {   
            $roles =(is_null($roles)) ? $request->roles : $roles;         
            $this->permission_mass_assigment($roles);
            $this->roles()->sync($roles);                        
            $this->verify_permission_integrity($roles); /* USER: Quita los permisos de Roles No asignados */
            toast('Roles Asignados!','success', 'top-right');
        }

        public function my_update($request)
        {
            self::update( $request->all() );
            toast('Usuario Actualizado!','success', 'top-right');

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

        public function has_any_role(array $roles)
        {
            foreach($roles as $role){
                if($this->has_role($role)) return true;
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
        public function age()
        {
            if(!is_null($this->dob) )
            {
                $age = $this->dob->age;
                $years = ($age == 1 ) ? 'año' : 'años';
                $msj = $age . ' ' . $years;
            }else{
                $msj = 'indefinido';
            }
            return $msj;
        }        


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
