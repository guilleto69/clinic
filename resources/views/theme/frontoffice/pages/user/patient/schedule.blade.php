
@extends('theme.frontoffice.layouts.main')

@section('title', 'Agendar una Cita') 

@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontofficce/Plugins/Pickadate/themes/default.css')}}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontofficce/Plugins/Pickadate/themes/default.date.css')}}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontofficce/Plugins/Pickadate/themes/default.time.css')}}">
@endsection


@section('content')
    <div class="container">
        <div class="row">
            @include('theme.frontoffice.pages.user.patient.includes.nav')

            {{-- Seccion Principal --}}
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
                                        <option value="1">Internista</option>
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
                                <div class="input-field col s12 m6">
                                    <i class="material-icons prefix">today</i>
                                    <input id="datepicker" type="text" name="date" class="datepicker" placeholder="Selecciona una Fecha">
                                    {{-- <label for="datepicker">Selecciona una Fecha</label> --}}
                                    {{-- placeholder="Selecciona una Fecha" --}}
                                </div>
                            
                                <div class="input-field col s12 m6">
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
        </div>
    </div>
@endsection


@section('foot')
    <script type="text/javascript" src="{{ asset('assets/frontoffice/Plugins/Pickadate/picker.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/frontoffice/Plugins/Pickadate/legacy.js')}}"></script>
    {{-- <script type="text/javascript" src="{{ asset('assets/frontoffice/Plugins/Pickadate/picker.date.js')}}"></script> --}}
    <script type="text/javascript" src="{{ asset('assets/frontoffice/Plugins/Pickadate/picker.time.js')}}"></script>
    <script type="text/javascript">
        $('select').formSelect(); //inicializa Selector        
    </script>
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