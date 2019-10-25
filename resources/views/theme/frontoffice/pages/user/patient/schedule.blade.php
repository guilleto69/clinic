@extends('theme.frontoffice.layouts.main')

@section('title', 'Agendar una Cita') 

@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontofficce/Plugins/Pickadate/themes/default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontofficce/Plugins/Pickadate/themes/default.date.css')}}">
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
                                    <select id="speciality" name="doctor" >
                                        <option disabled="" selected="">-- Selecciona una Especialidad --</option>
                                        @foreach ($specialities as $speciality)
                                            <option value="{{ $speciality->id}}">
                                                {{ $speciality->name}}</option>
                                        @endforeach
                                    </select>
                                    <label for="">Selecciona la Especialidad</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">assignment_ind</i>
                                    <select id="doctor" name="doctor" >
                                            <option disabled="" selected="">-- Selecciona una Especialidad Primero --</option>
                                        
                                    </select>
                                    <label for="">Selecciona al Doctor</label>
                                </div>
                            </div>

                            <div class="row">                                                        
                                <div class="input-field col s12 m6"  position= "relative">
                                    <i class="material-icons prefix">today</i>
                                    <input id="datepicker" type="text" name="date" class="datepicker" placeholder="Selecciona una Fecha">
                                    <label for="datepicker">Selecciona una Fecha</label>
                                    
                                </div>
                            
                                <div class="input-field col s12 m6">
                                    <i class="material-icons prefix">access_time</i>
                                    <input id="timepicker" type="text" name="time" class="timepicker" placeholder="Selecciona una Hora">
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
    <script type="text/javascript" src="{{ asset('assets/frontoffice/Plugins/Pickadate/picker.date.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/frontoffice/Plugins/Pickadate/picker.time.js')}}"></script>

    <script type="text/javascript">
        $('select').formSelect(); //inicializa Selector        
    </script>
   


<script>
    function enviar_formulario()
    {
        /* document.delete_form.submit(); */            
        swal.fire({
            title:"¿Deseas Eliminar esta Cita?",
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


{{-- ////////////////////////////////////////////////////////// --}}
<script>
        var input_date= $('.datepicker').pickadate({ //datepicker
            /* min: true, //Des Habilita Fechas Pasadas */
            /* selectMonths: true, */
            
            monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio',
            'Augosto', 'Septimbre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            weekdaysShort: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
            
            editable: true,
            
            format: 'mmm d, yyyy',

            disable: [1 ],

            today: 'Hoy',
            clear: 'Borrar',
            close: 'Cerrar',
           
            

            /* selectMonths: true,
            labelMonthSelect: 'Seleccione el Mes',
            labelMonthNext: 'SIGIENTE Mes',
            labelMonthPrev: 'Mes ANTERIOR', */

        });
   
        var date_picker = input_date.pickadate('picker');  
    </script>
         
    <script>
    /*  //////////////////////////////////////////////////  */
    
        var input_time = $('.timepicker').pickatime({
            min: [7,0],
            max: [18,0],
            interval: 15,
            //min: 1, //tiempo de traslado = 1 Interval
        });

        var time_picker = input_time.pickatime('picker');

    </script>
        
  //////////////////////////////////////////////////  
    <script>
         var speciality = $('#speciality');
        var doctor = $('#doctor');

        speciality.change(function(){
            $.ajax({
                url: "{{ route('ajax.user_speciality') }}",
                method: 'GET',
                data: {
                    speciality: speciality.val(),
                },
                success: function(data){
                    doctor.empty();
                    doctor.append('<option disabled= "selected">-- Selecciona un Medico --</option>');
                    
                    $.each(data, function(index,element){
                        doctor.append('<option value="' +element.id + '"> '+ element.name + '</option>')
                    });
                    doctor.formSelect();
                }
            });
        }); 
    </script>
    
@endsection