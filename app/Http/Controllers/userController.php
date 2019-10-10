<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\ChangePasswordRequest;
use App\Role;
use App\User;

use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index()
    {
        $this->authorize('index', User::class);
        return view ('theme.backoffice.pages.user.index',[
            'users'=> User::all(),
        ]);
    }

    public function create()
    {
        $this->authorize('create', User::class);
        return view('theme.backoffice.pages.user.create',
            ['roles' => Role::all(),
            ]
        );
    }

    public function store(StoreRequest $request, User $user)
    {
       $user-> store($request);
       return redirect()->route('backoffice.user.show', $user);
    }

    public function show(User $user)
    {
        $this->authorize('view', $user);
        return view('theme.backoffice.pages.user.show',[
            'user' => $user,
        ]);
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);
        $view = ( isset($_GET['view']) ) ? $_GET['view'] : null;
        return view($user->edit_view($view),[
            'user' => $user,
        ]);
    }

    public function update(UpdateRequest $request, User $user)
    {
       $user->my_update($request);
       $view = ( isset($_GET['view']) ) ? $_GET['view'] : null;
       return redirect()->route($user->user_show(), $user);
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', $user);
        $user->delete();
        toast('Usuario Borrado!','success', 'top-right');
        return redirect()->route('backoffice.user.index');
    }
    
    // Mostrar formulario para asignar Rol
    public function assign_role(User $user)
    {
        $this->authorize('assign_role', $user);
        return view('theme.backoffice.pages.user.assign_role',[
            'user' => $user,
            'roles' => Role::all(),
        ]);
    }

    // Permite asignar los roles en la tabla Pivote de la DB
    public function role_assigment(Request $request, User $user)
    {  
        $this->authorize('assign_role', $user);
        //sincroniza los Roles del User por medio de la tabla Pivote "role_user"
        $user->role_assigment( $request);
        return redirect()->route('backoffice.user.show', $user);
    }

    //mostrar el formulario y asignar Permisos
    public function assign_permission(User $user)
    {
        $this->authorize('assign_permission', $user);
        return view('theme.backoffice.pages.user.assign_permission',[
           'user' =>  $user,
           'roles' => $user->roles
        ]);
    }

    //Asignar permisos en la tabla Pivote de la DB
    public function permission_assignment(Request $request, User $user)
    {
        $this->authorize('assign_permission', $user);
        $user->permissions()->sync($request->permissions);
        toast('Permisos Asignados!','success', 'top-right');
        return redirect()->route('backoffice.user.show', $user);
    }

    //metodo de mostrar formulario para importar usuarios
    public function import( )
    {
        $this->authorize('import', $user);
        return view('theme.backoffice.pages.user.import');
    }

    // Importar Usuarios desde hoja Excel
    public function make_import(Request $request)
    {
        $this->authorize('import', $user);
        Excel::import( new UsersImport, $request->file('excel') );
        return redirect()->route('backoffice.user.index');
        toast('Usuarios Importados!','success', 'top-right');
    }

    public function profile()
    {
        $user = auth()->user();
        return view('theme.frontoffice.pages.user.profile',
        [
           'user' => $user, 
        ]);
    }

    public function edit_password()
    {
        $this->authorize( 'update_password', auth()->user() );
        return view('theme.frontoffice.pages.user.edit_password');
    }

    public function change_password(ChangePasswordRequest $request)
    {
        $request->user()->password = Hash::make($request->password);
        $request->user()->save();
        toast('Contraseña Actualizada','success', 'top-right');
        return redirect()->back();
    }

}
