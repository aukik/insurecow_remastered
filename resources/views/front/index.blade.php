<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta charset="utf-8"/>
    <!-- Title-->
    <title>InsureCow</title>

    <!-- Google Fonts
          ================================================== -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500&display=swap"
          rel="stylesheet"/>

    <link href="http://fonts.googleapis.com/css?family=Raleway:300,500,400,700" rel="stylesheet" type="text/css"/>
    <!-- Load CSS
          ================================================== -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet" type="text/css"/>
    <!--Pretty photo-->
    <link href="{{ asset('css/prettyPhoto.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Your Work -->
    <link href="{{ asset('css/prettyPhoto.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Color panel -->
    <link href="{{ asset('css/color_panel.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Main Style -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Default Color Scheme -->
    <link href="{{ asset('css/color-schemes/blue.css') }}" id="changeable-colors" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
          integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <!-- /.CSS Ends -->
</head>

<body>
<!-- PAGE LOADER -->
<div id="preloader">
    <div class="loader">
        <img src="{{ asset('images/logo.png') }}" alt="preloader"/>
    </div>
</div>
<!-- NAVIGATION MENU -->
<div id="navigation-menu">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="nav">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <div style="margin-top: -15px">
                        <img src="{{ asset('images/logo.png') }}" class="insurecow-logo" alt=""/>
                    </div>
                </a>
                <p></p>
                <p></p>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active">
                        <a href="#we-are" class="scroll">WHO WE ARE</a>
                    </li>
                    <li><a href="#services" class="scroll">PRODUCTS & SERVICES</a></li>
                    <li><a href="#team" class="scroll">OUR TEAM</a></li>
                    <li><a href="#achievements" class="scroll">ACHIEVEMENTS</a></li>
                    <li><a href="{{ route('login') }}">
                            <button style="margin-top:-5px;"
                                    type="button" class="btn btn-primary">PORTAL
                            </button>
                        </a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
</div>
<!-- /.NAVIGATION MENU -->


{{-- ----------------------------------------------------------------------- Text slider -----------------------------------------------------------------------  --}}

<!-- TEXT SLIDER -->
<div style="background: url(../images/slider/1_1.jpg);" class="text-slider parallaxbg">
    <div class="pattern-overlay"></div>
    <div class="slider-container" >
        <div class="home-text-slider slider-text owl-carousel owl-theme animated" data-animation="fadeInUp"
             data-animation-delay="1500">
            <!-- SLIDE ITEM-1 -->
            <div class="item">
                <h3><span class="span-heading-color2">Equipping </span> our farmers </h3>
                <p>With the Right Tools to Battle the Agrarian Hurdles of Days to Come
                </p>
            </div>
            <!-- SLIDE ITEM-2 -->
            <div class="item">
                <h3><span class="span-heading-color2">Insuring</span> the livelihood of farmers</h3>
                <p> of This Generation & Beyond</p>
            </div>
            <!-- SLIDE ITEM-3 -->
            <div class="item">
                <h3><span class="span-heading-color2">Offering </span>technology that mitigates</h3>
                <p>the Risk of Herds and Crop</p>
            </div>
        </div>
        <div class="scroll-down">
            <a href="#we-are" class="scroll"><i class="fa fa-angle-double-down"></i></a>
        </div>
    </div>
</div>
<!-- /.TEXT SLIDER -->


{{-- ----------------------------------------------------------------------- Text slider -----------------------------------------------------------------------  --}}


<!----------------About Us------------------------>

<section id="we-are" class="about-section">
    <div class="container">
        <div class="row clearfix">

            <!--Content Column-->
            <div class="content-column col-md-6 col-sm-12 col-xs-12">
                <div class="inner-column">
                    <div class="sec-title">
                        <div class="title animated" data-animation="fadeInDown" data-animation-delay="300">Who We Are
                        </div>
                        <h2>About InsureCow</h2>
                    </div>
                    <div class="text">
                        <p style="text-align: justify;">
                            InsureCow offers a 360° technology-powered cattle insurance and wellbeing monitoring
                            platform. Our
                            solutions create a digital and robust bridge between farmers, SMEs, NGOs, Insurers, and
                            financial
                            institutions.
                            <br><br>

                            We ensure a sustainable and resilient agrarian future for our nation by increasing the
                            farmers’ access
                            to finance, technology & information, which inevitably leads to their financial security.
                            <br><br>
                            We accomplish our goals by letting the farmers, NGOs and other financial institutions
                            register their
                            cattle for insurance via our online portal, who are then able to visualize their policy
                            progression in
                            our state-of-the-art Analytics Hub. And through our Payment Gateway System, it is now easier
                            than ever
                            for premiums to be paid and insurance to be claimed.
                        </p>

                    </div>
                    <a href="#counter" class="theme-btn btn-style-three">Explore</a>
                </div>
            </div>

            <!--Image Column-->
            <div class="img-margin">
                <div class="image-column col-md-6 col-sm-12 col-xs-12">
                    <div class="inner-column " data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="image">
                            <img src="{{ asset('images/farmer__1.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-----------------------------------About Us-------->

<!-------------------About Us (Counter section) ------------------------>
<!-- <div id="counter" class="parallaxbg">
  <div class="counter-section">
    <div class=""></div>
    <div class="container">
      <div class="row">
        <div class="col-sm-3 animated" data-animation="fadeInUp" data-animation-delay="300">
          <img src="./images/1.png" class="img-fluid">
          <div class="count-number fun-number" data-count="115">
            <div class="counter"></div>
          </div>
          <p>Farmers Enrolled</p>
        </div>
        <div class="col-sm-3 animated" data-animation="fadeInUp" data-animation-delay="300">
          <img src="./images/farmer-2.png" class="img-fluid">
          <div class="count-number fun-number" data-count="256">
            <div class="counter"></div>
          </div>
          <p>Cows Registered</p>
        </div>
        <div class="col-sm-3 animated" data-animation="fadeInUp" data-animation-delay="700">
          <img src="./images/farmer-3.png" class="img-fluid">
          <div class="count-number fun-number" data-count="20480000">
            <div class="counter"></div>
          </div>
          <p>Total Value of Registered Cows (৳)</p>
        </div>
        <div class="col-sm-3 animated" data-animation="fadeInUp" data-animation-delay="1100">
          <img src="./images/farmer-4.png" class="img-fluid">
          <div class="count-number fun-number" data-count="5">
            <div class="counter"></div>
          </div>
          <p>Districts Covered</p>
        </div>
      </div>
    </div>
  </div>
</div> -->
<!------------------------------About Us (Counter section) --------->

<!--WE ARE SECTION-->
<!-- <section id="we-are" class="">
    <div class="container">
      <div class="row" style="margin-right:0;margin-left:0;">

        <div class="col-md-12 title">
          <h1
            class="animated heading-title"
            data-animation="fadeInDown"
            data-animation-delay="300"
          >
            Who We Are
          </h1>


        </div>
        <div class="col-lg-5 col-md-6" >
          <img src="./images/cow.png" class="about-us-image-style img-fluid">
        </div>

        <div class="col-lg-7 col-md-6">
          <div class="about-us-title">
            About <span class="span-heading-color">InsureCow </span>
          </div>

            <p>
              WRMS (previously, Weather Risk) is an agriculture and dairy risk management company. We leverage data, technology and financial innovation to develop risk management solutions that help farmers enhance productivity, gain a secure income, and practice sustainable farming.
              WRMS was founded in 2004 and, over the years, we have received investments & grants from UPL, ILO, and the Ford Foundation.

            </p>
          </div>
        </div>

      </div>

  </section> -->
<!-- /.WE ARE SECTION-->

<!------------------- Products & Services ------------------------>
<section style="background-color:#fff;" id="features" class="">
    <div class="container" id="services">
        <div class="row">
            <!--SECTION TITLE-->
            <div class="col-md-12 title">
                <h1 class="animated" data-animation="fadeInDown" data-animation-delay="300">
                    Products & Services
                </h1>
                <div class="row">
                    <div class="col-lg-8">
                        <img src="">
                    </div>
                </div>

                <p class="animated" data-animation="fadeInRight" data-animation-delay="500">
                    We design and deliver best insurance products to protect farmers.
                </p>
                <p class="animated" data-animation="fadeInLeft" data-animation-delay="500">

                </p>
            </div>
            <!-- /.SECTION TITLE-->
        </div>
        <div class="row" style="margin: 0; padding: 0;">
            <!--FEATURES LEFT-SIDE-->
            <!-- <div class="features-left">
                <div
                  class="feature animated"
                  data-animation="fadeInLeft"
                  data-animation-delay="500"
                >

                  <div class="feature-icon">
                    <i class="fa fa-area-chart"></i>
                  </div>

                  <div class="features-title">
                    <h3>Creative Business Ideas</h3>
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                      Phasellus et velit.
                    </p>
                  </div>
                </div>
                <div
                  class="feature animated"
                  data-animation="fadeInLeft"
                  data-animation-delay="700"
                >

                  <div class="feature-icon">
                    <i class="fa fa-bullhorn"></i>
                  </div>

                  <div class="features-title">
                    <h3>Information Technology</h3>
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                      Phasellus et velit.
                    </p>
                  </div>
                </div>
                <div
                  class="feature animated"
                  data-animation="fadeInLeft"
                  data-animation-delay="900"
                >

                  <div class="feature-icon">
                    <i class="fa fa-lightbulb-o"></i>
                  </div>

                  <div class="features-title">
                    <h3>Professional Team</h3>
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                      Phasellus et velit.
                    </p>
                  </div>
                </div>
              </div> -->

            <!-- <div
                class="features-image animated"
                data-animation="pulse"
                data-animation-delay="500"
              >
                <img
                  src="images/features/iPhone.png"
                  class="img-responsive"
                  alt="phone"
                  height="678"
                  width="330"
                />
              </div> -->
            <div class="col-lg-6">
                <div class="farmer-img-margin">
                    <img src="{{ asset('images/Bangladesh_Farmer.png') }}" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="">


                    <div class="feature animated" data-animation="fadeInRight" data-animation-delay="500">

                        <div class="feature-icon" style="margin-bottom:3rem;">
                            <i class="fa-solid fa-cow"></i>
                        </div>

                        <div class="features-title">
                            <h3>Cattle Registration Services</h3>
                            <p>

                            </p>
                        </div>
                    </div>


                    <div class="feature animated" data-animation="fadeInRight" data-animation-delay="700">

                        <div class="feature-icon" style="margin-bottom:3rem;">
                            <i class="fa-brands fa-safari"></i>
                        </div>

                        <div class="features-title">
                            <h3>Platform & API Services</h3>
                            <p>

                            </p>
                        </div>
                    </div>


                    <div class="feature animated" data-animation="fadeInRight" data-animation-delay="900">

                        <div class="feature-icon" style="margin-bottom:3rem;">
                            <i class="fa-solid fa-hand" aria-hidden="true"></i>
                        </div>

                        <div class="features-title">
                            <h3>Claim Management</h3>
                            <p>

                            </p>
                        </div>
                    </div>

                    <div class="feature animated" data-animation="fadeInRight" data-animation-delay="900">

                        <div class="feature-icon" style="margin-bottom:3rem;">
                            <i class="fa fa-bar-chart" aria-hidden="true"></i>
                        </div>

                        <div class="features-title">
                            <h3>Data Management and Visualization Services</h3>
                            <p>

                            </p>
                        </div>
                    </div>


                    <div class="feature animated" data-animation="fadeInRight" data-animation-delay="500">

                        <div class="feature-icon" style="margin-bottom:3rem;">
                            <i class="fa-solid fa-file-word" aria-hidden="true"></i>
                        </div>

                        <div class="features-title">
                            <h3>Insurance Product Designing & Underwriting Services</h3>
                            <p>

                            </p>
                        </div>
                    </div>


                    <div class="feature animated" data-animation="fadeInRight" data-animation-delay="700">

                        <div class="feature-icon" style="margin-bottom:3rem;">
                            <i class="fa-solid fa-file-invoice-dollar"></i>

                        </div>

                        <div class="features-title">
                            <h3>Payment Gateway for All Stakeholders</h3>
                            <p>

                            </p>
                        </div>
                    </div>


                    <div class="feature animated" data-animation="fadeInRight" data-animation-delay="700">

                        <div class="feature-icon" style="margin-bottom:3rem;">
                            <i class="fa-solid fa-person-chalkboard"></i>

                        </div>

                        <div class="features-title">
                            <h3>Insurance Product Capacity Building & Training</h3>
                            <p>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--------------------------------------- Products & Services -------->

<!------------------------ OUR TEAM SECTION----------------------->

<section id="team">
    <div class="container">
        <div class="row">
            <div class="row" style="margin: 0; padding: 0;">
                <div class="col-md-12 title">
                    <h1 class="animated" data-animation="fadeInDown" data-animation-delay="300">
                        Our Team Members
                    </h1>
                    <p class="animated" data-animation="fadeInRight" data-animation-delay="500">
                        Meet Our Team Members
                    </p>
                    <p class="animated" data-animation="fadeInLeft" data-animation-delay="500">

                    </p>
                </div>
            </div>

            <!----------------------
       Our profile cards
    ------------------------>
            <div class="container cards-container">

                <div class="card card-two">
                    <header>
                        <div class="avatar">
                            <img src="{{ asset('images/team/ceo%20(1).png') }}" alt=""/>
                        </div>
                    </header>

                    <h3>Tasvir A. <br> Faheem</h3>
                    <div class="desc">
                        Chief Executive Officer (CEO)
                    </div>
                    <div class="contacts" style="display: flex; align-items:center; justify-content: center;">

                        <a href="https://www.linkedin.com/in/tasvir/" target="_blank"><i
                                    class="fa-brands fa-linkedin fa-2x"></i></a>
                    </div>
                    <br>

                </div>


                <div class="card card-two">
                    <header>
                        <div class="avatar">
                            <img src="{{ asset('images/team/coo.jpg') }}" alt=""/>
                        </div>
                    </header>

                    <h3>Nurunnassa Choudhury</h3>
                    <div class="desc">
                        Chief Operating Officer
                    </div>
                    <div class="contacts" style="display: flex; align-items:center; justify-content: center;">

                        <a href="https://www.linkedin.com/in/nurunnassa-nasim-b51846b1/" target="_blank"><i
                                    class="fa-brands fa-linkedin fa-2x"></i></a>
                    </div>
                    <br>

                </div>


                <div class="card card-two">
                    <header>
                        <div class="avatar">
                            <img src="{{asset('images/team/ali-tareque2.jpg')}}" alt=""/>
                        </div>
                    </header>

                    <h3>Ali Tareque <br> Parvez </h3>
                    <div class="desc">
                        Director & Chief Commercial Officer
                    </div>
                    <div class="contacts" style="display: flex; align-items:center; justify-content: center;">

                        <a href="https://www.linkedin.com/in/alitarequeparvez/" target="_blank"><i
                                    class="fa-brands fa-linkedin fa-2x"></i></a>
                    </div>
                    <br>
                </div>


                <!--<div class="card card-two">-->
                <!--  <header>-->
                <!--    <div class="avatar">-->
                <!--      <img src="./images/team/ripan.jpg" alt="" />-->
                <!--    </div>-->
                <!--  </header>-->

                <!--  <h3>Ripan Kumar<br>Kundu</h3>-->
                <!--  <div class="desc">-->
                <!--    Tech Lead-->
                <!--  </div>-->
                <!--  <div class="contacts" style="display: flex; align-items:center; justify-content: center;">-->

                <!--    <a href="https://www.linkedin.com/in/ripan-kumar-kundu-9b3b24b9/" target="_blank"><i-->
                <!--        class="fa-brands fa-linkedin fa-2x"></i></a>-->
                <!--  </div>-->
                <!--  <br>-->
                <!--</div>-->


                <div class="card card-one">
                    <header>
                        <div class="avatar">
                            <img src="{{ asset('images/team/tahmid.jpg') }}" alt=""/>
                        </div>
                    </header>

                    <h3>Tahmid <br>Ferdous</h3>
                    <div class="desc">
                        Technical Product Owner
                    </div>
                    <div class="contacts" style="display: flex; align-items:center; justify-content: center;">

                        <a href="https://www.linkedin.com/in/tahmid-ferdous-7a66b8134/" target="_blank"><i
                                    class="fa-brands fa-linkedin fa-2x"></i></a>
                    </div>
                    <br>
                </div>


            </div>
            <div class="container cards-container">
                <!--<div class="card card-one">-->
                <!--  <header>-->
                <!--    <div class="avatar">-->
                <!--      <img src="./images/team/tahmid.jpg" alt="" />-->
                <!--    </div>-->
                <!--  </header>-->

                <!--  <h3>Tahmid <br>Ferdous</h3>-->
                <!--  <div class="desc">-->
                <!--    Technical Product Owner-->
                <!--  </div>-->
                <!--  <div class="contacts" style="display: flex; align-items:center; justify-content: center;">-->

                <!--    <a href="https://www.linkedin.com/in/tahmid-ferdous-7a66b8134/" target="_blank"><i-->
                <!--        class="fa-brands fa-linkedin fa-2x"></i></a>-->
                <!--  </div>-->
                <!--  <br>-->
                <!--</div>-->


                {{--          <div class="card card-one">--}}
                {{--            <header>--}}
                {{--              <div class="avatar">--}}
                {{--                <img src="https://media.licdn.com/dms/image/D5603AQE_MCK9QfpAMw/profile-displayphoto-shrink_200_200/0/1673178206851?e=1678924800&v=beta&t=2fk6xqZ9xvNYTz3kFrYdDavC8brJ7nEqRLh_OikSR0g" alt="" />--}}
                {{--              </div>--}}
                {{--            </header>--}}

                {{--            <h3>Rahul <br>Deb</h3>--}}
                {{--            <div class="desc">--}}
                {{--              UI/UX Designer--}}
                {{--            </div>--}}
                {{--            <div class="contacts" style="display: flex; align-items:center; justify-content: center;">--}}

                {{--              <a href="https://www.linkedin.com/in/rahul-d1212/" target="_blank"><i--}}
                {{--                  class="fa-brands fa-linkedin fa-2x"></i></a>--}}
                {{--            </div>--}}
                {{--            <br>--}}
                {{--          </div>--}}



                {{--          <div class="card card-one">--}}
                {{--            <header>--}}
                {{--              <div class="avatar">--}}
                {{--                <img src="https://media.licdn.com/dms/image/D5603AQFSf-G0jE67PQ/profile-displayphoto-shrink_800_800/0/1674021993148?e=1680739200&v=beta&t=iDRtO8oC7xbCGX03K5HeOMxW1JfBzy_tcklD8eV9fMQ" alt="" />--}}
                {{--              </div>--}}
                {{--            </header>--}}

                {{--            <h3>Mithun<br>Sutradhar</h3>--}}
                {{--            <div class="desc">--}}
                {{--              Full-stack Developer--}}
                {{--            </div>--}}
                {{--            <div class="contacts" style="display: flex; align-items:center; justify-content: center;">--}}

                {{--              <a href="https://www.linkedin.com/in/mithun-sutradhar-1b416a181/" target="_blank"><i--}}
                {{--                  class="fa-brands fa-linkedin fa-2x"></i></a>--}}
                {{--            </div>--}}
                {{--            <br>--}}
                {{--          </div>--}}




                <!-- <div class="card card-one">
            <header>
              <div class="avatar">
                <img src="./images/team/abu-kaiser.jpeg" alt="" />
              </div>
            </header>

            <h3>Abu<br>Kaisar</h3>
            <div class="desc">
              ML Engineer
            </div>
            <div class="contacts" style="display: flex; align-items:center; justify-content: center;">

              <a href="https://www.linkedin.com/in/abukaisar24/?originalSubdomain=bd" target="_blank"><i
                  class="fa-brands fa-linkedin fa-2x"></i></a>
            </div>
            <br>
          </div> -->


            </div>


        </div>
    </div>
</section>

<!------------------------------------ OUR TEAM SECTION-------------->


<!-- SKILLS SECTION-->
<!-- <section id="skills">
    <div class="container">
      <div class="row">

         <div class="col-md-12 title">
          <h1
            class="animated"
            data-animation="fadeInDown"
            data-animation-delay="300"
          >
            Excellence Skills
          </h1>
          <p
            class="animated"
            data-animation="fadeInRight"
            data-animation-delay="500"
          >
            We provide Risk Mitigation Services to the Farmers.
          </p>
          <p
            class="animated"
            data-animation="fadeInLeft"
            data-animation-delay="500"
          >
            We Are Working on creating equal opportunities for all.
          </p>
        </div>

      </div>
      <div class="row">
        <div class="col-md-6">

          <p>HTML & CSS</p>
          <div class="progress">
            <div
              class="progress-bar"
              role="progressbar"
              aria-valuenow="90"
              aria-valuemin="0"
              aria-valuemax="100"
            >
              <span class="sr-only">90% Complete</span>
              <div class="tooltip top" role="tooltip">
                <div class="tooltip-inner">90%</div>
                <div class="tooltip-arrow"></div>
              </div>
            </div>
          </div>

          <p>JAVASCRIPT & JQUERY</p>
          <div class="progress">
            <div
              class="progress-bar"
              role="progressbar"
              aria-valuenow="60"
              aria-valuemin="0"
              aria-valuemax="100"
            >
              <span class="sr-only">60% Complete</span>
              <div class="tooltip top" role="tooltip">
                <div class="tooltip-inner">60%</div>
                <div class="tooltip-arrow"></div>
              </div>
            </div>
          </div>

          <p>AJAX / ANGULAR JS</p>
          <div class="progress">
            <div
              class="progress-bar"
              role="progressbar"
              aria-valuenow="55"
              aria-valuemin="0"
              aria-valuemax="100"
            >
              <span class="sr-only">55% Complete</span>
              <div class="tooltip top" role="tooltip">
                <div class="tooltip-inner">55%</div>
                <div class="tooltip-arrow"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">

          <p>BLOGGER</p>
          <div class="progress">
            <div
              class="progress-bar"
              role="progressbar"
              aria-valuenow="80"
              aria-valuemin="0"
              aria-valuemax="100"
            >
              <span class="sr-only">80% Complete</span>
              <div class="tooltip top" role="tooltip">
                <div class="tooltip-inner">80%</div>
                <div class="tooltip-arrow"></div>
              </div>
            </div>
          </div>

          <p>WORDPRESS</p>
          <div class="progress">
            <div
              class="progress-bar"
              role="progressbar"
              aria-valuenow="95"
              aria-valuemin="0"
              aria-valuemax="100"
            >
              <span class="sr-only">95% Complete</span>
              <div class="tooltip top" role="tooltip">
                <div class="tooltip-inner">95%</div>
                <div class="tooltip-arrow"></div>
              </div>
            </div>
          </div>

          <p>MAGENTO</p>
          <div class="progress">
            <div
              class="progress-bar"
              role="progressbar"
              aria-valuenow="65"
              aria-valuemin="0"
              aria-valuemax="100"
            >
              <span class="sr-only">65% Complete</span>
              <div class="tooltip top" role="tooltip">
                <div class="tooltip-inner">65%</div>
                <div class="tooltip-arrow"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->
<!-- /.SKILL SECTION-->

<!-- RESPONSIVE SECTION-->
<!-- <section id="responsive" class="parallaxbg">
    <div class="responsive-section">
      <div class="pattern-overlay"></div>
      <div class="container">
        <div class="row">

          <div
            class="col-md-6 animated"
            data-animation="fadeInLeft"
            data-animation-delay="500"
          >
            <h2>We build clean responsive websites</h2>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam
              dignissim, quam sollicitudin euismod porttitor, nulla ipsum
              tempus ante, quis tempus magna turpis vitae sem. Vivamus
              scelerisque finibus risus, at molestie quam aliquet quis.
            </p>

            <button class="btn">SEND A MESSAGE</button>
          </div>

          <div
            class="col-md-6 animated"
            data-animation="fadeInRight"
            data-animation-delay="500"
          >
            <img
              src="images/responsive/responsive-devices.png"
              class="img-responsive"
              alt="responsive"
              width="700"
              height="350"
            />
          </div>
        </div>
      </div>
    </div>
  </section> -->
<!-- /.RESPONSIVE SECTION-->

<!--------------------- Achievements SECTION-------------------->
<section id="services" style="background-color:#fff;">
    <div class="container" id="achievements">
        <div class="row" style="margin: 0; padding: 0;">
            <!--SECTION TITLE-->
            <div class="col-md-12 title">
                <h1 class="animated" data-animation="fadeInDown" data-animation-delay="300">
                    Our Achievements
                </h1>
                <div class="row" style="margin: 0; padding: 0;">
                    <div class="col-lg-8">
                        <img src="">
                    </div>
                </div>

                <p class="animated" data-animation="fadeInRight" data-animation-delay="500">
                    Explore Our Achievements
                </p>
                <p class="animated" data-animation="fadeInLeft" data-animation-delay="500">

                </p>
            </div>
            <!-- /.SECTION TITLE-->
        </div>

        <!--  TOP-->
        <div class="row services-top" style="margin: 0; padding: 0;">


            <div class="col-sm-6 service-block left">
                <!-- <div class="fa fa-trophy animated" data-animation="pulse" data-animation-delay="300">
                  <i class="fa fa-trophy"></i>
                </div> -->
                <img src="{{ asset('images/idea_updated.png') }}" style=" margin-bottom:2rem;">
                <h4 class="animated" data-animation="fadeInRight" data-animation-delay="500">
                    iDEA
                </h4>
                <h3 class="animated" data-animation="fadeInLeft" data-animation-delay="700">
                    Project Grant
                </h3>
                <p style="text-align: justify;" class="animated" data-animation="fadeInUp" data-animation-delay="900">
                    iDEA (Innovation Design & Entrepreneurship Academy) creates an Accelerator and its accompanying
                    ecosystem.
                    Offer mentoring, funding, co-working spaces, marketing, and legal support to selected startup
                    entrepreneurs
                    to help realize their visions. </p>
            </div>

            <!--  BLOCK-2-->
            <div class="col-sm-6 service-block">
                <!-- <div class="fa fa-trophy animated" data-animation="pulse" data-animation-delay="300">
                  <i class="fa fa-trophy"></i>
                </div> -->
                <img src="{{ asset('images/cardano-ada-logo.png') }}"
                     style="width:200px; height:200px; margin-bottom:2rem;">
                <h4 class="animated" data-animation="fadeInRight" data-animation-delay="500">
                    FT x Cardano
                </h4>
                <h3 class="animated" data-animation="fadeInLeft" data-animation-delay="700">
                    Blockchain Challenge Finals
                </h3>
                <p style="text-align: justify;" class="animated" data-animation="fadeInUp" data-animation-delay="900">
                    InsureCow is proud to be selected to participate in the FT x Cardano Blockchain Challenge Finals.
                </p>
            </div>
        </div>
        <!-- /.TOP-->
        <!--MIDDLE LINE-->
        <div class="middle-line">
            <span>I</span>
        </div>
        <!-- BOTTOM-->
        <div class="row services-bottom" style="margin: 0; padding: 0;">

            <!--BLOCK-3-->
            <div class="col-sm-6 service-block left">
                <!-- <div class="fa fa-trophy animated" data-animation="pulse" data-animation-delay="300">
                  <i class="fa fa-trophy"></i>
                </div> -->
                <img src="{{ asset('images/ms%20(1).png') }}" style="width:320px; height:200px; margin-bottom:2rem;">
                <h4 class="animated" data-animation="fadeInRight" data-animation-delay="500">
                    Microsoft Startup
                </h4>
                <h3 class="animated" data-animation="fadeInLeft" data-animation-delay="700">
                    Platform
                </h3>
                <p style="text-align: justify;" class="animated" data-animation="fadeInUp" data-animation-delay="900">
                    Microsoft for Startups has allowed us to grow our business and create value for our clients.
                    We seek to rethink risk approaches, through a collaborative platform that allows organizations to
                    share best
                    practices.
                </p>
            </div>
            <!-- BLOCK-4-->
            <div class="col-sm-6 service-block">
                <!-- <div class="fa fa-trophy animated" data-animation="pulse" data-animation-delay="300">
                  <i class="fa fa-trophy"></i>
                </div> -->
                <img src="{{ asset('images/download_startany.png') }}"
                     style="width:200px; height:200px; margin-bottom:2rem;">
                <h4 class="animated" data-animation="fadeInRight" data-animation-delay="500">
                    Startany
                </h4>
                <h3 class="animated" data-animation="fadeInLeft" data-animation-delay="700">
                    Top 30 Emerging
                    Startups
                </h3>
                <p style="text-align: justify;" class="animated" data-animation="fadeInUp" data-animation-delay="900">
                    Startany is a marketplace that aims to bring entrepreneurs well versed in the new economy, who want
                    to
                    establish their own internet company with companies, investors and professionals.
                </p>
            </div>
        </div>
        <!-- /.BOTTOM-->
    </div>
    <div class="about-section about-2-section" style="background-color:#fff">
        <div class="container">
            <div class="row clearfix">
                <div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="inner-column " data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="image">
                                <img src="{{ asset('images/prothomalonews.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <!--Content Column-->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="inner-column ">

                        <div class="text" style="margin-top:20px;">
                            <p style="text-align: justify;">
                                'InsureCow' won the 'Start Karo' competition organized on innovative concepts of
                                technology and sustainable development. The startup won the award with its livestock
                                insurance.

                                <br><br>
                                The two-day competition was organized by the technology institute Entrepreneur Lab and
                                Frederick Neumann Foundation in collaboration with Startup Bangladesh and EMK Center
                                Bangladesh.
                            <p/>

                        </div>
                        <div class="text-center">
                            <a href="https://www.prothomalo.com/technology/19halxulgm" target="_blank"
                               class="theme-btn btn-style-three">Read Full Article</a>
                        </div>
                    </div>
                </div>

                <!--Image Column-->


            </div>
        </div>

        <div class="container" style="margin-top:50px;">
            <div class="row clearfix">
                <div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="inner-column " data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="image">
                                            <img src="{{ asset('images/champion.jpeg') }}" class="blog-image" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="image">
                                            <img src="{{ asset('images/insurecow-champion.jpeg') }}" class="blog-image"
                                                 alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                        <div class="image">
                                            <img src="{{ asset('images/insurecow-champion-2.jpeg') }}"
                                                 class="blog-image" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!--Content Column-->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="inner-column ">

                        <div class="text">

                            <div class="text" style="margin-top:25px;">
                                <p style="text-align: justify;">
                                    InsureCow became the Champion in the Huawei ICT Incubator 2022 program.
                                    <br><br>
                                    Huawei has announced six startups as the winners of the Huawei ICT Incubator 2022
                                    program. The winners will get seed money as the award in addition to the opportunity
                                    to meet global startups for knowledge sharing.
                                <p/>

                            </div>

                        </div>
                        <div class="text-center">
                            <a href="https://www.thedailystar.net/tech-startup/news/huawei-ict-incubator-2022-announces-top-6-startups-bangladesh-3147281"
                               target="_blank" class="theme-btn btn-style-three">Read Full Article</a>
                        </div>
                    </div>
                </div>

                <!--Image Column-->


            </div>
        </div>
    </
    >
</section>
<!-------------------------------- Achievements SECTION-------------------->

<!--------------------- Our Partners SECTION-------------------->
<section id="working" class="parallaxbg">
    <div class="container">
        <div class="row" style="margin: 0; padding: 0;">

            <div class="col-md-12 title white">
                <h1 class="animated" data-animation="fadeInDown" data-animation-delay="300">
                    Our Partners
                </h1>
                <!-- <p class="animated" data-animation="fadeInRight" data-animation-delay="500">
                  We Are Digital Agencies From Earth, Web Publication Made Easy With
                  Us.
                </p>
                <p class="animated" data-animation="fadeInLeft" data-animation-delay="500">
                  We Are Working on Complete World Wide
                </p> -->
            </div>

        </div>
        <div class="row" style="margin: 0; padding: 0;">
            <div class="col-sm-3 animated" data-animation="bounceInUp" data-animation-delay="300">

                <div class="working-circle" role="tooltip" data-toggle="tooltip" data-placement="top" title="">
                    <i class="fa-brands fa-aws"></i>

                    <p>AWS</p>
                </div>
            </div>
            <div class="col-sm-3 animated" data-animation="bounceInUp" data-animation-delay="500">

                <div class="working-circle" role="tooltip" data-toggle="tooltip" data-placement="top" title="">
                    <i class="fa-solid fa-n"></i>

                    <p>NGO</p>
                </div>
            </div>

            <div class="col-sm-3 animated" data-animation="bounceInUp" data-animation-delay="700">
                <div class="working-circle" style="margin-bottom:10rem;" role="tooltip" data-toggle="tooltip"
                     data-placement="top" title="">
                    <i class="fa-solid fa-handshake"></i>

                    <p>Various Insurance Companies</p>
                </div>
            </div>


            <div class="col-sm-3 animated" data-animation="bounceInUp" data-animation-delay="900">

                <div class="working-circle" role="tooltip" data-toggle="tooltip" data-placement="top" title="">
                    <i class="fa-solid fa-building-columns"></i>

                    <p>Multiple Financial Institutions</p>
                </div>
            </div>


        </div>
    </div>
</section>
<!-------------------------------- Our Partners SECTION-------------------->

<!-- PRICINGS SECTION-->
<!-- <section id="pricings">
    <div class="container">
      <div class="row">

        <div class="col-md-12 title">
          <h1
            class="animated"
            data-animation="fadeInDown"
            data-animation-delay="300"
          >
            <span class="color">Best</span> Pricings
          </h1>
          <p
            class="animated"
            data-animation="fadeInRight"
            data-animation-delay="500"
          >
            We Are Digital Agencies From Earth, Web Publication Made Easy With
            Us.
          </p>
          <p
            class="animated"
            data-animation="fadeInLeft"
            data-animation-delay="500"
          >
            We Are Working on Complete World Wide
          </p>
        </div>

      </div>
    </div>
    <div class="container pricing-container">
      <div class="row">
        <div
          class="col-md-offset-1 col-md-3 animated"
          data-animation="flipInY"
          data-animation-delay="300"
        >

          <div class="pricing-table">

            <div class="category">
              <h3>Basic</h3>
            </div>

            <ul>
              <li class="price">
                <h4>$11</h4>
                <p>PER MONTH</p>
              </li>
              <li>1 Top Level Domain</li>
              <li>1 GB Hosting</li>
              <li>10 GB Monthly Bandwidth</li>
              <li>10 Email Accounts</li>
              <li>Weekly Cloud Backup</li>
              <li>24/7 Support</li>
            </ul>

            <a class="btn">sign up</a>
          </div>
        </div>

        <div
          class="col-md-4 animated"
          data-animation="flipInY"
          data-animation-delay="500"
        >
          <div class="pricing-table premium">

            <div class="category">
              <h3>PREMIUM</h3>
            </div>

            <ul>
              <li class="price">
                <h4>$33</h4>
                <p>PER MONTH</p>
              </li>
              <li>10 Top Level Domain</li>
              <li>10 GB Hosting</li>
              <li>100 GB Monthly Bandwidth</li>
              <li>50 Email Accounts</li>
              <li>Daily Cloud Backup</li>
              <li>24/7 Support</li>
            </ul>

            <a class="btn">sign up</a>
          </div>
        </div>

        <div
          class="col-md-3 animated"
          data-animation="flipInY"
          data-animation-delay="300"
        >
          <div class="pricing-table">

            <div class="category">
              <h3>PLUS</h3>
            </div>

            <ul>
              <li class="price">
                <h4>$55</h4>
                <p>PER MONTH</p>
              </li>
              <li>Unlimited Domain</li>
              <li>Unlimited Hosting</li>
              <li>Unlimited Monthly Bandwidth</li>
              <li>Unlimited Email Accounts</li>
              <li>Hourly Cloud Backup</li>
              <li>Live Chat Support</li>
            </ul>

            <a class="btn">sign up</a>
          </div>
        </div>
      </div>
    </div>
  </section> -->
<!-- /.PRICINGS SECTION-->

<!-- TESTIMONIALS SECTION-->


<!--
<section id="testimonials" class="parallaxbg">
  <div class="pattern-overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1 animated" data-animation="fadeInUp" data-animation-delay="300">
        <div id="testimonials-slider" class="owl-carousel owl-theme">
          <div class="item">
            <p>
              Aullam vitae sollicitudin eros. Cras varius vehicula velit ac
              congue quam dictum sed. Duis autem vel eum iriure dolor in
              hendrerit in vulputate velit esse molestie consequat.Donec sed
              odio dui. Nulla vitae elit libero a pharetra augue. Nullam id
              dolor id ultricies ut vehicula ut id. Integer posuere erat a
              venenatis dapibus posuere velit aliquet duis mollis.
            </p>
            <img src="images/testimonial/1.jpg" class="img-circle" alt="client-photo" width="135" height="152" />
            <h3 style="color:#fff">John Deo</h3>
            <p>Web company</p>
          </div>
          <div class="item">
            <p>
              Aullam vitae sollicitudin eros. Cras varius vehicula velit ac
              congue quam dictum sed. Duis autem vel eum iriure dolor in
              hendrerit in vulputate velit esse molestie consequat.Donec sed
              odio dui. Nulla vitae elit libero a pharetra augue. Nullam id
              dolor id ultricies ut vehicula ut id. Integer posuere erat a
              venenatis dapibus posuere velit aliquet duis mollis.
            </p>
            <img src="images/testimonial/2.jpg" class="img-circle" alt="client-photo" width="135" height="152" />
            <h3 style="color:#fff">Jessica Alba</h3>
            <p>Co company</p>
          </div>
          <div class="item">
            <p>
              Aullam vitae sollicitudin eros. Cras varius vehicula velit ac
              congue quam dictum sed. Duis autem vel eum iriure dolor in
              hendrerit in vulputate velit esse molestie consequat.Donec sed
              odio dui. Nulla vitae elit libero a pharetra augue. Nullam id
              dolor id ultricies ut vehicula ut id. Integer posuere erat a
              venenatis dapibus posuere velit aliquet duis mollis.
            </p>
            <img src="images/testimonial/3.jpg" class="img-circle" alt="client-photo" width="135" height="152" />
            <h3 style="color:#fff">Stuard Broad</h3>
            <p>Android company</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> -->


<!-- /.TESTIMONIALS SECTION-->


<!-- CLIENTS SECTION-->
<!-- <section id="clients">
    <div class="container">
      <div class="row">

        <div class="col-md-12 title white">
          <h1
            class="animated"
            data-animation="fadeInDown"
            data-animation-delay="300"
          >
            <span class="color">Our</span> Clients
          </h1>
          <p
            class="animated"
            data-animation="fadeInRight"
            data-animation-delay="500"
          >
           We provide Risk Mitigation Services for Farmers.
          </p>
          <p
            class="animated"
            data-animation="fadeInLeft"
            data-animation-delay="500"
          >
           Creating equal opportunities for all.
          </p>
        </div>

      </div>
      <div class="row">
        <div
          class="col-md-12 animated"
          data-animation="fadeInUp"
          data-animation-delay="700"
        >
          <div id="clients-slider" class="owl-carousel owl-theme">

            <div class="item">
              <img
                src="images/clients/1.png"
                class="img-responsive"
                alt="client"
                height="113"
                width="156"
              />
            </div>

            <div class="item">
              <img
                src="images/clients/2.png"
                class="img-responsive"
                alt="client"
                height="113"
                width="156"
              />
            </div>

            <div class="item">
              <img
                src="images/clients/3.png"
                class="img-responsive"
                alt="client"
                height="113"
                width="156"
              />
            </div>

            <div class="item">
              <img
                src="images/clients/4.png"
                class="img-responsive"
                alt="client"
                height="113"
                width="156"
              />
            </div>

            <div class="item">
              <img
                src="images/clients/5.png"
                class="img-responsive"
                alt="client"
                height="113"
                width="156"
              />
            </div>

            <div class="item">
              <img
                src="images/clients/6.png"
                class="img-responsive"
                alt="client"
                height="113"
                width="156"
              />
            </div>

            <div class="item">
              <img
                src="images/clients/7.png"
                class="img-responsive"
                alt="client"
                height="113"
                width="156"
              />
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->

<!-- PORTFOLIO SECTION-->
<!-- <section id="portfolio">
    <div class="container">
      <div class="row">

        <div class="col-md-12 title">
          <h1
            class="animated"
            data-animation="fadeInDown"
            data-animation-delay="300"
          >
            <span class="color">Aven</span>'s Portfolio
          </h1>
          <p
            class="animated"
            data-animation="fadeInRight"
            data-animation-delay="500"
          >
            We provide Risk Mitigation Services for Farmers.
          </p>
          <p
            class="animated"
            data-animation="fadeInLeft"
            data-animation-delay="500"
          >
           Creating equal opportunities for all.
          </p>
        </div>

      </div>
      <div class="row">
        <div class="col-md-12">

          <ul
            class="animated project-filters animated"
            id="filters"
            data-animation="fadeInUp"
            data-animation-delay="300"
          >
            <li>
              <a href="#" data-filter=".all" class="filter active"> All</a>
            </li>
            <li>
              <a href="#" data-filter=".web" class="filter">Web Design</a>
            </li>
            <li>
              <a href="#" data-filter=".graphic" class="filter"
                >Graphic design</a
              >
            </li>
            <li><a href="#" data-filter=".photo" class="filter">Photo</a></li>
            <li>
              <a href="#" data-filter=".brand" class="filter">Brandings</a>
            </li>
            <li>
              <a href="#" data-filter=".mock" class="filter">Mock-ups</a>
            </li>
          </ul>


          <div class="project-grid">
            <div class="grid-sizer"></div>

            <div class="item mini-item w2 all graphic mock">

              <img
                src="images/portfolio/1.jpg"
                alt="image"
                class="img-responsive"
                height="580"
                width="580"
              />

              <h3>New Web Design</h3>
              <div class="item-caption">
                <ul>
                  <li>
                    <a
                      data-rel="prettyPhoto[gallery01]"
                      href="images/portfolio/large/1.jpg"
                      title="Portfolio"
                      ><i class="fa fa-search"></i
                    ></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-link"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fa fa-star-o"></i></a>
                  </li>
                </ul>
              </div>
            </div>

            <div class="item mini-item all web graphic photo">
              <div class="portfolio-item">

                <img
                  src="images/portfolio/2.jpg"
                  alt="image"
                  class="img-responsive"
                  height="285"
                  width="285"
                />

                <h3>New Web Design</h3>
                <div class="item-caption">
                  <ul>
                    <li>
                      <a
                        data-rel="prettyPhoto[gallery01]"
                        href="images/portfolio/large/2.jpg"
                        title="Portfolio"
                        ><i class="fa fa-search"></i
                      ></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-link"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-star-o"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="item mini-item all mock brand web">
              <div class="portfolio-item">

                <img
                  src="images/portfolio/3.jpg"
                  alt="image"
                  class="img-responsive"
                  height="285"
                  width="285"
                />

                <h3>New Web Design</h3>
                <div class="item-caption">
                  <ul>
                    <li>
                      <a
                        data-rel="prettyPhoto[gallery01]"
                        href="images/portfolio/large/3.jpg"
                        title="Portfolio"
                        ><i class="fa fa-search"></i
                      ></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-link"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-star-o"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="item mini-item all">
              <div class="portfolio-item">

                <img
                  src="images/portfolio/4.jpg"
                  alt="image"
                  class="img-responsive"
                  height="285"
                  width="285"
                />

                <h3>New Web Design</h3>
                <div class="item-caption">
                  <ul>
                    <li>
                      <a
                        data-rel="prettyPhoto[gallery01]"
                        href="images/portfolio/large/4.jpg"
                        title="Portfolio"
                        ><i class="fa fa-search"></i
                      ></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-link"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-star-o"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>


            <div class="item mini-item all brand graphic">
              <div class="portfolio-item">

                <img
                  src="images/portfolio/5.jpg"
                  alt="image"
                  class="img-responsive"
                  height="580"
                  width="285"
                />

                <h3>New Web Design</h3>
                <div class="item-caption">
                  <ul>
                    <li>
                      <a
                        data-rel="prettyPhoto[gallery01]"
                        href="images/portfolio/large/5.jpg"
                        title="Portfolio"
                        ><i class="fa fa-search"></i
                      ></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-link"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-star-o"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="item mini-item w2 all photo">
              <div class="portfolio-item">

                <img
                  src="images/portfolio/6.jpg"
                  alt="image"
                  class="img-responsive"
                  height="285"
                  width="580"
                />

                <h3>New Web Design</h3>
                <div class="item-caption">
                  <ul>
                    <li>
                      <a
                        data-rel="prettyPhoto[gallery01]"
                        href="images/portfolio/large/6.jpg"
                        title="Portfolio"
                        ><i class="fa fa-search"></i
                      ></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-link"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-star-o"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="item mini-item all photo web">
              <div class="portfolio-item">

                <img
                  src="images/portfolio/7.jpg"
                  alt="image"
                  class="img-responsive"
                  height="285"
                  width="285"
                />

                <h3>New Web Design</h3>
                <div class="item-caption">
                  <ul>
                    <li>
                      <a
                        data-rel="prettyPhoto[gallery01]"
                        href="images/portfolio/large/7.jpg"
                        title="Portfolio"
                        ><i class="fa fa-search"></i
                      ></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-link"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-star-o"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section> -->
<!-- WORKING SECTION-->
<section id="contact" class="parallaxbg">
    <div class=""></div>
    <div class="container">
        <div class="row" style="margin: 0; padding: 0;">
            <!--SECTION TITLE-->
            <div class="col-md-12 title">
                <h1 class="animated" data-animation="fadeInDown" data-animation-delay="300">
                    Contact Us
                </h1>
                <p class="animated" data-animation="fadeInRight" data-animation-delay="500">
                    We provide Risk Mitigation Services for Farmers.
                </p>
                <p class="animated" data-animation="fadeInLeft" data-animation-delay="500">
                    Creating equal opportunities for all.
                </p>
            </div>
            <!-- /.SECTION TITLE-->
        </div>
        <div class="row" style="margin: 0; padding: 0;">
            <div class="col-md-offset-2 col-md-8 animated" data-animation="fadeInUp" data-animation-delay="300">
                <p class="form-message"></p>
                <!--CONTACT FORM-->
                <form role="form" name="commentform" class="contact-form-horizontal" id="contactform" method="post"
                      action="process.php">
                    <div class="row" style="margin: 0; padding: 0;">
                        <div class="col-md-6">
                            <!-- NAME -->
                            <div class="input-group form-group">
                                <input type="text" name="contact_name" id="contact_name" class="form-control input-name"
                                       placeholder="Your Name"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- PHONE NUMBER -->
                            <div class="input-group form-group">
                                <input type="text" name="contact_phone" id="contact_phone"
                                       class="form-control input-phone-number"
                                       placeholder="Your Tele Phone Number"/>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin: 0; padding: 0;">
                        <div class="col-md-12">
                            <!-- EMAIL -->
                            <div class="input-group form-group">
                                <input type="email" name="contact_email" id="contact_email"
                                       class="form-control input-email"
                                       placeholder="E-mail"/>
                            </div>
                        </div>
                    </div>
                    <!-- MESSAGE BOX -->
                    <div class="row" style="margin: 0; padding: 0;">
                        <div class="col-md-12 message-box form-group">
                <textarea class="form-control textarea-message contact-message-box" rows="3"
                          placeholder="Write Your Message here..." name="contact_message"
                          data-bv-field="contact_message"
                          id="contact_message"></textarea>
                            <!--SUBMIT BUTTON-->
                            <input type="submit" id="sendingbtn" class="btn" value="Submit"/>
                        </div>
                    </div>
                </form>
                <!-- /.CONTACT FORM-->
            </div>
        </div>
    </div>
    <!--CONTACT DETAILS-->
    <div class="contact-details">
        <div class="container">
            <div class="row" style="margin: 0; padding: 0;">
                <div class="col-md-offset-1 col-md-10">
                    <div class="row" style="margin: 0; padding: 0;">
                        <!--ADDRESS-->
                        <div class="col-sm-4 contact-block animated" data-animation="fadeInUp"
                             data-animation-delay="300">
                            <div class="icon-circle" style="margin-bottom:2rem;">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <h3>Address</h3>
                            <p>3rd Floor, YB Hassan Uddin Tower GA-25/4, Shahjadpur, PragaC Sharani, Gulshan Dhaka-
                                1212.</p>
                            {{--                            <p>Bangladesh</p>--}}
                        </div>
                        <!--CONTACT-->
                        <div class="col-sm-4 contact-block animated" data-animation="fadeInUp"
                             data-animation-delay="500">
                            <div class="icon-circle" style="margin-bottom:2rem;">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <h3>Contact</h3>
                            <p>+880 1755-680807</p>
                            <p><a href="mailto:info@insurecow.com">info@insurecow.com</a></p>
                        </div>
                        <!--SUPPORT-->
                        <div class="col-sm-4 contact-block animated" data-animation="fadeInUp"
                             data-animation-delay="700">
                            <div class="icon-circle" style="margin-bottom:2rem;">
                                <i class="fa fa-hourglass"></i>
                            </div>
                            <h3>Hours</h3>
                            <p>Opens - 10am</p>
                            <p><a>Closes - 6pm</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.CONTACT DETAILS-->
    <!--Map Section Begins-->
    <!-- <div class="map">
      <div id="map_canvas"></div>
    </div> -->
    <!--Footer Begins-->
    <div id="footer">
        <div class="container">
            <!--SOCIAL LINKS-->
            <div class="row" style="margin: 0; padding: 0;">
                <!--COPYRIGHTS-->
                <div class="col-sm-6">
                    <p>InsureCow ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        All Rights Reserved
                    </p>
                </div>
                <!--SOCIAL LINKS-->
                <div class="col-sm-6">
                    <ul>
                        <li><a href="https://www.facebook.com/InsureCow/" target="_blank"
                               class="fa-brands fa-facebook"></a></li>

                        <li><a href="https://www.linkedin.com/company/insurecow/" target="_blank"
                               class="fa-brands fa-linkedin-in"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.CONTACT SECTION-->
<!-- Script Begins -->
<script type="text/javascript" src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
<!-- Bootstrap -->
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- Bootstrap Validator-->
<script type="text/javascript" src="{{ asset('js/bootstrapValidator.min.js') }}"></script>
<!-- Google-map-->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<!--Sticky and Easing js-->
<script src="{{ asset('js/jquery.easing.min.js') }}" type="text/javascript"></script>
<!--Sticky js-->
<script src="{{ asset('js/jquery.sticky.js') }}" type="text/javascript"></script>
<!--Parallax-->
<script src="{{ asset('js/jquery.parallax-1.1.3.js') }}"></script>
<script src="{{ asset('js/parallax-bg.js') }}"></script>
<!--Isotope js-->
<script src="{{ asset('js/isotope.pkgd.min.js') }}" type="text/javascript"></script>
<!-- Appear js -->
<script src="{{ asset('js/jquery.appear.js') }}" type="text/javascript"></script>
<!-- Owl Carousel -->
<script type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
<!--Counter js-->
<script src="{{ asset('js/jquery.countTo.js') }}" type="text/javascript"></script>
<!--Pretty photo-->
<script src="{{ asset('js/jquery.prettyPhoto.js') }}" type="text/javascript"></script>
<!--Retina Js-->
<script src="{{ asset('js/retina.js') }}" type="text/javascript"></script>
<!-- Bg Slider -->
<script type="text/javascript" src="{{ asset('js/jquery.superslides.js') }}"></script>
<!-- Typed Js -->
<script type="text/javascript" src="{{ asset('js/typed.js') }}"></script>
<!-- Video Bg -->
<script type="text/javascript" src="{{ asset('js/jquery.mb.YTPlayer.min.js') }}"></script>
<!-- Custom Js -->
<script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
<!-- /.Script Ends -->

<script>
    (function (i, s, o, g, r, a, m) {
        i["GoogleAnalyticsObject"] = r;
        (i[r] =
            i[r] ||
            function () {
                (i[r].q = i[r].q || []).push(arguments);
            }),
            (i[r].l = 1 * new Date());
        (a = s.createElement(o)), (m = s.getElementsByTagName(o)[0]);
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m);
    })(
        window,
        document,
        "script",
        "//www.google-analytics.com/analytics.js",
        "ga"
    );

    ga("create", "UA-66069731-1", "auto");
    ga("send", "pageview");
</script>
</body>

</html>
