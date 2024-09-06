<style>
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 2;
        /* Sit on top */
        padding-top: 50px;
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
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
</style>

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
        content: "SI";
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
        content: "NO";
        left: 42px;
        background-color: #47c363;
    }

    .button-3 .checkbox:checked~.layer {
        background-color: #f1fceb;
    }
</style>

<div class="modal fade" id="fichaModal" id="exampleModalCenter" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Ficha Tecnica</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="cred">
                <ul class="mb-4 nav nav-pills nav-tabs" style="border-bottom: 1px solid #dee2e6;">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#antePatologicos">
                            <i class="fas fa-camera"></i> Antecedentes Patologicos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#anteNoPatologicos">
                            <i class="fas fa-image"></i> Antecedentes Personales No Patologicos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#datosMedicos">
                            <i class="fas fa-image"></i> Datos Medicos
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="antePatologicos" class="tab-pane active">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">
                                        ¿Es alergico a algun medicamento?
                                    </label>
                                    {!! Form::text('answers[]', null, [
                                        'class' => 'form-control',
                                        'id' => 'med_id',
                                        'placeholder' => 'En caso de "No" ser alergico, dejarlo en blanco.',
                                    ]) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <label class="text-danger">¿Cuenta con alguno de los siguientes padecimientos?</label>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Presión Arterial:</label>
                                                <div class="form-check">
                                                    <div class="button r button-3">
                                                        <input type="checkbox" class="checkbox" checked />
                                                        <div class="knobs"></div>
                                                        <div class="layer"></div>
                                                    </div>
                                                    <div class="d-none datas">
                                                        {!! Form::checkbox('answers[]', 1, false) !!} <label for="">Si</label>
                                                        {!! Form::checkbox('answers[]', 0, false) !!} <label for="">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Diabetes:</label>
                                                <div class="form-check">
                                                    <div class="button r button-3">
                                                        <input type="checkbox" class="checkbox" checked />
                                                        <div class="knobs"></div>
                                                        <div class="layer"></div>
                                                    </div>
                                                    <div class="d-none datas">
                                                        {!! Form::checkbox('answers[]', 1, false) !!} <label for="">Si</label>
                                                        {!! Form::checkbox('answers[]', 0, false) !!} <label for="">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Coagulaciones:</label>
                                                <div class="form-check">
                                                    <div class="button r button-3">
                                                        <input type="checkbox" class="checkbox" checked />
                                                        <div class="knobs"></div>
                                                        <div class="layer"></div>
                                                    </div>
                                                    <div class="d-none datas">
                                                        {!! Form::checkbox('answers[]', 1, false) !!} <label for="">Si</label>
                                                        {!! Form::checkbox('answers[]', 0, false) !!} <label for="">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Asma:</label>
                                                <div class="form-check">
                                                    <div class="button r button-3">
                                                        <input type="checkbox" class="checkbox" checked />
                                                        <div class="knobs"></div>
                                                        <div class="layer"></div>
                                                    </div>
                                                    <div class="d-none datas">
                                                        {!! Form::checkbox('answers[]', 1, false) !!} <label for="">Si</label>
                                                        {!! Form::checkbox('answers[]', 0, false) !!} <label for="">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Glandula tiroides:</label>
                                                <div class="form-check">
                                                    <div class="button r button-3">
                                                        <input type="checkbox" class="checkbox" checked />
                                                        <div class="knobs"></div>
                                                        <div class="layer"></div>
                                                    </div>
                                                    <div class="d-none datas">
                                                        {!! Form::checkbox('answers[]', 1, false) !!} <label for="">Si</label>
                                                        {!! Form::checkbox('answers[]', 0, false) !!} <label for="">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Hepaticos:</label>
                                                <div class="form-check">
                                                    <div class="button r button-3">
                                                        <input type="checkbox" class="checkbox" checked />
                                                        <div class="knobs"></div>
                                                        <div class="layer"></div>
                                                    </div>
                                                    <div class="d-none datas">
                                                        {!! Form::checkbox('answers[]', 1, false) !!} <label for="">Si</label>
                                                        {!! Form::checkbox('answers[]', 0, false) !!} <label for="">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Cardiacos:</label>
                                                <div class="form-check">
                                                    <div class="button r button-3">
                                                        <input type="checkbox" class="checkbox" checked />
                                                        <div class="knobs"></div>
                                                        <div class="layer"></div>
                                                    </div>
                                                    <div class="d-none datas">
                                                        {!! Form::checkbox('answers[]', 1, false) !!} <label for="">Si</label>
                                                        {!! Form::checkbox('answers[]', 0, false) !!} <label for="">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">Pulmonares:</label>
                                                <div class="form-check">
                                                    <div class="button r button-3">
                                                        <input type="checkbox" class="checkbox" checked />
                                                        <div class="knobs"></div>
                                                        <div class="layer"></div>
                                                    </div>
                                                    <div class="d-none datas">
                                                        {!! Form::checkbox('answers[]', 1, false) !!} <label for="">Si</label>
                                                        {!! Form::checkbox('answers[]', 0, false) !!} <label for="">No</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="anteNoPatologicos" class="tab-pane fade">

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="">
                                    ¿Fuma?, Escriba cuantos cigarros al día:
                                </label>
                                {!! Form::text('answers[]', null, [
                                    'class' => 'form-control',
                                    'id' => 'cig_id',
                                    'placeholder' => 'Dejar vacío en caso de "No" fumar.',
                                ]) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="">
                                    ¿Has recibido tratamiento medico ultimamente?, Especifique:
                                </label>
                                {!! Form::text('answers[]', null, [
                                    'class' => 'form-control',
                                    'id' => 'trat_id',
                                    'placeholder' => 'Dejar vacío en caso de ser "No" la respuesta.',
                                ]) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="">
                                    ¿Toma medicamentos para dormir o para los nervios?, Especifique:
                                </label>
                                {!! Form::text('answers[]', null, [
                                    'class' => 'form-control',
                                    'id' => 'sleep_id',
                                    'placeholder' => 'Dejar vacío en caso de ser "No" la respuesta.',
                                ]) !!}
                            </div>
                        </div>
                    </div>
                    <div id="datosMedicos" class="tab-pane fade">
                        <div class="row">

                            <div class="col-xl-4 col-md-6">
                                <div class="form-group">
                                    <label for="">Tipo de Cirugia:</label>
                                    {!! Form::text('answers[]', null, ['class' => 'form-control', 'id' => 'cirugia']) !!}
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="form-group">
                                    <label for="">Fecha de Cirugia:</label>
                                    {!! Form::date('answers[]', null, ['class' => 'form-control', 'id' => 'date_cirugia']) !!}
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="form-group">
                                    <label for="">Nombre del Medico:</label>
                                    {!! Form::text('answers[]', null, ['class' => 'form-control', 'id' => 'nom_medico']) !!}
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="form-group">
                                    <label for="">Tel. de contacto de Medico:</label>
                                    {!! Form::text('answers[]', null, ['class' => 'form-control', 'id' => 'tel_med']) !!}
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="form-group">
                                    <label for="">Numero de Sesiones Recomendadas:</label>
                                    {!! Form::text('answers[]', null, ['class' => 'form-control', 'id' => 'sesiones']) !!}
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="form-group">
                                    <label for="">Area a tratar:</label>
                                    {!! Form::text('answers[]', null, ['class' => 'form-control', 'id' => 'sesiones']) !!}
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="form-group">
                                    <label for="">Primera Sesion:</label>
                                    {!! Form::date('answers[]', null, ['class' => 'form-control', 'id' => 'one_sesion']) !!}
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="form-group">
                                    <label for="">Segunda Sesion:</label>
                                    {!! Form::date('answers[]', null, ['class' => 'form-control', 'id' => 'two_sesion']) !!}
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="form-group">
                                    <label for="">Tercera Sesion:</label>
                                    {!! Form::date('answers[]', null, ['class' => 'form-control', 'id' => 'three_sesion']) !!}
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="form-group">
                                    <label for="">Nombre del Terapeuta:</label>
                                    {!! Form::text('answers[]', null, ['class' => 'form-control', 'id' => 'terapeuta']) !!}
                                </div>
                            </div>
                            <hr>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Observaciones</label>
                                    {!! Form::textarea('answers[]', null, [
                                        'class' => 'form-control',
                                        'id' => 'observacion',
                                        'rows' => '5',
                                        'style' => 'height:70px;',
                                        'cols' => '50',
                                    ]) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="modal-footer">
                <input type="button" class="btn btn-warning" value="Cerrar" />
            </div> --}}
        </div>
    </div>
</div>

{{-- <div class="modal fade" id="documentsModal" id="exampleModalCenter" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Documentos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="cred">
                <iframe src="https://aguacalientevalparaiso.com/documentos"
                    style="width: 100%; height: 65vh; border: 1px solid #d7d7d7; border-radius: 10px;"></iframe>
            </div>
        </div>
    </div>
</div> --}}

<script>
    for (let i = 0; i < 8; i++) {
        let chk = document.getElementsByClassName('checkbox')[i];
        let dat = document.getElementsByClassName('datas')[i];
        chk.onclick = function() {
            if (chk.checked) {
                dat.children[0].checked = false;
                dat.children[2].checked = true;
            } else {
                dat.children[0].checked = true;
                dat.children[2].checked = false;
            }
        };
    }
</script>
