@extends('theme.backoffice.layouts.admin')

@section('title', 'Crear Permiso')

@section('head')

@endsection

@section('breadcumbs')
    {{-- <li><a href="{{ route('backoffice.role.index')}}" >Permisos del </a></li> --}}
    <li>Crear Permiso></li>
@endsection

@section('content')
    <div class="section">
         <p class="caption">Introduce los datos para un nuevo Permiso.</p>
         <div class="divider"></div>
        <div class="section">
            <div class="row">
                <div class="col s12 m8 offset-m2">
                    <div class="card">
                        <div class="card-content">
                            <h4 class="card_title">Crear Permiso</h4>
                            <div class="row">
                                <form class="col s12" method="post" action="{{ route('backoffice.permission.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="input-field col s12">                                       
                                            <input id="name" type="text" name="name"> 
                                            <label for="name">Nombre del Permiso</label>
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong style="color:red">{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif                                         
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <select name="role_id" >
                                                <option value="" desabled="" selected="">Selecciona un Rol</option>
                                                @foreach ($roles as $rol)
                                                    <option value="{{ $rol->id}}">{{ $rol->name}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('role_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong style="color:red">{{ $errors->first('role_id') }}</strong>
                                                </span>
                                            @endif                                           
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <textarea id="description" class="materialize-textarea" name="description"></textarea> 
                                            <label for="description">Descripcion del Permiso</label>
                                            @if ($errors->has('description'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong style="color:red">{{ $errors->first('description') }}</strong>
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