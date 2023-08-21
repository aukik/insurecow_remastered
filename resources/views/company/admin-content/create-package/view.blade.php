@extends('super-admin.admin-panel.index')

@section('content')
    <main>
        <header
            class="page-header page-header-compact page-header-light border-bottom bg-white mb-4"
        >
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div
                        class="row align-items-center justify-content-between pt-3"
                    >
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="page-header-icon">
                                    <i data-feather="user"></i>
                                </div>
                                View All Packages - Company
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-4">
            <!-- Account page navigation-->
            <div class="row">

                @if(session('package_status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('package_status') }}
                    </div>
                @endif

                <div class="col-xl-12">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">User History</div>
                        <div class="card-body">

                            {{--                            <div class="card-header">Extended DataTables</div>--}}
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                    <tr>
                                        <th>Package Name</th>
                                        <th>Insurance Period</th>
                                        <th>Coverage</th>
                                        <th>Lowest Range Amount</th>
                                        <th>Highest Range Amount</th>
                                        <th>Total Amount</th>
                                        <th>Package Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>

                                    <tbody>


                                    @foreach($packages as $package)

                                        <tr>
                                            <td>{{ $package->package_name }}</td>
                                            <td>{{ $package->insurance_period }}</td>
                                            <td>{{ $package->coverage }}</td>
                                            <td>{{ $package->lowest_amount }}</td>
                                            <td>{{ $package->highest_amount }}</td>
                                            <td>{{ $package->total_amount }}</td>
                                            <td>{{ $package->package_status }}</td>
                                            <td>

                                                <a href="{{ route('package_status', 1) }}">
                                                    <button class="btn @if($package->package_status == 'active' ) btn-primary @else btn-danger @endif ">Status Mode</button>
                                                </a>

                                            </td>

                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            {{-- ---------------------------------------- Company Request Data ---------------------------------------- --}}



                            {{-- ---------------------------------------- Register Company/NGO/Bank ---------------------------------------- --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
