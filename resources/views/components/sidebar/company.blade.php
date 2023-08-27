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
        <div class="sidenav-menu-heading">Company Panel</div>
        <!-- Sidenav Link (Charts)-->
        <a class="nav-link" href="#">
            <div class="nav-link-icon"><i data-feather="bar-chart"></i></div>
            Dashboard
        </a>

        <a class="nav-link" href="{{ route('farmer_register.index') }}">
            <div class="nav-link-icon"><i data-feather="bar-chart"></i></div>
            Register Agent/Farmer
        </a>

        <a class="nav-link" href="{{ route('company.farmer_registered') }}">
            <div class="nav-link-icon"><i data-feather="bar-chart"></i></div>
            View Agents/Farmers
        </a>


        <a class="nav-link" href="{{ route('policy.index') }}">
            <div class="nav-link-icon"><i data-feather="bar-chart"></i></div>
            Policy Upload
        </a>


        <a class="nav-link" href="{{ route('package.create') }}">
            <div class="nav-link-icon"><i data-feather="bar-chart"></i></div>
            Add Package
        </a>

        <a class="nav-link" href="{{ route('package.index') }}">
            <div class="nav-link-icon"><i data-feather="bar-chart"></i></div>
            View All Packages
        </a>

        <a class="nav-link" href="">
            <div class="nav-link-icon"><i data-feather="bar-chart"></i></div>
            Insurance Requests
        </a>

        {{-- ---------------------------------- Single Side Navbar ---------------------------------- --}}


    </div>
</div>
