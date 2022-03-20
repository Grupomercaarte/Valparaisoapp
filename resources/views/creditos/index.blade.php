@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Creditos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @can('crear-creditos')
                                <a href="{{route('creditos.create')}}" class="btn btn-success">Nuevo</a>
                            @endcan
                            <table class="table table-striped mt-2">
                                <thead style="background-color: #6777ef;">
                                    <th style="color: #fff;">Cliente</th>
                                    <th style="color: #fff;">Cantidad de credito</th>
                                    <th style="color: #fff;">Credito disponible</th>
                                    <th style="color: #fff;">Fecha</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @forelse ($creditos as $credito)
                                    <tr>
                                        
                                        <td>{{$credito->client->fullname()}}</td>
                                        <td>${{$credito->amount}}</td>
                                        <td>${{$credito->available}}</td>
                                        <td>{{$credito->created_at}}</td>
                                        <td>
                                                @can('editar-creditos')
                                                    <a href="{{ route('historyShop',$credito->client) }}" class="btn btn-info">ver compras</a>
                                                   
                                                    @endcan
                                                    @can('editar-creditos')
                                                    <a href="{{ route('creditos.edit',$credito->id) }}" class="btn btn-warning">Editar</a>
                                                    @endcan
                                                    @can('borrar-creditos')
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['creditos.destroy',$credito->id], 'style' => 'display:inline']) !!}
                                                        {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
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
                            <div class="pagination">
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

