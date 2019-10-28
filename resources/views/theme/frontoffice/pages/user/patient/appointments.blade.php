
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
                                <th>Estado</th> {{-- Finalizado, Pendiente, Pagado... --}}
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($appointments as $appointment)
                                <tr>
                                    <td>{{ $appointment->id}}</td>
                                    <td>{{ $appointment->doctor()->name}}</td>
                                    <td>{{ $appointment->date->format('d/m/Y H:i')}}</td>
                                    <td>{{ $appointment->status}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan ="4"> No hay citas Registradas</td>
                                </tr>

                            @endforelse
                            
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