<?php

namespace App\Http\Controllers;

use App\Http\Requests\Permission\StoreRequest;
use App\Http\Requests\Permission\UpdateRequest;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
   
    public function index()
    {
        return view('theme.backoffice.pages.permission.index', [
            'permissions'=>  Permission::all(),
        ]);
    }

    public function create()
    {   /* para pasar al SELECT de la Vista */
        return view('theme.backoffice.pages.permission.create',[
            'roles'=> Role::all(), 
        ]);
    }

    public function store(StoreRequest $request, Permission $permission)
    {
        $permission = $permission->store($request);        
        return redirect()->route('backoffice.permission.show', $permission);
    }
   
    public function show(Permission $permission)
    {
        return view('theme.backoffice.pages.permission.show', [
            'permission'=>  $permission,
        ]);
    }

    public function edit(Permission $permission)
    {
        return view('theme.backoffice.pages.permission.edit', [
            'permission'=>  $permission,
            'roles'=> Role::all(), 
        ]);
    }

    public function update(UpdateRequest $request, Permission $permission)
    {
        $permission->my_update($request);
        return redirect()->route('backoffice.permission.show', $permission);
    }
    
    public function destroy(Permission $permission)
    {
        $role = $permission->role;
        $permission->delete();
        toast('Permiso Eliminado!','success', 'top-right');
        return redirect()->route('backoffice.role.show', $role);
    }
}
