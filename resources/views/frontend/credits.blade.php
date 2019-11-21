@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
<div class="row">

    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
        <h3>Autore dell'applicazione</h3>
    </div>
</div>


<div class="row row-offcanvas row-offcanvas-right">

    <!-- Colonna centrale-SX -->
    <div class="col-xs-12 col-sm-9">

        <address>
            <strong>Maurizio Proietti</strong><br>
            <abbr title="Phone">P:</abbr> (0574) 534-1
        </address>

        <address>
            <strong>Contatto Email</strong><br>
            <a href="mailto:webmaster@provincia.prato.it?subject=Rubrica...">webmaster@provincia.prato.it</a>
        </address>


    </div>
    <!-- /Colonna Centrale-SX -->

</div>
<!--/row-->


@endsection
