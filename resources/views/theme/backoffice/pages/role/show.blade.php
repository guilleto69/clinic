@extends('theme.backoffice.layouts.admin')

@section('title', 'Hist. Clinica')

@section('head')

@endsection

@section('content')
    
    <div class="section">
        <p class="caption"><strong>Rol: </strong>{{ $role->name }}</p>
        <div class="divider"></div>
        <div id="basic-form" class="section">
            <div class="row">
                <div class="col s12 m8 offset-m2">
                    <div class="card-panel">
                    <h4 class="header2">Usuarios con el rol de: {{$role->name}}</h4>
                        <div class="row">
                            <p><strong>Slug: </strong>{{ $role->slug}}</p>   
                            <p><strong>Descripcion: : </strong>{{ $role->description}}</p>
                            <p><a href="#" style="color: red" onclick="enviar_formulario()">Eliminar</a></p> 
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