@extends('theme.backoffice.layouts.admin')

@section('title', 'Agendar Cita Para: ' . $user->name)

@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backoffice/Plugins/Pickadate/themes/default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backoffice/Plugins/Pickadate/themes/default.date.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backoffice/Plugins/Pickadate/themes/default.time.css')}}">
@endsection

@section('breadcumbs')
    <li><a href="{{ route('backoffice.user.index')}}" >Usuarios del Sistema</a></li>
<li><a href="{{ route('backoffice.user.show', $user)}}">{{ $user->name}}</a></li>
    <li><a href="">Agendar Cita</a></li>
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
                             
                             @if(Auth::user()->has_role(config('app.doctor_role')))
                                <input   type="hidden" name="speciality" value="">            <input   type="hidden" name="doctor" value="{{ Auth::id()}}">          
                                
                            @else
                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">local_hospital</i>
                                        <select name="speciality" >
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
                            @endif
 
                             <div class="row">                                                        
                                 <div class="input-field col s12 m6" position= "relative">
                                     <i class="material-icons prefix">today</i>
                                     <input id="datepicker" type="text" name="date" 
                                        class="datepicker" placeholder="Selecciona una Fecha" >
                                     {{-- <label for="datepicker">Selecciona una Fecha</label> --}}                           
                                </div>
                             
                                 <div class="input-field col s12 m6" position= "relative">
                                     <i class="material-icons prefix">access_time</i>
                                     <input id="timepicker" type="text" name="time" 
                                        class="timepicker" placeholder="Selecciona una Hora">
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
    
@endsection

@section('foot')

    <script type="text/javascript" src="{{ asset('assets/backoffice/Plugins/Pickadate/picker.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/backoffice/Plugins/Pickadate/legacy.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/backoffice/Plugins/Pickadate/picker.date.js')}}"></script> 
    <script type="text/javascript" src="{{ asset('assets/backoffice/Plugins/Pickadate/picker.time.js')}}"></script>
   
    {{-- ////////////////////////////////////////////////////////// --}}
    <script>
        var input_date= $('.datepicker').pickadate({
            min: true, //Des Habilita Fechas Pasadas
            monthsFull: ['Enero', 'Febrero', 'Marz', 'Abril', 'Mayo', 'Junio', 'Julio',
            'Augosto', 'Septimbre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            weekdaysShort: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
            
            format: 'mmm d, yyyy',

            today: 'Hoy',
            clear: 'Borrar',
            close: 'Cerrar',

            disable: [1 ],

            labelMonthNext: 'SIGIENTE Mes',
            labelMonthPrev: 'Mes ANTERIOR',
        });

        var date_picker = input_date.pickadate('picker');       
      
    {{-- ////////////////////////////////////////////////// --}}
    
        var input_time = $('.timepicker').pickatime({
            min: [7,0],
            max: [18,0],
            interval: 15,
            //min: 1, //tiempo de traslado = 1 Interval
        });

        var time_picker = input_time.pickatime('picker');
        
    </script>

@endsection