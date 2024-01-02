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
                                Company - Insurance History [ Cash Transactions ]
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
                        <div class="card-header">Company - Insurance History [ Cash Transactions ]</div>
                        <div class="card-body">

                            @if(session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            {{--                            <div class="card-header">Extended DataTables</div>--}}
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Package Info</th>
                                        <th>Insured to</th>
                                        <th>Inc. Requested By</th>
                                        <th>Farmer Name</th>

                                        {{--                                        <th>From A/C</th>--}}
                                        {{--                                        <th>To A/C</th>--}}
                                        {{--                                        <th>Bank Name</th>--}}
                                        {{--                                        <th>Branch Name</th>--}}
                                        {{--                                        <th>Routing No</th>--}}

                                        <th>Attachment</th>
                                        <th>Information</th>

                                        <th>Status</th>

                                        @if(auth()->user()->permission->c_insurance == 1)
                                            <th>View</th>
                                        @endif


                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php $id = 0 ?>
                                    @foreach($insurance_history as $history)
                                        <tr>


                                            <td>{{ $id += 1 }}</td>
                                            <td>{!!  \App\Http\Controllers\Farmer\InsuranceRequestController::package_id($history->package_id) !!}</td>
                                            <td>{!!  \App\Http\Controllers\Farmer\InsuranceRequestController::company_data($history->company_id) !!}</td>
                                            <td>{!!  \App\Http\Controllers\Farmer\InsuranceRequestController::company_data($history->insurance_requested_company_id) !!}</td>
                                            <td>{!!  \App\Http\Controllers\Farmer\InsuranceRequestController::company_data($history->user_id) !!}</td>
                                            {{--                                            <td>{{ $history->from_ac }}</td>--}}
                                            {{--                                            <td>{{ $history->to_ac }}</td>--}}
                                            {{--                                            <td>{{ $history->bank_name }}</td>--}}
                                            {{--                                            <td>{{ $history->branch_name }}</td>--}}
                                            {{--                                            <td>{{ $history->routing_no }}</td>--}}

                                            {{-- ---------------------------------------- Attachment ---------------------------------------- --}}

                                            <td>
                                                <a href="{{ asset('storage/'.$history->transaction_attachment)  }}">File</a>
                                            </td>

                                            {{-- ---------------------------------------- Attachment ---------------------------------------- --}}

                                            {{-- ---------------------------------------- Information ---------------------------------------- --}}

                                            @if(auth()->user()->permission->c_insurance == 1)
                                                <td>
                                                    <a href="{{ route('company_other_info_1',$history->id) }}">File</a>
                                                </td>
                                            @else
                                                <td>
                                                    <a href="{{ route('company_other_info_2',$history->id) }}">File</a>
                                                </td>
                                            @endif



                                            {{-- ---------------------------------------- Information ---------------------------------------- --}}


                                            <td>

                                                @if($insured = \App\Models\Insured::where('cattle_id',$history->cattle_id)->first())
                                                    Insured
                                                @else
                                                    {{ $history->status }}
                                                @endif
                                            </td>


                                            {{--   ------------------- Applicable for insurance with package based company ------------------- --}}

                                            @if(auth()->user()->permission->c_insurance == 1)
                                                @if($history->status == "accepted" || $history->status == "rejected")

                                                    <td>-</td>
                                                    {{--                                                    <td>-</td>--}}
                                                @else

                                                    {{--                                                    <td>--}}
                                                    {{--                                                        <a href="{{ route('company_insurance_acceptance', [$history->id,'a']) }}"--}}
                                                    {{--                                                           class="btn btn-primary">Accept</a></td>--}}
                                                    {{--                                                    <td>--}}
                                                    {{--                                                        <a href="{{ route('company_insurance_acceptance', [$history->id,'r']) }}"--}}
                                                    {{--                                                           class="btn btn-danger">Reject</a></td>--}}

                                                    <td>
                                                        <a href="{{ route('company_view_insurance_acceptance_form', $history->id) }}"
                                                           class="btn btn-success">View</a></td>
                                                @endif

                                            @endif

                                            {{--   ------------------- Applicable for insurance with package based company ------------------- --}}

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
