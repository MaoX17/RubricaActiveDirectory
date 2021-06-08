<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <a href="{{ route('index') }}" class="navbar-brand">{{ app_name() }}</a>

    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="@lang('labels.general.toggle_navigation')">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav">

            <li class="nav-item"><a href="{{route('credits')}}" class="nav-link">Credits</a></li>
        </ul>
    </div>
</nav>
