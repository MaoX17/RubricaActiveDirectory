@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
<div class="row mb-4">
    <div class="col-xl-8 col-md-12 col-sm-12 col-12">
        <h3>Contatti del personale</h3>
        <div>
            <div class="btn-group btn-group-sm" role="group">
                <a href="{{route('frontend.result', ['cognome' => 'all','servizio' => 'all','area' => 'all'])}}"
                    class="btn btn-secondary">Tutti</a>
                @for ($i=65; $i<=90; $i++) <a
                    href="{{route('frontend.result', ['cognome' => chr($i),'servizio' => 'all','area' => 'all'])}}"
                    class="btn btn-secondary">{{chr($i)}}</a>
                    @endfor

            </div>
        </div>

        <div>&nbsp;</div>

        <div>
            <form class="form-horizontal" action="<?=$_SERVER['SCRIPT_NAME']?>#risultati" method="get">
                @csrf
                <div class="form-group">
                    <label for="cognome" class="col-md-4 control-label">Cognome</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="cognome" id="cognome" placeholder="Cognome">
                    </div>
                </div>

                <div class="form-group">
                    <label for="area" class="col-md-4 control-label">Area</label>
                    <div class="col-md-4">
                        <select name="area" id="area" class="form-control">
                            <option value="%" selected="selected" label="area selezionata"></option>

                            @foreach($aree as $area)
                            <option value="{{$area}}" label="area selezionata">{{$area}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="servizio" class="col-md-4 control-label">Servizio</label>
                    <div class="col-md-4">
                        <select name="servizio" id="servizio" class="form-control">
                            <option value="%" selected="selected" label="servizio selezionato"></option>

                            @foreach($servizi as $servizio)
                            <option value="{{$servizio}}" label="servizio selezionato">{{$servizio}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Cerca</button>
            </form>
        </div>
    </div>

    <div class="col-xl-4 col-md-12 col-sm-12 col-12" id="istituzionali">
        <h3>Contatti Istituzionali</h3>

        <!-- Presidente -->
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#presidente"
            aria-expanded="false" aria-controls="presidente" data-parent="#istituzionali">
            Presidente
        </button>
        <div class="collapse col-sm-12 col-12" id="presidente">
            <div class="media">
                <div class="media-body pull-left">
                    <address>
                        <div>
                            <span itemprop="name" style="display:inline-block;">
                                <strong>
                                    Francesco Puggelli
                                </strong>
                            </span>
                            <br>

                            Ruolo:
                            <span style="display:inline-block;">
                                <strong>
                                    Presidente
                                </strong>
                            </span>
                            <br>

                            Email:
                            <span style="display:inline-block;">
                                <a href="mailto:presidente@provincia.prato.it">presidente@provincia.prato.it</a>
                            </span>
                            <br>

                            <abbr title="Phone">Tel:</abbr>
                            <span itemprop="telephone" style="display:inline-block;">

                                <a href="tel:+390574534501">+39 0574 534 501</a>
                            </span>
                        </div>
                    </address>
                </div>
            </div>
        </div>
        <br /><br />

        <!-- Vice Presidente -->
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#vicepresidente" aria-expanded="false"
            aria-controls="vicepresidente" data-parent="#istituzionali">
            Vice Presidente
        </button>
        <div class="collapse col-sm-12 col-12" id="vicepresidente">
            <div class="media">
                <div class="media-body pull-left">
                    <address>
                        <div>
                            <span itemprop="name" style="display:inline-block;">
                                <strong>
                                    Paola Tassi
                                </strong>
                            </span>
                            <br>

                            Ruolo:
                            <span style="display:inline-block;">
                                <strong>
                                    Vice Presidente
                                </strong>
                            </span>
                            <br>

                            Email:
                            <span style="display:inline-block;">
                                <a href="mailto:ptassi@provincia.prato.it">ptassi@provincia.prato.it</a>
                            </span>
                            <br>

                            <abbr title="Phone">Tel:</abbr>
                            <span itemprop="telephone" style="display:inline-block;">

                                <a href="tel:+390574534501">+39 0574 534 501</a>
                            </span>
                        </div>
                    </address>
                </div>
            </div>
        </div>
        <br /><br />

        <!-- Segretario Generale -->
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#segretariogenerale" aria-expanded="false"
            aria-controls="segretariogenerale" data-parent="#istituzionali">
            Segretario Generale
        </button>
        <div class="collapse col-sm-12 col-12" id="segretariogenerale">
            <div class="media">
                <div class="media-body pull-left">
                    <address>
                        <div>
                            <span itemprop="name" style="display:inline-block;">
                                <strong>
                                    Simonetta Fedeli
                                </strong>
                            </span>
                            <br>

                            Ruolo:
                            <span style="display:inline-block;">
                                <strong>
                                    Segretario Generale
                                </strong>
                            </span>
                            <br>

                            Email:
                            <span style="display:inline-block;">
                                <a href="mailto:sfedeli@provincia.prato.it">sfedeli@provincia.prato.it</a>
                            </span>
                            <br>

                            <abbr title="Phone">Tel:</abbr>
                            <span itemprop="telephone" style="display:inline-block;">

                                <a href="tel:+390574534616">+39 0574 534 616</a>
                            </span>
                        </div>
                    </address>
                </div>
            </div>
        </div>



    </div>


</div>
<!--row-->



@foreach($servizi as $servizio)
{{$servizio}}
@endforeach


@foreach($aree as $area)
{{$area}}
@endforeach



<div class="row mb-4">
    <div class="col">
        <example-component></example-component>
        <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->merge('https://rubrica2.provincia.prato.it/img/stemma.png', 0.4, true)
                                    ->size(200)->errorCorrection('H')
                                    ->generate('W3Adda Laravel Tutorial')) !!} ">
    </div>
    <!--col-->
</div>
<!--row-->

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <i class="fab fa-font-awesome-flag"></i> Font Awesome @lang('strings.frontend.test')
            </div>
            <div class="card-body">
                <i class="fas fa-home"></i>
                <i class="fab fa-facebook"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-pinterest"></i>
            </div>
            <!--card-body-->
        </div>
        <!--card-->
    </div>
    <!--col-->
</div>
<!--row-->
@endsection
