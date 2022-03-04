@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Servicios</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-servicios')
                                <a href="{{ route('servicios.create') }}" class="btn btn-warning">Nuevo</a>
                            @endcan
                            <table class="table table-striped mt-2">
                                <thead style="background-color: #6777ef;">
                                    <th style="display: none;">ID</th>
                                    <th style="color: #fff;">Codigo</th>
                                    <th style="color: #fff;">Nombre</th>
                                    <th style="color: #fff;">Costo</th>
                                    <th style="color: #fff;">Precio</th>
                                    <th style="color: #fff;">Descripcion</th>
                                    <th style="color: #fff;">Sucursal</th>
                                    <th style="color: #fff;">Editar</th>
                                    <th style="color: #fff;">Eliminar</th>
                                </thead>
                                <tbody>
                                    @forelse ($servicios as $servicio)
                                        <tr>
                                            <td style="display: none;">{{ $servicio->id }}</td>
                                            <td>{{ $servicio->bar_code }}</td>
                                            <td>{{ $servicio->name }}</td>
                                            <td>${{ number_format($servicio->cost,2,'.',',') }}</td>\
                                            <td>${{ number_format($serivicio->price,2,'.',',') }}</td>
                                            <td>{{ $servicio->description }}</td>
                                            <td>{{ $servicio->office->name }}</td>
                                            <td>
                                                @can('editar-servicios')
                                                    <a href="{{ route('servicios.edit',$servicio->id) }}" class="btn btn-info">Editar</a>
                                                @endcan
                                            </td>
                                            <td>
                                                @can('borrar-servicios')
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['servicios.destroy',$servicio->id], 'style' => 'display:inline']) !!}
                                                        {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                                    {!! Form::close() !!}
                                                @endcan
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9">Sin registros</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="pagination">
                                {!! $servicios->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

