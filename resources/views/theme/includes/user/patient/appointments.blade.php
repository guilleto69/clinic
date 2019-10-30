<table>
  <thead>
      <tr>
          <th>id</th>
          <th>Especialista</th>
          <th>Fecha</th>
          <th>Estado</th> {{-- Finalizado, Pendiente, Pagado... --}}
          @if ($update )
            <th>Acciones</th>              
          @endif
      </tr>
  </thead>

  <tbody>
      @forelse($appointments as $appointment)
          <tr>
              <td>{{ $appointment->id}}</td>
              <td>{{ $appointment->doctor()->name}}</td>
              <td>{{ $appointment->date->format('d/m/Y H:i')}}</td>
              <td>{{ $appointment->status}}</td>
              @if ($update )
                <td>
                    <a href="{{ route('backoffice.patient.appointments.edit', [$user, $appointment]) }}">
                        Editar
                    </a>    
                </td>              
              @endif
          </tr>
      @empty
          <tr>
              <td colspan ="4"> No hay citas Registradas</td>
          </tr>

      @endforelse
      
  </tbody>
</table>