<!-- Start Header Top
============================================= -->
<div class="top-bar-area text-light" style="background-color: #1f4e3d">
    <div class="container">
        <div class="row align-center">
            <div class="col-lg-9">
                <div class="flex-item left">
{{--                    <p>--}}
{{--                        That's right, we only sell 100% organic--}}
{{--                    </p>--}}
                    <ul>
                        <li>
                            <i class="fas fa-map-marker-alt"></i> Mansurabad , Adabar , Road: 07 , House : 88
                        </li>
                        <li>
                            <i class="fas fa-phone-alt"></i> +880 1755-680807
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 text-end">
                <div class="social">
                    <ul>
                        <li>
                            <a href="https://www.facebook.com/InsureCow/">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>


                        <li>
                            <a href="https://www.linkedin.com/company/insurecow/?originalSubdomain=bd">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Header Top -->

<!-- Header
============================================= -->
<header>
    <!-- Start Navigation -->
    <nav class="navbar mobile-sidenav inc-shape navbar-common navbar-sticky navbar-default validnavs">

        <!-- Start Top Search -->
        <div class="top-search">
            <div class="container-xl">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search">
                    <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                </div>
            </div>
        </div>
        <!-- End Top Search -->

        <div class="container d-flex justify-content-between align-items-center">


            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="">
                    <img src="{{ asset('assets/img/logo.png') }}" class="logo" alt="Logo">
                </a>
            </div>
            <!-- End Header Navigation -->

            <!-- Main Nav -->
            <div class="main-nav-content">
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">

                    <img src="{{ asset('assets/img/logo.png') }}" alt="Logo">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-times"></i>
                    </button>

                    <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
{{--                        <li class="dropdown">--}}
{{--                            <a href="{{route('home')}}" >Home</a>--}}
{{--                        </li>--}}

                        <li class="dropdown">
                            <a href="#team">Our Team</a>

                        </li>

                        <li class="dropdown">
                            <a href="#service" >Product & Services</a>

                        </li>
                        <li class="dropdown">
                            <a href="#achievement" >Our Achievements</a>

                        </li>
                        <li class="dropdown">
                            <a href="{{ route('login') }}">PORTAL</a>

                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->

{{--                <div class="attr-right">--}}
{{--                    <!-- Start Atribute Navigation -->--}}
{{--                    <div class="attr-nav">--}}
{{--                        <ul>--}}
{{--                            <li class="contact">--}}
{{--                                <div class="call">--}}
{{--                                    <div class="icon">--}}
{{--                                        <i class="fas fa-comments-alt-dollar"></i>--}}
{{--                                    </div>--}}
{{--                                    <div class="info">--}}
{{--                                        <p>Have any Questions?</p>--}}
{{--                                        <h5><a href="mailto:info@crysta.com">info@agrul.com</a></h5>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <!-- End Atribute Navigation -->--}}

{{--                </div>--}}

                <!-- Overlay screen for menu -->
                <div class="overlay-screen"></div>
                <!-- End Overlay screen for menu -->

            </div>
            <!-- Main Nav -->

        </div>
    </nav>
    <!-- End Navigation -->
</header>
<!-- End Header -->
