@extends('layouts.app')

@section('content')
    <style>
        .modal-backdrop.show {
            display: none;
        }

        .button-3.tarj .knobs:before {
            content: "NO";
            position: absolute;
            top: 4px;
            left: 4px;
            width: 28px;
            height: 28px;
            color: #fff;
            font-size: 10px;
            font-weight: bold;
            text-align: center;
            line-height: 1;
            padding: 10px 3px;
            border-radius: 50%;
            transition: 0.3s ease all, left 0.3s cubic-bezier(0.18, 0.89, 0.35, 1.15);
            background-color: #fc544b;
        }

        .button-3.tarj .checkbox:checked+.knobs:before {
            content: "SI";
            left: 42px;
            background-color: #47c363;
        }

        .canvas-disable {
            cursor: not-allowed;
            pointer-events: none;
        }
    </style>
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Alta de socios</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            {!! Form::open([
                                'route' => 'socios.store',
                                'method' => 'POST',
                                'enctype' => 'multipart/form-data',
                                'class' => 'needs-validation',
                                'novalidate',
                            ]) !!}
                            <div class="row">
                                <div class="col-xl-3 col-md-3">
                                    <div class="form-group">
                                        <label for="business_id">Pertenece</label>
                                        {!! Form::select('business_id', $negocios, [], ['class' => 'form-control', 'required']) !!}
                                        <div class="invalid-feedback" style="font-size: 14px">
                                            Campo Necesario.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-md-9">
                                    <div class="form-group">
                                        <label for="name">Nombre(s)</label>
                                        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'required']) !!}
                                        <div class="invalid-feedback" style="font-size: 14px">
                                            Campo Necesario.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        <label for="last_name">Primer apellido</label>
                                        {!! Form::text('last_name', null, ['class' => 'form-control', 'id' => 'last_name', 'required']) !!}
                                        <div class="invalid-feedback" style="font-size: 14px">
                                            Campo Necesario.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        <label for="second_lastname">Segundo apellido</label>
                                        {!! Form::text('second_lastname', null, [
                                            'class' => 'form-control',
                                            'id' => 'second_lastname',
                                            'placeholder' => 'Opcional',
                                        ]) !!}
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-4">
                                    <div class="form-group">
                                        <label for="age">F.Nacimiento</label>
                                        {!! Form::date('birth', null, ['class' => 'form-control', 'id' => 'birth', 'required']) !!}
                                        <div class="invalid-feedback" style="font-size: 14px">
                                            Campo Necesario.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-md-3">
                                    <div class="form-group">
                                        <label for="age">Años</label>
                                        {!! Form::number('age', null, ['class' => 'form-control', 'id' => 'age', 'required', 'readonly']) !!}
                                        <div class="invalid-feedback" style="font-size: 14px">
                                            Campo Necesario.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-5">
                                    <div class="form-group">
                                        <label for="discount">Identificador</label>
                                        {!! Form::text('identifier', null, [
                                            'class' => 'form-control',
                                            'id' => 'identifier',
                                            'placeholder' => 'CURP / Pasaporte',
                                            'required',
                                        ]) !!}
                                        <div class="invalid-feedback" style="font-size: 14px">
                                            Campo Necesario.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        <label for="email">Correo</label>
                                        {!! Form::text('email', null, [
                                            'class' => 'form-control',
                                            'id' => 'email',
                                            'placeholder' => 'ejemplo@ejemplo.com',
                                            'required',
                                        ]) !!}
                                        <div class="invalid-feedback" style="font-size: 14px">
                                            Campo Necesario.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Teléfono</label>
                                        {!! Form::text('phone', null, ['class' => 'form-control', 'id' => 'phone', 'maxlength ' => '10', 'required']) !!}
                                        <div class="invalid-feedback" style="font-size: 14px">
                                            Campo Necesario.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        <label for="phone_emergency">Teléfono de emergencia</label>
                                        {!! Form::text('phone_emergency', null, [
                                            'class' => 'form-control',
                                            'id' => 'phone_emergency',
                                            'maxlength ' => '10',
                                            'required',
                                        ]) !!}
                                        <div class="invalid-feedback" style="font-size: 14px">
                                            Campo Necesario.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        <label>Tipo descuento</label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                {{ Form::radio('discount', 'ninguno', true, ['class' => 'form-check-input', 'id' => 'ninguno']) }}
                                                {{ Form::label('ninguno', 'Ninguno', ['class' => 'form-check-label']) }}
                                            </div>
                                            <div class="form-check form-check-inline">
                                                {{ Form::radio('discount', 'pencion', '', ['class' => 'form-check-input', 'id' => 'pencion']) }}
                                                {{ Form::label('pencion', 'Pencion', ['class' => 'form-check-label']) }}
                                            </div>
                                            <div class="form-check form-check-inline">
                                                {{ Form::radio('discount', 'acuerdo', '', ['class' => 'form-check-input', 'id' => 'acuerdo']) }}
                                                {{ Form::label('acuerdo', 'Acuerdo', ['class' => 'form-check-label']) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        <label for="reason">Motivo descuento</label>
                                        {!! Form::text('reason', null, [
                                            'class' => 'form-control',
                                            'id' => 'reason',
                                            'placeholder' => 'Llenar en caso de Descuento',
                                        ]) !!}
                                    </div>
                                </div>
                                <div class="col-xl-2 col-md-3">
                                    <div class="form-group">
                                        <label>Discapacidad:</label>
                                        <div class="form-check" style="margin-top: .7rem;">
                                            <div class="button r button-3 tarj">
                                                <input type="checkbox" class="checkbox" />
                                                <div class="knobs"></div>
                                                <div class="layer"></div>
                                            </div>
                                            <div class="d-none datas">
                                                {!! Form::checkbox('disability', 0, true) !!} <label for="">No</label>
                                                {!! Form::checkbox('disability', 1, false) !!} <label for="">Si</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-md-3">
                                    <div class="form-group">
                                        <label>Area verde:</label>
                                        <div class="form-check" style="margin-top: .7rem;">
                                            <div class="button r button-3 tarj">
                                                <input type="checkbox" class="checkbox" />
                                                <div class="knobs"></div>
                                                <div class="layer"></div>
                                            </div>
                                            <div class="d-none datas">
                                                {!! Form::checkbox('area', 0, true) !!} <label for="">No</label>
                                                {!! Form::checkbox('area', 1, false) !!} <label for="">Si</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="certificate">Constancia medica</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <button class="btn btn-secondary text-dark" style="z-index: 0;"
                                                            id="showFile" type="button">Subir
                                                            Archivo</button>
                                                    </div>
                                                    <input type="text" id="nameFile" class="form-control"
                                                        placeholder="Nombre de Archivo" readonly>
                                                </div>
                                                {!! Form::file('certificate', ['class' => 'd-none', 'id' => 'dataFile']) !!}
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <hr>
                                            <div class="form-group">
                                                <label for="certificate">ANTES DE FIRMAR DEBE:</label>
                                                <a class="btn btn-primary form-control" href="/documentos"
                                                    target="_blank">Leer
                                                    Documentos</a>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="button" class="btn btn-danger form-control"
                                                    data-toggle="modal"data-target="#fichaModal"
                                                    value="Llenar Ficha Técnica">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="button" class="btn btn-warning form-control getCamera"
                                                    value="Capturar Fotografía" />
                                                <input type="file" class="d-none" accept="image/*" capture="camera"
                                                    id="camera" />
                                                <canvas id="cam" width=64 height=64 class="d-none"></canvas>
                                                <div id="text" class="text-center">
                                                    {!! Form::text('image-tag', null, [
                                                        'class' => 'd-none',
                                                        'id' => 'image-tag',
                                                        'required',
                                                    ]) !!}
                                                    <div class="invalid-feedback badge-danger mt-1 mb-3rounded"
                                                        style="font-size: 14px">
                                                        No se ha tomado la fotografía.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <hr>
                                            <div class="form-group">
                                                <label for="certificate">DESPUÉS DE FIRMAR DEBE:</label>
                                                <button class="btn btn-success form-control" id="saveBtn">CREAR
                                                    SOCIO</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-8 text-center mb-3">
                                    <label for="certificate">FIRMA DE CONCENTIMIENTO</label>
                                    <div id="signature-pad" class="signature-pad">
                                        <div class="signature-pad--body">
                                            <canvas id="canvas" width="650" height="400"
                                                class="drop-container"></canvas>
                                        </div>
                                        <div style="display: flex;justify-content: space-between;" class="mt-3">
                                            <button type="button" id="btnClean" class="clear btn btn-danger"
                                                data-action="clear">Limpiar</button>
                                            <button type="button" id="btnUndo" class="btn btn-warning"
                                                data-action="undo">Retroceder</button>
                                            <input type="button" class="btn btn-info" id="btnDescargar"
                                                value="Guardar Firma" />
                                        </div>
                                    </div>
                                    {!! Form::text('signData', null, [
                                        'class' => 'd-none',
                                        'id' => 'signData',
                                        'required',
                                    ]) !!}
                                    <div class="invalid-feedback badge-danger mt-1 mb-3 rounded" style="font-size: 14px">
                                        No se ha firmado de consentimiento.
                                    </div>
                                </div>

                                @include ('socios.ficha_tecnica')
                                @include ('socios.webCam_Signature')
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Verifica lo siguiente:</strong>
                            <hr>
                            @foreach ($errors->all() as $error)
                                <span>{{ $error }}</span>
                            @endforeach
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <script>
        var showFile = document.getElementById("showFile");
        var nameFile = document.getElementById("nameFile");
        var dataFile = document.getElementById("dataFile");
        showFile.onclick = function() {
            dataFile.click();
            dataFile.onchange = function() {
                nameFile.value = dataFile.files[0].name;
            }
        }
    </script>
    <script>
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    $(".card").block({
                        message: '<div class="sk-wave sk-primary mx-auto"><div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div></div>',
                        //timeout: 100000,
                        css: {
                            backgroundColor: "transparent",
                            border: "0"
                        },
                        overlayCSS: {
                            backgroundColor: "#555",
                            opacity: 0.8
                        }
                    })
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                        $(".card").unblock();
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
        $("#birth").change(function(e) {
            var hoy = new Date();
            var cumpleanos = new Date($(this).val());
            var edad = hoy.getFullYear() - cumpleanos.getFullYear();
            var m = hoy.getMonth() - cumpleanos.getMonth();

            if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
                edad--;
            }

            $("#age").val(edad);
        });
    </script>
@endsection
