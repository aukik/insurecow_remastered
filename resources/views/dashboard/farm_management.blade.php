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
                            {{--                            <div class="page-header-subtitle">--}}
                            {{--                                Example dashboard overview and content summary--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4" style="margin-top: 2%">




            <div class="row">


                <div class="col-lg-4 mb-4">
                    <!-- Billing card 1-->
                    <div class="card h-100 border-start-lg border-start-primary">
                        <div class="card-body">
                            <div class="small text-muted">No of farms</div>
                            <div class="h3">{{ $firms_count }}</div>
                            <a class="text-arrow-icon small" href="{{ route('farm.index') }}">
                                View Farms
                                <i data-feather="arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

{{--                <div class="col-lg-6 col-xl-3 mb-4">--}}
{{--                    <div class="card bg-purple text-white h-100">--}}
{{--                        <div class="card-body">--}}
{{--                            <div--}}
{{--                                class="d-flex justify-content-between align-items-center"--}}
{{--                            >--}}
{{--                                <div class="me-3">--}}
{{--                                    <div class="text-white-75 small">No Of Farms</div>--}}
{{--                                    <div class="text-lg fw-bold">{{ $firms_count }}</div>--}}
{{--                                </div>--}}
{{--                                <i--}}
{{--                                    class="feather-xl text-white-50"--}}
{{--                                    data-feather="message-circle"--}}
{{--                                ></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div--}}
{{--                            class="card-footer d-flex align-items-center justify-content-between small"--}}
{{--                        >--}}
{{--                            <a class="text-white stretched-link" href="{{ route('farm.create') }}"--}}
{{--                            >View Farms</a--}}
{{--                            >--}}
{{--                            <div class="text-white">--}}
{{--                                <i class="fas fa-angle-right"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}


            </div>


        </div>
    </main>

@endsection
