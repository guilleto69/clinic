@extends('theme.frontoffice.layouts.main')

@section('title', 'Mis Citas')    

@section('head')
@endsection

@section('nav')
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
                    <table>
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Especialista</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Estado</th> {{-- Finalizado, Pendiente, Pagado... --}}
                            </tr>
                        </thead>

                        <tbody>
                            <td>1</td>
                            <td>Guille</td>
                            <td>10 de Oct 2019</td>
                            <td>15:30</td>
                            <td>Pendiente</td>                            
                        </tbody>
                    </table>
                
                </div>
           </div>
        </div>
    </div>
</div>
@endsection

@section('foot')
@endsection