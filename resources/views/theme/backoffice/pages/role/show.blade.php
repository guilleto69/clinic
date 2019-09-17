@extends('theme.backoffice.layouts.admin')

@section('title', 'Hist. Clinica')

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