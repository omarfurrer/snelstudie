<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
        <div id="app">
            @include("subviews.navbars.admin")
            <div class="app-body">
                @include("subviews.sidebars.admin")
                <main class="main">
                    <div class="container-fluid">
                        <div class="animated fadeIn mt-3">
                            @yield('content')
                        </div>
                    </div>
                </main>
            </div>
        </div>

        <script src="{{ asset('js/app.js') }}"></script>

        <script>
function deleteModel(event, form_id, message) {
    event.preventDefault();
    if (confirm(message)) {
        document.getElementById(form_id).submit();
        return true;
    }
    return false;
}
tinymce.init({
    selector: '.tiny-editor'
});
        </script>

        @stack('scripts')
    </body>
</html>
