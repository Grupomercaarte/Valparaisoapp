@extends('layouts.app')

@section('content')
    <style>
        .modal-backdrop.show {
            z-index: 1;
        }
    </style>
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">No. de socio: {{ $partner->num_socio }}</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                    <strong>Revisa los campos!</strong>
                                    @foreach ($errors->all() as $error)
                                        <span class="badge badge-danger">{{ $error }}</span>
                                    @endforeach
                                    <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                </div>
                            @endif

                            {!! Form::model($partner, [
                                'method' => 'PUT',
                                'route' => ['socios.update', $partner->id],
                                'enctype' => 'multipart/form-data',
                            ]) !!}
                            <div class="row">
                                <style>
                                    .thumbnail {
                                        width: 124px;
                                        height: 124px;
                                        display: flex;
                                        margin-left: auto;
                                        margin-right: auto;
                                        margin-bottom: 1.5em;
                                        border-radius: 100%;
                                        box-shadow: 0 13px 26px rgba(0, 0, 0, 0.2), 0 3px 6px rgba(0, 0, 0, 0.2);
                                    }
                                </style>
                                <img src="data:image/png;base64,{{ $partner->foto }}" id="image-prof" class="thumbnail">
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        {!! Form::text('name', $partner->name, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        <label for="last_name">Primer apellido</label>
                                        {!! Form::text('last_name', $partner->last_name, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        <label for="second_lastname">Segundo apellido</label>
                                        {!! Form::text('second_lastname', $partner->second_lastname, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="form-group">
                                        <label>Tipo descuento</label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                {{ Form::radio('discount', 'ninguno', $partner->discount == 'ninguno', ['class' => 'form-check-input', 'id' => 'ninguno']) }}
                                                {{ Form::label('ninguno', 'Ninguno', ['class' => 'form-check-label']) }}
                                            </div>
                                            <div class="form-check form-check-inline">
                                                {{ Form::radio('discount', 'pencion', $partner->discount == 'pencion', ['class' => 'form-check-input', 'id' => 'pencion']) }}
                                                {{ Form::label('pencion', 'Pencion', ['class' => 'form-check-label']) }}
                                            </div>
                                            <div class="form-check form-check-inline">
                                                {{ Form::radio('discount', 'acuerdo', $partner->discount == 'acuerdo', ['class' => 'form-check-input', 'id' => 'acuerdo']) }}
                                                {{ Form::label('acuerdo', 'Acuerdo', ['class' => 'form-check-label']) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="form-group">
                                        <label for="reason">Motivo descuento</label>
                                        {!! Form::text('reason', $partner->reason, [
                                            'class' => 'form-control',
                                            'id' => 'reason',
                                            'placeholder' => 'Llenar en caso de Acuerdo',
                                        ]) !!}
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Discapacidad:</label>
                                        <div class="form-check" style="margin-top: .7rem;">
                                            <div class="button r button-3">
                                                <input type="checkbox" class="checkbox"
                                                    {{ 'checked="' . $partner->disability == ' 0 ' . '"' }} />
                                                {{-- {!! Form::checkbox('', null, $partner->disability == ' 1 ', ['class' => 'checkbox']) !!} --}}
                                                <div class="knobs"></div>
                                                <div class="layer"></div>
                                            </div>
                                            <div class="d-none datas">
                                                {!! Form::checkbox('disability', 0, $partner->disability == ' 0 ') !!} <label for="">No</label>
                                                {!! Form::checkbox('disability', 1, $partner->disability == ' 1 ') !!} <label for="">Si</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Area verde:</label>
                                        <div class="form-check" style="margin-top: .7rem;">
                                            <div class="button r button-3">
                                                <input type="checkbox" class="checkbox"
                                                    {{ $partner->area == ' 0 ' ? '' : 'checked' }} />
                                                <div class="knobs"></div>
                                                <div class="layer"></div>
                                            </div>
                                            <div class="d-none datas">
                                                {!! Form::checkbox('area', 0, $partner->area == ' 0 ') !!} <label for="">No</label>
                                                {!! Form::checkbox('area', 1, $partner->area == ' 1 ') !!} <label for="">Si</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <style>
                                    .knobs,
                                    .layer {
                                        position: absolute;
                                        top: 0;
                                        right: 0;
                                        bottom: 0;
                                        left: 0;
                                    }

                                    .button {
                                        position: relative;
                                        top: 50%;
                                        width: 74px;
                                        height: 36px;
                                        margin: -10px auto 0 -25px;
                                        overflow: hidden;
                                    }

                                    .button.r,
                                    .button.r .layer {
                                        border-radius: 100px;
                                    }

                                    .button.b2 {
                                        border-radius: 2px;
                                    }

                                    .checkbox {
                                        position: relative;
                                        width: 100%;
                                        height: 100%;
                                        padding: 0;
                                        margin: 0 0 10px 0;
                                        opacity: 0;
                                        cursor: pointer;
                                        z-index: 3;
                                    }

                                    .knobs {
                                        z-index: 2;
                                    }

                                    .layer {
                                        width: 100%;
                                        background-color: #fff;
                                        transition: 0.3s ease all;
                                        z-index: 1;
                                        border: 1px solid #ced4da;
                                    }

                                    /* Button 3 */
                                    .button-3 .knobs:before {
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
                                        background-color: #fc544b;
                                        border-radius: 50%;
                                        transition: 0.3s ease all, left 0.3s cubic-bezier(0.18, 0.89, 0.35, 1.15);
                                    }

                                    .button-3 .checkbox:active+.knobs:before {
                                        width: 46px;
                                        border-radius: 100px;
                                    }

                                    .button-3 .checkbox:checked:active+.knobs:before {
                                        margin-left: -26px;
                                    }

                                    .button-3 .checkbox:checked+.knobs:before {
                                        content: "SI";
                                        left: 42px;
                                        background-color: #47c363;
                                    }

                                    .button-3 .checkbox:checked~.layer {
                                        background-color: #f1fceb;
                                    }
                                </style>
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        <label for="email">Correo</label>
                                        {!! Form::text('email', $partner->email, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                {{-- <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        <label for="age">Años</label>
                                        {!! Form::number('age', $partner->age, ['class' => 'form-control']) !!}
                                    </div>
                                </div> --}}
                                <div class="col-xl-2 col-md-4">
                                    <div class="form-group">
                                        <label for="age">Años</label>
                                        {!! Form::number('age', $partner->age, ['class' => 'form-control', 'id' => 'age']) !!}
                                    </div>
                                </div>
                                <div class="col-xl-2 col-md-4">
                                    <div class="form-group">
                                        <label for="age">F.Nacimiento</label>
                                        {!! Form::date('birth', $partner->birth, ['class' => 'form-control', 'id' => 'birth']) !!}
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Telefono</label>
                                        {!! Form::number('phone', $partner->phone, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        <label for="phone_emergency">Telefono de emergencia</label>
                                        {!! Form::number('phone_emergency', $partner->phone_emergency, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        <label for="certificate">Constancia medica</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-info" style="z-index: 0;" id="showFile"
                                                    type="button">Subir
                                                    Archivo</button>
                                            </div>
                                            <input type="text" id="nameFile" class="form-control"
                                                placeholder="Nombre de Archivo" readonly>
                                        </div>
                                        {!! Form::file('certificate', ['class' => 'd-none', 'id' => 'dataFile']) !!}
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6">
                                    <div class="form-group">
                                        <label for="certificate">Fotografía</label>
                                        <input type="button" class="btn btn-warning form-control getCamera"
                                            value="Actualizar" />
                                        <input type="file" class="d-none" accept="image/*" capture="camera"
                                            id="camera" />
                                        <canvas id="cam" width=64 height=64 class="d-none"></canvas>
                                        <div id="text" class="text-center">
                                            {!! Form::text('image-tag', 'data:image/jpeg;base64,' . $partner->foto, [
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

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <ul class="list-group">
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Constancia Medica
                                                @if ($partner->cer != null)
                                                    <span class="badge badge-success badge-pill"><i
                                                            class="bi bi-check"></i></span>
                                                @else
                                                    <span class="badge badge-danger badge-pill"><i
                                                            class="bi bi-x"></i></span>
                                                @endif
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Firma Digital
                                                @if ($partner->firma != null)
                                                    <span class="badge badge-success badge-pill"><i
                                                            class="bi bi-check"></i></span>
                                                @else
                                                    <span class="badge badge-danger badge-pill"><i
                                                            class="bi bi-x"></i></span>
                                                @endif
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Foto Socio
                                                @if ($partner->foto != null)
                                                    <span class="badge badge-success badge-pill"><i
                                                            class="bi bi-check"></i></span>
                                                @else
                                                    <span class="badge badge-danger badge-pill"><i
                                                            class="bi bi-x"></i></span>
                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Proceso para nueva firma digital y foto</label>
                                    </div>
                                </div> --}}

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <button class="btn btn-primary form-control" type="submit">Guardar</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include ('socios.webCam_Signature')
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
@endsection
