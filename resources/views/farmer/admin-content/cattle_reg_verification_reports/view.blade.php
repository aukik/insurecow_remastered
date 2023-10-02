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
                                Farmer - Cattle registration verification reports
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


                <div class="col-xl-12">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">Farmer - Cattle registration verification reports</div>
                        <div class="card-body">

                            {{--                            <div class="card-header">Extended DataTables</div>--}}
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>cattle name</th>
{{--                                        <th>Cow With Owner</th>--}}
                                        <th>Verification Report</th>
                                        <th>Operation Type</th>
                                        <th>Report Date</th>
                                        <th>Report Date [ DAYS ]</th>

                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php $id = 0 ?>
                                    @foreach($cattle_reg_verification_reports as $report)
                                        <tr>
                                            <td>{{ $id += 1 }}</td>
                                            <td>{{ $report->cattle_name }}</td>
{{--                                            <td><img src="{{ asset('storage/'.$report->cow_with_owner) }}"--}}
{{--                                                     style="width: 150px"></td>--}}
                                            <td><b style="color: #0a3622">{{ Str::ucfirst($report->verification_report)  }}</b></td>
                                            <td><b style="color: #0a3622">{{ Str::ucfirst($report->operation)  }}</b></td>
                                            <td>{{ $report->created_at }}</td>
                                            <td>{{ $report->created_at->diffForHumans() }}</td>
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
