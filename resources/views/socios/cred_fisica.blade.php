<div id="anverso_cred" class="mb-5">
    <img class="profile_cred" src="data:image/png;base64,{{ $partnerData->foto }}" alt="Red dot" />
    <img src="{{ secure_url('/img/anverso.png?v1') }}" class="background_cred" />
    <p class="socio_cred">
        {{ $partnerData->name . ' ' . $partnerData->last_name . ' ' . $partnerData->second_lastname }}
    </p>
    <span class="phone_cred">Tel: {{ $partnerData->phone }}</span>
</div>
<div id="reverso_cred">
    <img class="background_cred" src="{{ secure_url('/img/reverso.png?v1') }}" />
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
    target="blank">Imprimir</a>
