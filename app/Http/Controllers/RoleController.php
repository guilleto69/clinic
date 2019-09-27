<?php

namespace App\Http\Controllers;

use App\Http\Requests\Role\StoreRequest;
use App\Http\Requests\Role\UpdateRequest;
use App\Role;


use Illuminate\Http\Request;

class RoleController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('role:' . config('app.admin_role'));
    }

    public function index()
    {     
        $this->authorize('index',Role::class);           
        return view('theme.backoffice.pages.role.index', [
            'roles' => Role::all(),
        ]);
    }

    public function create()
    {
        $this->authorize('create',Role::class);
        return view('theme.backoffice.pages.role.create');
    }

    public function store(StoreRequest $request, Role $role)
    {
        $role = $role->store($request);
        return redirect()->route('backoffice.role.show', $role);
    }
 
    public function show(Role $role)
    {
        $this->authorize('view',$role);
        return view('theme.backoffice.pages.role.show', [
            'role'=>  $role,
            'permissions' => $role->permissions
        ]);
    }
  
    public function edit(Role $role)
    {
        return view('theme.backoffice.pages.role.edit', [
            'role'=>  $role,
        ]);
    }
 
    public function update(UpdateRequest $request, Role $role)
    {
        $role->my_update($request); /* Definido en Role */
        return redirect()->route('backoffice.role.show', $role);

    }

    public function destroy(Role $role)
    {
        $this->authorize('delete', $role);
        $role->delete();
        toast('Rol Eliminado!','success', 'top-right');       
        return redirect()->route('backoffice.role.index');
    }
}
