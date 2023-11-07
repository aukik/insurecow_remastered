<div class="sidenav-menu">
    <div class="nav accordion" id="accordionSidenav">


        {{-- ---------------------------------- Farm management Sidebar ---------------------------------- --}}


        <div class="sidenav-menu-heading">Farm Management</div>
        <!-- Sidenav Link (Charts)-->

        <a class="nav-link" href="{{ route('fm_dashboard') }}">
            <div class="nav-link-icon"><i data-feather="filter"></i></div>
            Dashboard
        </a>


        {{-- --------------------------- Animal Inofrmation --------------------------- --}}

        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
           data-bs-target="#collapseFlows" aria-expanded="false" aria-controls="collapseFlows">
            <div class="nav-link-icon"><i data-feather="align-justify"></i></div>
            Animal Health
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="collapseFlows" data-bs-parent="#accordionSidenav">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="{{ route('animal_information.create') }}">Create Info</a>
                <a class="nav-link" href="{{ route('animal_information.index') }}">View Info</a>
            </nav>
        </div>

        {{-- --------------------------- Animal Inofrmation --------------------------- --}}


        {{-- --------------------------- Feeding and nutrition --------------------------- --}}

        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
           data-bs-target="#collapseFeed" aria-expanded="false" aria-controls="collapseFeed">
            <div class="nav-link-icon"><i data-feather="align-justify"></i></div>
            Feeding and Nutrition
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="collapseFeed" data-bs-parent="#accordionSidenav">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="{{ route('feeding_and_nutrition.create') }}">Create Info</a>
                <a class="nav-link" href="{{ route('feeding_and_nutrition.index') }}">View Info</a>
            </nav>
        </div>

        {{-- --------------------------- Feeding and nutrition --------------------------- --}}

        {{-- --------------------------- Reproduction and Breeding --------------------------- --}}

        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
           data-bs-target="#collapseBreed" aria-expanded="false" aria-controls="collapseBreed">
            <div class="nav-link-icon"><i data-feather="align-justify"></i></div>
            Breeding
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="collapseBreed" data-bs-parent="#accordionSidenav">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="{{ route('reproduction_and_breeding.create') }}">Create Info</a>
                <a class="nav-link" href="{{ route('reproduction_and_breeding.index') }}">View Info</a>
            </nav>
        </div>

        {{-- --------------------------- Reproduction and Breeding --------------------------- --}}


        <a class="nav-link" href="">
            <div class="nav-link-icon"><i data-feather="filter"></i></div>
            Financial Management
        </a>

        <a class="nav-link" href="">
            <div class="nav-link-icon"><i data-feather="filter"></i></div>
            Report and analysis
        </a>


        {{-- ---------------------------------- Farm management Sidebar ---------------------------------- --}}


    </div>
</div>
