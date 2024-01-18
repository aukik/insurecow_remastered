@extends('super-admin.admin-panel.index')

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
                                Dashboard
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4" style="margin-top: 2%">

            <div class="row">


                @if(auth()->user()->permission->c_without_insurance == 1)

                    <div class="col-lg-4 mb-4">
                        <!-- Billing card 1-->
                        <div class="card h-100 border-start-lg border-start-primary">
                            <div class="card-body">
                                <div class="small text-muted">Farmer List</div>
                                <div class="h3">{{ $farmer_count }}</div>
                                <a class="text-arrow-icon small" href="{{ route('cp.all_registered_farmers') }}">
                                    View Information
                                    <i data-feather="arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4 mb-4">
                        <!-- Billing card 1-->
                        <div class="card h-100 border-start-lg border-start-primary">
                            <div class="card-body">
                                <div class="small text-muted">Animal List</div>
                                <div class="h3">{{ $company_without_premium_animal_list_count ?? 0 }}</div>
                                <a class="text-arrow-icon small" href="{{ route('company.animal_list') }}">
                                    View Information
                                    <i data-feather="arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-4">
                        <!-- Billing card 1-->
                        <div class="card h-100 border-start-lg border-start-primary">
                            <div class="card-body">
                                <div class="small text-muted">Enlisted Permission</div>
                                <div class="h3">{{ $farmer_count ?? 0 }}</div>
                                <a class="text-arrow-icon small" href="{{ route('cp.user_history') }}">
                                    View Information
                                    <i data-feather="arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4 mb-4">
                        <!-- Billing card 1-->
                        <div class="card h-100 border-start-lg border-start-primary">
                            <div class="card-body">
                                <div class="small text-muted">Insured Animal List</div>
                                <div class="h3">{{ $without_premium_based_company_insured_animal_count ?? 0 }}</div>
                                <a class="text-arrow-icon small" href="{{ route('company_insured_animal_list_2') }}">
                                    View Information
                                    <i data-feather="arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>



                    <div class="col-lg-4 mb-4">
                        <!-- Billing card 1-->
                        <div class="card h-100 border-start-lg border-start-primary">
                            <div class="card-body">
                                <div class="small text-muted">Total Insurance Amount</div>
                                <div class="h3">{{ round($without_premium_based_company_insurance_amount) ?? 0 }}/-
                                </div>
                                <a class="text-arrow-icon small" href="{{ route('company.transaction_history_data') }}">
                                    View Information
                                    <i data-feather="arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-4">
                        <!-- Billing card 1-->
                        <div class="card h-100 border-start-lg border-start-primary">
                            <div class="card-body">
                                <div class="small text-muted">Insurance Due Amount</div>
                                <div class="h3">{{ $due_amount_company_without_premium_insurance }}/-</div>
                                <a class="text-arrow-icon small"
                                   href="{{ route('company.view_pending_insurance_history') }}">
                                    View Information
                                    <i data-feather="arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-4">
                        <!-- Billing card 1-->
                        <div class="card h-100 border-start-lg border-start-primary">
                            <div class="card-body">
                                <div class="small text-muted">Pending Insurance List</div>
                                <div class="h3">{{ $due_request_company_without_premium_insurance_count }}</div>
                                <a class="text-arrow-icon small"
                                   href="{{ route('company.view_pending_insurance_history') }}">
                                    View Information
                                    <i data-feather="arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-4">
                        <!-- Billing card 1-->
                        <div class="card h-100 border-start-lg border-start-primary">
                            <div class="card-body">
                                <div class="small text-muted">Total Claimed List</div>
                                <div class="h3">{{ $company_without_premium_total_claim_count }}</div>
                                <a class="text-arrow-icon small" href="{{ route('company.claim_insurance_data') }}">
                                    View Information
                                    <i data-feather="arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                @elseif(auth()->user()->permission->c_insurance == 1)
                    <p>The animal with insurance view</p>
                @endif

            </div>
        </div>
    </main>

@endsection
