@extends('farm-management.admin-panel.index')

@section('content')

    <main>
        <header
            class="page-header page-header-dark bg-gradient-primary-to-secondary"
        >
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon">
                                    <i data-feather="activity"></i>
                                </div>
                                Farm Management Dashboard
                            </h1>

{{--                            <h4 class="page-header-title" style="font-size: 22px; margin-top: 10px">--}}
{{--                                <div class="page-header-icon">--}}
{{--                                    <i data-feather="activity"></i>--}}
{{--                                </div>--}}
{{--                                Farmer : {{ auth()->user()->name ?? null }}--}}
{{--                            </h4>--}}
                        </div>


                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4" style="margin-top: 2%">


            <div class="row">

{{--                <h3>Report - Economy Format</h3>--}}

                <div class="col-lg-4 mb-4">
                    <div class="card h-100 border-start-lg border-start-success">
                        <div class="card-body">
                            <div class="small text-muted">Total Income</div>
                            <div class="h3">{{ $total_income ?? 0}}/-</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="card h-100 border-start-lg border-start-success">
                        <div class="card-body">
                            <div class="small text-muted">Total Expense</div>
                            <div class="h3">{{ $total_expense ?? 0 }}/-</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="card h-100 border-start-lg border-start-success">
                        <div class="card-body">
                            <div class="small text-muted">Daily Expenses</div>
                            <div class="h3">{{ $total_daily_expenses ?? 0 }}/-</div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 mb-4">
                    <div class="card h-100 border-start-lg border-start-success">
                        <div class="card-body">
                            <div class="small text-muted">Current Business State [Amount]</div>
                            <div class="h3">{{ $total_profit_or_loss ?? 0 }}/-</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="card h-100 border-start-lg border-start-success">
                        <div class="card-body">
                            <div class="small text-muted">Current Business State [Status]</div>
                            <div class="h3"
                                 style="color: {{ $total_profit_or_loss > 0 ? 'green' : ($total_profit_or_loss < 0 ? 'red' : 'blue') }}">
                                {{ $total_profit_or_loss > 0 ? 'Profit' : ($total_profit_or_loss < 0 ? 'Loss' : 'No Profit or Loss') }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>

{{--            <h3>Report - List Format</h3>--}}

            <hr>


            <div class="row">

                <div class="col-lg-4 mb-4">
                    <!-- Billing card 1-->
                    <div class="card h-100 border-start-lg border-start-success">
                        <div class="card-body">
                            <div class="small text-muted">Animal Health Information</div>
                            <div class="h3">{{ $animal_health_count }}</div>
                            <a class="text-arrow-icon small" href="{{ route('animal_information.index') }}">
                                View Information
                                <i data-feather="arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <!-- Billing card 1-->
                    <div class="card h-100 border-start-lg border-start-info">
                        <div class="card-body">
                            <div class="small text-muted">Feeding and nutrition</div>
                            <div class="h3">{{ $feeding_and_nutrition_count }}</div>
                            <a class="text-arrow-icon small" href="{{ route('feeding_and_nutrition.index') }}">
                                View Information
                                <i data-feather="arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <!-- Billing card 1-->
                    <div class="card h-100 border-start-lg border-start-warning">
                        <div class="card-body">
                            <div class="small text-muted">Breeding Information</div>
                            <div class="h3">{{ $breeding_information_count }}</div>
                            <a class="text-arrow-icon small" href="{{ route('reproduction_and_breeding.index') }}">
                                View Information
                                <i data-feather="arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

{{--            <h3>Report - Export Data</h3>--}}

            <hr>

            <div class="row">

                <div class="col-lg-4 mb-4">
                    <!-- Billing card 1-->
                    <div class="card h-100 border-start-lg border-start-success">
                        <div class="card-body">
                            <div class="small text-muted">Animal Health Information</div>
                            <div class="h3">{{ $animal_health_count }}</div>
                            <a class="text-arrow-icon small" href="{{ route('animal_health_info_export') }}">
                                Export Data
                                <i data-feather="arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <!-- Billing card 1-->
                    <div class="card h-100 border-start-lg border-start-info">
                        <div class="card-body">
                            <div class="small text-muted">Feeding and nutrition</div>
                            <div class="h3">{{ $feeding_and_nutrition_count }}</div>
                            <a class="text-arrow-icon small" href="{{ route('feed_consumption_records.export') }}">
                                Export Data
                                <i data-feather="arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <!-- Billing card 1-->
                    <div class="card h-100 border-start-lg border-start-warning">
                        <div class="card-body">
                            <div class="small text-muted">Breeding Information</div>
                            <div class="h3">{{ $breeding_information_count }}</div>
                            <a class="text-arrow-icon small" href="{{ route('reproduction_and_breeding.export') }}">
                                Export Data
                                <i data-feather="arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </main>

@endsection
