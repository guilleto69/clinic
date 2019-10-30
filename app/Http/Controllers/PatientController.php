<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Invoice;
use App\User;

use Illuminate\Http\Request;



class PatientController extends Controller
{
    public function schedule(){
        return view('theme.frontoffice.pages.user.patient.schedule',[
            'user' => user(), //Helper Nuestro
            'specialities' => \App\Speciality::all(), 
        ]);
    }

    public function store_schedule(Request $request, Appointment $appointment, Invoice $invoice){
        $invoice = $invoice->store($request);
        $appointment = $appointment->store($request, $invoice);
        toast('Cita Creada!','success', 'top-right');
        return redirect()->route('frontoffice.patient.appointments');
    }

    public function back_schedule(User $user){
        return view('theme.backoffice.pages.user.patient.schedule',[
            'user' => $user,
            'specialities' => \App\Speciality::all(), 
        ]);
    }

    public function store_back_schedule(Request $request, User $user, Appointment $appointment, Invoice $invoice){       
        $invoice = $invoice->store($request);
        $appointment = $appointment->store($request, $invoice);
        toast('Cita Creada!','success', 'top-right');
        return redirect()->route('backoffice.user.show', $user);
    }

    public function appointments(){
        return view ('theme.frontoffice.pages.user.patient.appointments',[
            'appointments' => user()->appointments->sortBy('date'),
        ]);
    }

    public function back_appointments(User $user){
        return view('theme.backoffice.pages.user.patient.appointment', [
            'user'=>$user,  
            'appointments' => $user->appointments->sortBy('date'),      
        ]
    );
    }

    public function back_appointments_edit(User $user, Appointment $appointment){
        dd('editar Cita', $appointment);
    }

    public function prescriptions(){
        return view ('theme.frontoffice.pages.user.patient.prescriptions');
    }

    public function invoices(){
        return view ('theme.frontoffice.pages.user.patient.invoices', [
           'invoices' => user()->invoices,
        ]);
    }

    public function back_invoices(User $user){
        return view('theme.backoffice.pages.user.patient.invoice', ['user'=>$user,
        ]
    );        
    }
}
