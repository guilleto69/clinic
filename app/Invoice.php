<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/* use Illuminate\Foundation\Auth\User; */
use App\User;

class Invoice extends Model
{
    protected $fillable = [
        'amount', 'status', 'user_id'
    ];

    #RELACIONES

    public function user(){
        return $this->belongsTo('App\User');
    }   

    public function appointment(){
        return $this->belongsTo('App\Appointment');
    }

    public function metas(){
        return $this->hasMany('App\InvoiceMeta');
    }

    #ALMACENAMIENTO

    public function store($request){
            $user =  User::findOrFail(decrypt($request->user_id)); //id de User de la Cita
            
            return self::create([
                'amount' => 500,
                'status' => 'pending',
                'user_id' => $user->id
            ]);

            
    }

    #RECUPERACION DE INFORMACION

    public function meta($key, $default = null){
        $value = $this->metas->where('key', $key)->first();
        $value = (is_null($value)) ? $default : $value->value;
        return $value;
    }

    public function concept(){
        return $this->meta('concept', 'Sin especificar');
    }

    public function doctor($default = null){
        $user_id = $this->meta('doctor', $default);
        $user = User::findOrFail($user_id);
        return $user;
    }

    public function status(){
        /* return $this->meta('status', 'Sin especificar'); */
    }

   
}
