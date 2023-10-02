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

            @if(auth()->user()->permission->c_dashboard == 1)

                <a class="nav-link" href="{{ route('f.dashboard') }}">
                    <div class="nav-link-icon"><i data-feather="filter"></i></div>
                    Dashboard
                </a>

            @endif

            @if(auth()->user()->permission->f_cattle_reg == 1)
                <a class="nav-link" href="{{ route('cattle_register.index') }}">
                    <div class="nav-link-icon"><i data-feather="filter"></i></div>
                    Add Cattle / Goat
                </a>

                <a class="nav-link" href="{{ route('cattle.list') }}">
                    <div class="nav-link-icon"><i data-feather="filter"></i></div>
                    View Registered list
                </a>
            @endif


            @if(auth()->user()->permission->f_insurance == 1)

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

            @endif

            @if(auth()->user()->permission->f_farm_management == 1)

{{--                <a class="nav-link" href="">--}}
{{--                    <div class="nav-link-icon"><i data-feather="filter"></i></div>--}}
{{--                    Farm Management--}}
{{--                </a>--}}

                    <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="nav-link-icon"><i data-feather="grid"></i></div>
                        Firm Management
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages" data-bs-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">
                            <!-- Nested Sidenav Accordion (Pages -> Account)-->
                            <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAccount" aria-expanded="false" aria-controls="pagesCollapseAccount">
                                Firms
                                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="pagesCollapseAccount" data-bs-parent="#accordionSidenavPagesMenu">
                                <nav class="sidenav-menu-nested nav">
                                    <a class="nav-link" href="">Create Firm</a>
                                    <a class="nav-link" href="">View Firms</a>
                                </nav>
                            </div>
                        </nav>
                    </div>

            @endif

            <a class="nav-link" href="{{ route('view.password') }}">
                <div class="nav-link-icon"><i data-feather="filter"></i></div>
                Change Password
            </a>

        @endif

        {{-- ---------------------------------- Farmer Navbar ---------------------------------- --}}


    </div>
</div>
