<div class="sidenav-menu">
    <div class="nav accordion" id="accordionSidenav">


        {{-- ---------------------------------- Farmer Navbar ---------------------------------- --}}


        <div class="sidenav-menu-heading">Farmer Panel</div>
        <!-- Sidenav Link (Charts)-->

        <a class="nav-link" href="{{ route('farmer_profile.index') }}">
            <div class="nav-link-icon"><i data-feather="filter"></i></div>
            Profile
        </a>

        @if(auth()->user()->farmerProfile()->count() != 0)

            <a class="nav-link" href="{{ route('f.dashboard') }}">
                <div class="nav-link-icon"><i data-feather="filter"></i></div>
                Dashboard
            </a>

            <a class="nav-link" href="{{ route('cattle_register.index') }}">
                <div class="nav-link-icon"><i data-feather="filter"></i></div>
                Add Cattle's
            </a>

            <a class="nav-link" href="{{ route('cattle.list') }}">
                <div class="nav-link-icon"><i data-feather="filter"></i></div>
                View Registered Cattle's
            </a>

            <a class="nav-link" href="{{ route('insurance.packages') }}">
                <div class="nav-link-icon"><i data-feather="filter"></i></div>
                Apply For Insurance
            </a>


            {{--            <a class="nav-link" href="">--}}
            {{--                <div class="nav-link-icon"><i data-feather="filter"></i></div>--}}
            {{--                Cattle Insurance--}}
            {{--            </a>--}}

            <a class="nav-link" href="{{ route('insurance.history.index') }}">
                <div class="nav-link-icon"><i data-feather="filter"></i></div>
                Insurance History
            </a>

            <a class="nav-link" href="">
                <div class="nav-link-icon"><i data-feather="filter"></i></div>
                Farm Management
            </a>

            <a class="nav-link" href="{{ route('view.password') }}">
                <div class="nav-link-icon"><i data-feather="filter"></i></div>
                Change Password
            </a>

        @endif

        {{-- ---------------------------------- Farmer Navbar ---------------------------------- --}}


    </div>
</div>
