@extends('theme.backoffice.layouts.admin')

@section('title', $speciality->name)

@section('head')
@endsection

@section('breadcumbs')
    <li><a href="{{ route('backoffice.speciality.index')}}" >Especialidades Médicas</a></li>
    <li><a href="" class="active">{{ $speciality->name }}</a></li>
@endsection

@section('dropdown_settings')
    <li><a href="{{ route('backoffice.speciality.edit', $speciality)}}" class="grey-text text-darken-2">Editar Especialidad
      </a>
  </li>
@endsection

@section('content')
    
    <div class="section">
        <p class="caption"><strong>Especialidad: </strong>{{ $speciality->name }}</p>
        <div class="divider"></div>
        <div id="basic-form" class="section">
            <div class="row">
                <div class="col s12 m8 offset-m2">
                    <div class="card">
                            <div class="card-content">   
                                <span class="card-title"> {{$speciality->name}}</span>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Correo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @forelse ($users as $user)
                                          <tr>
                                            <td> {{$user->id}}  </td>                   <td>
                                            <a href="{{ route('backoffice.user.show' ,$user)}}" target="_blanck"> {{$user->name}}
                                            </a>
                                            </td>  
                                            <td>
                                                {{$user->email}}
                                            </td>                                            
                                          </tr>
                                      @empty
                                          <tr>
                                            <td colspan="3">No Hay medicos Registrados</td>
                                          </tr>
                                      @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-action">
                                <a href="{{ route('backoffice.speciality.edit', $speciality) }}">Editar</a>
                                <a href="#" style="color: red" onclick="enviar_formulario()">ELIMINAR</a>
                            </div>
                    </div>
                </div>                    
            </div> 
                                     
        </div>
    </div>
    <form method="POST" action="{{ route('backoffice.speciality.destroy', $speciality) }}" name="delete_form">
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
                title:"¿Deseas Eliminar esta Especialidad?",
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