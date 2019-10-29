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
                          
                         @include('theme.includes.user.patient.schedule_form',
                         ['route'=> route('backoffice.patient.store_back_schedule',$user)
                         ])

                     </div>
                </div>
             </div>

                <div class="col s12 m4 ">
                    {{-- Barra navegacion Izquierda --}}
                    @include('theme.backoffice.pages.user.includes.user_nav')
                </div>                 
            </div>                                        
        </div>
    </div>
    
@endsection

@section('foot')
    
    @include('theme.includes.user.patient.schedule_foot',[
        'material_select' => 'material_select'
    ])

    {{-- <script type="text/javascript" src="{{ asset('assets/backoffice/Plugins/Pickadate/picker.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/backoffice/Plugins/Pickadate/legacy.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/backoffice/Plugins/Pickadate/picker.date.js')}}"></script> 
    <script type="text/javascript" src="{{ asset('assets/backoffice/Plugins/Pickadate/picker.time.js')}}"></script>
   
    {{-- ////////////////////////////////////////////////////////// 
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
            disable: [
                    [2019,9,30]
                ],

            labelMonthNext: 'SIGIENTE Mes',
            labelMonthPrev: 'Mes ANTERIOR',
        });

        var date_picker = input_date.pickadate('picker');       
      
     ////////////////////////////////////////////////// 
    
        var input_time = $('.timepicker').pickatime({
            min: [7,0],
            max: [18,0],
            interval: 30,
            disable:[
                    { from: [14,0], to: [15,30]},
                    [10,0],
                ],
            //min: 1, //tiempo de traslado = 1 Interval
        });

        var time_picker = input_time.pickatime('picker');
        
    </script> --}}

@endsection