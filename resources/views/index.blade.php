@extends('layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
<div class="row mb-4">
    <div class="col-lg-7 col-md-12 col-sm-12 col-12">
        <h3>Contatti del personale</h3>
        <div>
            <div class="btn-group btn-group" role="group">
                <a href="{{route('result', ['cognome' => 'all','servizio' => 'all','area' => 'all'])}}"
                    class="btn btn-secondary">Tutti</a>
                @for ($i=65; $i<=76; $i++) <a
                    href="{{route('result', ['cognome' => chr($i),'servizio' => 'all','area' => 'all'])}}"
                    class="btn btn-secondary">{{chr($i)}}</a>
                    @endfor
            </div>
            <div class="btn-group btn-group" role="group">
                @for ($i=77; $i<=90; $i++) <a
                    href="{{route('result', ['cognome' => chr($i),'servizio' => 'all','area' => 'all'])}}"
                    class="btn btn-secondary">{{chr($i)}}</a>
                    @endfor

            </div>

        </div>



        <div>&nbsp;</div>

        <div>
            <form class="form-horizontal" action="{{route('result', ['all','all','all'])}}#risultati" method="get">
                @csrf
                <div class="form-group">
                    <label for="cognome" class="col-md-4 control-label">Cognome o Nome</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="cognome" id="cognome" placeholder="Cognome">
                    </div>
                </div>

                <div class="form-group">
                    <label for="area" class="col-md-4 control-label">Area</label>
                    <div class="col-md-4">
                        <select name="area" id="area" class="form-control">
                            <option value="all" selected="selected" ></option>

                            @foreach($aree as $area)
                            <option value="{{$area}}" >{{$area}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="servizio" class="col-md-4 control-label">Servizio</label>
                    <div class="col-md-4">
                        <select name="servizio" id="servizio" class="form-control">
                            <option value="all" selected="selected" ></option>

                            @foreach($servizi as $servizio)
                            <option value="{{$servizio}}" >{{$servizio}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Cerca</button>
            </form>
        </div>
    </div>

    <div class="col-lg-5 col-md-12 col-sm-12 col-12" id="istituzionali">
        <h3>Contatti Istituzionali</h3>

        <!-- Presidente -->
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#presidente"
            aria-expanded="false" aria-controls="presidente" data-parent="#istituzionali">
            Presidente
        </button>
        <div class="collapse col-sm-12 col-12" id="presidente">
            <div class="card" style="width: 17rem;">
                <div class="card-header">
                    Presidente
                </div>
                <img class="card-img-top" src="data:image/png;base64,
{!!
base64_encode(QrCode::format('png')
->size(200)
->generate('BEGIN:VCARD
VERSION:4.0
FN:Francesco Puggelli Presidente
ORG:Provincia di Prato
TITLE:Presidente
TEL;TYPE=work,voice;VALUE=uri:tel:+39-0574-534-501
EMAIL:presidente@provincia.prato.it
END:VCARD'))
!!}" alt="QR-Code">
                <div class="card-body">
                    <h5 class="card-title">Francesco Puggelli</h5>
                    <p class="card-text">

                        Email:
                        <span style="display:inline-block;">
                            <a href="mailto:presidente@provincia.prato.it">presidente@provincia.prato.it</a>
                        </span>
                        <br>

                        <abbr title="Phone">Tel:</abbr>
                        <span itemprop="telephone" style="display:inline-block;">

                            <a href="tel:+390574534501">+39 0574 534 501</a>
                        </span>
                    </p>

                </div>
            </div>
        </div>
        <br /><br />

        <!-- Vice Presidente -->
<!--
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#vicepresidente"
            aria-expanded="false" aria-controls="vicepresidente" data-parent="#istituzionali">
            Vice Presidente
        </button>
        <div class="collapse col-sm-12 col-12" id="vicepresidente">
            <div class="card" style="width: 17rem;">
                <div class="card-header">
                    Vice Presidente
                </div>
                <img class="card-img-top" src="data:image/png;base64,
        {!!
        base64_encode(QrCode::format('png')
        ->size(200)
        ->generate('BEGIN:VCARD
VERSION:4.0
FN:Paola Tassi
ORG:Provincia di Prato
TITLE:Vice Presidente
TEL;TYPE=work,voice;VALUE=uri:tel:+39-0574-534-501
EMAIL:ptassi@provincia.prato.it
END:VCARD'))
        !!}" alt="QR-Code">
                <div class="card-body">
                    <h5 class="card-title">Paola Tassi</h5>
                    <p class="card-text">

                        Email:
                        <span style="display:inline-block;">
                            <a href="mailto:ptassi@provincia.prato.it">ptassi@provincia.prato.it</a>
                        </span>
                        <br>

                        <abbr title="Phone">Tel:</abbr>
                        <span itemprop="telephone" style="display:inline-block;">

                            <a href="tel:+390574534501">+39 0574 534 501</a>
                        </span>
                    </p>

                </div>
            </div>
        </div>
        <br /><br />
-->



        <!-- Segretario Generale -->
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#segretariogenerale"
            aria-expanded="false" aria-controls="segretariogenerale" data-parent="#istituzionali">
            Segretario Generale
        </button>
        <div class="collapse col-sm-12 col-12" id="segretariogenerale">
            <div class="card" style="width: 17rem;">
                <div class="card-header">
                    Segretario Generale
                </div>
                <img class="card-img-top" src="data:image/png;base64,
                {!!
                base64_encode(QrCode::format('png')
                ->size(200)
                ->generate('BEGIN:VCARD
VERSION:4.0
FN:Simonetta Fedeli
ORG:Provincia di Prato
TITLE:Segretario Generale
TEL;TYPE=work,voice;VALUE=uri:tel:+39-0574-534-623
EMAIL:sfedeli@provincia.prato.it
END:VCARD'))
!!}" alt="QR-Code">
                <div class="card-body">
                    <h5 class="card-title">Simonetta Fedeli</h5>
                    <p class="card-text">

                        Email:
                        <span style="display:inline-block;">
                            <a href="mailto:sfedeli@provincia.prato.it">sfedeli@provincia.prato.it</a>
                        </span>
                        <br>

                        <abbr title="Phone">Tel:</abbr>
                        <span itemprop="telephone" style="display:inline-block;">

                            <a href="tel:+390574534623">+39 0574 534 623</a>
                        </span>
                    </p>


                </div>
            </div>
        </div>
        <br /><br />



    </div>


</div>
<!--row-->



<div class="row mb-4" id="risultati">


@if (count($results) < 10 && count($results) > 0)
    @foreach ($results as $user)


    <div class="col-sm-6">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
              <div class="col-md-5">
                <img class="card-img" src="data:image/png;base64,
                    {!!
                    base64_encode(QrCode::format('png')
                    ->size(200)->errorCorrection('L')
                    ->generate($user->getVcard()))!!}" alt="QR-Code">
              </div>
              <div class="col-md-7">
                <div class="card-body">
                  <h5 class="card-title">
                      <strong>
                        {{ $user->getNomeCompleto() }}
                      </strong>
                    </h5>

                    <address class="card-text">
                        <strong>
                            {{ $user->getNomeCompleto() }} <br>
                        </strong>

                        Ruolo:
                        <strong>
                            {{ $user->getJobTitle() }}<br>
                        </strong>
                        Servizio:
                        <strong>
                        {{ $user->getServizio() }}<br>
                        </strong>
                        Area:
                        <strong>
                        {{ $user->getArea() }}<br>
                        </strong>

                        <a href="mailto:" {{ $user->getEmail() }}>{{ $user->getEmail() }}</a><br>
                        <abbr title="Phone">Tel:</abbr>
                        <a href="tel:+39 {{ $user->getTel() }}">+39 {{ $user->getTel() }}</a>
                    </address>

                </div>
              </div>
            </div>
          </div>




    </div>

    @endforeach
@else
@foreach ($results as $user)


<div class="col-sm-6">
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img class="card-img" src="/user.jpg" alt="QR-Code">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <h5 class="card-title">
                  <strong>
                    {{ $user->getNomeCompleto() }}
                  </strong>
                </h5>

                <address class="card-text">
                    <strong>
                        {{ $user->getNomeCompleto() }} <br>
                    </strong>

                    Ruolo:
                    <strong>
                        {{ $user->getJobTitle() }}<br>
                    </strong>
                    Servizio:
                    <strong>
                    {{ $user->getServizio() }}<br>
                    </strong>
                    Area:
                    <strong>
                    {{ $user->getArea() }}<br>
                    </strong>

                    <a href="mailto:" {{ $user->getEmail() }}>{{ $user->getEmail() }}</a><br>
                    <abbr title="Phone">Tel:</abbr>
                    <a href="tel:+39 {{ $user->getTel() }}">+39 {{ $user->getTel() }}</a>
                </address>

            </div>
          </div>
        </div>
      </div>




</div>

@endforeach
@endif

</div>
<!--row-->


@endsection
