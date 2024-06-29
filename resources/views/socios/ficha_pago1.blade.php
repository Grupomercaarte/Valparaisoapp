<style>
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        padding-top: 100px;
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


{{-- <script>
    //---------------------------------
    //  Ficha Tecnica Modal
    //---------------------------------
    var modalPago = document.getElementById("fichaModal");
    var btnPago = document.getElementById("myBtn");
    var spanPago = document.getElementsByClassName("close")[0];
    var saveBtnPago = document.getElementById('saveBtn');
    var backBtnPago = document.getElementById('backBtn');

    btnPago.onclick = function() {
        modalPago.style.display = "block";
    }

    spanPago.onclick = function() {
        modalPago.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modalPago) {
            modalPago.style.display = "none";
        }
    }

    backBtnPago.disabled = true;
    saveBtnPago.onclick = function(event) {
        backBtnPago.disabled = false;
    }

    backBtnPago.onclick = function(event) {
        location.replace(document.getElementById('urlIndex').value);
    }
</script> --}}
