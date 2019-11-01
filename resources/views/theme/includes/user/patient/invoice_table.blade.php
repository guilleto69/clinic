<table>
    <thead>
         <th>id</th>
         <th>Concepto</th>
         {{-- <th>Doctor</th> --}}
         <th>Monto</th>
         <th>Estado</th>
         <th @if(isset($user)) colspan="2"  @endif>Accion</th>   
    </thead>
    <tbody>
        @forelse ($invoices as $key => $invoice)
            <tr>
                <td>{{ $invoice->id }}</td>
                <td>{{ $invoice->concept() }}</td>
                {{-- <td>{{ $invoice->doctor()->name }}</td> --}}
                <td>{{ $invoice->amount }}</td>
                <td>{{ $invoice->status }}</td>
            <td><a href="#modal" 
                    data-invoice= "{{ $invoice->id }}" 
                    onClick= "modal_invoice(this)" class="modal-trigger">
                Ver
                </a>
                </td>
                @if(isset($user))
                  <td>
                    <a href="{{route('backoffice.patient.invoice.edit', [$user, $invoice]) }}">
                      Editar</a>
                  </td>
                @endif
                
            </tr>                                
        @empty
            <tr>
                <td colspan="5"> No tienes Registrada ninguna Factura.</td>
            </tr>
        @endforelse
    </tbody>
</table>