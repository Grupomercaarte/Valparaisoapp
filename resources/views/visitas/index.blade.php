@extends('layouts.app')

@section('content')
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 50px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-primary:not(:disabled):not(.disabled).active,
        .btn-primary:not(:disabled):not(.disabled):active,
        .show>.btn-primary.dropdown-toggle {
            color: #fff;
            background-color: #ed5a14 !important;
            border-color: #005cbf;
        }

        .modal {
            z-index: 1024;
        }

        .modal-backdrop.show {
            display: none;
        }
    </style>
    @php
        use Carbon\Carbon;
    @endphp
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Visitas</h3>
            <strong>{{Carbon::now()->isoFormat('dddd D [de] MMMM [de] YYYY')}}</strong>
        </div>
        <div class="section-body">
            @if (session('message'))
                <span class="badge badge-danger">{{ session('message') }}</span>
            @elseif(session('messageT'))
                <span class="badge badge-success badge-pill">{{ session('messageT') }}</span>
            @endif

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row d-block m-1" style="height: 10px">
                                @if (\Illuminate\Support\Facades\Auth::user()->id == 1)
                                    <div class="float-left">
                                        <a href="{{ route('visitas.listado') }}" class="btn btn-warning form-control">
                                            <span>Ver entradas de otras fechas</span>
                                        </a>
                                    </div>
                                @endif
                                <div class="float-right">
                                    <div class="input-group">
                                        <button onclick="$('#QRLector').modal('show');" type="button"
                                            class="btn btn-info mr-2">
                                            <i class="fas fa-qrcode"></i> QR
                                        </button>
                                        <div class="form-outline">
                                            <input type="search" id="searchUser" onkeyup="searchUser()"
                                                class="form-control" placeholder="Buscar Socio" />
                                            <input type="hidden" value="Visitas" id="option" name="option">
                                        </div>
                                        <button onclick="registUser();" type="button" class="btn btn-success ml-2">
                                            <i class="fas fa-plus"></i> Entrada
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <style>
                                #tableSucursales .dropdown-item {
                                    font-size: 17px !important;
                                    cursor: pointer !important;
                                    padding: 10px 20px !important;
                                }

                                #tableSucursales .dropdown-item .fas {
                                    font-size: 17px !important;
                                    cursor: pointer !important;
                                }
                            </style>
                            {{-- <a href="{{ route('visitas.create') }}" class="btn btn-warning">Registrar visita</a> --}}
                            <div class="table-responsive mt-5">
                                <table class="table text-nowrap table-striped table-hover mt-2" id="visit">
                                    <thead style="background-color: #6777ef;">
                                        <th style="display: none;">ID</th>
                                        <th class="text-light">Numero de cliente</th>
                                        <th class="text-light">Nombre completo</th>
                                        <th class="text-center text-light">Entrada</th>
                                        <th class="text-center text-light">Salida</th>
                                        <th class="text-center text-light">Tiempo total</th>
                                    </thead>
                                    <tbody id="tableSucursales">
                                        @forelse ($visits as $data)
                                            <tr>
                                                <td style="display: none;">{{ $data->id }}</td>
                                                <td>{{ $data->partners->num_socio }}</td>
                                                <td>{{ $data->partners->name }} {{ $data->partners->last_name }}
                                                    {{ $data->partners->second_lastname }}</td>
                                                <td class="text-center">{{ explode(' ', $data->entrada)[1] }}</td>
                                                @if ($data->salida != '')
                                                    @php
                                                        try {
                                                            // Crea objetos Carbon para las horas de entrada y salida
                                                            $entrada = Carbon::parse($data->entrada);
                                                            $salida = Carbon::parse($data->salida);

                                                            // Calcula la diferencia en horas
                                                            $diferenciaHoras = $salida->diff($entrada);
                                                            $diferenciaHoras = $diferenciaHoras->format(
                                                                '%h horas %i minutos',
                                                            );
                                                        } catch (\Exception $e) {
                                                            $diferenciaHoras = 'Error';
                                                        }
                                                    @endphp
                                                    <td class="text-center">{{ explode(' ', $data->salida)[1] }}</td>
                                                    <td class="text-center">{{ $diferenciaHoras }} </td>
                                                @else
                                                    <td class="text-center">
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['visitas.destroy', $data->id], 'style' => 'display:inline']) !!}
                                                        {!! Form::button('Registrar salida', [
                                                            'type' => 'submit',
                                                            'class' => 'badge badge-danger badge-pill',
                                                            'style' => 'border: 1px solid transparent;',
                                                        ]) !!}
                                                        {!! Form::close() !!}
                                                    </td>
                                                @endif

                                            </tr>
                                        @empty
                                        @endforelse
                                        <tr class='noSearch hide'>
                                            <td colspan="4">Se ha encontrado {{ count($visits) }}
                                                coincidencia{{ count($visits) > 1 ? 's' : '' }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="pagination" id="pag">
                                {{ $visits->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="QRLector" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Registrar Entrada</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="cred">
                    {{-- Selecciona la camara para leer con código --}}
                    <video id="qrvisor" class="w-100"></video>
                    <div id="cameralist" style="display: flex;justify-content: space-between;flex-wrap: wrap;"></div>
                </div>
            </div>
        </div>
    </div>
    <div id='viewModaldiv'></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <script>
        function registUser(user = $("#searchUser").val()) {
            $("#viewModaldiv").html('');
            $.get('/visitas/socios/' + user, function(data) {
                $("#viewModaldiv").html(data);
                setTimeout(() => {
                    $('#QRModal').modal('show');
                }, 100);
            });
        }

        function searchUser() {
            const searchText = document.getElementById('searchUser').value.toLowerCase();

            fetch('/visitas/search', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        search: searchText
                    })
                })
                .then(response => response.json())
                .then(data => {

                    const tableBody = document.getElementById('tableSucursales');
                    tableBody.innerHTML = ''; // Limpiar la tabla

                    if (data.visits.length > 0) {
                        data.visits.forEach(visit => {
                            console.log(visit);
                            const entrada = visit.entrada.split(' ')[1];
                            const salida = visit.salida ? visit.salida.split(' ')[1] : '';

                            let diferenciaHoras = '';
                            if (salida) {
                                const entradaTime = moment(visit.entrada);
                                const salidaTime = moment(visit.salida);
                                diferenciaHoras = salidaTime.diff(entradaTime, 'hours') + ' horas ' + (
                                    salidaTime.diff(entradaTime, 'minutes') % 60) + ' minutos';
                            } else {
                                diferenciaHoras = `<form method="POST" action="/visitas/${visit.id}" style="display:inline">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="badge badge-danger badge-pill" style="border: 1px solid transparent;">Registrar salida</button>
                    </form>`;
                            }

                            const row = `<tr>
                    <td style="display: none;">${visit.id}</td>
                    <td>${visit.partners.num_socio}</td>
                    <td>${visit.partners.name} ${visit.partners.last_name} ${visit.partners.second_lastname}</td>
                    <td class="text-center">${entrada}</td>
                    <td class="text-center">${salida}</td>
                    <td class="text-center">${diferenciaHoras}</td>
                </tr>`;

                            tableBody.innerHTML += row;
                        });
                    } else {
                        tableBody.innerHTML =
                            '<tr><td colspan="6" class="text-center">No se han encontrado coincidencias</td></tr>';
                    }
                })
                .catch(error => console.error('Error:', error));
        }


        var scanner = new Instascan.Scanner({
            video: document.getElementById('qrvisor'),
            scanPeriod: 10,
            mirror: false
        });

        Instascan.Camera.getCameras().then(function(cameras) {
            scanner.stop();
            scanner.start(cameras[2]);
        })


        /* Instascan.Camera.getCameras().then(function(cameras) {
            if (cameras.length > 0) {
                cameras.forEach((item, key) => {
                    $('#cameralist').append(
                        `<button class="btn btn-${key % 2 ? 'primary':'warning'}" onclick="camerastar(${key})">Camara ${key+1}</button>`
                    );
                });
            } else alert('No se encontró camara.');
        }).catch(function(e) {
            console.log(e)
        })

        function camerastar(cam) {
            Instascan.Camera.getCameras().then(function(cameras) {
                scanner.stop();
                setTimeout(() => {
                    scanner.start(cameras[cam]);
                }, 100);
            })

        } */

        scanner.addListener('scan', function(respuesta) {
            registUser(respuesta);
            $('#QRLector').modal('hide');
        })
    </script>
@endsection
