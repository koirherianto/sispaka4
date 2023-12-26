<!DOCTYPE html>

<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="ThemeStarz">

    <link href="{{ asset('landing2/fonts/font-awesome.css') }} " rel="stylesheet" type="text/css">
    <link href="{{ asset('landing2/fonts/elegant-fonts.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('landing2/bootstrap/css/bootstrap.css') }} " type="text/css">
    <link rel="stylesheet" href="{{ asset('landing2/css/magnific-popup.css') }} " type="text/css">
    <link rel="stylesheet" href="{{ asset('landing2/css/style.css') }} " type="text/css">
    <meta name="description" content="Sispaka - Platform Sistem Pakar Berbasis Web tanpa Kode. Buat dan kelola sistem pakar. Daftarkan diri Anda, buat proyek, dan jelajahi pengetahuan medis.">
    <link rel="shortcut icon" href="{{ asset('landing2/img/favicon.ico') }} " type="image/x-icon">
    <title>Sispaka - Expert System Platform </title>

    {{-- beda template --}}
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('landing/css/style.css') }} ">

    <style>
        body { background-color: #f3f3f3; }
    </style>

</head>

<body>
<div class="page-wrapper">
    @include('landing.layout.header')
    <div class="content-wrapper">
        <div class="content-main animate">
            <div class="container">
                <h1 class="font-size-90">Sispaka</h1>
                <h2 class="opacity-60">Buat Sistem Pakar Tanpa Code</h2>
                <div class="col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1">
                    <form class="form">
                        <div class="input-group">
                            <input type="text" class="form-control" name="email" placeholder="Search Expert System">
                            <span class="input-group-btn">
                                <button class="btn" type="submit"><i class="arrow_right"></i></button>
                            </span>
                        </div>
                        <p class="note"><b> Jangan Biarkan Hasil Penelitian Anda Hanya Menjadi Kertas Tak Terbaca </b></p>
                    </form>

                    <!--end form-->
                </div>
                <!--end col-md-10-->
            </div>
            <!--end container-->
        </div>
        <!--end content-main-->
        <div class="background-wrapper">
            <div id="background-content">
                <ul class="parallax" id="scene">
                    <li class="layer opacity-90" data-depth="0.80"><img src="{{ asset('landing2/img/parallax-4.svg') }} " alt=""></li>
                    <li class="layer opacity-90" data-depth="0.60"><img src="{{ asset('landing2/img/parallax-3.svg') }}" alt=""></li>
                    <li class="layer opacity-90" data-depth="0.40"><img src="{{ asset('landing2/img/parallax-2.svg') }}" alt=""></li>
                    <li class="layer opacity-90" data-depth="0.20"><img src="{{ asset('landing2/img/parallax-1.svg') }}" alt=""></li>
                </ul>
            </div>
        </div>
        <!--end background-wrapper-->
    </div>
    <!--end content-wrapper-->
    <footer>
        <div class="social-icons animate">
            {{-- <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-youtube"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
            <a href="#"><i class="fa fa-pinterest"></i></a>
            <a href="#"><i class="fa fa-google-plus"></i></a> --}}
        </div>
        <!--end social-icons-->
    </footer>
    
</div>
<!--end page-wrapper-->

<div class="latest-news container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="row-title">
                    Expert System Platform
                </div>
            </div>
            <div class="col-sm-4">
                <div class="main-btn-holder">
                    <a href="{{ route('blogs') }}" class="hbtn hbtn-default">View more</a>
                </div>
            </div>
        </div>
        @php $counter = 0; @endphp
        @foreach ($projects as $project)
            @if ($counter % 3 == 0)
                <div class="row">
            @endif
            <div class="col-sm-6 col-md-4">
                <div class="post-box blue-bg" style="background-image: url('{{ $project->getFirstMediaUrl('thumbnail') }}'); background-size: cover; background-position: center;">
                    <div class="post-img"></div>
                    <span class="badge badge-danger">{{ $project->methods[0]->name }}</span>
                    <div class="post-title">{{ $project->title }}</div>
                    <div class="post-link"><a href="{{ route('blog', $project->slug) }}">Try Expert System</a></div>
                </div>
            </div>
            @php $counter++; @endphp
            @if ($counter % 3 == 0)
                </div>
            @endif
        @endforeach
        @if ($counter % 3 != 0)
            </div>
        @endif
    </div>
</div>


@include('landing.layout.modals')

<script  src="{{ asset('landing2/js/jquery-2.2.1.min.js') }}"></script>
<script  src="http://maps.google.com/maps/api/js"></script>
<script  src="{{ asset('landing2/bootstrap/js/bootstrap.min.js') }}"></script>
<script  src="{{ asset('landing2/js/jquery.validate.min.js') }}"></script>
<script  src="{{ asset('landing2/js/jquery.magnific-popup.min.js') }}"></script>
<script  src="{{ asset('landing2/js/jquery.plugin.min.js') }}"></script>
<script  src="{{ asset('landing2/js/jquery.countdown.min.js') }}"></script>
<script  src="{{ asset('landing2/js/jquery.parallax.min.js') }}"></script>
<script  src="{{ asset('landing2/js/custom.js') }}"></script>

<script>

    //  Map

    var latitude = 34.038405;
    var longitude = -117.946944;
    var markerImage = "{{ asset('landing2/img/map-marker.png') }} ";
    var mapTheme = "light";
    var mapElement = "map";

    $(".modal").on("shown.bs.modal", function (e) {
        google.maps.event.addDomListener(window, 'load', simpleMap(latitude, longitude, markerImage, mapTheme, mapElement));
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
