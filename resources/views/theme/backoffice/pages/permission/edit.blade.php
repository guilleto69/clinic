@extends('theme.backoffice.layouts.admin')

@section('title', 'Editar Permiso: '. $permission->name)

@section('head')

@section('breadcumbs')
    {{-- <li><a href="{{ route('backoffice.role.index')}}" >Permisos del Sistema</a></li>
    <li><a href="{{ route('backoffice.role.show', $role) }}">{{$role->name}}</a></li> --}}
    <li>Editar Permiso: {{ $permission->name}}</li>
@endsection

@endsection

@section('content')
    <div class="section">
    <p class="caption">Editar los datos del Permiso.</p>
         <div class="divider"></div>
        <div id="basic-form" class="section">
            <div class="row">
                <div class="col s12 m8 offset-m2">
                    <div class="card">
                        <div class="card-content">
                            <h4 class="card_title">Editar Permiso</h4>
                            <div class="row">
                                <form class="col s12" method="post" action="{{ route('backoffice.permission.update', $permission) }}">
                                    @csrf
                                    {{ method_field('PUT') }} {{--  ya que el FORM no puede pasar PUT --}}
                                    <div class="row">
                                        <div class="input-field col s12"> 
                                           {{-- {{dd($permission->name)}} --}}                                  
                                            <input id="name" type="text" name="name" value="{{$permission->name}}"> 
                                            <label for="name">Nombre del Permiso</label>
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" permission="alert">
                                                    <strong style="color:red">{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif                                         
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <textarea id="description" class="materialize-textarea" name="description">{{$permission->description}}</textarea> 
                                            <label for="description">Descripcion del Permiso</label>
                                            @if ($errors->has('description'))
                                                <span class="invalid-feedback" permission="alert">
                                                    <strong style="color:red">{{ $errors->first('description') }}</strong>
                                                </span>
                                            @endif                                            
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                             <select name="role_id" >
                                                <option value="{{ $permission->role->id}}" selected="">{{ $permission->role->name}}</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id}}">{{ $role->name}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('role_id'))
                                                <span class="invalid-feedback" permission="alert">
                                                    <strong style="color:red">{{ $errors->first('role_id') }}</strong>
                                                </span>
                                            @endif                                           
                                        </div>
                                    </div> 
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