<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Role extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

//RELACIONES
    public function permissions()
    {
        return $this->hasMany('App\Permission');
    }

    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }

//ALMACENAMIENTO
    public function store($request)
    {
        $slug = str_slug($request->name, '-');
        toast('Role Guardado!','success', 'top-right');
        /* alert('Exito!', 'El Role se ha Guardado','success')->showConfirmButton(); */
        return self::create($request->all() + [
            'slug'=> $slug,
        ] );
        
    }

    public function my_update($request)
    {
        $slug = str_slug($request->name, '-');
        toast('Role Actualizado!','success', 'top-right');
        self::update($request->all() + ['slug'=>$slug]);
        /* alert('Exito!', 'El Role se ha Actualizado','success')->showConfirmButton(); */
    }
//VALIDACION

//RECUPERACION DE INFORMACION

//OTRAS OPERACIONES
    
}
