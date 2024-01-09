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
                Register Farmer
            </a>


            <a class="nav-link" href="{{ route('cp.all_registered_farmers') }}">
                <div class="nav-link-icon"><i data-feather="bar-chart"></i></div>
                View Registered Farmers
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

            {{--  ------------------------------------- Comapny with package - Insurance Requests [ Digital ] ------------------------------------- --}}


            <a class="nav-link" href="{{ route('company_view_insurance_history') }}">
                <div class="nav-link-icon"><i data-feather="bar-chart"></i></div>
                Insurance Requests
            </a>


            {{--  ------------------------------------- Comapny with package - Insurance Requests [ Digital ] ------------------------------------- --}}

            {{--  ------------------------------------- Comapny with package - Insurance Requests [ Cash ] ------------------------------------- --}}


            {{--            <a class="nav-link" href="{{ route('company_view_insurance_history_cash') }}">--}}
            {{--                <div class="nav-link-icon"><i data-feather="bar-chart"></i></div>--}}
            {{--                Insurance Requests [ Cash ]--}}
            {{--            </a>--}}


            {{--  ------------------------------------- Comapny with package - Insurance Requests [ Cash ] ------------------------------------- --}}


            {{--  ------------------------------------- Comapny with package - Insurance Transactions ------------------------------------- --}}

            <a class="nav-link" href="{{ route('company.transaction_history_with_package_data') }}">
                <div class="nav-link-icon"><i data-feather="bar-chart"></i></div>
                Insurance Transactions
            </a>

            {{--  ------------------------------------- Comapny with package - Insurance Transactions ------------------------------------- --}}

            {{--  ------------------------------------- Accounts Profile - Company with Insurance ------------------------------------- --}}


            <a class="nav-link" href="{{ route('company_corporate_profile') }}">
                <div class="nav-link-icon"><i data-feather="bar-chart"></i></div>
                Acc. Profile Update
            </a>

            {{--  ------------------------------------- Accounts Profile - Company with Insurance ------------------------------------- --}}
        @endif


        {{--  -------------------------------------------------------------- Company can insure farmers block -------------------------------------------------------------- --}}

        @if(auth()->user()->permission->c_without_insurance == 1)

            {{--  ------------------------------------- Company can insure farmers ------------------------------------- --}}

            <a class="nav-link" href="{{ route('company.insurance_search_get') }}">
                <div class="nav-link-icon"><i data-feather="bar-chart"></i></div>
                Animal Insurance
            </a>

            {{--  ------------------------------------- Company can insure farmers ------------------------------------- --}}


            {{--  ------------------------------------- Company Insurance Requests [Digital] ------------------------------------- --}}

            <a class="nav-link" href="{{ route('company.view_insurance_history') }}">
                <div class="nav-link-icon"><i data-feather="bar-chart"></i></div>
                Animal Ins. Requests
            </a>

            {{--  ------------------------------------- Company Insurance Requests [Digital] ------------------------------------- --}}

            {{--  ------------------------------------- Company Insurance Requests [Cash] ------------------------------------- --}}

            {{--            <a class="nav-link" href="{{ route('company.view_insurance_history_cash') }}">--}}
            {{--                <div class="nav-link-icon"><i data-feather="bar-chart"></i></div>--}}
            {{--                Animal Ins. Requests [Cash]--}}
            {{--            </a>--}}

            {{--  ------------------------------------- Company Insurance Requests [Cash] ------------------------------------- --}}


            {{--  ------------------------------------- Company Insurance Transactions ------------------------------------- --}}

            <a class="nav-link" href="{{ route('company.transaction_history_data') }}">
                <div class="nav-link-icon"><i data-feather="bar-chart"></i></div>
                Animal Ins. Transactions
            </a>

            {{--  ------------------------------------- Company Insurance Transactions ------------------------------------- --}}


            <a class="nav-link" href="{{ route('cp.user_history') }}">
                <div class="nav-link-icon"><i data-feather="bar-chart"></i></div>
                Enlisted
            </a>

            {{-- ---------------------------------- Single Side Navbar ---------------------------------- --}}

        @endif

        {{--  -------------------------------------------------------------- Company can insure farmers block -------------------------------------------------------------- --}}


        {{-- ---------------------------------- Register a cattle for the farmer ---------------------------------- --}}

        {{--        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"--}}
        {{--           data-bs-target="#collapsePagesFarmer" aria-expanded="false" aria-controls="collapsePages">--}}
        {{--            <div class="nav-link-icon"><i data-feather="grid"></i></div>--}}
        {{--            Farmer--}}
        {{--            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>--}}
        {{--        </a>--}}

        {{--        <div class="collapse" id="collapsePagesFarmer" data-bs-parent="#accordionSidenav">--}}
        {{--            <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">--}}
        {{--                <!-- Nested Sidenav Accordion (Pages -> Account)-->--}}
        {{--                <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"--}}
        {{--                   data-bs-target="#pagesCollapseAccount" aria-expanded="false"--}}
        {{--                   aria-controls="pagesCollapseAccount">--}}
        {{--                    Animal Section--}}
        {{--                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>--}}
        {{--                </a>--}}
        {{--                <div class="collapse" id="pagesCollapseAccount" data-bs-parent="#accordionSidenavPagesMenu">--}}
        {{--                    <nav class="sidenav-menu-nested nav">--}}
        {{--                        <a class="nav-link" href="{{ route('cp.all_registered_farmers') }}">Add/View Animal</a>--}}
        {{--                    </nav>--}}
        {{--                </div>--}}
        {{--            </nav>--}}
        {{--        </div>--}}


        {{-- ---------------------------------- Register a cattle for the farmer ---------------------------------- --}}


    </div>
</div>
