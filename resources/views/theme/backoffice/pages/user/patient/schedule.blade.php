@extends('theme.backoffice.layouts.admin')

@section('title', $user->name)

@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backoffice/Plugins/Pickadate/themes/default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backoffice/Plugins/Pickadate/themes/default.date.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backoffice/Plugins/Pickadate/themes/default.time.css')}}">
@endsection

@section('breadcumbs')
    <li><a href="{{ route('backoffice.user.index')}}" >Usuarios del Sistema</a></li>
    <li>{{ $user->name }}</li>
@endsection

@section('dropdown_settings')
    <li><a href="{{route('backoffice.user.edit', $user)}}" class="grey-text text-darken-2">Editar Usuario</a></li>
@endsection

@section('content')
    
    <div class="section">
        <p class="caption"><strong>Usuario: </strong>{{ $user->name }}</p>
        <div class="divider"></div>
        <div id="basic-form" class="section">
            <div class="row">
              
                <div class="col s12 m8">
                <div class="card">                    
                     <div class="card-content">
                         <span class="card-title">@yield('title')</span>
                         <form action="#" method="POST">
                             @csrf
                             
                            <div class="row">
                                 <div class="input-field col s12">
                                     <i class="material-icons prefix">local_hospital</i>
                                     <select name="doctor" >
                                         <option value="1">Internista 2</option>
                                         <option value="2">Ortopedista</option>
                                         <option value="3">Fisioterapeuta</option>
                                     </select>
                                     <label for="">Selecciona la Especialidad</label>
                                 </div>
                             </div>
 
                             <div class="row">
                                 <div class="input-field col s12">
                                     <i class="material-icons prefix">assignment_ind</i>
                                     <select name="doctor" >
                                         <option value="1">doc 1</option>
                                         <option value="2">doc 2</option>
                                         <option value="3">doc 3</option>
                                     </select>
                                     <label for="">Selecciona al Doctor</label>
                                 </div>
                             </div>
 
                             <div class="row">                                                        
                                 <div class="input-field col s12 m6" position= "relative">
                                     <i class="material-icons prefix">today</i>
                                     <input id="datepicker" type="text" name="date" class="datepicker" placeholder="Selecciona una Fecha" >
                                     {{-- <label for="datepicker">Selecciona una Fecha</label> --}}                           
                                </div>
                             
                                 <div class="input-field col s12 m6" position= "relative">
                                     <i class="material-icons prefix">access_time</i>
                                     <input id="timepicker" type="text" name="time" class="timepicker" placeholder="Selecciona una Hora">
                                     {{-- <label for="timepicker">Selecciona una Hora</label> --}}
                                 </div> 
                             </div>
                         
                             <div class="row">
                                 <button class="btn waves-effect weves-light" type="submit">
                                     Agendar  <i class="material-icons right">send</i>
                                 </button>
                             </div>
                         </form>                        
                     </div>
                </div>
             </div>

                <div class="col s12 m4 ">
                    {{-- Barra navegacion Derecha --}}
                    @include('theme.backoffice.pages.user.includes.user_nav')
                 </div>                 
            </div>                                        
        </div>
    </div>
    <form method="POST" action="{{ route('backoffice.user.destroy', $user) }}" name="delete_form">
        @csrf
        {{method_field('DELETE')}}
    </form>
@endsection

@section('foot')
    {{-- <script>
        function enviar_formulario()
        {
            /* document.delete_form.submit(); */            
            swal.fire({
                title:"¿Deseas Eliminar este Usuaario?",
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
    </script>  --}}

<script type="text/javascript" src="{{ asset('assets/backoffice/Plugins/Pickadate/picker.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/backoffice/Plugins/Pickadate/legacy.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/backoffice/Plugins/Pickadate/picker.date.js')}}"></script> 
<script type="text/javascript" src="{{ asset('assets/backoffice/Plugins/Pickadate/picker.time.js')}}"></script>
<script type="text/javascript">
    $('select').formSelect(); //inicializa Selector        
</script>
{{-- ////////////////////////////////////////////////////////// --}}
<script>
    $('.datepicker').pickadate({
        monthsFull: ['Enero', 'Febrero', 'Marz', 'Abril', 'Mayo', 'Junio', 'Julio',
         'Augosto', 'Septimbre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        weekdaysShort: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
        /* showMonthsShort: , */

        format: 'mmm d, yyyy',

        today: 'Hoy',
        clear: 'Borrar',
        close: 'Cerrar',

        disable: [1 ],

        labelMonthNext: 'SIGIENTE Mes',
        labelMonthPrev: 'Mes ANTERIOR',
    });
    
</script>   
{{-- ////////////////////////////////////////////////// --}}


<script>
  
    var input_time = $('.timepicker').pickatime({
        min: [7,0],
        max: [18,0],
        interval: 15,
        //min: 1, //tiempo de traslado = 1 Interval
    });
    var time_picker = input_time.pickatime('picker');

    /* time_picker.set('disable', [4

    ]); */
</script>

@endsection