<div class="sidenav-menu">
    <div class="nav accordion" id="accordionSidenav">


        {{-- ---------------------------------- Single Side Navbar ---------------------------------- --}}



        <!-- Sidenav Heading (Addons)-->
        <div class="sidenav-menu-heading">Company Panel</div>
        <!-- Sidenav Link (Charts)-->

        @if(auth()->user()->permission->c_dashboard == 1)

            <a class="nav-link" href="{{ route('c.dashboard') }}">
                <div class="nav-link-icon"><i data-feather="bar-chart"></i></div>
                Dashboard
            </a>

        @endif

        @if(auth()->user()->permission->c_register_agent == 1)

            <a class="nav-link" href="{{ route('farmer_register.index') }}">
                <div class="nav-link-icon"><i data-feather="bar-chart"></i></div>
                Register Agent/Farmer
            </a>


            <a class="nav-link" href="{{ route('company.farmer_registered') }}">
                <div class="nav-link-icon"><i data-feather="bar-chart"></i></div>
                View Agents/Farmers
            </a>

        @endif


        {{--        <a class="nav-link" href="{{ route('policy.index') }}">--}}
        {{--            <div class="nav-link-icon"><i data-feather="bar-chart"></i></div>--}}
        {{--            Policy Upload--}}
        {{--        </a>--}}


        @if(auth()->user()->permission->c_insurance == 1)

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

        @endif

        {{-- ---------------------------------- Single Side Navbar ---------------------------------- --}}


    </div>
</div>
