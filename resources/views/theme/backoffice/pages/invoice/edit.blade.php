@extends('theme.backoffice.layouts.admin')

@section('title', 'Editar Factura: '. $invoice->id)

@section('head')

@section('breadcumbs')
    {{-- <li><a href="{{ route('backoffice.role.index')}}" >Permisos del Sistema</a></li>
    <li><a href="{{ route('backoffice.role.show', $role) }}">{{$role->name}}</a></li> --}}
    <li>Editar Factura: {{ $invoice->id}}</li>
@endsection

@endsection

@section('content')
    <div class="section">
    <p class="caption">Editar los datos de la Factura.</p>
         <div class="divider"></div>
        <div id="basic-form" class="section">
            <div class="row">
                <div class="col s12 m8 offset-m2">
                    <div class="card">
                        <div class="card-content">
                            <h4 class="card_title">Editar Factura</h4>
                            <div class="row">
                            <form class="col s12" method="post" action="{{route('backoffice.patient.invoice.update',[$user, $invoice])}}">
                                    @csrf
                                    
                                    <div class="row">
                                        <div class="input-field col s12"> 
                                           {{-- {{dd($permission->name)}} --}}                                  
                                            <input id="amount" type="text" name="amount" value="{{$invoice->amount}}"> 
                                            <label for="amount">Monto de la Factura</label>
                                            @if ($errors->has('amount'))
                                                <span class="invalid-feedback" invoice="alert">
                                                    <strong style="color:red">{{ $errors->first('amount') }}</strong>
                                                </span>
                                            @endif                                         
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <select name="status" >
                                              <option value="pending" @if($invoice->status =='pending') selected @endif>
                                                Pendiente</option>
                                              <option value="approved" @if($invoice->status =='approved') selected @endif>
                                                Pagado</option>
                                              <option value="rejected" @if($invoice->status =='rejected') selected @endif>
                                                Rechazado</option>
                                              <option value="cancelled" @if($invoice->status =='cancelled') selected @endif>
                                                Cancelado</option>
                                              <option value="refunded" @if($invoice->status =='refunded') selected @endif>
                                                Devolucion</option>
                                            </select>
                                            @if ($errors->has('description'))
                                                <span class="invalid-feedback" permission="alert">
                                                    <strong style="color:red">{{ $errors->first('description') }}</strong>
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