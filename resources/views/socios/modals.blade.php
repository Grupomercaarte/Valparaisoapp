<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap');

    .cred {
        display: flex;
        flex-direction: column;
        align-items: center;
        position: relative;
    }

    #anverso_cred,
    #reverso_cred {
        width: 85mm;
        height: 54mm;
        position: inherit;
        border: 1px solid #C32615;
        border-radius: 15px;
        font-family: 'Montserrat', sans-serif;
    }

    #digital {
        width: 170mm;
        height: 260mm;
        position: inherit;
        background-color: #fff;
        border-radius: 46px;
        font-family: 'Montserrat', sans-serif;
    }

    #digital.imgGen,
    #digital .imgGen {
        width: 85mm;
        height: 130mm;
    }

    #digital .imgGen {
        transition: 0.3s ease;
    }

    .profile_cred {
        width: 25mm;
        height: 30mm;
        position: absolute;
        left: 5mm;
        top: 13mm;
        border-radius: 5px;
    }

    .profile_dig {
        width: 65mm;
        height: 86mm;
        position: absolute;
        left: 10mm;
        top: 65mm;
        /* border-radius: 5px; */
    }

    .background_cred {
        width: 85mm;
        border-radius: 5px;
        position: relative;
        width: 100%;
        height: 100%;
    }

    .socio_cred {
        position: absolute;
        right: 4mm;
        bottom: 3mm;
        width: 43mm;
        font-size: 12pt;
        text-align: right;
        font-weight: 700;
        text-shadow: rgba(0, 0, 0, 0.75) 2px 2px 5px;
        color: #fff;
    }

    #digital .socio_cred {
        top: 130mm;
        right: 12mm;
        width: 88mm;
        font-size: 24pt;
        line-height: normal;
    }

    .numsocio_cred {
        position: absolute;
        right: 4mm;
        bottom: 8mm;
        font-size: 10pt;
        font-weight: 800;
        color: #fff;
    }

    .phone_cred {
        position: absolute;
        left: 4mm;
        bottom: 2mm;
        font-size: 10pt;
        color: #fff;
    }

    #digital .phone_cred {
        bottom: 65mm;
        font-size: 20pt;
        left: 12mm;
    }

    .firma_cred {
        border: #444444 solid 1px;
        border-radius: 2mm;
        padding: 2mm;
        position: absolute;
        right: 5mm;
        bottom: 8mm;
        width: 30mm;
        background: white
    }

    #digital .firma_cred {
        bottom: 10mm;
        width: 60mm;
        left: 10mm;
        border-radius: 4mm;
        padding: 4mm;
        border: #C32615 solid 2px;
    }

    .qr_cred {
        position: absolute;
        left: 5mm;
        bottom: 5mm;
        text-align: center;
    }

    #digital .qr_cred {
        left: 88mm;
        bottom: 10mm;
        padding: 20px;
        background: white;
        width: fit-content;
        border: #C32615 solid 2px;
        border-radius: 4mm;
        padding: 4mm;
    }

    .qr_cred img {
        width: 23mm;
    }

    #digital .qr_cred img {
        width: 60mm;
        height: 60mm;
    }

    .num_socio {
        position: absolute;
        transform: rotate(-90deg);
        color: #444444;
        font-weight: 600;
        top: 8mm;
        left: 15mm;
    }

    #digital .num_socio {
        color: white;
        transform: rotate(0deg);
        font-size: 20pt;
        width: fit-content;
        height: fit-content;
        top: 175mm;
        left: 12mm;
    }

    .btn-printC {
        width: 85mm;
    }
</style>

<div class="modal fade" id="QRModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                {{-- <h5 class="modal-title" id="exampleModalLongTitle">Credencial</h5> --}}
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="profile-tab" data-toggle="tab" data-target="#profile"
                            type="button" role="tab" aria-controls="profile" aria-selected="false">Digital</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="home-tab" data-toggle="tab" data-target="#home" type="button"
                            role="tab" aria-controls="home" aria-selected="true">Física</button>
                    </li>
                </ul>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="cred">
                            {{-- <button class="btn btn-primary mb-4 btn-printC" id="crearimagen">Imagen Credencial</button> --}}
                            {{-- @include('socios.cred_digital') --}}
                        </div>
                    </div>
                    <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="cred">
                            @include('socios.cred_fisica')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
