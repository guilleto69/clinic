<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Permission extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'role_id',
    ];

//RELACIONES
    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }
//ALMACENAMIENTO
    public function store($request){
        $slug = str_slug($request->name, '-');
        
        return self::create($request->all() + ['slug'=>$slug]);
        toast('Permiso Creado!','success', 'top-right');
    }

    public function my_update($request){
        $slug = str_slug($request->name, '-');        
        
        return self::update($request->all() + ['slug'=>$slug]);
        toast('Permiso Actualizado!','success', 'top-right');
        
    }

//VALIDACION

//RECUPERACION DE INFORMACION

//OTRAS OPERACIONES
}
