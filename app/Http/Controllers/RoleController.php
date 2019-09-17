<?php

namespace App\Http\Controllers;

use App\Http\Requests\Role\StoreRequest;
use App\Http\Requests\Role\UpdateRequest;
use App\Role;


use Illuminate\Http\Request;

class RoleController extends Controller
{
    
    public function index()
    {                
        return view('theme.backoffice.pages.role.index', [
            'roles' => Role::all(),
        ]);
    }

    public function create()
    {
       return view('theme.backoffice.pages.role.create');
    }

    public function store(StoreRequest $request, Role $role)
    {
        $role = $role->store($request);
        return redirect()->route('backoffice.role.show', $role);
    }
 
    public function show(Role $role)
    {
        return view('theme.backoffice.pages.role.show', [
            'role'=>  $role,
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
        $role->delete();
        alert('Exito!', 'Rol Eliminado','success')->showConfirmButton();
        return redirect()->route('backoffice.role.index');
    }
}
