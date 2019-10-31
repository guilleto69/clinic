<form action="{{ $route }}" method="POST">
    @csrf
    
    @if (!isset($appointment))

        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">local_hospital</i>
                <select id="speciality" name="speciality" >
                            
                    <option disabled="" selected="">            --    Selecciona una Especialidad --</option>
                    
                    @foreach ($specialities as $speciality)
                        <option value="{{ $speciality->id}}">
                            {{ $speciality->name}}</option>
                    @endforeach
                </select>
                <label for="">                 Selecciona la Especialidad</label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12">
                <i class="material-icons prefix">assignment_ind</i>
                <select id="doctor" name="doctor" >
                        <option disabled="" selected="">          --    Selecciona una Especialidad Primero --</option>
                    
                </select>
                <label for="">Selecciona al Doctor</label>
            </div>
        </div>
            
        @else
          
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons prefix">hourglass_full</i>
                    <select id="status" name="status" >                               
                        <option value="pending" @if($appointment->status =='pending')
                            selected @endif>Pendiente</option>
                        <option value="done"  @if($appointment->status =='done')
                                selected @endif>Finalizada</option>
                        <option value="cancelled"  @if($appointment->status =='cancelled')
                                selected @endif>Cancelada</option>      
                    </select>
                    <label for="">                 Selecciona el Estado de la Cita</label>
                </div>
            </div>

    @endif

    <div class="row">                                                       
        <div class="input-field col s12 m6" {{--  position= "relative" --}}>
            <i class="material-icons prefix">today</i>
        <input id="datepicker" type="text" name="date" class="datepicker" placeholder="Selecciona una Fecha" @if(isset($appointment)) data-value="{{ $appointment->date->format('Y-m-d') }}" @endif>                                       
            
        </div>
    
        <div class="input-field col s12 m6">
            <i class="material-icons prefix">access_time</i>
            <input id="timepicker" type="text" name="time" class="timepicker" placeholder="Selecciona una Hora" @if(isset($appointment)) data-value="{{ $appointment->date->format('H:i') }}" @endif>                                        
        </div> 
    </div>
    
<input type="hidden" name="user_id" value="{{ encrypt( $user->id ) }}">


    <div class="row">
        <button class="btn waves-effect weves-light" type="submit">
            Agendar  <i class="material-icons right">send</i>
        </button>
    </div>
</form>