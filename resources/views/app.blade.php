<!doctype html>
<html ⚡>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="black">
    <meta name="description" content="A simple blog make by laravel.">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Files</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//picsum.photos">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" async></script>

    <!-- Styles -->
    <link ref="stylesheet" type="text/css" href="dist/snackbar.min.css" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" async>
    <style amp-custom type="text/css">
        .p1 {
            -webkit-line-clamp: 1;
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            white-space: normal;
        }

        .new-line {
            word-break: break-all;
            word-wrap: break-word;
            table-layout: fixed;
            white-space: pre-line;
        }

        a:link {
            color: #000;
            text-decoration: none;
        }

        a:visited {
            color: #000;
        }

        a:hover {
            color: #000;
        }

        a:active {
            color: #000;
        }
    </style>

    <link rel="apple-touch-icon" href="/download.png">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Files
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>



</html>