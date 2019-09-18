@extends('theme.backoffice.layouts.admin')

@section('title', $role->name)

@section('head')
@endsection

@section('breadcumbs')
    <li><a href="{{ route('backoffice.role.index')}}" >Roles del Sistema</a></li>
    <li>{{ $role->name }}></li>
@endsection

@section('content')
    
    <div class="section">
        <p class="caption"><strong>Rol: </strong>{{ $role->name }}</p>
        <div class="divider"></div>
        <div id="basic-form" class="section">
            <div class="row">
                <div class="col s12 m8 offset-m2">
                    <div class="card">
                            <div class="card-content">   
                                <span class="card-title">Usuarios con el rol de: {{$role->name}}</span>
                                <p><strong>Slug: </strong>{{ $role->slug}}</p>   
                                <p><strong>Descripcion: : </strong>{{ $role->description}}</p>
                            </div>
                            <div class="card-action">
                                <a href="{{ route('backoffice.role.edit', $role) }}">Editar</a>
                                <a href="#" style="color: red" onclick="enviar_formulario()">ELIMINAR</a>
                            </div>
                    </div>
                </div>                    
            </div> 
            <div class="row">
                    <div class="col s12 m8 offset-m2">
                        <div class="card">
                                <div class="card-content">   
                                    <span class="card-title">Permisos del rol: </span>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Slug</th>
                                                <th>Descripcion</th>                                                
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                
                                        <tbody>
                                            @foreach ($permissions as $permission)
                                                <tr>
                                                <td><a href="{{ route('backoffice.permission.show', $permission) }}">{{$permission->name}}</a></td>
                                                    <td>{{$permission->slug}}</td>
                                                    <td>{{$permission->description}}</td>                                                    
                                                    <td><a href="{{route('backoffice.permission.edit', $permission) }}">Editar</a></td>
                                                </tr>
                                            @endforeach 
                                                                            
                                        </tbody>
                                    </table>
                                </div>                               
                        </div>
                    </div>                    
            </div>                           
        </div>
    </div>
    <form method="POST" action="{{ route('backoffice.role.destroy', $role) }}" name="delete_form">
        @csrf
        {{method_field('DELETE')}}
    </form>
@endsection

@section('foot')
    <script>
        function enviar_formulario()
        {
            /* document.delete_form.submit(); */            
            swal.fire({
                title:"¿Deseas Eliminar este Rol?",
                text:"Esta accion NO se puedes deshacer",
                type:"warning",
                showConfirmButton: true,
                showCancelButton: true,
                confirmButtonText: "Si, continuar",
                cancelButtonText: "No, Cancelar",
                closeOnCancel: false,
                closeOnConfirm: true               
            }).then( (result) =>
                        {                    
                        if(result.value){
                                document.delete_form.submit();
                            } else{
                                swal.fire('Operacion Cancelada',
                                    'Registro No eliminado',
                                    'error')  
                            }
                        }
                    );
        }
    </script> 
@endsection