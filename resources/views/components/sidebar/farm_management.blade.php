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

        {{-- --------------------------- Expense Data --------------------------- --}}


        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
           data-bs-target="#expense" aria-expanded="false" aria-controls="expense">
            <div class="nav-link-icon"><i data-feather="align-justify"></i></div>
            Expenses
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="expense" data-bs-parent="#accordionSidenav">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="{{ route('expense.create') }}">Create Info</a>
                <a class="nav-link" href="{{ route('expense.index') }}">View Info</a>
            </nav>
        </div>


        {{-- --------------------------- Expense Data --------------------------- --}}

        {{-- --------------------------- Daily Expenses --------------------------- --}}


        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
           data-bs-target="#dailyExpense" aria-expanded="false" aria-controls="dailyExpense">
            <div class="nav-link-icon"><i data-feather="align-justify"></i></div>
            Daily Expense
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="dailyExpense" data-bs-parent="#accordionSidenav">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="{{ route('daily_expense.create') }}">Create Info</a>
                <a class="nav-link" href="{{ route('daily_expense.index') }}">View Info</a>
            </nav>
        </div>


        {{-- --------------------------- Daily Expenses --------------------------- --}}


        {{-- --------------------------- Expense Weight Average --------------------------- --}}


        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
           data-bs-target="#expenseWA" aria-expanded="false" aria-controls="expenseWA">
            <div class="nav-link-icon"><i data-feather="align-justify"></i></div>
            Expenses [WA]
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="expenseWA" data-bs-parent="#accordionSidenav">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="{{ route('expense_weight_average.create') }}">Create Info</a>
                <a class="nav-link" href="{{ route('expense.index') }}">View Info</a>
            </nav>
        </div>


        {{-- --------------------------- Expense Weight Average --------------------------- --}}

        {{-- --------------------------- Asset Management --------------------------- --}}


        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
           data-bs-target="#asset_management" aria-expanded="false" aria-controls="asset_management">
            <div class="nav-link-icon"><i data-feather="align-justify"></i></div>
            Asset Management
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="asset_management" data-bs-parent="#accordionSidenav">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="{{ route('asset_management.create') }}">Create Info</a>
                <a class="nav-link" href="{{ route('asset_management.index') }}">View Info</a>
            </nav>
        </div>


        {{-- --------------------------- Asset Management --------------------------- --}}



        {{-- --------------------------- Income And Sells --------------------------- --}}


        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
           data-bs-target="#incomeAndSell" aria-expanded="false" aria-controls="incomeAndSell">
            <div class="nav-link-icon"><i data-feather="align-justify"></i></div>
            Income and Sells
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="incomeAndSell" data-bs-parent="#accordionSidenav">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="{{ route('incomeAndSell.create') }}">Create Info</a>
                <a class="nav-link" href="{{ route('incomeAndSell.index') }}">View Info</a>
            </nav>
        </div>


        {{-- --------------------------- Income And Sells --------------------------- --}}

        {{-- --------------------------- Budget and Forecasting --------------------------- --}}


        <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
           data-bs-target="#budget_and_forecasting" aria-expanded="false" aria-controls="budget_and_forecasting">
            <div class="nav-link-icon"><i data-feather="align-justify"></i></div>
            Budget & Forecasting
            <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div class="collapse" id="budget_and_forecasting" data-bs-parent="#accordionSidenav">
            <nav class="sidenav-menu-nested nav">
                <a class="nav-link" href="{{ route('budget-and-forecasting.create') }}">Create Info</a>
                <a class="nav-link" href="{{ route('budget-and-forecasting.index') }}">View Info</a>
            </nav>
        </div>


        {{-- --------------------------- Budget and Forecasting --------------------------- --}}


        <a class="nav-link" href="{{ route('profit-and-loss-report') }}">
            <div class="nav-link-icon"><i data-feather="filter"></i></div>
            Profit / Loss Calculation
        </a>


        {{--        <a class="nav-link" href="">--}}
        {{--            <div class="nav-link-icon"><i data-feather="filter"></i></div>--}}
        {{--            Financial Management--}}
        {{--        </a>--}}

        <a class="nav-link" href="{{ route('f.dashboard') }}">
            <div class="nav-link-icon"><i data-feather="filter"></i></div>
            Farmer Dashboard
        </a>


        {{-- ---------------------------------- Farm management Sidebar ---------------------------------- --}}


    </div>
</div>
