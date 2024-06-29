@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Alta de socios</h3>
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

                            {!! Form::open(['route' => 'socios.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                            <div class="row">
                                <div class="col-md-2 col-12">
                                    <div class="form-group">
                                        <label for="business_id">Pertenece</label>
                                        {!! Form::select('business_id', $negocios, [], ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-8">
                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="form-group">
                                        <label for="last_name">Primer apellido</label>
                                        {!! Form::text('last_name', null, ['class' => 'form-control', 'id' => 'last_name']) !!}
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="form-group">
                                        <label for="second_lastname">Segundo apellido</label>
                                        {!! Form::text('second_lastname', null, [
                                            'class' => 'form-control',
                                            'id' => 'second_lastname',
                                            'placeholder' => 'Opcional',
                                        ]) !!}
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="form-group">
                                        <label for="discount">identifier</label>
                                        {!! Form::text('identifier', null, [
                                            'class' => 'form-control',
                                            'id' => 'identifier',
                                            'placeholder' => 'Identificador',
                                        ]) !!}
                                    </div>
                                </div>
                                {{-- <div class="form-group">
                                    <label for="discount">Tipo descuento</label>
                                    {!! Form::text('discount', null, [
                                        'class' => 'form-control',
                                        'id' => 'discount',
                                        'placeholder' => 'Tipo descuento',
                                    ]) !!}
                                </div> --}}
                                <div class="col-xl-3 col-md-6">
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
                                <div class="col-xl-3 col-md-6">
                                    <div class="form-group">
                                        <label for="reason">Motivo descuento</label>
                                        {!! Form::text('reason', null, [
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
                                <div class="col">
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
                                <style>
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
                                </style>
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        <label for="email">Correo</label>
                                        {!! Form::text('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Opcional']) !!}
                                    </div>
                                </div>
                                <div class="col-xl-2 col-md-4">
                                    <div class="form-group">
                                        <label for="age">Años</label>
                                        {!! Form::number('age', null, ['class' => 'form-control', 'id' => 'age']) !!}
                                    </div>
                                </div>
                                <div class="col-xl-2 col-md-4">
                                    <div class="form-group">
                                        <label for="age">F.Nacimiento</label>
                                        {!! Form::date('birth', null, ['class' => 'form-control', 'id' => 'birth']) !!}
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Telefono</label>
                                        {!! Form::number('phone', null, ['class' => 'form-control', 'id' => 'phone']) !!}
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        <label for="phone_emergency">Teléfono de emergencia</label>
                                        {!! Form::number('phone_emergency', null, ['class' => 'form-control', 'id' => 'phone_emergency']) !!}
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group">
                                        <label for="certificate">Constancia medica</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-warning" style="z-index: 0;" id="showFile"
                                                    type="button">Subir
                                                    Archivo</button>
                                            </div>
                                            <input type="text" id="nameFile" class="form-control"
                                                placeholder="Nombre de Archivo" readonly>
                                        </div>
                                        {!! Form::file('certificate', ['class' => 'd-none', 'id' => 'dataFile']) !!}
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        @include ('socios.webCam_Signature')
                                    </div>
                                </div>

                                @include ('socios.ficha_tecnica')
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
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
@endsection
