@extends('theme.backoffice.layouts.admin')

@section('title', 'Crear Especialidad')

@section('head')

@endsection

@section('breadcumbs')
    <li><a href="{{ route('backoffice.speciality.index')}}" >Especialidades Médicas</a></li>
    <li><a href="" class="active">Crear Especialidad</a></li>
@endsection

@section('content')
    <div class="section">
         <p class="caption">Introduce los datos para una nueva Especialidad Médica.</p>
         <div class="divider"></div>
        <div class="section">
            <div class="row">
                <div class="col s12 m8 offset-m2">
                    <div class="card">
                        <div class="card-content">
                            <h4 class="card_title">Crear Especialidad</h4>
                            <div class="row">
                                <form class="col s12" method="post" action="{{ route('backoffice.speciality.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="input-field col s12">                                       
                                            <input id="name" type="text" name="name"> 
                                            <label for="name">Nombre de la Especialidad</label>
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong style="color:red">{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif                                         
                                        </div>
                                    </div>
                                    
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <button class="btn waves-effect waves-light right" type="submit" >Guardar
                                                    <i class="material-icons right">send</i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>                    
    
                    
    
@endsection

@section('foot')

@endsection