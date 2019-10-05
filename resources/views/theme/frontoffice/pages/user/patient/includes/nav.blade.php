{{-- Menu Lateral --}}
<div class="col s12 m4 ">                
    <div class="collection">
        <a href="{{ route('frontoffice.user.profile') }}" 
            {{-- ACTIVE CLASS helper en app/Helpers/helpers.php --}}
            class="collection-item {!! active_class(route('frontoffice.user.profile')) !!}">
            Perfil</a>
       
        @if( auth()->user()->has_role(config('app.patient_role')) )
            <a href="{{ route('frontoffice.patient.schedule')}}" 
            class="collection-item {!! active_class(route('frontoffice.patient.schedule')) !!}">
                Agendar Cita</a>

            <a href="{!! route('frontoffice.patient.appointments') !!}" 
            class="collection-item {!! active_class(route('frontoffice.patient.appointments')) !!}">
                Mis Citas</a>
            <a href="#!"             
            class="collection-item">Recetas</a>
        @endif
        
        <a href="#!" class="collection-item">Facturacion</a>
        <a href="#!" class="collection-item">Editar Perfil</a>
        <a href="#!" class="collection-item">Modificar Contraseña</a>
    </div>            
</div>