@extends('theme.frontoffice.layouts.main')

@section('title', 'Facturas')    

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
                             <th>id</th>
                             <th>Concepto</th>
                             <th>Monto</th>
                             <th>Estado</th>
                             <th>Accion</th>   
                        </thead>
                        <tbody>
                            <td>1 </td>
                            <td>Consulta con Dr. Guille</td>
                            <td>150000 COP$</td>
                            <td>Pendiente Pago</td>
                            <td><a href="#modal" data-prescription="1" class="modal-trigger">
                                Ver</a> </td>
                        </tbody>
                    </table>
                </div>
           </div>
        </div>
    </div>
    <div class="modal" id="modal">
        <div class="modal-content">
            <h4>Factura 1</h4>
            <p>Mucho Amor</p>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect btn-flat">Cerrar</a>
            <a href="#!" class=" waves-effect btn-flat">Imprimir</a>
        </div>
    </div>
</div>
@endsection

@section('foot')
    <script type="text/javascript">
        $('.modal').modal(); /* Inicializa Clase & Metodo */
    </script>
@endsection
