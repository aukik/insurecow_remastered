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
                                        <th>Company Name</th>
                                        <th>Cattle Info</th>

                                        <th>Farmer Name</th>


                                        <th>Premium Policy</th>


                                        <th>Insurance Cost</th>
                                        <th>Package Insurance Period</th>
                                        <th>Insurance For</th>

                                        <th>Buy Insurance</th>

                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php $id = 0 ?>
                                    @foreach($insurance_history as $history)
                                        <tr>


                                            <td>{{ $id += 1 }}</td>
                                            <td>{!!  \App\Http\Controllers\Farmer\InsuranceRequestController::package_id($history->package_id) !!}</td>
                                            <td>{!!  \App\Http\Controllers\Farmer\InsuranceRequestController::company_data($history->company_id) !!}</td>
                                            <td><a href="{{ route('company_view_cattle_info_2', $history->id) }}">Cattle
                                                    Info</a></td>

                                            @if ($cattleRegistration = \App\Models\CattleRegistration::find($history->cattle_id))
                                                <td>{{ \App\Models\User::find($cattleRegistration->user_id)->name }}</td>
                                            @else
                                                <td>Warning - No cattle registration data found</td>
                                            @endif

                                            @if($history->insurance_status == "received")

                                                <td>
                                                    <a href="{!! asset("storage/".\App\Http\Controllers\Farmer\InsuranceRequestController::package_policy($history->package_id))  !!}">View
                                                        Quotation</a></td>

                                            @else
                                                <td>-</td>
                                            @endif

                                            <td>{{ $history->insurance_cost }}/-</td>

                                            {{-- ---------------------------- Insurance Period ---------------------------- --}}

                                            <td>
                                                @if($history->package_insurance_period == 0.5)
                                                    6 months
                                                @elseif($history->package_insurance_period == 1)
                                                    1 year
                                                @elseif($history->package_insurance_period == 1.5)
                                                    1 year 5 months
                                                @elseif($history->package_insurance_period == 2.0)
                                                    2 years
                                                @elseif($history->package_insurance_period == 2.5)
                                                    2 years 5 months
                                                @elseif($history->package_insurance_period == 3.0)
                                                    3 Years
                                                @elseif($history->package_insurance_period > 3.0)
                                                    More than 3 years
                                                @endif
                                            </td>

                                            {{-- ---------------------------- Insurance Period ---------------------------- --}}


                                            @if ($cattleRegistration = \App\Models\CattleRegistration::find($history->cattle_id))
                                                <td>{{ $cattleRegistration->cattle_name }}
                                                    - {{ $cattleRegistration->animal_type }}</td>
                                            @else
                                                <td>Warning - No cattle registration data found</td>
                                            @endif


                                            @if(\App\Models\InsuranceRequest::where('cattle_id',$history->cattle_id)->orderBy('id','desc')->first()->insurance_status == "received")

                                                @if(\App\Http\Controllers\Farmer\InsuranceRequestController::insurance_buy_status($history->cattle_id))
                                                    <td>
                                                        <form action="{{ route('company_pay') }}" method="post">
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
                                                    <td>Insured</td>
                                                @endif

                                            @else
                                                <td>Company response pending</td>

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
