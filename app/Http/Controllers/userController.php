<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class userController extends Controller
{
  
    public function index()
    {
        return view ('theme.backoffice.pages.user.index',[
            'users'=> User::all(),
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(User $user)
    {
        return view('theme.backoffice.pages.user.show',[
            'user' => $user,
        ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
    
    // Mostrar formulario para asignar Rol
    public function assign_role(User $user)
    {
        return view('theme.backoffice.pages.user.assign_role',[
            'user' => $user,
            'roles' => Role::all(),
        ]);
    }

    // Permite asignar los roles en la tabla Pivote de la DB
    public function role_assigment(Request $request, User $user)
    {  
        //sincroniza los Roles del User por medio de la tabla Pivote "role_user"
        $user->role_assigment( $request);
        return redirect()->route('backoffice.user.show', $user);
    }

    //mostrar el formulario y asignar Permisos
    public function assign_permission(User $user)
    {
        return view('theme.backoffice.pages.user.assign_permission',[
           'user' =>  $user,
           'roles' => $user->roles
        ]);
    }

    //Asignar permisos en la tabla Pivote de la DB
    public function permission_assignment(Request $request, User $user)
    {
        $user->permissions()->sync($request->permissions);
        toast('Permisos Asignados!','success', 'top-right');
        return redirect()->route('backoffice.user.show', $user);
    }
}
