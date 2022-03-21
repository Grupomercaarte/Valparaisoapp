@extends('layouts.app')

@section('content')



    <section class="section">
        <div class="section-header">
            <h3 class="page__heading ">Historial de compras</h3>
        </div>
        <div class="section-body">
            <h4 class="page__heading"><strong> {{ $client->fullname() }} </strong></h4>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">

                        <div class="card-body">
                            <table class="table table-striped mt-2">
                                <thead style="background-color: #6777ef;">
                                    <th style="display: none;">ID</th>
                                    <th style="color: #fff;">Folio</th>
                                    <th style="color: #fff;">Metodo Pago</th>
                                    <th style="color: #fff;">Total</th>
                                    <th style="color: #fff;">Abono</th>
                                    <th style="color: #fff;">Saldo restante</th>
                                    <th style="color: #fff;">Fecha</th>
                                    <th style="color: #fff;">Detalles</th>
                                    <th style="color: #fff;">Ticket</th>
                                    <th style="color: #fff;">Cancelar</th>
                                </thead>
                                <tbody>
                                    @forelse ($clientShop as $v=>$venta)
                                        <tr>
                                            
                                            <td style="display: none;">{{ $venta->id }}</td>
                                            <td>{{ $venta->folio }} </td>
                                            <td>{{ $venta->method }}</td>
                                            <td>${{ $venta->total }}
                                                @can('editar-creditos')
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#amounModal{{$venta->id}}">
                                                    Abonar
                                                  </button>
                                                @endcan
                                            </td>
                                            @if ($venta->amount)
                                                <td>${{ $venta->amount }}</td>
                                                <td>${{ $venta->remaining }}</td>
                                            @else
                                                <td>---</td>
                                                <td>----</td>
                                            @endif


                                            <td>{{ $venta->date }}</td>
                                            <td>
                                                @can('ver-ventas')
                                                    <a href="{{ route('ventas.show', $venta->sale_id) }}"
                                                        class="btn btn-info">Detalles</a>
                                                @endcan
                                            </td>
                                            <td>
                                                @can('ver-ventas')
                                                    <a href="{{ route('ventas.ticket', $venta->sale_id) }}" target="blank"
                                                        class="btn btn-primary">Ticket</a>
                                                @endcan
                                            </td>
                                            <td>
                                                @can('borrar-ventas')
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['ventas.destroy', $venta->sale_id], 'style' => 'display:inline']) !!}
                                                    {!! Form::submit('Cancelar', ['class' => 'btn btn-danger']) !!}
                                                    {!! Form::close() !!}
                                                @endcan
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8">Sin registros</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @forelse ($clientShop as $venta)
    <div class="modal fade" id="amounModal{{$venta->id}}" tabindex="-1" aria-labelledby="amounModal{{$venta->id}}Label" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="amounModal{{$venta->id}}Label">Folio: {{$venta->folio}}</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::open(array('route' => ['abonoCredit',3], 'method' => 'POST')) !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="country">Abono</label>
                            {!! Form::number('amount', NULL, array('class' => 'form-control', 'step' =>'any', 'placeholder' => '$')) !!}
                        </div>
                    </div>
                    </div>
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Confirmar</button>
              {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>
      @empty
    @endforelse
   
@endsection
