@extends('theme.backoffice.layouts.admin')

@section('title', 'Citas Programadas ')

@section('head')
  <link href='{{asset('assets/plugins/fullcalendar/packages/core/main.css')}}' rel='stylesheet' />
  <link href='{{asset('assets/plugins/fullcalendar/packages/daygrid/main.css')}}' rel='stylesheet' />
  <link href='{{asset('assets/plugins/fullcalendar/packages/timegrid/main.css')}}' rel='stylesheet' />
  
@endsection

@section('breadcumbs')

<li><a href="#" >Citas Programadas</a></li>

@endsection


@section('dropdown_settings')
    {{-- <li><a href="" 
        class="grey-text text-darken-2"></a></li> --}}
    
    @endsection

@section('content')
    
    <div class="section">                         
        <div class="row">
          <div class="col s12">
            <div class="card-content">
              <div class="card-title">
 
                 <div id="calendar"></div> {{-- Caldendadio de FullCalendar inicializado en "calendar" --}}
              </div>
            </div>
          </div>

        </div>
    </div>
@endsection

@section('foot')
  <script src='{{asset('assets/plugins/fullcalendar/packages/core/main.min.js')}}'></script>
  <script src='{{asset('assets/plugins/fullcalendar/packages/interaction/main.js')}}'></script>
  <script src='{{asset('assets/plugins/fullcalendar/packages/daygrid/main.js')}}'></script>
  <script src='{{asset('assets/plugins/fullcalendar/packages/timegrid/main.js')}}'></script>
  <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar'); //'calendar' id de section

        var calendar = new FullCalendar.Calendar(calendarEl, { //'calendar' id de section
          plugins: [ 'interaction','dayGrid', 'timeGrid' ],
          header: {
              left: 'prev, next, today',
              center: 'title',
              right: 'dayGridMonth, timeGridWeek, timeGridDay'
          },
          /* defaultDate: '2019-10-10', */
          editable: false,
          eventLimit: true,
          events:
            {!! $appointments !!}
          
        });

        calendar.render();
      });

    </script>
@endsection