@extends('front.v2.main')

@section('content')

    {{-- ------------------------------------------------------------------------ Content Section ------------------------------------------------------------------------ --}}


    <!-- Start Banner Area
============================================= -->




    <div class="banner-area navigation-circle text-light banner-style-one zoom-effect overflow-hidden">
        <!-- Slider main container -->
        <div class="banner-fade">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">

                <!-- Single Item -->
                @foreach($sliders as $slider)
                    <div class="swiper-slide banner-style-one">
                        <div class="banner-thumb bg-cover shadow dark"
                             style="background: url({{ asset('storage/' . $slider->image) }});"></div>
                        <div class="container">
                            <div class="row align-center">
                                <div class="col-xl-7">
                                    <div class="content">
                                        <h2>{{$slider->title}}</h2>
                                        <p>
                                            {{$slider->description}}
                                        </p>
                                        <div class="button">
                                            <a class="btn btn-theme secondary btn-md radius animation"
                                               href="#service">Discover
                                                More</a>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
                <!-- End Single Item -->


            </div>

            <!-- Navigation -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

        </div>
    </div>







    <!-- End Main -->

    <!-- Start About
    ============================================= -->
    <div class="about-style-one-area default-padding">

        <!-- Shape -->
        <div class="shape-right-top">
            <img src="{{ asset('assets/img/shape/leaf.png') }}" alt="Image not found">
        </div>
        <!-- End Shape -->

        <div class="container">
            <div class="row align-center">
                <div class="col-xl-5 col-lg-6 about-style-one pr-50 pr-md-15 pr-xs-15">
                    <div class="thumb">
                        <img src="{{ asset('assets/img/about/5.png') }}" alt="Image Not Found">
                        <div class="sub-item">
                            <img src="{{ asset('assets/img/about/1.png') }}" alt="Image Not Found">
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6 about-style-one">
                    <div class="row align-center">

                        @foreach($abouts as $about)
                            <div class="col-xl-7 col-lg-12">
                                <h2 class="heading">{{$about->title}}</h2>
                                <p>
                                    {{$about->description}}
                                </p>
                                {{--                            <ul class="check-solid-list mt-20">--}}
                                {{--                                <li>Organic food contains more vitamins</li>--}}
                                {{--                                <li>Eat organic because supply meets demand</li>--}}
                                {{--                                <li>Organic food is never irradiated</li>--}}
                                {{--                            </ul>--}}
                            </div>

                        @endforeach

                        <div class="col-xl-5 col-lg-12 pl-50 pl-md-15 pl-xs-15">
                            <div class="top-product-item">
                                {{--                                <img src="{{ asset('assets/img/icon/1.svg') }}" alt="Icon">--}}
                                <h5><a href="#">Insurance claim</a></h5>
                                <p>
                                    easy to get insurance packages
                                </p>
                            </div>
                            <div class="top-product-item">
                                {{--                                <img src="{{ asset('assets/img/icon/2.svg') }}" alt="Icon">--}}
                                <h5><a href="#">Cattle verify</a></h5>
                                <p>
                                    By using InsureCow get to know your cattle
                                </p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- End About -->



    <!-- Start Services
       ============================================= -->
    <div class="services-style-one-area default-padding bg-gray half-bg-theme"  id="service">
        <div class="shape-extra">
            <img src="assets/img/shape/18.png" alt="Image Not Found">
        </div>
        <div class="container">
            <div class="heading-left">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="left-info">
                            <h5 class="sub-title">Why choose us</h5>
                            <h2 class="title">Product & services</h2>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="services-style-one-carousel swiper">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Single Item -->
                            @foreach($services as $service)
                                <div class="swiper-slide">
                                    <div class="services-style-one"
                                         style="width: 250px; height: 300px; border: 1px solid #ccc; box-sizing: border-box; text-align: center;">
                                        <div class="thumb">
                                            <img src="{{ asset('storage/' . $service->image) }}" alt=""
                                                 style="max-width: 100%; max-height: 100%;">
                                        </div>
                                        <h5><a href="services-details.html">{{$service->title}}</a></h5>
                                        <br>
                                        {{-- <p>Continue indulged speaking technical out horrible domestic position. Seeing rather you.</p> --}}
                                    </div>
                                </div>

                            @endforeach
                            <!-- End Single Item -->

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Services -->
    <!-- Start Why Choose Us
    ============================================= -->
    <div class="choose-us-style-one-area overflow-hidden default-padding">
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-6 choose-us-style-one">
                    <div class="thumb">
                        <img src="{{ asset('assets/img/about/1.png') }}" alt="Image Not Found">
                        <div class="shape">
                            <img class="wow fadeInDown" src="{{ asset('assets/img/shape/22.png') }}"
                                 alt="Image not found">
                        </div>
                        <div class="product-produce">
                            {{--                            <div class="icon">--}}
                            {{--                                <i class="flaticon-farmer"></i>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="fun-fact">--}}
                            {{--                                <div class="counter">--}}
                            {{--                                    <div class="timer" data-to="258" data-speed="2000">258</div>--}}
                            {{--                                    <div class="operator">K</div>--}}
                            {{--                                </div>--}}
                            {{--                                <span class="medium">Agriculture, Organic Products</span>--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 choose-us-style-one">
                    <h5 class="sub-title">Get to know us</h5>
                    <h2 class="title">InsureCow share to <br>some knowledge</h2>
                    <div class="accordion accordion-regular mt-35" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    What is insurance management ?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                 data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>

                                        Insurance management involves assessing, mitigating, and transferring risks
                                        through insurance policies. It includes selecting appropriate coverage,
                                        negotiating premiums, filing claims, and optimizing insurance portfolios to
                                        protect assets and mitigate financial losses.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    What benefits will get from insurecow farm management ?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                 data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>

                                        InsureCow farm management provides benefits such as financial protection against
                                        cow-related risks like mortality, theft, and health issues, ensuring stability,
                                        peace of mind, and continuity of operations for farmers.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                    How to insurance company varify their cow by using insurecow ?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                 data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p>
                                        A dataset containing information about individual cows, such as breed, age,
                                        weight, health history, and any identifying features.
                                        Clean the dataset by handling missing values, normalizing numerical features,
                                        and encoding categorical variables.

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Why Choose us -->





    <div class="farmer-area default-padding bottom-less bg-gray" id="team"
         style="background-image: url(assets/img/shape/36.png);">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h5 class="sub-title">Our Farmers</h5>
                        <h2 class="title">Meet Our Farm Experts</h2>
                        <div class="devider"></div>
                        <p>
                            Everything melancholy uncommonly but solicitude inhabiting <br> projection off. Connection
                            stimulated estimating.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="row">
                        @foreach($teams as $team)
                            <!-- Single Item -->
                            <div class="col-lg-4 col-md-6 farmer-stye-one">
                                <div class="farmer-style-one-item">
                                    <div class="thumb">
                                        <img src="{{ asset('storage/' . $team->image) }}" alt=""/>
                                        <div class="social">
                                            <i class="fas fa-share-alt"></i>
                                            <ul>

                                                <li class="linkedin">
                                                    <a href="#">
                                                        <i class="fab fa-linkedin-in"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="info">
                                        <h4><a href="">{{$team->title}}</a></h4>
                                        <span>{{$team->description}}</span>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->

                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Start Testimonials
    ============================================= -->
    <div class="testimonials-area default-padding bg-gray"
         style="background-image: url({{ asset('assets/img/shape/23.png') }});" id="testimonial">
        <div class="container">
            <div class="row align-center">
                <div class="col-lg-5">
                    <div class="testimonial-info text-center">
                        <h4>Testimonial</h4>

                        <div class="thumb">
                            <img src="{{ asset('assets/img/farmers/1.png') }}">
                            <img src="{{ asset('assets/img/farmers/2.png') }}">
                            <img src="{{ asset('assets/img/farmers/3.png') }}">
                            <img src="{{ asset('assets/img/farmers/4.png') }}">

                        </div>

                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <div class="testimonial-carousel testimonial-style-one swiper">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Single item -->
                            @foreach($testimonials as $testimonial)
                                <div class="swiper-slide">
                                    <div class="testimonial-style-two">

                                        <div class="item">
                                            <div class="content">
                                                <p>
                                                    {{$testimonial->description}}

                                                </p>
                                            </div>
                                            <div class="provider">
                                                <div class="info">
                                                    <h4>{{$testimonial->title}}</h4>
                                                    {{--                                                <span>Senior Consultant</span>--}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach




                            <!-- End Single item -->

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Testimonials -->

    <!-- Start Gallery
    ============================================= -->
    <div class="gallery-area default-padding" id="gallery">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        <h5 class="sub-title">Awesome Gallery</h5>
                        <h2 class="title">Gallery Of Our Products</h2>
                        <div class="devider"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 gallery-content">
                    <div class="magnific-mix-gallery masonary">
                        <div id="portfolio-grid" class="gallery-items colums-2">

                            @foreach($galleries as $gallerie)
                                <!-- Single Item -->
                                <div class="pf-item">

                                    <div class="gallery-style-two">
                                        <img src="{{ asset('storage/' . $gallerie->image) }}" alt
                                        />
                                        <div class="overlay">
                                            <span>{{$gallerie->title}}</span>
                                            <h4><a href="">{{$gallerie->description}}</a></h4>
                                        </div>
                                        <a class="link" href=""><i class="fas fa-arrow-right"></i></a>
                                    </div>

                                </div>
                                <!-- End Single Item -->

                            @endforeach


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Gallery -->



    <!-- Start Why Choose Us
============================================= -->
    <div class="choose-us-style-three-area default-padding">
        <div class="container">


            <div class="row align-center">
                <div class="col-lg-6 choose-us-style-three-thumb">
                    <img src="assets/img/about/6.jpg" alt="Image Not Found">
                    <div class="video">
                        <img src="{{ asset('assets/img/about/9.jpg') }}" alt="Image Not Found">

                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1 choose-us-style-three-info">
                    <h4 class="sub-title">Our plan</h4>
                    <h2 class="title">Upcoming products</h2>
                    <ul class="list-heading-title">
                        <li>
                            {{--                                <div class="icon">--}}
                            {{--                                    <i class=""><img src="{{ asset('storage/' . $service->image) }}" alt--}}
                            {{--                                        /></i>--}}
                            {{--                                </div>--}}
                            <div class="info">
                                <h4>Cow Caller</h4>
                                <p>
                                    A cow caller is a device used to emit sound or vibration signals to attract cows,
                                    aiding in their management and control.
                                </p>
                            </div>
                        </li>
                        <li>
                            {{--                                <div class="icon">--}}
                            {{--                                    <i class=""><img src="{{ asset('storage/' . $service->image) }}" alt--}}
                            {{--                                        /></i>--}}
                            {{--                                </div>--}}
                            <div class="info">
                                <h4>Dairy Machinery</h4>
                                <p>
                                    An essential dairy equipment for extracting milk from cows efficiently.
                                </p>
                            </div>
                        </li>


                        <li>
                            {{--                                <div class="icon">--}}
                            {{--                                    <i class=""><img src="{{ asset('storage/' . $service->image) }}" alt--}}
                            {{--                                        /></i>--}}
                            {{--                                </div>--}}
                            <div class="info">
                                <h4>Training</h4>
                                <p>
                                    Comprehensive training programs designed to enhance skills and knowledge in specific
                                    fields.
                                </p>
                            </div>
                        </li>


                        <li>
                            {{--                                <div class="icon">--}}
                            {{--                                    <i class=""><img src="{{ asset('storage/' . $service->image) }}" alt--}}
                            {{--                                        /></i>--}}
                            {{--                                </div>--}}
                            <div class="info">
                                <h4>Vet Service</h4>
                                <p>
                                    Professional veterinary care providing medical assistance and support for animals'
                                    health and well-being.
                                </p>
                            </div>
                        </li>

                    </ul>


                </div>
            </div>


        </div>
    </div>
    <!-- End Why Choose Us -->

    <!-- Start achievement
     ============================================= -->
    <div class="gallery-area default-padding" id="achievement">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        {{--                        <h5 class="sub-title">Awesome Gallery</h5>--}}
                        <h2 class="title">Our Achievement</h2>
                        <div class="devider"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 gallery-content">
                    <div class="magnific-mix-gallery masonary">
                        <div id="portfolio-grid" class="gallery-items colums-2">

                            @foreach($achievements as $achievement)
                                <!-- Single Item -->
                                <div class="pf-item">

                                    <div class="gallery-style-two">
                                        <img src="{{ asset('storage/' .$achievement->image) }}" alt
                                        />
                                        <div class="overlay">
                                            <span>{{$achievement->title}}</span>
                                            <h4><a href="">{{$achievement->description}}</a></h4>
                                        </div>
                                        {{--                                        <a class="link" href=""><i class="fas fa-arrow-right"></i></a>--}}
                                    </div>

                                </div>
                                <!-- End Single Item -->

                            @endforeach


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End achievement -->
    <!-- Start Services
        ============================================= -->
    <div class="services-style-two-area bottom-less text-center default-padding-top">
        <div class="shape-leaf">
            <img src="assets/img/shape/30.png" alt="Image Not Found">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        {{--                        <h5 class="sub-title">What we do</h5>--}}
                        <h2 class="title">Our Partner</h2>
                        <div class="devider"></div>
                        {{--                        <p>--}}
                        {{--                            Everything melancholy uncommonly but solicitude inhabiting <br> projection off. Connection stimulated estimating.--}}
                        {{--                        </p>--}}
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="services-style-two-box relative">
                <div class="shape-box-right-top-animated">
                    <img src="assets/img/shape/leaf-4.png" alt="Image not found">
                </div>
                <div class="row">


                    <!-- Single Item -->
                    @foreach($partners as $partner)
                        <div class="services-style-two col-xl-3 col-md-6">
                            <div class="" style="display: flex; justify-content: space-between;">
                                <div class="info">
                                    <div class="">
                                        <img src="{{ asset('storage/' .$partner->image) }}" alt=""/>
                                    </div>
                                    {{--                                <p>{{$partner->title}}</p>--}}
                                </div>
                                {{-- <h5 class="title">
                                    <a href="services-details.html"><i class="flaticon-cow-3"></i> Dairy Production</a>
                                </h5> --}}
                            </div>

                        </div>
                    @endforeach
                    <!-- End Single Item -->
                </div>
            </div>
        </div>

    </div>
    <!-- End Services -->


    <!-- Start Contact Us
    ============================================= -->
    <div class="contact-area bg-gray default-padding"
         style="background-image: url({{ asset('assets/img/shape/28.png') }});">
        <div class="container">
            <div class="row align-center">

                <div class="col-tact-stye-one col-lg-7">
                    <div class="contact-form-style-one mb-md-50">
                        <h5 class="sub-title">Have Questions?</h5>
                        <h2 class="heading">Send us a Massage</h2>
                        <form action="assets/mail/contact.php" method="POST" class="contact-form contact-form">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input class="form-control" id="name" name="name" placeholder="Name"
                                               type="text">
                                        <span class="alert-error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input class="form-control" id="email" name="email" placeholder="Email*"
                                               type="email">
                                        <span class="alert-error"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input class="form-control" id="phone" name="phone" placeholder="Phone"
                                               type="text">
                                        <span class="alert-error"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group comments">
                                    <textarea class="form-control" id="comments" name="comments"
                                              placeholder="Tell Us About Project *"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="submit" name="submit" id="submit">
                                        <i class="fa fa-paper-plane"></i> Get in Touch
                                    </button>
                                </div>
                            </div>
                            <!-- Alert Message -->
                            <div class="col-lg-12 alert-notification">
                                <div id="message" class="alert-msg"></div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-tact-stye-one col-lg-5 pl-60 pl-md-15 pl-xs-15">
                    <div class="contact-style-one-info">
                        <h2>
                            Contact
                            <span>
                                Information
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150"
                                     preserveAspectRatio="none"><path
                                        d="M14.4,111.6c0,0,202.9-33.7,471.2,0c0,0-194-8.9-397.3,24.7c0,0,141.9-5.9,309.2,0"
                                        style="animation-play-state: running;"></path></svg>
                            </span>
                        </h2>
                        {{--                        <p>--}}
                        {{--                            Plan upon yet way get cold spot its week. Almost do am or limits hearts. Resolve parties but--}}
                        {{--                            why--}}
                        {{--                            she shewing.--}}
                        {{--                        </p>--}}
                        <ul>
                            <li class="wow fadeInUp">
                                <div class="icon">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div class="content">
                                    <h5 class="title">Hotline</h5>
                                    <a href="">+880 1755-680807</a>
                                </div>
                            </li>
                            <li class="wow fadeInUp" data-wow-delay="300ms">
                                <div class="icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="info">
                                    <h5 class="title">Our Location</h5>
                                    <p>
                                        Mansurabad , Adabar , Road: 07 , House : 8
                                    </p>
                                </div>
                            </li>
                            <li class="wow fadeInUp" data-wow-delay="500ms">
                                <div class="icon">
                                    <i class="fas fa-envelope-open-text"></i>
                                </div>
                                <div class="info">
                                    <h5 class="title">Official Email</h5>
                                    <a href="">info@insurecow.com</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Contact -->

    <!-- Start Blog Area
    ============================================= -->
    <div class="blog-area home-blog blog-grid default-padding bottom-less" id="blogs"  >
        <div class="container">
            <div class="row">

                <div class="col-lg-8 offset-lg-2">
                    <div class="site-heading text-center">
                        {{--                        <h5 class="sub-title">What we do</h5>--}}
                        <h2 class="title">Blogs</h2>
                        <div class="devider"></div>
                        {{--                        <p>--}}
                        {{--                            Everything melancholy uncommonly but solicitude inhabiting <br> projection off. Connection stimulated estimating.--}}
                        {{--                        </p>--}}
                    </div>
                </div>

                @foreach($blogs as $blog)
                    <div class="col-lg-6 col-md-12 mb-30">
                        <div class="blog-style-one">
                            <div class="thumb">
                                <a href="{{route('singleblog',['id'=>$blog->id])}}"> <img
                                        src="{{ asset('storage/' . $blog->image) }}" alt
                                    /> </a>
                                <div class="date"><span>{{$blog->created_at}}</span></div>
                            </div>
                            <div class="info">
                                <div class="meta">
                                    <ul>
                                        <li>
                                            <a href="#"><i class="fas fa-user-circle"></i> Admin</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fas fa-comments"></i> 26 Comments</a>
                                        </li>
                                    </ul>
                                </div>
                                <h4 class="title">
                                    <a href="{{route('singleblog',['id'=>$blog->id])}}">{{$blog->title}}</a>
                                </h4>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
    <!-- End Blog Area -->





    {{-- ------------------------------------------------------------------------ Content Section ------------------------------------------------------------------------ --}}

@endsection
