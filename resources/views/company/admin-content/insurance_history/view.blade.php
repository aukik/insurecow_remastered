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
                                Company - Insurance History
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
                        <div class="card-header">Company - Insurance History</div>
                        <div class="card-body">

                            {{--                            <div class="card-header">Extended DataTables</div>--}}
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Package Info</th>
                                        <th>Company Name</th>
                                        <th>Farmer Name</th>
                                        <th>Cattle Info</th>
                                        <th>Premium Policy</th>
                                        <th>Package Insurance Period</th>
                                        <th>Muzzle Verification Status</th>
                                        <th>Insurance Status</th>
                                        <th>Send Quotation</th>
                                        {{--                                        <th>Insurance Status</th>--}}
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php $id = 0 ?>
                                    @foreach($insurance_history as $history)
                                        <tr>
                                            <td>{{ $id += 1 }}</td>
                                            <td>{!!  \App\Http\Controllers\Farmer\InsuranceRequestController::package_id($history->package_id) !!}</td>
                                            <td>{!!  \App\Http\Controllers\Farmer\InsuranceRequestController::company_data($history->company_id) !!}</td>
                                            <td>{!!  \App\Http\Controllers\Farmer\InsuranceRequestController::farmer_name($history->user_id) !!}</td>
                                            <td><a href="{{ route('company_view_cattle_info', $history->id) }}">Cattle
                                                    Info</a></td>
                                            <td>
                                                <a href="{!! asset("storage/".\App\Http\Controllers\Farmer\InsuranceRequestController::package_policy($history->package_id))  !!}">Package
                                                    Policy</a></td>
                                            <td>{{ $history->package_insurance_period }}</td>
                                            <td>{{ $history->muzzle_verification == null ? "Not verified" : "Verified" }}</td>
                                            <td>{{ $history->insurance_status }}</td>

                                            @if($history->insurance_status == "received")
                                                <td>Policy Sent</td>

                                            @else
                                                <td>
                                                    <a href="{{ route('company_send_request',$history->id) }}"
                                                       class="btn btn-success">Send</a>
                                                </td>
                                            @endif
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
