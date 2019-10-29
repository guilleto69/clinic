@extends('theme.frontoffice.layouts.main')

@section('title', 'Agendar una Cita') 

@section('head')   
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontofficce/Plugins/Pickadate/themes/default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontofficce/Plugins/Pickadate/themes/default.date.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontofficce/Plugins/Pickadate/themes/default.time.css')}}">  
@endsection

@section('content')
    <div class="container">  {{-- section container --}}
        {{-- <div class="divider"></div> --}}
        {{-- <div id="basic-form" class="section"> --}}  
            <div class="row">
                {{-- Barra navegacion Izquerda --}}
                @include('theme.frontoffice.pages.user.patient.includes.nav')

                {{-- Seccion Principal --}}
                <div class="col s12 m8">
                    <div class="card">                    
                        <div class="card-content">
                            <span class="card-title">@yield('title')</span>
                          
                            @include('theme.includes.user.patient.schedule_form',[
                                'route' => route('frontoffice.patient.store_schedule')
                            ])
                        </div>
                    </div>
                </div>                
            {{-- </div>
        </div> --}}
    </div>
@endsection

@section('foot')

    @include('theme.includes.user.patient.schedule_foot', [
        'material_select'=> 'formSelect'
    ]) 

@endsection