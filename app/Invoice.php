<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
                
            return self::create([
                'amount' => 500,
                'status' => 'pending',
                'user_id' => $request->user()->id
            ]);

            
    }
}
