<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function user_speciality(Request $request)
    {
        if( $request->ajax() ){
            $speciality = \App\Speciality::findOrFail($request->speciality);
            $users = $speciality->users;
            //dd('users');
            return response()->json($users);
        }
    }
}
