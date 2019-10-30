<?php

use Illuminate\Routing\RouteGroup;

Auth::routes(['verify' => true]);

 Route::get('/', function () {
    return view('welcome');
});

Route::get('home', function () {
    return view('home');
})->middleware('auth');

 //Route::get('/home', 'HomeController@index')->name('home'); 

Route::get('text', function(){
    return 'Permiso concedido';
})->middleware('role:administrador-paciente-cirujano');

//backoffice
 Route::group(['middleware' => ['auth'], 'as' => 'backoffice.'], function () {
    //Route::get('role', 'RoleController@index')->name('role.index');
    Route::get('admin', 'AdminController@show')
    ->name('admin.show');

    Route::resource('user', 'UserController');
    Route::get('user_import', 'UserController@import')
        ->name('user.import');
    Route::post('user_make_import', 'USerController@make_import')
        ->name('user.make_import');

    Route::get('patient/{user}/schedule', 'PatientController@back_schedule')
        ->name('patient.schedule');
    Route::post('patient/{user}/store_back_schedule', 'PatientController@store_back_schedule')
        ->name('patient.store_back_schedule');
    
    Route::get('patient/{user}/appointment', 'PatientController@back_appointments')
        ->name('patient.appointments');
    Route::get('patient/{user}/appointments/{appointment}/edit','PatientController@back_appointments_edit')
        ->name('patient.appointments.edit');   

    Route::get('patient/{user}/invoice', 'PatientController@back_invoices')
        ->name('patient.invoices');

    Route::resource('role', 'RoleController');
    Route::get('user/{user}/assign_role', 'UserController@assign_role')
        ->name('user.assign_role');
    Route::post('user/{user}/role_assigment', 'UserController@role_assigment')
        ->name('user.role_assigment'); 

    Route::resource('permission', 'PermissionController');
    Route::get('user/{user}/assign_permission', 'UserController@assign_permission')
        ->name('user.assign_permission');
    Route::post('user/{user}/permission_assignment', 'UserController@permission_assignment')
        ->name('user.permission_assignment');

    Route::resource('speciality','SpecialityController');
    Route::get('user/{user}/assign_speciality', 'UserController@assign_speciality')
        ->name('user.assign_speciality');
    Route::post('user/{user}speciality_assignment',
      'UserController@speciality_assignment')
        ->name('user.speciality_assignment');
       
});

Route::group([ 'as' => 'frontoffice.'], function(){
    Route::get('profile','UserController@profile')
        ->name('user.profile');
    Route::get('profile/{user}/edit','UserController@edit')
        ->name('user.edit');
    Route::put('profile/{user}/update','UserController@update')
        ->name('user.update');
    Route::get('profile/edit_password','UserController@edit_password')
        ->name('user.edit_password');
    route::put('profile/change_password','UserController@change_password')
        ->name('user.change_password');

    Route::get('patient/schedule','PatientController@schedule')
        ->name('patient.schedule');

   /*  LLAMADO POST */
    Route::post('patient/store_schedule', 'PatientController@store_schedule')->name('patient.store_schedule');

    Route::get('patient/appointments','PatientController@appointments')
        ->name('patient.appointments');
    Route::get('patient/prescriptions','PatientController@prescriptions')
        ->name('patient.prescriptions');
    Route::get('patient/invoices','PatientController@invoices')
        ->name('patient.invoices');    
});

Route::group(['middleware' => ['auth'], 'as' => 'ajax.'], function(){
    Route::get('user_speciality','AjaxController@user_speciality')
    ->name('user_speciality');
    Route::get('invoice_info', 'AjaxController@invoice_info')
    ->name('invoice_info');
    
});