<?php


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
    Route::get('admin', 'AdminController@show')->name('admin.show');
    Route::resource('user', 'UserController');

    Route::get('patient/{user}/schedule', 'PatientController@back_schedule')->name('patient.schedule');

    Route::get('user_import', 'UserController@import')->name('user.import');
    Route::post('user_make_import', 'USerController@make_import')->name('user.make_import');

    Route::get('user/{user}/assign_role', 'UserController@assign_role')->name('user.assign_role');
    Route::post('user/{user}/role_assigment', 'UserController@role_assigment')->name('user.role_assigment');
    Route::get('user/{user}/assign_permission', 'UserController@assign_permission')->name('user.assign_permission');
    Route::post('user/{user}/permission_assignment', 'UserController@permission_assignment')->name('user.permission_assignment');
    
    Route::resource('role', 'RoleController');
    Route::resource('permission', 'PermissionController');
    
});

Route::group([ 'as' => 'frontoffice.'], function(){
    Route::get('profile','UserController@profile')->name('user.profile');
    Route::get('profile/{user}/edit','UserController@edit')->name('user.edit');
    Route::put('profile/{user}/update','UserController@update')->name('user.update');
    Route::get('profile/edit_password','UserController@edit_password')->name('user.edit_password');
    route::put('profile/change_password','UserController@change_password')->name('user.change_password');

    Route::get('patient/schedule','PatientController@schedule')->name('patient.schedule');
    Route::get('patient/appointments','PatientController@appointments')->name('patient.appointments');
    Route::get('patient/prescriptions','PatientController@prescriptions')->name('patient.prescriptions');
    Route::get('patient/invoices','PatientController@invoices')->name('patient.invoices');    
});