@extends('theme.backoffice.layouts.admin')

@section('title', 'Crear Role')

@section('head')

@endsection

@section('content')
    <div class="section">
         <p class="caption">Introduce los datos para un nuevo Rol.</p>
         <div class="divider">
         </div>
        <div id="basic-form" class="section">
            <div class="row">
                <div class="col s12 m8 offset-m2">
                    <div class="card-panel">
                        <h4 class="header2">Crear Rol</h4>
                        <div class="row">
                            <form class="col s12" method="post" action="{{ route('backoffice.role.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="input-field col s12">                                       
                                        <input id="name" type="text" name="name"> 
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
                                        <textarea id="description" class="materialize-textarea" name="description"></textarea> 
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
                                            <button class="btn waves-effect waves-light right" type="submit" >Guardar
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
@endsection

@section('foot')

@endsection