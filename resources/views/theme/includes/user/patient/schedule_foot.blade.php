<script type="text/javascript" src="{{ asset('assets/frontoffice/Plugins/Pickadate/picker.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/frontoffice/Plugins/Pickadate/legacy.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/frontoffice/Plugins/Pickadate/picker.date.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/frontoffice/Plugins/Pickadate/picker.time.js')}}"></script>

  
    <script type="text/javascript">
        $('select').{!! $material_select !!}(); //inicializa Selector  para Front o Back Office  Schedule.blade     
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
             
        var input_date= $('.datepicker').pickadate({ 
            
            monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio','Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            weekdaysShort: ["Do", "Lu", 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],

            //editable: true,
            min: true, //DesHabilita Fechas Pasadas 
            
            formatSubmit: 'yyyy-m-d',
            disable: [1 ], //deshabilita Domingos
            today: 'Hoy',
            clear: 'Borrar',
            close: 'Cerrar', 
           
        });
   
        var date_picker = input_date.pickadate('picker');  
    
    /*  //////////////////////////////////////////////////  */
    
        var input_time = $('.timepicker').pickatime({ 
            min: [7,0],
            max: [18,0],
            interval: 30,
            formatSubmit: 'HH:i',
            autoclose: true,
            //min: 1, //tiempo de traslado = 1 Interval
        });

        var time_picker = input_time.pickatime('picker'); 
    </script>
        
  {{-- ////////////////////////////////////////////////// --}}  
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
                        doctor.append('<option value="  ' +element.id + '">            '+ element.name + '</option>')
                    });
                    doctor.{!! $material_select !!}();
                }
            });
        }); 

        doctor.change(function(){
            date_picker.set({
                disable: [
                    [2019,9,30]
                ],
            });

            time_picker.set({
                min:[9,30],
                max:[21,0],
                disable:[
                    { from: [14,0], to: [15,30]},
                    [10,0],
                ],
            });
        });

    </script>