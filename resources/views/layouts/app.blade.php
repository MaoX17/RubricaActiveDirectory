<!DOCTYPE html>

    <html lang="it">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', app_name())</title>
        <meta name="description" content="@yield('meta_description', 'Laravel Boilerplate')">
        <meta name="author" content="@yield('meta_author', 'Maurizio Proietti')">
        @yield('meta')


        @stack('before-styles')

        <!-- Styles -->

        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">

        @stack('after-styles')
    </head>
    <body>

        <div id="app">

            @include('includes.nav')

            <div class="container container-fluid">
                @include('includes.partials.messages')
                @yield('content')
            </div><!-- container -->
        </div><!-- #app -->

        <!-- Scripts -->
        @stack('before-scripts')
            <!-- Scripts -->

        <script src="{{ secure_asset('js/app.js') }}" defer></script>


        @stack('after-scripts')

        @include('includes.partials.ga')
    </body>
</html>
