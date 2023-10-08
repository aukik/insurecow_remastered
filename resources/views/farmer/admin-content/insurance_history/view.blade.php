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
                                Farmer - Insurance History
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
                        <div class="card-header">Farmer - Insurance History</div>
                        <div class="card-body">

                            {{--                            <div class="card-header">Extended DataTables</div>--}}
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Package Info</th>
                                        <th>Company Name</th>
                                        <th>Premium Policy</th>
                                        <th>Package Insurance Period</th>
                                        <th>Muzzle Verification Status</th>
                                        <th>Insurance Status</th>
                                        <th>Test Insurance Buy <span style="color: red">[ Under construction ]</span></th>
                                        <th>Buy Insurance</th>
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
                                            <td>
                                                <a href="{!! asset("storage/".\App\Http\Controllers\Farmer\InsuranceRequestController::package_policy($history->package_id))  !!}">View
                                                    Quotation</a></td>
                                            <td>{{ $history->package_insurance_period }}</td>
                                            <td>{{ $history->muzzle_verification == null ? "Not verified" : "Verified" }}</td>
                                            <td>{{ $history->insurance_status }}</td>




                                            <td>{!!  \App\Http\Controllers\Farmer\InsuranceRequestController::insurance_buy_status($history->id) !!}</td>

                                            @if($history->insurance_status == "received")
                                                <td>

                                                    <form action="{{ route('pay') }}" method="post">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" value="{{ $history->id }}"
                                                               name="insurance_request_id">
                                                        <input type="hidden" value="{{ $history->cattle_id }}"
                                                               name="cattle_id">
                                                        <input type="hidden" value="{{ $history->package_id }}"
                                                               name="package_id">
                                                        <input type="hidden" value="{{ $history->company_id }}"
                                                               name="company_id">
                                                        <input type="hidden" step=".01"
                                                               value="{{ $history->package_insurance_period }}"
                                                               name="package_insurance_period">
                                                        <input class="btn btn-success h3 text-white" type="submit"
                                                               value="Buy">
                                                    </form>
                                                </td>
                                            @else
                                                <td>Pending</td>
                                            @endif


                                            {{--                                            <td>{{ $history->insurance_status }}</td>--}}

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
