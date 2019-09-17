@extends('theme.backoffice.layouts.admin')

@section('title', 'Editar Rol:'. $role->name)

@section('head')

@section('breadcumbs')
    <li><a href="{{ route('backoffice.role.index')}}" >Roles del Sistema</a></li>
    <li><a href="{{ route('backoffice.role.show', $role) }}">{{$role->name}}</a></li>
    <li>Edicion de Rol</li>
@endsection

@endsection

@section('content')
    <div class="section">
    <p class="caption">Editar los datos del Rol: {{$role->name}}</p>
         <div class="divider"></div>
        <div id="basic-form" class="section">
            <div class="row">
                <div class="col s12 m8 offset-m2">
                    <div class="card">
                        <div class="card-content">
                            <h4 class="card_title">Editar Rol</h4>
                            <div class="row">
                                <form class="col s12" method="post" action="{{ route('backoffice.role.update', $role) }}">
                                    @csrf
                                    {{ method_field('PUT') }} {{--  ya que el FORM no puede pasr PUT --}}
                                    <div class="row">
                                        <div class="input-field col s12">                                       
                                            <input id="name" type="text" name="name" value={{$role->name}}> 
                                            <label for="name">Nombre del Rol</label>
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong style="color:red">{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif                                         
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <textarea id="description" class="materialize-textarea" name="description">{{$role->description}}</textarea> 
                                            <label for="description">Descripcion del Rol</label>
                                            @if ($errors->has('description'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong style="color:red">{{ $errors->first('description') }}</strong>
                                                </span>
                                            @endif                                            
                                        </div>
                                    {{-- </div> --}}
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <button class="btn waves-effect waves-light right" type="submit" >Actualizar
                                                    <i class="material-icons right">send</i>
                                                </button>
                                            </div>
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