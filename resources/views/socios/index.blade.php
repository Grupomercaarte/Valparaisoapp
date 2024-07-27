@extends('layouts.app')

@section('content')
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 2;
            /* padding-top: 50px; */
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
            z-index: 1024;
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

        .table:not(.table-sm):not(.table-md):not(.dataTable) td,
        .table:not(.table-sm):not(.table-md):not(.dataTable) th {
            padding: 0 15px;
            height: 50px;
            vertical-align: middle;
        }

        .table .dropdown-item {
            font-size: 16px !important;
            cursor: pointer !important;
            padding: 10px 20px !important;
        }

        .table .dropdown-item .fas {
            font-size: 16px !important;
            cursor: pointer !important;
        }

        .modal-backdrop.show {
            display: none;
        }
    </style>
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Socios</h3>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#menu1">
                                VALPARAISO
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu2">
                                AGUACALIENTE
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="row mt-4">
                            <div class="col-12 col-md-8 col-xl-10 ">
                                <div class="form-outline">
                                    <input type="search" id="searchUser" onkeyup="searchUser()" autocomplete="new-password"
                                        class="form-control" placeholder="Buscar" />
                                    <input type="hidden" value="Socios" id="option" name="option">
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-xl-2 mt-3 mt-md-0">
                                <a href="{{ route('socios.create') }}" class="btn btn-success form-control">Agregar
                                    Nuevo</a>
                            </div>
                        </div>
                        <div id="menu1" class="tab-pane active">
                            {{-- table-hover --}}
                            <table class="table text-nowrap table-striped table-responsive mt-2" style="min-height: 250px;"
                                id="soc">
                                <thead style="background-color: #ed5a14;">
                                    <th style="display: none;">ID</th>
                                    <th style="color: #fff; width:auto;">Numero de cliente</th>
                                    <th style="color: #fff; width:auto;">Nombre Completo</th>
                                    <th style="color: #fff; width:auto;">F.Nacimiento</th>
                                    <th style="color: #fff; width:auto;">Accesos</th>
                                    <th style="color: #fff; width:auto;">Telefono</th>
                                    <th style="color: #fff; width:100%;" class="text-center">Archivos</th>
                                    <th style="color: #fff; width:auto;" class="text-center">Status</th>
                                    <th style="color: #fff; width:auto;">Acciones</th>
                                </thead>
                                <tbody id="soc-body">
                                    {{-- @foreach ($partnersVal as $partner)
                                        {{ $partner }}
                                    @endforeach --}}
                                    @php
                                        $contActivo = 0;
                                        $contBaja = 0;
                                    @endphp
                                    @foreach ($partnersVal as $partner)
                                        <tr>
                                            <td style="display: none;">{{ $partner->Partners->id }}</td>
                                            <td>
                                                <button class="btn btn-primary" data-toggle="modal"
                                                    data-target="#fichaModal"onclick="sendData({{ $partner->Partners->id }},1)"
                                                    data-backdrop="static" data-keyboard="false">
                                                    <i class="fas fa-user"></i>
                                                    &nbsp;
                                                    {{ $partner->Partners->num_socio }}
                                                </button>
                                            </td>
                                            <td>{{ $partner->Partners->name }}
                                                {{ $partner->Partners->last_name }}
                                                {{ $partner->Partners->second_lastname }}</td>
                                            <td>{{ $partner->Partners->birth }}</td>
                                            <td class="text-center">
                                                @if ($partner->Partners->disability == 1)
                                                    &nbsp;
                                                    <i class="fas fa-wheelchair"
                                                        style="font-size: 20px !important; color:#005cbf"></i>
                                                    &nbsp;
                                                @endif
                                                @if ($partner->Partners->area == 1)
                                                    &nbsp;
                                                    <i class="fas fa-seedling"
                                                        style="font-size: 20px !important; color:#00bf49"></i>
                                                    &nbsp;
                                                @endif
                                            </td>
                                            <td>{{ $partner->Partners->phone }}</td>
                                            <td class="text-center">
                                                @if ($partner->Partners->cer != null)
                                                    <span class="badge badge-info rounded">Cons.
                                                        Médica</span>
                                                @else
                                                    <span class="badge badge-secondary text-dark rounded">Cons.
                                                        Médica</i></span>
                                                @endif
                                                @if ($partner->Partners->firma != null)
                                                    <span class="badge badge-info rounded">Firma
                                                        Digital</span>
                                                @else
                                                    <span class="badge badge-secondary text-dark rounded">Firma
                                                        Digital</i></span>
                                                @endif
                                                @if ($partner->Partners->foto != null)
                                                    <span class="badge badge-info rounded">Foto
                                                        Socio</i></span>
                                                @else
                                                    <span class="badge badge-secondary text-dark rounded">Foto
                                                        Socio</i></span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($partner->Partners->status == 1)
                                                    <span class="badge badge-success badge-pill">ACTIVO</span>
                                                    @php
                                                        $contActivo = $contActivo + 1;
                                                    @endphp
                                                @else
                                                    <span class="badge badge-danger badge-pill" style="cursor: pointer;"
                                                        onclick="getBaja('{{ $partner->Partners->comm }}','{{ $partner->Partners->termination }}')">B
                                                        A J A</i></span>
                                                    @php
                                                        $contBaja = $contBaja + 1;
                                                    @endphp
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group dropleft">
                                                    <button type="button" class="btn btn-warning dropdown-toggle"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item text-warning"
                                                            href="{{ route('socios.imprimir', $partner->Partners->id) }}"
                                                            target="_blank">
                                                            <i class="fas fa-id-card"></i>&nbsp;Imprimir
                                                            Credencial</a>
                                                        <a class="dropdown-item text-info"
                                                            href="{{ route('socios.edit', $partner->Partners) }}"><i
                                                                class="fas fa-edit"></i>&nbsp;Modificar
                                                            Datos</a>
                                                        @if ($partner->Partners->status == 1)
                                                            {!! Form::button('&nbsp;<i class="fa fa-user-times"></i>&nbsp;&nbsp;Dar baja a socio', [
                                                                'class' => 'dropdown-item text-danger',
                                                                'onclick' => 'baja(' . $partner->Partners->id . ')',
                                                            ]) !!}
                                                        @else
                                                            {!! Form::button('&nbsp;<i class="fa fa-user-check"></i>&nbsp;&nbsp;Dar Alta a socio', [
                                                                'class' => 'dropdown-item text-success',
                                                                'onclick' => 'alta(' . $partner->Partners->id . ')',
                                                            ]) !!}
                                                        @endif

                                                        {!! Form::close() !!}
                                                        {!! Form::open(['method' => 'POST', 'route' => ['senEmail', $partner->Partners], 'style' => 'display:inline']) !!}
                                                        {!! Form::button('<i class="fa fa-scroll"></i>&nbsp;Enviar Documentos', [
                                                            'type' => 'submit',
                                                            'class' => 'dropdown-item text-primary',
                                                        ]) !!}
                                                        {!! Form::close() !!}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class='row mb-3'>
                                <div class="col-md-6 col-xl-8 resultSearch text-primary">
                                    Se han encontrado {{ count($partnersVal) }}
                                    socio{{ count($partnersVal) > 1 ? 's' : '' }}
                                </div>
                                <div class="col-md-3 col-xl-2 text-success text-right">
                                    Total Activos: {{ $contActivo }}
                                </div>
                                <div class="col-md-3 col-xl-2 text-danger text-right">
                                    Total Bajas: {{ $contBaja }}
                                </div>
                            </div>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination pagination-md pager" id="myPager"></ul>
                            </nav>
                        </div>
                        {{-- <div>
                            {{ $partnersVal[46] }}
                        </div> --}}








                        <div id="menu2" class="tab-pane fade">
                            <table class="table text-nowrap table-striped table-responsive table-hover mt-2" id="soc2">
                                <thead style="background-color: #ed5a14;">
                                    <th style="display: none;">ID</th>
                                    <th style="color: #fff; width:auto;">Numero de cliente</th>
                                    <th style="color: #fff; width:auto;">Nombre Completo</th>
                                    {{-- <th style="color: #fff; width:auto;">Apellidos</th> --}}
                                    <th style="color: #fff; width:auto;">F.Nacimiento</th>
                                    <th style="color: #fff; width:auto;">Accesos</th>
                                    <th style="color: #fff; width:auto;">Telefono</th>
                                    <th style="color: #fff; width:100%;" class="text-center">Archivos</th>
                                    <th style="color: #fff; width:auto;">Status</th>
                                    {{-- <th style="color: #fff; width:auto;">Motivos</th> --}}
                                    <th style="color: #fff; width:auto;">Acciones</th>
                                </thead>
                                <tbody>
                                    @forelse ($partnersAgua as $partner)
                                        <tr>
                                            <td style="display: none;">{{ $partner->Partners->id }}</td>
                                            <td>{{ $partner->Partners->num_socio }}</td>
                                            <td>{{ $partner->Partners->name }}
                                                {{ $partner->Partners->last_name }}
                                                {{ $partner->Partners->second_lastname }}</td>
                                            {{-- <td>{{ $partner->last_name }} {{ $partner->second_lastname }}</td> --}}
                                            <td>{{ $partner->Partners->birth }}</td>
                                            <td class="text-center">
                                                @if ($partner->Partners->disability == 1)
                                                    &nbsp;
                                                    <i class="fas fa-wheelchair"
                                                        style="font-size: 20px !important; color:#005cbf"></i>
                                                    &nbsp;
                                                @endif
                                                @if ($partner->Partners->area == 1)
                                                    &nbsp;
                                                    <i class="fas fa-seedling"
                                                        style="font-size: 20px !important; color:#00bf49"></i>
                                                    &nbsp;
                                                @endif
                                            </td>
                                            <td>{{ $partner->Partners->phone }}</td>
                                            <td class="text-center">
                                                @if ($partner->Partners->cer != null)
                                                    <span class="badge badge-info rounded">Cons.
                                                        Médica</span>
                                                @else
                                                    <span class="badge badge-secondary text-dark rounded">Cons.
                                                        Médica</i></span>
                                                @endif
                                                @if ($partner->Partners->firma != null)
                                                    <span class="badge badge-info rounded">Firma
                                                        Digital</span>
                                                @else
                                                    <span class="badge badge-secondary text-dark rounded">Firma
                                                        Digital</i></span>
                                                @endif
                                                @if ($partner->Partners->foto != null)
                                                    <span class="badge badge-info rounded">Foto
                                                        Socio</i></span>
                                                @else
                                                    <span class="badge badge-secondary text-dark rounded">Foto
                                                        Socio</i></span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($partner->Partners->status == 1)
                                                    <span class="badge badge-success badge-pill">ACTIVO</span>
                                                @else
                                                    <span class="badge badge-danger badge-pill" style="cursor: pointer;"
                                                        onclick="getBaja('{{ $partner->Partners->comm }}','{{ $partner->Partners->termination }}')">B
                                                        A J A</i></span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group dropleft">
                                                    <button type="button" class="btn btn-warning dropdown-toggle"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item text-info"
                                                            href="{{ route('socios.edit', $partner->Partners) }}"><i
                                                                class="fas fa-edit"></i>&nbsp;Modificar
                                                            Datos</a>
                                                        @if ($partner->Partners->status == 1)
                                                            {!! Form::button('&nbsp;<i class="fa fa-user-times"></i>&nbsp;&nbsp;Dar baja a socio', [
                                                                'class' => 'dropdown-item text-danger',
                                                                'onclick' => 'baja(' . $partner->Partners->id . ')',
                                                            ]) !!}
                                                        @else
                                                            {!! Form::button('&nbsp;<i class="fa fa-user-check"></i>&nbsp;&nbsp;Dar Alta a socio', [
                                                                'class' => 'dropdown-item text-success',
                                                                'onclick' => 'alta(' . $partner->Partners->id . ')',
                                                            ]) !!}
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            {{-- <a class="dropdown-item text-success" data-toggle="modal"
                                                data-target="#fichaModal"onclick="sendData({{ $partner->Partners->id }},2)">
                                                <i class="fas fa-money-check-alt"></i>&nbsp;Gestor de Pagos</a> --}}
                                        </tr>
                                    @empty
                                    @endforelse
                                    <tr class='resultSearch hide text-primary'>
                                        <td colspan="6">Se han encontrado {{ count($partnersAgua) }}
                                            socio{{ count($partnersAgua) > 1 ? 's' : '' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            {{ $partnersAgua }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id='modalData'></div>
    <script>
        $.fn.paginationCustom = function(opts) {
            var $this = this,
                defaults = {
                    perPage: 7,
                    showPrevNext: false,
                    hidePageNumbers: false
                },
                settings = $.extend(defaults, opts);

            var listElement = $this;
            var perPage = settings.perPage;
            var children = listElement.children();
            var pager = $('.pager');

            if (typeof settings.childSelector != "undefined") {
                children = listElement.find(settings.childSelector);
            }

            if (typeof settings.pagerSelector != "undefined") {
                pager = $(settings.pagerSelector);
            }

            var numItems = children.length;
            var numPages = Math.ceil(numItems / perPage);

            pager.data("curr", 0);
            if (settings.showPrevNext) {
                $(`<li class="page-item">
                        <a class="page-link prev_link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>`).appendTo(pager);
            }

            var curr = 0;
            while (numPages > curr && (settings.hidePageNumbers == false)) {
                $('<li class="page-item"><a class="page-link page_link" href="#">' + (curr + 1) +
                    '</a></li>').appendTo(pager);
                curr++;
            }

            if (settings.showPrevNext) {
                $(`<li class="page-item">
                        <a class="page-link next_link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>`).appendTo(pager);
            }

            pager.find('.page_link:first').addClass('active');
            pager.find('.prev_link').hide();
            if (numPages <= 1) {
                pager.find('.next_link').hide();
            }
            pager.children().eq(1).addClass("active");

            children.hide();
            children.slice(0, perPage).show();

            pager.find('li .page_link').click(function() {
                var clickedPage = $(this).html().valueOf() - 1;
                goTo(clickedPage, perPage);
                return false;
            });
            pager.find('li .prev_link').click(function() {
                previous();
                return false;
            });
            pager.find('li .next_link').click(function() {
                next();
                return false;
            });

            function previous() {
                var goToPage = parseInt(pager.data("curr")) - 1;
                goTo(goToPage);
            }

            function next() {
                goToPage = parseInt(pager.data("curr")) + 1;
                goTo(goToPage);
            }

            function goTo(page) {
                var startAt = page * perPage,
                    endOn = startAt + perPage;

                children.css('display', 'none').slice(startAt, endOn).show();

                if (page >= 1) {
                    pager.find('.prev_link').show();
                } else {
                    pager.find('.prev_link').hide();
                }

                if (page < (numPages - 1)) {
                    pager.find('.next_link').show();
                } else {
                    pager.find('.next_link').hide();
                }

                pager.data("curr", page);
                pager.children().removeClass("active");
                pager.children().eq(page + 1).addClass("active");

            }
        };
    </script>
    <script>
        function sendData(socio, tipo) {
            $("#modalData").html('');
            if (tipo == 1) {
                $.get('socios/modal/' + socio, function(data) {
                    $("#modalData").html(data);
                    setTimeout(() => {
                        $('#infoUser').modal('show');
                    }, 100);
                });
            } else {
                $.get('socios/fichaPago/' + socio, function(data) {
                    $("#modalData").html(data);
                    setTimeout(() => {
                        $('#fichaModal').modal('show');
                    }, 100);
                });

            }
        }

        function baja(val) {
            Swal.fire({
                icon: "question",
                title: 'MOTIVO DE BAJA',
                text: "Escriba el motivo de baja",
                showCancelButton: true,
                input: 'textarea',
                inputPlaceholder: "Maximo 300 caracteres",
                inputAttributes: {
                    maxlength: "300"
                }
            }).then((result) => {
                if (result.value) {
                    Swal.fire({
                        title: 'CONFIRMAR BAJA',
                        text: "Escriba la contraseña",
                        showCancelButton: true,
                        input: 'password',
                        inputPlaceholder: "Contraseña",
                        inputAttributes: {
                            autocomplete: 'new-password',
                            minlength: "1",
                            maxlength: "9"
                        }
                    }).then((data) => {
                        if (data.value == "B4j42024.") {
                            $.ajax({
                                //type: 'delete',
                                url: "/socios/" + val,
                                type: 'POST',
                                headers: {
                                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                        "content"
                                    ),
                                },
                                data: {
                                    _method: 'DELETE',
                                    tipo: '2',
                                    motivo: result.value,
                                },
                                success: function(data) {
                                    window.location.reload();
                                }
                            }); //end ajax

                        } else {
                            Swal.fire({
                                title: "BAJA NO ADMITIDA",
                                text: "Contraseña Invalida",
                                icon: "error"
                            });
                        } //end if
                    });

                } //end if
            });
        }

        function alta(val) {
            Swal.fire({
                title: "¿Está seguro de dar de alta nuevamente al socio?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#31692b",
                //cancelButtonColor: "var(--primary)",
                confirmButtonText: "Si",
                cancelButtonText: "No",
            }).then((result) => {
                if (result.value) {
                    Swal.fire({
                        title: 'CONFIRMAR ALTA',
                        text: "Escriba la contraseña",
                        showCancelButton: true,
                        input: 'password',
                        inputPlaceholder: "Contraseña",
                        inputAttributes: {
                            minlength: "1",
                            autocomplete: "new-password",
                            maxlength: "9"
                        }
                    }).then((data) => {
                        if (data.value == "4Lt42024.") {
                            $.ajax({
                                //type: 'delete',
                                url: "/socios/" + val,
                                type: 'POST',
                                headers: {
                                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                        "content"
                                    ),
                                },
                                data: {
                                    _method: 'DELETE',
                                    tipo: '1',
                                    motivo: result.value,
                                },
                                success: function(data) {
                                    window.location.reload();
                                }
                            }); //end ajax

                        } else {
                            Swal.fire({
                                title: "ALTA NO ADMITIDA",
                                text: "Contraseña Invalida",
                                icon: "error"
                            });
                        } //end if
                    });
                }
            });
        }

        function getBaja(message, date) {
            Swal.fire({
                icon: 'info',
                title: 'DATOS DE LA BAJA',
                html: `Fecha: ${date.split(' ')[0].split('-').reverse().join('/')}<br>Motivo: ${message}`
            })
        }

        function searchUser() {
            const tableReg = document.getElementById('soc');
            const searchText = document.getElementById('searchUser').value.toLowerCase();
            let total = 0;
            // Recorremos todas las filas con contenido de la tabla
            for (let i = 1; i < tableReg.rows.length; i++) {
                // Si el td tiene la clase "noSearch" no se busca en su cntenido
                //if (tableReg.rows[i].classList.contains("noSearch")) continue;
                let found = false;
                const cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
                // Recorremos todas las celdas
                for (let j = 0; j < cellsOfRow.length && !found; j++) {
                    const compareWith = cellsOfRow[j].innerHTML.toLowerCase();
                    // Buscamos el texto en el contenido de la celda
                    if (searchText.length == 0 || compareWith.indexOf(searchText) > -1) {
                        found = true;
                        total++;
                    }
                }
                // si no ha encontrado ninguna coincidencia, esconde la
                // fila de la tabla
                found ? tableReg.rows[i].style.display = '' : tableReg.rows[i].style.display = 'none';
            }
            // mostramos las coincidencias
            const lastTR = tableReg.rows[tableReg.rows.length - 1];
            const td = lastTR.querySelector("td");
            lastTR.classList.remove("hide", "red");
            if (searchText == "") lastTR.classList.add("hide");
            //else if (total) td.innerHTML = "Se han encontrado " + total + " socio" + ((total > 1) ? "s" : "");
            else if (total) {
                $('.resultSearch').html("Se han encontrado " + total + " socio" + ((total > 1) ? "s" : ""));
            } else {
                //lastTR.classList.add("red");
                //td.innerHTML = "No se encontró socio";
                $('.resultSearch').html("No se encontró socio")
            }
        }

        if (document.readyState == 'loading') {
            $('#soc-body').paginationCustom({
                pagerSelector: '#myPager',
                showPrevNext: true,
                hidePageNumbers: false,
                perPage: 10
            });
        }
    </script>
@endsection
