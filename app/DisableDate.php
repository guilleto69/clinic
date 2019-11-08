<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DisableDate extends Model
{
    protected $fillable = [
		'key', 'value', 'user_id',
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
