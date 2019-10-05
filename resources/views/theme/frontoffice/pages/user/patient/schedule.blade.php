
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
                                    <input id="datepicker" type="text" name="date" class="datepicker">
                                    <label for="datepicker">Selecciona una Fecha</label>
                                </div>
                            
                                <div class="input-field col s12 m6">
                                    <i class="material-icons prefix">access_time</i>
                                    <input id="timepicker" type="text" name="time" class="timepicker">
                                    <label for="timepicker">Selecciona una Hora</label>
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
    {{-- <script type="text/javascript" src="{{ asset('assets/frotoffice/Plugins/Pickadate/picker.date.js')}}"></script> --}}
    <script type="text/javascript" src="{{ asset('assets/frontoffice/Plugins/Pickadate/picker.time.js')}}"></script>
    <script type="text/javascript">
        $('select').formSelect(); //inicializa Selector        
        
        $(document).ready(function(){
            $('.datepicker').datepicker({
                i18n: {
                    cancel: 'Cancelar',
                    clear: 'Borrar ',
                    done: 'Continuar',
                    months: ['Enero', 'Febrero', 'Marzo', 'Abril',
                        'Mayo', 'Junio', 'Julio', 'Agosto', 
                        'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],                                        
                    monthsShort: ['Ene', 'Feb', 'Mar', 'Abr','May', 'Jun', 
                        'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                    
                    weekdaysAbbrev: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],                    
                    weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
                    weekdays: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 
                        'Jueves', 'Viernes', 'Sabado'],                    
                },

                /* disableDayFn:function (date) {

                    /* return date.getDay() == 0 ; 

                    let disableListDate = [ new Date('2019,10,11').toDateString(),
                                        new Date('2019,10,21').toDateString()
                                    ];

                    if(disableListDate.includes(date.toDateString())) {
                        return true
                    }else{
                        return false
                    }

                }, */
                
                format: "dd/mm/yyyy",
                showClearBtn:true,
                /* disableWeekends: true, */ //deshabilita Fines de Semana Sab y Dom                                                               
                 disableDayFn: function(date) { //OK
                    return date.getDay() == 0 ; //Deshabilita dia 0, Domingo 
                }, 

                //disable :[0, {from: [15/10/2019], to: [25/10/2019]} ], //NO funciona

                /* events:[], */
            });
        });

       
            $('.timepicker').pickatime({ //PICKATIME
                
               disable :[ ], 
            });
               
                            
    </script>
@endsection