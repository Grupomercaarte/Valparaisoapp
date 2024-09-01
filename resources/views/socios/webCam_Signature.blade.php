<style>
    .drop-container {
        border-radius: .25rem;
        border: 1px solid #e4e6fc;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }

    .labelWeb {
        font-weight: 600;
        color: #34395e;
        font-size: 12px;
        letter-spacing: .5px;
    }

    #results img {
        border-radius: 0.25rem;
        border: 1px solid #e4e6fc;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }

    ul.nav-tabs li.nav-item a.nav-link.active i {
        color: #ffffff;
    }


    /* --------------------------------------------- */
    /* --------------------------------------------- */
    /* --------------------------------------------- */
    /* --------------------------------------------- */

    .signature-pad {
        margin: auto;
        height: auto;
    }

    .signature-pad--body {
        min-height: 360px;
    }

    /* .signature-pad--actions {
        overflow: hidden;
    }

    .signature-pad--actions>div:first-child {
        float: left;
    }

    .signature-pad--actions>div:last-child {
        float: right;
    } */


    /* --------------------------------------------- */
    /* --------------------------------------------- */
    /* --------------------------------------------- */
    /* --------------------------------------------- */
    /* --------------------------------------------- */
    .signature-pad {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        font-size: 10px;
        width: 100%;
        height: 100%;
        max-width: 700px;
        max-height: 460px;
        border: 1px solid #e8e8e8;
        background-color: #fff;
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.27), 0 0 40px rgba(0, 0, 0, 0.08) inset;
        border-radius: 4px;
        padding: 16px;
    }

    .signature-pad::before,
    .signature-pad::after {
        position: absolute;
        z-index: -1;
        content: "";
        width: 40%;
        height: 10px;
        bottom: 10px;
        background: transparent;
        box-shadow: 0 8px 12px rgba(0, 0, 0, 0.4);
    }

    .signature-pad::before {
        left: 20px;
        -webkit-transform: skew(-3deg) rotate(-3deg);
        transform: skew(-3deg) rotate(-3deg);
    }

    .signature-pad::after {
        right: 20px;
        -webkit-transform: skew(3deg) rotate(3deg);
        transform: skew(3deg) rotate(3deg);
    }

    .signature-pad--body {
        position: relative;
        -webkit-box-flex: 1;
        -ms-flex: 1;
        flex: 1;
        border: 1px solid #f4f4f4;
    }

    .signature-pad--body canvas {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        border-radius: 4px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.02) inset;
    }

    .signature-pad--footer {
        color: #C3C3C3;
        text-align: center;
        font-size: 1.2em;
        margin-top: 8px;
    }

    .signature-pad--actions {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        margin-top: 8px;
    }
</style>
<div class="modal fade" id="cameraModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalcameraModal">Fotografia del Socio</h5>
            </div>
            <div class="modal-body" id="cred">
                <div class="col-12 text-center">
                    <div id="results" class="mt-4">
                        <img id="image-conv"src="" />
                    </div>
                    <div class="row ml-4 mr-4 mt-3">
                        <div class="col-6">
                            <input type="button" class="btn btn-warning form-control getCamera"
                                value="Volver a Tomar" />
                        </div>
                        <div class="col-6">
                            <input type="button" class="btn btn-success form-control" data-dismiss="modal"
                                value="Guardar" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="modal fade" id="firmaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalfirmaModal">Firma Caligráfica</h5>
            </div>
            <div class="modal-body" id="cred">
                <div id="signature-pad" class="signature-pad">
                    <div class="signature-pad--body">
                        <canvas id="canvas" width="650" height="400" class="drop-container"></canvas>
                    </div>
                    <div style="display: flex;justify-content: space-between;" class="mt-3">
                        <button type="button" class="clear btn btn-danger" data-action="clear">Limpiar</button>
                        <button type="button" class="btn btn-warning" data-action="undo">Retroceder</button>
                        <input type="button" class="btn btn-success" id="btnDescargar" value="Guardar"
                            data-dismiss="modal" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script> --}}
<script src="{{ secure_url('js/signature-pad.js') }}"></script>
<script>
    /* var showFile2 = document.getElementById("showFile2");
    var nameFile2 = document.getElementById("nameFile2");
    var dataFile2 = document.getElementById("upload_photo");
    showFile2.onclick = function() {
        dataFile2.click();
        dataFile2.onchange = function() {
            nameFile2.value = dataFile2.files[0].name;
        }
    } */

    var cam = document.getElementById("cam");
    var ctx = cam.getContext("2d");
    var maxW = 680;
    var maxH = 510;

    var camera = document.getElementById('camera');
    var output = document.getElementById('image-tag');
    var imgprof = document.getElementById('image-prof');
    var imgconv = document.getElementById('image-conv');
    var photo = document.getElementById("photo");

    $(".getCamera").click(function(e) {
        camera.click();
        camera.addEventListener('change', handleFiles);
    });

    function handleFiles(e) {
        var img = new Image;
        img.onload = function() {
            var iw = img.width;
            var ih = img.height;
            var scale = Math.min((maxW / iw), (maxH / ih));
            var iwScaled = iw * scale;
            var ihScaled = ih * scale;
            cam.width = iwScaled;
            cam.height = ihScaled;
            ctx.drawImage(img, 0, 0, iwScaled, ihScaled);
            output.value = cam.toDataURL("image/jpeg", 0.8);
            imgconv.src = cam.toDataURL("image/jpeg", 0.8);
            if ($('#image-prof').length) {
                imgprof.src = cam.toDataURL("image/jpeg", 0.8);
            }
        }
        img.src = URL.createObjectURL(e.target.files[0]);
        $('#cameraModal').modal({
            backdrop: 'static',
            keyboard: false
        });
    }
</script>
<script>
    var wrapper = document.getElementById("signature-pad");
    var clearButton = wrapper.querySelector("[data-action=clear]");
    var changeColorButton = wrapper.querySelector("[data-action=change-color]");
    var undoButton = wrapper.querySelector("[data-action=undo]");
    let $btnDescargar = document.getElementById('btnDescargar');
    var canvas = wrapper.querySelector("canvas");
    var signaturePad = new SignaturePad(canvas, {
        backgroundColor: 'rgb(255, 255, 255)'
    });

    function resizeCanvas() {
        var ratio = Math.max(window.devicePixelRatio || 1, 1);

        canvas.width = canvas.offsetWidth * ratio;
        canvas.height = canvas.offsetHeight * ratio;
        canvas.getContext("2d").scale(ratio, ratio);

        signaturePad.clear();
    }

    // On mobile devices it might make more sense to listen to orientation change,
    // rather than window resize events.
    //window.onresize = resizeCanvas;

    function dataURLToBlob(dataURL) {
        // Code taken from https://github.com/ebidel/filer.js
        var parts = dataURL.split(';base64,');
        var contentType = parts[0].split(":")[1];
        var raw = window.atob(parts[1]);
        var rawLength = raw.length;
        var uInt8Array = new Uint8Array(rawLength);

        for (var i = 0; i < rawLength; ++i) {
            uInt8Array[i] = raw.charCodeAt(i);
        }

        return new Blob([uInt8Array], {
            type: contentType
        });
    }

    clearButton.addEventListener("click", function(event) {
        signaturePad.clear();
    });

    undoButton.addEventListener("click", function(event) {
        var data = signaturePad.toData();

        if (data) {
            data.pop(); // remove the last dot or line
            signaturePad.fromData(data);
        }
    });

    $btnDescargar.onclick = () => {
        $("#signData").val(canvas.toDataURL());
    };
</script>
