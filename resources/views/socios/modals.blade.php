<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap');

    .wrapper {
        width: 320px;
        height: 540px;
        background: #FDFEFF;
        transition: background 0.6s ease;
        border-radius: 10px;
        padding: 20px 20px 20px 20px;
        box-shadow: 0 8px 40px rgba(0, 0, 0, 0.2);
    }

    .wrapper .top-icons i {
        color: #080911;
    }

    .wrapper .top-icons i:nth-of-type(1) {
        float: left;
    }

    .wrapper .top-icons i:nth-of-type(2) {
        float: right;
    }

    .wrapper .top-icons i:nth-of-type(3) {
        float: right;
        padding-right: 0.8em;
    }

    .wrapper .profile {
        margin-top: 2.2em;
        position: relative;
    }

    .wrapper .profile:after {
        width: 100%;
        height: 1px;
        content: " ";
        display: block;
        margin-top: 1.3em;
        background: #E9EFF6;
    }

    .wrapper .profile .check,
    .wrapper .profile .checkout {
        position: absolute;
        right: 85px;
        top: 95px;
    }

    .wrapper .profile .check i,
    .wrapper .profile .checkout i {
        color: #fff;
        width: 30px;
        height: 30px;
        font-size: 15px;
        line-height: 31px;
        text-align: center;
        border-radius: 100%;
    }

    .wrapper .profile .check i {
        background: linear-gradient(to bottom right, #218838, #81d694);
    }

    .wrapper .profile .checkout i {
        background: linear-gradient(to bottom right, #e94037, #e67974);
    }

    .wrapper .profile .thumbnail {
        width: 124px;
        height: 124px;
        display: flex;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 1.5em;
        border-radius: 100%;
        box-shadow: 0 13px 26px rgba(0, 0, 0, 0.2), 0 3px 6px rgba(0, 0, 0, 0.2);
    }

    .wrapper .profile .name {
        color: #2D354A;
        font-size: 20px;
        font-weight: 600;
        text-align: center;
    }

    .title-userinfo {
        color: #7C8097;
        font-size: 0.85em;
        font-weight: 300;
        text-align: center;
        padding-top: 0.5em;
        /* padding-bottom: 0.7em; */
        letter-spacing: 1.5px;
        text-transform: uppercase;
    }

    .wrapper .profile .description {
        color: #080911;
        font-size: 12px;
        /* font-weight: 300; */
        text-align: center;
        margin-bottom: 1.3em;
    }

    .btn-userinfo {
        color: #fff;
        width: 130px;
        height: 42px;
        outline: none;
        border: none;
        display: block;
        cursor: pointer;
        font-weight: 300;
        margin-left: auto;
        margin-right: auto;
        border-radius: 70px;
        box-shadow: 0 13px 26px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.16);
        background: linear-gradient(to bottom right, #6777ef, #a2aaee);
    }

    .wrapper .social-icons {
        display: flex;
        margin-top: 1.2em;
        justify-content: space-between;
    }

    .wrapper .social-icons .icon {
        display: flex;
        align-items: center;
        flex-direction: column;
    }

    .wrapper .social-icons .icon a {
        color: #fff;
        width: 60px;
        height: 60px;
        font-size: 28px;
        line-height: 60px;
        text-align: center;
        border-radius: 30px;
        box-shadow: 0 13px 26px rgba(0, 0, 0, 0.2), 0 3px 6px rgba(0, 0, 0, 0.2);
    }

    .wrapper .social-icons .icon:nth-of-type(1) a {
        background: linear-gradient(to bottom right, #C90A6D, #FF48A0);
    }

    .wrapper .social-icons .icon:nth-of-type(2) a {
        background: linear-gradient(to bottom right, #5E5AEC, #3F9EFC);
    }

    .wrapper .social-icons .icon:nth-of-type(3) a {
        background: linear-gradient(to bottom right, #6452E9, #639FF9);
    }

    .wrapper .social-icons .icon h4 {
        color: #080911;
        font-size: 1em;
        margin-top: 1.3em;
        margin-bottom: 0.2em;
    }

    .wrapper .social-icons .icon p {
        color: #666B7D;
        font-size: 12px;
    }

    .concept {
        position: absolute;
        bottom: 25px;
        color: #AAB0C4;
        font-size: 0.9em;
        font-weight: 400;
    }

    .concept a {
        color: #ac1966;
        text-decoration: none;
    }
</style>

<div class="modal fade" id="infoUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content wrapper">
            <div class="top-icons">
                <a data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </a>
            </div>

            <div class="profile">
                <img src="data:image/png;base64,{{ $partnerData->foto }}" class="thumbnail">
                @if ($partnerData->status == 1)
                    <div class="check"><i class="fas fa-check"></i></div>
                @else
                    <div class="checkout"><i class="fas fa-times"></i></div>
                @endif
                <h3 class="name">
                    {{ $partnerData->name . ' ' . $partnerData->last_name . ' ' . $partnerData->second_lastname }}</h3>
                <p class="description">
                    <b>ID:</b> {{ strtoupper($partnerData->identifier) }}
                    <br>
                    <b>Edad:</b> {{ $partnerData->age }}
                    <br>
                    <b>Descuento:</b> {{ ucfirst(strtolower($partnerData->discount)) }}
                    <br>
                    @if ($partnerData->discount != 'ninguno')
                        <b>Motivo:</b> {{ ucfirst(strtolower($partnerData->reason)) }}
                        <br>
                    @endif
                    <b>Emergencia:</b> {{ $partnerData->phone_emergency }}
                </p>
            </div>
            <p class="title-userinfo">Num. socio: {{ $partnerData->num_socio }}</p>

            @if ($partnerData->status == 1)
                {!! Form::open([
                    'route' => ['visitas.store', 'id' => $partnerData->id, 'method' => 'POST', 'enctype' => 'multipart/form-data'],
                ]) !!}
                <button class="btn-userinfo">Registrar Entrada</button>
                {!! Form::close() !!}
            @endif

            {{-- <div class="social-icons">
                <div class="icon">
                    <a href="/"><i class="fab fa-dribbble"></i></a>
                    <h4>12.8k</h4>
                    <p>Followers</p>
                </div>

                <div class="icon">
                    <a href="#"><i class="fab fa-behance"></i></a>
                    <h4>12.8k</h4>
                    <p>Followers</p>
                </div>

                <div class="icon">
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <h4>12.8k</h4>
                    <p>Followers</p>
                </div>
            </div> --}}
            {{-- <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Información del Socio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="dropdown-divider"></div>
            <div class="modal-body">
                <div class="row w-100">
                    <div class="col-lg-5 text-center mb-4">
                        <img class="profile_cred" src="data:image/png;base64,{{ $partnerData->foto }}" alt="Red dot" />
                        @if ($partnerData->status == 1)
                            <span class="badge badge-success badge-pill status">Activo</span>
                        @else
                            <span class="badge badge-danger badge-pill status">Baja</span>
                        @endif
                    </div>
                    <div class="col-lg-7">
                        <p class="socio_cred">
                            <b>Socio: </b>
                            {{ $partnerData->name . ' ' . $partnerData->last_name . ' ' . $partnerData->second_lastname }}
                        </p>
                        <p class="num_socio">
                            <b>Num. socio: </b>
                            {{ $partnerData->num_socio }}
                        </p>
                        <p class="phone_cred">
                            <b>Teléfono: </b>
                            {{ $partnerData->phone }}
                        </p>
                        @if ($partnerData->status != 1)
                            <p class="motiv_desert">
                                <b>Motivo de baja: </b>
                                {{ $partnerData->comm }}
                            </p>
                        @endif
                        <img class="firma_cred" src="{{ $partnerData->firma }}">
                    </div>
                    @if ($partnerData->status == 1)
                        {!! Form::open([
                            'route' => ['visitas.store', 'id' => $partnerData->id, 'method' => 'POST', 'enctype' => 'multipart/form-data'],
                        ]) !!}
                        <button class="btn btn-primary regist">Deseas Registrar Entrada?</button>
                        {!! Form::close() !!}
                    @endif
                </div>
            </div> --}}
        </div>
    </div>
</div>
{{-- <div id="anverso_cred" class="mb-5">
    <img class="profile_cred" src="data:image/png;base64,{{ $partnerData->foto }}" alt="Red dot" />
    <img src="{{ asset('/img/anverso.png?v1') }}" class="background_cred" />
    <p class="socio_cred">
        {{ $partnerData->name . ' ' . $partnerData->last_name . ' ' . $partnerData->second_lastname }}
    </p>
    <span class="phone_cred">Tel: {{ $partnerData->phone }}</span>
</div>
<div id="reverso_cred">
    <img class="background_cred" src="{{ asset('/img/reverso.png?v1') }}" />
    <div class="qr_cred">
        <img src="data:image/png;base64,{!! base64_encode(
            QrCode::size(100)->format('png')->generate($partnerData->num_socio),
        ) !!}" alt="">
        <br>
        <p class="num_socio">{{ $partnerData->num_socio }}</p>
    </div>
    <img class="firma_cred" src="{{ $partnerData->firma }}">
</div>
<a href="{{ route('socios.imprimir', $partnerData->id) }}" class="btn btn-primary mt-4 btn-printC"
    target="blank">Imprimir</a> --}}



{{-- <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="cred">
            <button class="btn btn-primary mb-4 btn-printC" id="crearimagen">Imagen Credencial</button>
            @include('socios.cred_digital')
        </div>
    </div>
    <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="cred">
            @include('socios.cred_fisica')
        </div>
    </div>
</div> --}}
{{-- <script>
    $(document).ready(function() {
        setTimeout(() => {
            html2canvas($("#digital"), {
                onrendered: function(canvas) {
                    var img = canvas.toDataURL("image/png");

                    setTimeout(() => {
                        $('#digital').html(`<img class="imgGen" src="${img}"/>`);
                        $('#digital').addClass('imgGen');
                    }, 100);
                }
            });
        }, 400);
    });
</script> --}}
