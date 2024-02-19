<div class="sidenav-menu">
    <div class="nav accordion" id="accordionSidenav">

        {{-- ---------------------------------- Single Side Navbar ---------------------------------- --}}



        <!-- Sidenav Heading (Addons)-->
        <div class="sidenav-menu-heading">Super Admin Panel</div>
        <!-- Sidenav Link (Charts)-->
        <a class="nav-link" href="{{ route('sp.dashboard') }}">
            <div class="nav-link-icon"><i data-feather="bar-chart"></i></div>
            Dashboard
        </a>
        <!-- Sidenav Link (Tables)-->
        <a class="nav-link" href="{{ route('profile.index') }}">
            <div class="nav-link-icon"><i data-feather="filter"></i></div>
            Profile
        </a>

        <!-- Sidenav Link (Tables)-->
        <a class="nav-link" href="{{ route('sp_register_company') }}">
            <div class="nav-link-icon"><i data-feather="filter"></i></div>
            Organization Registration
        </a>

        <!-- Sidenav Link (Tables)-->
        <a class="nav-link" href="{{ route('sp.registered_resources') }}">
            <div class="nav-link-icon"><i data-feather="filter"></i></div>
            Registered Companies
        </a>

        <!-- Sidenav Link (Tables)-->
        <a class="nav-link" href="{{ route('sp.user_history') }}">
            <div class="nav-link-icon"><i data-feather="filter"></i></div>
            Enlisted
        </a>

        <!-- Sidenav Link (Tables)-->
        <a class="nav-link" href="{{ route('sp.company_request') }}">
            <div class="nav-link-icon"><i data-feather="filter"></i></div>
            Company Request
        </a>


        {{-- ---------------------------------- Single Side Navbar ---------------------------------- --}}

        {{-- ---------------------------------- Register a cattle for the farmer ---------------------------------- --}}

        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
           data-bs-target="#collapsePagesFarmer" aria-expanded="false" aria-controls="collapsePages">
            <div class="nav-link-icon"><i data-feather="grid"></i></div>
            Farmer
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>

        <div class="collapse" id="collapsePagesFarmer" data-bs-parent="#accordionSidenav">
            <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">
                <!-- Nested Sidenav Accordion (Pages -> Account)-->
                <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                   data-bs-target="#pagesCollapseAccount" aria-expanded="false"
                   aria-controls="pagesCollapseAccount">
                    Animal Section
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="pagesCollapseAccount" data-bs-parent="#accordionSidenavPagesMenu">
                    <nav class="sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('sp.all_registered_farmers') }}">Add/View Animal</a>
                    </nav>
                </div>
            </nav>
        </div>


        {{-- ---------------------------------- Register a cattle for the farmer ---------------------------------- --}}

        {{-- ---------------------------------- Cms section ---------------------------------- --}}

        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
           data-bs-target="#collapseCms" aria-expanded="false" aria-controls="collapsePages">
            <div class="nav-link-icon"><i data-feather="grid"></i></div>
            Content Management
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>

        <div class="collapse" id="collapseCms" data-bs-parent="#accordionSidenav">
            <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">


                {{-- ------------ Slider Image ------------ --}}

                <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                   data-bs-target="#pagesCollapseSliderImage" aria-expanded="false"
                   aria-controls="pagesCollapseSliderImage">
                    Slider Image
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="pagesCollapseSliderImage" data-bs-parent="#accordionSidenavPagesMenu">
                    <nav class="sidenav-menu-nested nav">

                        <a class="nav-link" href="{{route('slider_image.create')}}">Add Slider Image</a>
                        <a class="nav-link" href="{{route('slider_image.index')}}">View Image</a>

                    </nav>
                </div>

                {{-- ------------ Slider Image ------------ --}}

                {{-- ------------ Sliders ------------ --}}

                <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                   data-bs-target="#pagesCollapseAccount" aria-expanded="false"
                   aria-controls="pagesCollapseAccount">
                    Slider
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="pagesCollapseAccount" data-bs-parent="#accordionSidenavPagesMenu">
                    <nav class="sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('slider.create')}}">Add Slider</a>
                        <a class="nav-link" href="{{route('slider.index')}}">View All Slider</a>
                    </nav>
                </div>

                {{-- ------------ Sliders ------------ --}}

                {{-- ------------ About ------------ --}}

                <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                   data-bs-target="#pagesCollapseAbout" aria-expanded="false"
                   aria-controls="pagesCollapseAbout">
                    About
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="pagesCollapseAbout" data-bs-parent="#accordionSidenavPagesMenu">
                    <nav class="sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('about.create')}}">Add About</a>
                        <a class="nav-link" href="{{route('about.index')}}">View All About</a>
                    </nav>
                </div>

                {{-- ------------ About ------------ --}}

                {{-- ------------ Product and Services ------------ --}}

                <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                   data-bs-target="#pagesCollapsePos" aria-expanded="false"
                   aria-controls="pagesCollapsePos">
                    Product & Services
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="pagesCollapsePos" data-bs-parent="#accordionSidenavPagesMenu">
                    <nav class="sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('productandservices.create')}}">Add Product&services</a>
                        <a class="nav-link" href="{{route('productandservices.index')}}">View All Product&services</a>
                    </nav>
                </div>

                {{-- ------------ Product and Services ------------ --}}

                {{-- ------------ Team ------------ --}}

                <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                   data-bs-target="#pagesCollapseTeam" aria-expanded="false"
                   aria-controls="pagesCollapseTeam">
                    Team
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="pagesCollapseTeam" data-bs-parent="#accordionSidenavPagesMenu">
                    <nav class="sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('team.create')}}">Add Team Info</a>
                        <a class="nav-link" href="{{route('team.index')}}">View Team Info</a>
                    </nav>
                </div>

                {{-- ------------ Team ------------ --}}

                {{-- ------------ Achievement ------------ --}}

                <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                   data-bs-target="#pagesCollapseAchievement" aria-expanded="false"
                   aria-controls="pagesCollapseAchievement">
                    Achievement
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="pagesCollapseAchievement" data-bs-parent="#accordionSidenavPagesMenu">
                    <nav class="sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('achievement.create')}}">Add Achievement</a>
                        <a class="nav-link" href="{{route('achievement.index')}}">View Achievement info</a>
                    </nav>
                </div>

                {{-- ------------ Achievement ------------ --}}

                {{-- ------------ Posts ------------ --}}

                <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                   data-bs-target="#pagesCollapsePost" aria-expanded="false"
                   aria-controls="pagesCollapsePost">
                    Posts
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="pagesCollapsePost" data-bs-parent="#accordionSidenavPagesMenu">
                    <nav class="sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('post.create')}}">Add Post</a>
                        <a class="nav-link" href="{{route('post.index')}}">View Post info</a>
                    </nav>
                </div>

                {{-- ------------ Posts ------------ --}}

                {{---------------  Blogs---------------}}



                <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                   data-bs-target="#pagesCollapseBlog" aria-expanded="false"
                   aria-controls="pagesCollapseBlog">
                    Blogs
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="pagesCollapseBlog" data-bs-parent="#accordionSidenavPagesMenu">
                    <nav class="sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('blogs.create')}}">Add Blog</a>
                        <a class="nav-link" href="{{route('blogs.index')}}">View Blog info</a>
                    </nav>
                </div>






                {{---------------  Blogs---------------}}


                {{---------------  Gallery---------------}}



                <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                   data-bs-target="#pagesCollapseGallery" aria-expanded="false"
                   aria-controls="pagesCollapseGallery">
                    Gallery
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="pagesCollapseGallery" data-bs-parent="#accordionSidenavPagesMenu">
                    <nav class="sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('gallery.create')}}">Add Gallery</a>
                        <a class="nav-link" href="{{route('gallery.index')}}">View Gallery info</a>
                    </nav>
                </div>







                {{---------------  Gallery---------------}}


                {{--------------- TestimonialController----------}}





                <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                   data-bs-target="#pagesCollapseTestimonial" aria-expanded="false"
                   aria-controls="pagesCollapseTestimonial">
                    Testimonial
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="pagesCollapseTestimonial" data-bs-parent="#accordionSidenavPagesMenu">
                    <nav class="sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('testimonial.create')}}">Add Testimonial</a>
                        <a class="nav-link" href="{{route('testimonial.index')}}">View Testimonial info</a>
                    </nav>
                </div>





                {{--------------- TestimonialController----------}}














                {{-- ------------ Partners ------------ --}}

                <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                   data-bs-target="#pagesCollapsePartner" aria-expanded="false"
                   aria-controls="pagesCollapsePartner">
                    Partners
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="pagesCollapsePartner" data-bs-parent="#accordionSidenavPagesMenu">
                    <nav class="sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('partner.create')}}">Add Partner</a>
                        <a class="nav-link" href="{{route('partner.index')}}">View Partner info</a>
                    </nav>
                </div>

                {{-- ------------ Partners ------------ --}}

                {{-- ------------ Contact Us ------------ --}}

                <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                   data-bs-target="#pagesCollapseContact" aria-expanded="false"
                   aria-controls="pagesCollapseContact">
                    Contact Us
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="pagesCollapseContact" data-bs-parent="#accordionSidenavPagesMenu">
                    <nav class="sidenav-menu-nested nav">
                        <a class="nav-link" href="#">Add Info</a>
                        <a class="nav-link" href="#">View All info</a>
                    </nav>
                </div>

                {{-- ------------ Contact Us ------------ --}}


            </nav>
        </div>


        {{-- ---------------------------------- Cms section ---------------------------------- --}}


    </div>
</div>
