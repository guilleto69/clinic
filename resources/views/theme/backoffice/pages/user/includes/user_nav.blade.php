<div class="collection">
        {{-- <a href="#!" class="collection-item active">Alvin</a> --}}
        <a href="{{ route('backoffice.user.show', $user) }}" class="collection-item active">{{$user->name}}</a>
        @if(Auth::user()->has_role(config('app.admin_role'))|| 
          Auth::user()->has_role(config('app.secretary_role')))
              @if($user->has_role(config('app.patient_role')))  
<a href="{{ route('backoffice.patient.schedule', $user) }}" class="collection-item">Agendar Cita</a>     
              @endif
        @endif
        @if(Auth::user()->has_role(config('app.admin_role')))
                <a href="{{ route ('backoffice.user.assign_role', $user) }}" class="collection-item ">Asignar Roles</a>
                <a href="{{ route ('backoffice.user.assign_permission', $user) }}" class="collection-item ">Asignar Permisos</a>
        @endif
</div>