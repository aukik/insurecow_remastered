<div class="sidenav-menu">
    <div class="nav accordion" id="accordionSidenav">

        {{-- ---------------------------------- Side into Sidebar ---------------------------------- --}}

        <!-- Sidenav Menu Heading (Core)-->
        {{--        <div class="sidenav-menu-heading">Core</div>--}}

        {{--        <!-- Sidenav Accordion (Dashboard)-->--}}

        {{--        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"--}}
        {{--           data-bs-target="#collapseDashboards" aria-expanded="false"--}}
        {{--           aria-controls="collapseDashboards">--}}
        {{--            <div class="nav-link-icon"><i data-feather="activity"></i></div>--}}
        {{--            Dashboards--}}
        {{--            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>--}}
        {{--        </a>--}}


        {{--        <div class="collapse" id="collapseDashboards" data-bs-parent="#accordionSidenav">--}}
        {{--            <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">--}}
        {{--                <a class="nav-link" href="dashboard-1.html">--}}
        {{--                    Default--}}
        {{--                    <span class="badge bg-primary-soft text-primary ms-auto">Updated</span>--}}
        {{--                </a>--}}
        {{--                <a class="nav-link" href="dashboard-2.html">Multipurpose</a>--}}
        {{--                <a class="nav-link" href="dashboard-3.html">Affiliate</a>--}}
        {{--            </nav>--}}
        {{--        </div>--}}


        {{-- ---------------------------------- Side into Sidebar ---------------------------------- --}}


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


    </div>
</div>
