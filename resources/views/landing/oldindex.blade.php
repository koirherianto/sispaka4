<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sispaka</title>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('landing/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('landing/css/fontawesome-all.min.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('landing/css/slick.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('landing/css/style.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('landing/css/custom.css') }} ">
</head>
<body>
<div id="header-holder">
    <div class="cloud-bg"></div>
    <nav id="nav" class="navbar navbar-full">
        <div class="container-fluid">
            <div class="container container-nav">
                <div class="row">
                    <div class="col-md-12">
                        <div class="navbar-header">
                            <button aria-expanded="false" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="index.html"><img src="{{ URL::asset('landing/images/logo.svg') }}" alt="Hustbee"></a>
                        </div>
                        <div style="height: 1px;" role="main" aria-expanded="false" class="navbar-collapse collapse navbar-collapse-centered" id="bs">
                            <ul class="nav navbar-nav navbar-nav-centered">
                                <li class="nav-item"><a class="nav-link" href="home-light.html">Light Header</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Hosting Services</a>
                                    <div class="dropdown-menu custom-dropdown-menu">
                                        <div class="dropdown-items-holder">
                                            <div class="items-with-icon">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-6">
                                                        <a href="webhosting.html" class="link-with-icon">
                                                            <span class="icon"><img src="{{ URL::asset('landing/images/server1.svg') }}" alt=""></span>
                                                            <span class="text">Web Hosting</span>
                                                        </a>
                                                        <a href="cloudhosting.html" class="link-with-icon">
                                                            <span class="icon"><img src="{{URL::asset('landing/images/server2.svg') }}" alt=""></span>
                                                            <span class="text">Cloud Hosting</span>
                                                        </a>
                                                        <a href="vpshosting.html" class="link-with-icon">
                                                            <span class="icon"><img src="{{ URL::asset('landing/images/server3.svg') }}" alt=""></span>
                                                            <span class="text">VPS Hosting</span>
                                                        </a>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6">
                                                        <a href="wordpresshosting.html" class="link-with-icon">
                                                            <span class="icon"><img src="{{ URL::asset('landing/images/server4.svg') }}" alt=""></span>
                                                            <span class="text">Wordpress Hosting</span>
                                                        </a>
                                                        <a href="dedicatedhosting.html" class="link-with-icon">
                                                            <span class="icon"><img src="{{ URL::asset('landing/images/server5.svg') }}" alt=""></span>
                                                            <span class="text">Dedicated Hosting</span>
                                                        </a>
                                                        <a href="domains.html" class="link-with-icon">
                                                            <span class="icon"><img src="{{ URL::asset('landing/images/server6.svg') }}" alt=""></span>
                                                            <span class="text">Domain Names</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="items">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-6">
                                                        <a href="#" class="link">Hustbee Features</a>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6">
                                                        <a href="#" class="link">Website builder</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="domains.html">Domains</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.html">Support</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="about.html">About</a></li>
                                        <li><a class="dropdown-item" href="blog.html">Blog</a></li>
                                        <li><a class="dropdown-item" href="privacy.html">Privacy</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right other-navbar ">
                                <li class="nav-item "><a class="nav-link" href="login.html">Login</a></li>
                                <li class="nav-item"><a class="nav-link" href="signup.html">Sign up</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div id="top-content" class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="main-slider">
                        <div class="slide">
                            <div class="row rtl-row">
                                <div class="col-sm-5">
                                    <div class="img-holder">
                                        <img src="{{ URL::asset('landing/images/slide-img1.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="b-text">Buat Sistem Pakar <br>Tanpa Kode</div>
                                    <div class="m-text">Jangan biarkan penelitian Sistem Pakar anda berakhir pada jurnal yang <span class="bold">tidak terbaca</span></div>
                                    <a href="#" class="hbtn hbtn-primary hbtn-lg">Hosting Services</a>
                                </div>
                            </div>
                        </div>
                        <div class="slide">
                            <div class="row rtl-row">
                                <div class="col-sm-5">
                                    <div class="img-holder">
                                        <img src="{{ URL::asset('landing/images/slide-img2.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="b-text">Create your first<br>website today.</div>
                                    <div class="m-text">Starting at only <span class="bold">$2.38/mo*</span></div>
                                    <a href="#" class="hbtn hbtn-primary hbtn-lg">Create now</a>
                                </div>
                            </div>
                        </div>
                        <div class="slide">
                            <div class="row rtl-row">
                                <div class="col-sm-5">
                                    <div class="img-holder">
                                        <img src="{{ URL::asset('landing/images/slide-img3.png') }}" alt="">
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="b-text">Build your site<br>with page builder</div>
                                    <div class="m-text">Starting at only <span class="bold">$2.38/mo*</span></div>
                                    <a href="#" class="hbtn hbtn-primary hbtn-lg">Learn more</a>
                                </div>
                            </div>
                        </div>
                        <div class="slide">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="main-domain-search-holder">
                                        <div class="b-text">Simple, affordable<br>Web Hosting</div>
                                        <form>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="input-items">
                                                        <input type="text" class="form-control domain-input" name="domain" placeholder="My domain name" autocapitalize="none" />
                                                        <span class="input-items-btn">
                                                            <input type="submit" class="btn search" value="Search" />
                                                            <input type="submit" name="transfer" class="btn transfer" value="Transfer" />
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="m-text">Starting at only <span class="bold">$2.38/mo*</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="domain-search-holder container-fluid">
    <div class="container">
        <form>
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lgmd-4"><div class="title">Search Expert System</div></div>
                <div class="col-sm-8 col-md-5 col-lgmd-6">
                    <input class="domain-input" type="text" placeholder="Search Expert System"> 
                </div>
                <div class="col-sm-4 col-md-3 col-lgmd-2">
                    <button type="submit">Search</button>
                </div>
            </div>
        </form>
    </div>
</div>

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


<script src="{{ URL::asset('landing/js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('landing/js/bootstrap.min.js') }}"></script> 
<script src="{{ URL::asset('landing/js/slick.min.js') }}"></script> 
<script src="{{ URL::asset('landing/js/main.js') }}"></script> 
</body>
</html>