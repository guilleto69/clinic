@extends('theme.backoffice.layouts.admin')

@section('title', 'Editar Usuario'. $user->name)

@section('head')

@endsection

@section('breadcumbs')
    <li><a href="{{ route('backoffice.user.index')}}" >Usuarios del Sistema</a></li>
<li>Editar {{ $user->name}}</li>
@endsection

@section('content')
    <div class="section">
         <p class="caption">Actualiza los datos del Usuario.</p>
         <div class="divider"></div>
        <div class="section">
            <div class="row">
                <div class="col s12 m8 offset-m2">
                    <div class="card">
                        <div class="card-content">
                            <h4 class="card_title">Editar Usuario</h4>
                            <div class="row">
                                <form class="col s12" method="post" action="{{ route('backoffice.user.update', $user) }}">
                                    @csrf
                                    {{ method_field('PUT') }}
                                    
                                    <div class="row">
                                        <div class="input-field col s12">                                       
                                            <input id="name" type="text" name="name" value="{{ $user->name }}"> 
                                            <label for="name">Nombre del Usuario</label>
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong style="color:red">{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif                                         
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">                                       
                                            <input id="dob" type="date" name="dob" value="{{ $user->dob->format('Y-m-d') }}">                                            
                                            @if ($errors->has('dob'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong style="color:red">{{ $errors->first('dob') }}</strong>
                                                </span>
                                            @endif                                         
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">                                       
                                            <input id="email" type="email"name="email" value="{{$user->email}}"> 
                                            <label for="email">Correo Electronico:</label>
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong style="color:red">{{ $errors->first('email') }}</strong>
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