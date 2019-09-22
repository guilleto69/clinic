<?php


Auth::routes(['verify' => true]);

 Route::get('/', function () {
    return view('welcome');
});

Route::get('home', function () {
    return view('home');
})->middleware('auth');

 //Route::get('/home', 'HomeController@index')->name('home'); 



//backoffice
 Route::group(['middleware' => ['auth'], 'as' => 'backoffice.'], function () {
    //Route::get('role', 'RoleController@index')->name('role.index');
    Route::get('admin', 'AdminController@show')->name('admin.show');
    Route::resource('user', 'UserController');    
    Route::get('user/{user}/assign_role', 'UserController@assign_role')->name('user.assign_role');
    Route::post('user/{user}/role_assigment', 'UserController@role_assigment')->name('user.role_assigment');
    Route::get('user/{user}/assign_permission', 'UserController@assign_permission')->name('user.assign_permission');
    Route::post('user/{user}/permission_assignment', 'UserController@permission_assignment')->name('user.permission_assignment');
    
    Route::resource('role', 'RoleController');
    Route::resource('permission', 'PermissionController');
    
});
