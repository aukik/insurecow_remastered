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
                                Company - Insurance Requests
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
                        <div class="card-header">Company - Insurance Requests</div>
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
                                        <th>Insurance For Animal</th>

                                        <th>View</th>

                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php $id = 0 ?>
                                    @foreach($insurance_history as $history)
                                        <tr>


                                            <td>{{ $id += 1 }}</td>
                                            <td>{!!  \App\Http\Controllers\Farmer\InsuranceRequestController::package_id($history->package_id) !!}</td>
                                            <td>{!!  \App\Http\Controllers\Farmer\InsuranceRequestController::company_data($history->company_id) !!}</td>


                                            {{-- ------------------------------------------- Cattle Info ------------------------------------------- --}}

                                            <td><a href="{{ route('company_view_cattle_info_2', $history->id) }}">Cattle
                                                    Info</a></td>

                                            {{-- ------------------------------------------- Cattle Info ------------------------------------------- --}}

                                            {{-- ------------------------------------------- Farmer Name ------------------------------------------- --}}

                                            @if($history->insurance_request_type == "single")

                                                @if ($cattleRegistration = \App\Models\CattleRegistration::find($history->cattle_id))
                                                    <td>{{ \App\Models\User::find($cattleRegistration->user_id)->name }}</td>
                                                @else
                                                    <td>Warning - No Farmer data found</td>
                                                @endif

                                            @else

                                                @php
                                                    $userIds = json_decode($history->user_id);
                                                    $uniqueNames = [];
                                                @endphp

                                                {{-- Check if user IDs are not empty --}}
                                                @if (!empty($userIds))
                                                    <td>
                                                        @foreach ($userIds as $userId)
                                                            {{-- Retrieve user name using User model --}}
                                                            @php
                                                                $userName = \App\Models\User::find($userId)->name;
                                                            @endphp

                                                            {{-- Display only unique names --}}
                                                            @if (!in_array($userName, $uniqueNames))
                                                                {{ $userName }}
                                                                {{-- Add the name to the unique names array --}}
                                                                @php
                                                                    $uniqueNames[] = $userName;
                                                                @endphp
                                                                @if (!$loop->last)
                                                                    , {{-- Add a comma if it's not the last item --}}
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                @else
                                                    <td>Warning - No User data found</td>
                                                @endif
                                            @endif

                                            {{-- ------------------------------------------- Farmer Name ------------------------------------------- --}}


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


                                            {{-- ---------------------------- Animal list ---------------------------- --}}

                                            @if($history->insurance_request_type == "single")


                                                @if ($cattleRegistration = \App\Models\CattleRegistration::find($history->cattle_id))
                                                    <td>{{ $cattleRegistration->cattle_name }}
                                                        - {{ $cattleRegistration->animal_type }}</td>
                                                @else
                                                    <td>Warning - No cattle registration data found</td>
                                                @endif

                                            @else

                                                {{-- Decode the JSON data --}}
                                                @php
                                                    $cattleIds = json_decode($history->cattle_id);
                                                    $uniqueCattleNames = [];
                                                @endphp

                                                {{-- Check if cattle IDs are not empty --}}
                                                @if (!empty($cattleIds))
                                                    <td>
                                                        @foreach ($cattleIds as $cattleId)
                                                            {{-- Retrieve cattle registration data using CattleRegistration model --}}
                                                            @php
                                                                $cattleRegistration = \App\Models\CattleRegistration::find($cattleId);
                                                            @endphp

                                                            {{-- Display cattle name --}}
                                                            @if ($cattleRegistration)
                                                                {{ $cattleRegistration->cattle_name }}
                                                                {{-- Add the cattle name to the unique array --}}
                                                                @php
                                                                    $uniqueCattleNames[] = $cattleRegistration->cattle_name;
                                                                @endphp
                                                                @if (!$loop->last)
                                                                    , {{-- Add a comma if it's not the last item --}}
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                @else
                                                    <td>Warning - No Cattle data found</td>
                                                @endif

                                            @endif

                                                {{-- ---------------------------- Animal list ---------------------------- --}}



                                                {{--  ---------------------------------------- Condition adding [ Insurance checking ] ---------------------------------- --}}


                                                {{--                                            @if($history->insurance_status == "received")--}}
                                                {{--                                                @if(\App\Models\Insured::where('insurance_request_id',$history->id)->count() == 0)--}}
                                                {{--                                                    <td>--}}
                                                {{--                                                        <a href="{{ route('company_without_insurance_cart',$history->id) }}"--}}
                                                {{--                                                           class="btn btn-primary">View</a>--}}
                                                {{--                                                    </td>--}}
                                                {{--                                                @else--}}
                                                {{--                                                    <td>Insured</td>--}}
                                                {{--                                                @endif--}}
                                                {{--                                            @else--}}
                                                {{--                                                <td>-</td>--}}
                                                {{--                                            @endif--}}

                                                @if($history->insurance_status == "received")

                                                    @if($history->insurance_request_status == null)
                                                        <td>
                                                            <a href="{{ route('company_without_insurance_cart',$history->id) }}"
                                                               class="btn btn-primary">View</a>
                                                        </td>

                                                    @else
                                                        <td>{{ $history->insurance_request_status }}</td>
                                                    @endif

                                                @else
                                                    <td>-</td>
                                                @endif

                                                {{--  ---------------------------------------- Condition adding [ Insurance checking ] ---------------------------------- --}}


                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            {{-- ---------------------------------------- Company Request Data ---------------------------------------- --}}


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
