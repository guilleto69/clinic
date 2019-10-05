<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function schedule()
    {
        return view('theme.frontoffice.pages.user.patient.schedule');
    }

    public function appointments()
    {
        return view ('theme.frontoffice.pages.user.patient.appointments');
    }
}
