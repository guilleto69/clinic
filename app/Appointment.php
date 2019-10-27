<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\InvoiceMeta;
use Carbon\Carbon;

class Appointment extends Model
{
    protected $fillable = [
        'date', 'doctor_id', 'status', 'user_id', 'invoice_id'
    ];

    #RELACIONES

    public function invoice(){
        return $this->hasOne('App\Invoice');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    #ALMACENAMIENTO
    public function store($request, $invoice){
        $date = Carbon::createFromFormat('Y-m-d H:i', $request->date_submit . ' ' . $request->time_submit);

        InvoiceMeta::create(['key' => 'doctor', 
            'value' => $request->doctor,
            'invoice_id' => $invoice->id
            ]);

        return self::create([
            'date' => $date->toDateTimeString(),
            'doctor_id' => $request->doctor,
            'status' => 'pending',
            'user_id' => $request->user()->id,
            'invoice_id' => $invoice->id
        ]);
    }

}
