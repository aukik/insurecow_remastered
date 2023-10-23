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
                                Registered Cattle - Super Admin
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
                        <div class="card-header">Registered Cattle</div>
                        <div class="card-body">


                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Animal Name</th>
                                        <th>Animal Type</th>

                                        <th>Farm Name</th>
                                        <th>Animal Price</th>
                                        <th>View</th>
                                        <th>Animal Claim</th>

                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php $id = 0 ?>
                                    @foreach($cattle_list as $cattle)
                                        <tr>
                                            <td>{{ $id += 1 }}</td>
                                            <td>{{ $cattle->cattle_name }}</td>
                                            <td>{{ \Illuminate\Support\Str::ucfirst($cattle->animal_type) }}</td>

                                            {{-- --------------------------------------- Farm name --------------------------------------- --}}

                                            <td>
                                                @if ($cattle->farm && $cattle->farm !== "No Farm")
                                                    {{ \App\Models\Firm::find($cattle->farm)->farm_name }}
                                                @else
                                                    No Farm
                                                @endif
                                            </td>

                                            {{-- --------------------------------------- Farm name --------------------------------------- --}}


                                            <td>{{ $cattle->sum_insured }}</td>


                                            <td>
                                                <a class="btn btn-outline-primary" type="button"
                                                   href="{{ route('sp.cattle.list.single',$cattle->id)  }}">View
                                                    Info</a>
                                            </td>


                                            {{--  ------------------------------------------ Both insurance payment and claim status check ------------------------------------------ --}}

                                            @if($cattle->animal_type == "goat")

                                                <td>Not applicable for type goat</td>

                                            @else
                                                @if(\App\Http\Controllers\Farmer\FarmerCattleListLogicController::insurance_detection($cattle->id) == true)
                                                    @if(\App\Http\Controllers\Farmer\FarmerCattleListLogicController::claim_detection($cattle->id) == true)
                                                        <td>
                                                            <a href="{{ route('sp.claim.index', $cattle->id) }}"
                                                               class="btn btn-success">Claim</a>

                                                        </td>

                                                    @else
                                                        <td>Claimed</td>
                                                    @endif
                                                @else
                                                    <td>Not insured</td>
                                                @endif

                                            @endif

                                            {{--  ------------------------------------------ Both insurance payment and claim status check ------------------------------------------ --}}

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
