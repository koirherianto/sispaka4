<header>
    <div class="brand animate"><a href="/"><img style="max-height: 40%;max-width: 40%"  src="{{ asset('landing2/img/logoname.png') }}" alt=""></a></div>
    <nav>
        <ul class="navigation animate">
            <li><a href="" data-toggle="modal" data-target="#modal-about-us">About Us</a></li>
            <li><a href="" data-toggle="modal" data-target="#modal-our-works">Our Works</a></li>
            <li><a href="" data-toggle="modal" data-target="#modal-services">Services</a></li>
            <li><a href="" data-toggle="modal" data-target="#modal-contact-us">Contact</a></li>
            @if (Route::has('login'))
            @auth
                    <li><a href="{{ url('/projects') }}">Dashboard</a></li>
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
