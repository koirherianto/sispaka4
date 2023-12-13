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

    <title>CreaSoon - Creative Coming Soon Template</title>

    {{-- beda template --}}
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('landing/css/style.css') }} ">

    <style>
        body { background-color: #f3f3f3; }
    </style>

</head>

<body>
<div class="page-wrapper">
    <header>
        <div class="brand animate"><a href=""><img src="{{ asset('landing2/img/logo.png') }}" alt=""></a></div>
        <nav>
            <ul class="navigation animate">
                <li><a href="" data-toggle="modal" data-target="#modal-about-us">About Us</a></li>
                <li><a href="" data-toggle="modal" data-target="#modal-our-works">Our Works</a></li>
                <li><a href="" data-toggle="modal" data-target="#modal-services">Services</a></li>
                <li><a href="" data-toggle="modal" data-target="#modal-contact-us">Contact</a></li>
                @if (Route::has('login'))
                @auth
                        <li><a href="{{ url('/home') }}">Dashboard</a></li>
                    @else
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        
                        @if (Route::has('register'))
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @endif
                    @endauth
                @endif
            </ul>
            <!--end navigation-->
        </nav>
    </header>
    <div class="content-wrapper">
        <div class="content-main animate">
            <div class="container">
                <h1 class="font-size-90">Get Ready!</h1>
                <h2 class="opacity-60">Something Awesome is Coming Soon</h2>
                <div class="col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1">
                    <form class="form">
                        <div class="input-group">
                            <input type="text" class="form-control" name="email" placeholder="Your email">
                            <span class="input-group-btn">
                                <button class="btn" type="submit"><i class="arrow_right"></i></button>
                            </span>
                        </div>
                        <p class="note">*Only relevant information, no spam</p>
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
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-youtube"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
            <a href="#"><i class="fa fa-pinterest"></i></a>
            <a href="#"><i class="fa fa-google-plus"></i></a>
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
                    Expert System Random
                </div>
            </div>
            <div class="col-sm-4">
                <div class="main-btn-holder">
                    <a href="blog.html" class="hbtn hbtn-default">View more</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="post-box blue-bg">
                    <div class="post-img"></div>
                    <span class="badge badge-danger">Hot</span>
                    <div class="post-title">Discover our new website builder</div>
                    <div class="post-link"><a href="#">Learn more</a></div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="post-box grey-bg">
                    <div class="post-img"></div>
                    <span class="badge badge-info">Hot</span>
                    <div class="post-title">New Data center in Germany & USA</div>
                    <div class="post-link"><a href="#">Learn more</a></div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="post-box yellow-bg">
                    <div class="post-img"></div>
                    <span class="badge badge-dark">Hot</span>
                    <div class="post-title">Discover our newwebsite builder</div>
                    <div class="post-link"><a href="#">Learn more</a></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="post-box blue-bg">
                    <div class="post-img"></div>
                    <span class="badge badge-danger">Hot</span>
                    <div class="post-title">Discover our new website builder</div>
                    <div class="post-link"><a href="#">Learn more</a></div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="post-box grey-bg">
                    <div class="post-img"></div>
                    <span class="badge badge-info">Hot</span>
                    <div class="post-title">New Data center in Germany & USA</div>
                    <div class="post-link"><a href="#">Learn more</a></div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="post-box yellow-bg">
                    <div class="post-img"></div>
                    <span class="badge badge-dark">Hot</span>
                    <div class="post-title">Discover our newwebsite builder</div>
                    <div class="post-link"><a href="#">Learn more</a></div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal About Us -->
<div class="modal fade" id="modal-about-us" tabindex="-1" role="dialog" aria-labelledby="modal-about-us-label">
    <div class="modal-dialog" role="document">
        <div class="container">
            <div class="modal-content">
                <div class="modal-header" data-background-color="#61dfff">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h2 class="modal-title" id="modal-about-us-label">About Us</h2>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5 col-sm-5">
                            <section>
                                <h3>Our Team</h3>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="person">
                                            <div class="image">
                                                <div class="bg-transfer"><img src="{{ asset('landing2/img/person-01.jpg') }}" alt=""></div>
                                            </div>
                                            <h4>Jane Doe</h4>
                                            <h5>Company CEO</h5>
                                            <div class="social-icons">
                                                <a href="#"><i class="fa fa-twitter"></i></a>
                                                <a href="#"><i class="fa fa-facebook"></i></a>
                                                <a href="#"><i class="fa fa-youtube"></i></a>
                                            </div>
                                        </div>
                                        <!--end person-->
                                    </div>
                                    <!--end col-md-6-->
                                    <div class="col-md-6 col-sm-6">
                                        <div class="person">
                                            <div class="image">
                                                <div class="bg-transfer"><img src="{{ asset('landing2/img/person-02.jpg') }}" alt=""></div>
                                            </div>
                                            <h4>Peter Wood</h4>
                                            <h5>Marketing Specialist</h5>
                                            <div class="social-icons">
                                                <a href="#"><i class="fa fa-twitter"></i></a>
                                                <a href="#"><i class="fa fa-facebook"></i></a>
                                                <a href="#"><i class="fa fa-youtube"></i></a>
                                            </div>
                                        </div>
                                        <!--end person-->
                                    </div>
                                    <!--end col-md-6-->
                                </div>
                                <!--end row-->
                            </section>
                        </div>
                        <!--end col-md-4-->
                        <div class="col-md-7 col-sm-7">
                            <section>
                                <h3>Shortly About Us</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus laoreet sed tellus ut
                                    condimentum. Aenean hendrerit, nisl sit amet molestie eleifend, magna augue pulvinar enim,
                                    nec mattis quam eros non ex. Pellentesque luctus ex enim, a tempus lorem egestas quis.
                                    Nunc et tincidunt dui. Cras in fermentum leo.
                                </p>
                                <p>
                                    Mauris molestie pharetra tristique. Donec interdum odio erat, sed ullamcorper lectus
                                    egestas non.  Quisque sollicitudin vestibulum leo eget malesuada. Pellentesque sem erat,
                                    tempor a odio sed, tincidunt mollis purus. Cras suscipit ultrices cursus.
                                </p>
                            </section>
                            <section>
                                <h3>Our Skills</h3>
                                <div class="skill">
                                    <h4>Webdesign</h4>
                                    <aside>80%</aside>
                                    <figure class="bar">
                                        <div class="bar-active width-80"></div>
                                        <div class="bar-background"></div>
                                    </figure>
                                </div>
                                <!--end skill-->
                                <div class="skill">
                                    <h4>Photography</h4>
                                    <aside>100%</aside>
                                    <figure class="bar">
                                        <div class="bar-active width-100"></div>
                                        <div class="bar-background"></div>
                                    </figure>
                                </div>
                                <!--end skill-->
                                <div class="skill">
                                    <h4>Marketing</h4>
                                    <aside>60%</aside>
                                    <figure class="bar">
                                        <div class="bar-active width-60"></div>
                                        <div class="bar-background"></div>
                                    </figure>
                                </div>
                                <!--end skill-->
                            </section>
                        </div>
                        <!--end col-md-7-->
                    </div>
                    <!--end row-->
                </div>
                <!--end modal-body-->
            </div>
            <!--end modal-content-->
        </div>
        <!--end container-->
    </div>
    <!--end modal-dialog-->
</div>
<!--end #modal-about-us-->

<!-- Modal Our Works -->
<div class="modal fade" id="modal-our-works" tabindex="-1" role="dialog" aria-labelledby="modal-our-works-label">
    <div class="modal-dialog" role="document">
        <div class="container">
            <div class="modal-content">
                <div class="modal-header" data-background-color="#8dff8b">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h2 class="modal-title" id="modal-our-works-label">Our Works</h2>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <a href="{{ asset('') }}landing2/img/1.jpg" class="work image-popup">
                                <div class="description">
                                    <h4>Paperworks</h4>
                                    <h5>Product Design</h5>
                                </div>
                                <!--end description-->
                                <div class="image">
                                    <div class="bg-transfer"><img src="{{ asset('landing2/img/1.jpg') }}" alt=""></div>
                                </div>
                            </a>
                            <!--end work-->
                        </div>
                        <!--end col-md-4-->
                        <div class="col-md-4 col-sm-4">
                            <a href="{{ asset('landing2/img/2.jpg') }}" class="work image-popup">
                                <div class="description">
                                    <h4>Landscape</h4>
                                    <h5>Illustration</h5>
                                </div>
                                <!--end description-->
                                <div class="image">
                                    <div class="bg-transfer"><img src="{{ asset('landing2/img/2.jpg') }}" alt=""></div>
                                </div>
                            </a>
                            <!--end work-->
                        </div>
                        <!--end col-md-4-->
                        <div class="col-md-4 col-sm-4">
                            <a href="{{ asset('landing2/img/3.jpg') }}" class="work image-popup">
                                <div class="description">
                                    <h4>Massa</h4>
                                    <h5>Logo design</h5>
                                </div>
                                <!--end description-->
                                <div class="image">
                                    <div class="bg-transfer"><img src="{{ asset('landing2/img/3.jpg') }}" alt=""></div>
                                </div>
                            </a>
                            <!--end work-->
                        </div>
                        <!--end col-md-4-->
                        <div class="col-md-4 col-sm-4">
                            <a href="{{ asset('landing2/img/4.jpg') }}" class="work image-popup">
                                <div class="description">
                                    <h4>11Street</h4>
                                    <h5>Logo design</h5>
                                </div>
                                <!--end description-->
                                <div class="image">
                                    <div class="bg-transfer"><img src="{{ asset('landing2/img/4.jpg') }}" alt=""></div>
                                </div>
                            </a>
                            <!--end work-->
                        </div>
                        <!--end col-md-4-->
                        <div class="col-md-4 col-sm-4">
                            <a href="{{ asset('landing2/img/5.jpg') }}" class="work image-popup">
                                <div class="description">
                                    <h4>App</h4>
                                    <h5>Branding</h5>
                                </div>
                                <!--end description-->
                                <div class="image">
                                    <div class="bg-transfer"><img src="{{ asset('landing2/img/5.jpg') }}" alt=""></div>
                                </div>
                            </a>
                            <!--end work-->
                        </div>
                        <!--end col-md-4-->
                        <div class="col-md-4 col-sm-4">
                            <a href="{{ asset('landing2/img/6.jpg') }}" class="work image-popup">
                                <div class="description">
                                    <h4>Moon</h4>
                                    <h5>Photography</h5>
                                </div>
                                <!--end description-->
                                <div class="image">
                                    <div class="bg-transfer"><img src="{{ asset('landing2/img/6.jpg') }}" alt=""></div>
                                </div>
                            </a>
                            <!--end work-->
                        </div>
                        <!--end col-md-4-->
                    </div>
                    <!--end row-->
                </div>
                <!--end modal-body-->
            </div>
            <!--end modal-content-->
        </div>
        <!--end container-->
    </div>
    <!--end modal-dialog-->
</div>
<!--end #modal-our-works-->

<!-- Modal Services -->
<div class="modal fade" id="modal-services" tabindex="-1" role="dialog" aria-labelledby="modal-services-label">
    <div class="modal-dialog" role="document">
        <div class="container">
            <div class="modal-content">
                <div class="modal-header" data-background-color="#ff6767">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h2 class="modal-title" id="modal-services-label">Services</h2>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <div class="box">
                                <div class="icon">
                                    <img src="{{ asset('landing2/img/camera.png') }}" alt="">
                                </div>
                                <h3>Photography</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus laoreet sed tellus ut condimentum</p>
                            </div>
                            <!--end box-->
                        </div>
                        <!--end col-md-4-->
                        <div class="col-md-4 col-sm-4">
                            <div class="box">
                                <div class="icon">
                                    <img src="{{ asset('landing2/img/computer.png') }}" alt="">
                                </div>
                                <h3>Webdesign</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus laoreet sed tellus ut condimentum</p>
                            </div>
                            <!--end box-->
                        </div>
                        <!--end col-md-4-->
                        <div class="col-md-4 col-sm-4">
                            <div class="box">
                                <div class="icon">
                                    <img src="{{ asset('landing2/img/compose.png') }}" alt="">
                                </div>
                                <h3>Copywriting</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus laoreet sed tellus ut condimentum</p>
                            </div>
                            <!--end box-->
                        </div>
                        <!--end col-md-4-->
                        <div class="col-md-4 col-sm-4">
                            <div class="box">
                                <div class="icon">
                                    <img src="{{ asset('landing2/img/cloud.png') }}" alt="">
                                </div>
                                <h3>Cloud Servers</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus laoreet sed tellus ut condimentum</p>
                            </div>
                            <!--end box-->
                        </div>
                        <!--end col-md-4-->
                        <div class="col-md-4 col-sm-4">
                            <div class="box">
                                <div class="icon">
                                    <img src="{{ asset('landing2/img/mail.png') }}" alt="">
                                </div>
                                <h3>Email Campaigns</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus laoreet sed tellus ut condimentum</p>
                            </div>
                            <!--end box-->
                        </div>
                        <!--end col-md-4-->
                        <div class="col-md-4 col-sm-4">
                            <div class="box">
                                <div class="icon">
                                    <img src="{{ asset('landing2/img/magnifyingglass.png') }}" alt="">
                                </div>
                                <h3>SEO Optimization</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus laoreet sed tellus ut condimentum</p>
                            </div>
                            <!--end box-->
                        </div>
                        <!--end col-md-4-->
                    </div>
                </div>
                <!--end modal-body-->
            </div>
            <!--end modal-content-->
        </div>
        <!--end container-->
    </div>
    <!--end modal-dialog-->
</div>
<!--end #modal-services-->

<!-- Modal Contact Us -->
<div class="modal fade" id="modal-contact-us" tabindex="-1" role="dialog" aria-labelledby="modal-contact-us-label">
    <div class="modal-dialog" role="document">
        <div class="container">
            <div class="modal-content">
                <div class="modal-header" data-background-color="#ffe858">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h2 class="modal-title" id="modal-contact-us-label">Services</h2>
                </div>
                <div id="map"></div>
                <div class="modal-body">
                    <section>
                        <div class="row">
                            <div class="col-md-3 col-sm-3">
                                <h3>Address</h3>
                                <address>
                                    4758 Nancy Street<br>
                                    +1 919-571-2528<br>
                                    <a href="mailto:hello@example.com">hello@example.com</a>
                                </address>
                            </div>
                            <!--end col-md-3-->
                            <div class="col-md-3 col-sm-3">
                                <h3>Social</h3>
                                <figure><a href="" class="icon"><i class="fa fa-facebook"></i>Facebook</a></figure>
                                <figure><a href="" class="icon"><i class="fa fa-twitter"></i>Twitter</a></figure>
                                <figure><a href="" class="icon"><i class="fa fa-youtube"></i>Youtube</a></figure>
                                <figure><a href="" class="icon"><i class="fa fa-pinterest"></i>Pinterest</a></figure>
                            </div>
                            <!--end col-md-3-->
                            <div class="col-md-6 col-sm-6">
                                <h3>Contact Form</h3>
                                <form id="form-contact" method="post" class="form clearfix inputs-underline">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="form-contact-name" name="name" placeholder="Your Name" required>
                                            </div>
                                            <!--end form-group -->
                                        </div>
                                        <!--end col-md-6 col-sm-6 -->
                                        <div class="col-md-6 col-sm-6">
                                            <div class="form-group">
                                                <input type="email" class="form-control" id="form-contact-email" name="email" placeholder="Your Email" required>
                                            </div>
                                            <!--end form-group -->
                                        </div>
                                        <!--end col-md-6 col-sm-6 -->
                                    </div>
                                    <!--end row -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea class="form-control" id="form-contact-message" rows="5" name="message" placeholder="Your Message" required></textarea>
                                            </div>
                                            <!--end form-group -->
                                        </div>
                                        <!--end col-md-12 -->
                                    </div>
                                    <!--end row -->
                                    <div class="form-group clearfix">
                                        <button type="submit" class="btn pull-right btn-default btn-framed btn-rounded" id="form-contact-submit">Send a Message</button>
                                    </div>
                                    <!--end form-group -->
                                    <div class="form-contact-status"></div>
                                </form>
                                <!--end form-contact -->
                            </div>
                            <!--end col-md-6-->
                        </div>
                    </section>
                </div>
                <!--end modal-body-->
            </div>
            <!--end modal-content-->
        </div>
        <!--end container-->
    </div>
    <!--end modal-dialog-->
</div>
<!--end #modal-contact-us-->

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
