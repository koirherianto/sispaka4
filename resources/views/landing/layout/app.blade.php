<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="ThemeStarz">

    <link href="{{ asset('landing2/fonts/font-awesome.css') }} " rel="stylesheet" type="text/css">
    <link href="{{ asset('landing2/fonts/elegant-fonts.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('landing2/bootstrap/css/bootstrap.css') }} " type="text/css">
    <link rel="stylesheet" href="{{ asset('landing2/css/magnific-popup.css') }} " type="text/css">
    <link rel="stylesheet" href="{{ asset('landing2/css/style.css') }} " type="text/css">
    {{-- pavicon --}}
    <link rel="shortcut icon" href="{{ asset('landing2/img/favicon.ico') }} " type="image/x-icon">
    <!-- Tambahkan link CSS lainnya di sini -->
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keyword')">
    {{-- beda template --}}
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('landing/css/style.css') }} ">

    <style>
    </style>
</head>

<body >
    <div class="page-wrapper mb-5" style="height: 0%;"  >
        @include('landing.layout.header')

        <div class="latest-news container-fluid">
            <div class="container">
                @yield('content')
            </div>
        </div>

        @include('landing.layout.modals')

    </div>

    <!-- Tambahkan script dan tag body lainnya di sini -->
    <script src="{{ asset('landing2/js/jquery-2.2.1.min.js') }}"></script>
    <script src="http://maps.google.com/maps/api/js"></script>
    <script src="{{ asset('landing2/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('landing2/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('landing2/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('landing2/js/jquery.plugin.min.js') }}"></script>
    <script src="{{ asset('landing2/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('landing2/js/jquery.parallax.min.js') }}"></script>
    <script src="{{ asset('landing2/js/custom.js') }}"></script>

    <script>
        //  Map

        var latitude = 34.038405;
        var longitude = -117.946944;
        var markerImage = "{{ asset('landing2/img/map-marker.png') }} ";
        var mapTheme = "light";
        var mapElement = "map";

        $(".modal").on("shown.bs.modal", function(e) {
            google.maps.event.addDomListener(window, 'load', simpleMap(latitude, longitude, markerImage, mapTheme,
                mapElement));
        });

        // Background

        $('#scene').parallax({
            calibrateX: true,
            calibrateY: true,
            originX: -1.0,
            scalarX: 1400
        });
    </script>

</body>
