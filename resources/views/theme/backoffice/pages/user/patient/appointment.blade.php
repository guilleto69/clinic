@extends('theme.backoffice.layouts.admin')

@section('title', 'Citas de: ' . $user->name)

@section('head')

@endsection

@section('breadcumbs')

<li><a href="{{route('backoffice.user.index')}}" >Usuarios del Sistema</a></li>
<li><a href="{{route('backoffice.user.show', $user)}}" >{{ $user->name }}</a></li>
<li><a href="{{route('backoffice.patient.appointments', $user)}}" >{{'Citas de: ' . $user->name }}</a></li>
@endsection


@section('dropdown_settings')
    <li><a href="{{route('backoffice.patient.schedule', $user)}}" 
        class="grey-text text-darken-2">Agendar nueva Cita</a></li>
    
    @endsection

@section('content')
    
    <div class="section">
    <p class="caption"><strong>{{'Citas de: ' . $user->name }}</p>
        <div class="divider">
        </div>        
        <div id="basic-form" class="section">
            <div class="row">
                <div class="col s12 m8">
                    <div class="card">                    
                        <div class="card-content">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Dia</th>
                                        <th>Hora</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                        
                                <tbody>
                                    <td>754</td>
                                    <td> 25/02/2019</td>
                                    <td>15:00</td>
                                    <td>En Progreso</td>
                                    <td><a href="">Editar</a></td>
                                    {{-- @foreach ($collection as $item)
                                        
                                    @endforeach  --}}                              
                                </tbody>
                            </table>    
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

@endsection