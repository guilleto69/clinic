<?php

namespace App\Http\Controllers;

use App\DoctorSchedule;
use App\User;
use Illuminate\Http\Request;

class DoctorScheduleController extends Controller
{
    public function assign(User $user)
    {
        return view('theme.backoffice.pages.user.doctor.schedule', [
            'user' => $user,
            'days' => ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado']
        ]);
    }

    public function assignment(Request $request, User $user)
    {
        dd($request);
    }

    
}
