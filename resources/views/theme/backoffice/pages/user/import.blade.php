@extends('theme.backoffice.layouts.admin')

@section('title', 'Importar Usuarios')

@section('head')

@endsection

@section('breadcumbs')
    <li><a href="{{ route('backoffice.user.index')}}" >Importar Usuarios</a></li>
    <li>Importar Usuarios</li>
@endsection

@section('content')
    <div class="section">
         <p class="caption">Selecciona el Archivo Excel.</p>
         <div class="divider"></div>
        <div class="section">
            <div class="row">
                <div class="col s12 m8 offset-m2">
                    <div class="card">
                        <div class="card-content">
                            <h4 class="card_title">Importar Usuarios</h4>
                            <div class="row">
                                <form class="col s12" method="post" 
                                    action="{{ route('backoffice.user.make_import') }}" 
                                    enctype="multipart/form-data">
                                    @csrf
                                    
                                    <div class="row">
                                        <div class="input-field col s12"> 
                                            <input type="file" name="excel" required="">                                                                                                                         
                                            @if ($errors->has('excel'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong style="color:red">{{ $errors->first('excel') }}</strong>
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