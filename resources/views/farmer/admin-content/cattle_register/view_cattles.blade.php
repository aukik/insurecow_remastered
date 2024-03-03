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
                                Registered Cattle - Farmer
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
                                        {{--                                        <th>Farm Name</th>--}}
                                        <th>Animal Price</th>
                                        <th>View</th>
                                        {{--                                        <th>Animal Claim</th>--}}

                                        <th>Income</th>
                                        <th>Expense</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php $id = 0 ?>
                                    @foreach($cattle_list as $cattle)
                                        <tr>
                                            <td>{{ $id += 1 }}</td>
                                            <td>{{ $cattle->cattle_name }}</td>
                                            <td>{{ \Illuminate\Support\Str::ucfirst($cattle->animal_type) }}</td>

                                            {{--                                            <td>{{ \App\Models\Firm::find($cattle->farm)->farm_name ?? "Name not found" }}</td>--}}
                                            {{--                                            <td>{{ $cattle->cattle_color }}</td>--}}

                                            <td>{{ $cattle->sum_insured }}/-</td>

                                            {{-- -------------------------- Dynamic condition between super admin and farmer -------------------------- --}}

                                            @if(auth()->user()->role == "s")
                                                <td>
                                                    <a class="btn btn-outline-primary" type="button"
                                                       href="{{ route('sp.cattle.list.single',$cattle->id)  }}">View
                                                        Info</a>
                                                </td>
                                            @else
                                                <td>
                                                    <a class="btn btn-outline-primary" type="button"
                                                       href="{{ route('cattle.list.single',$cattle->id)  }}">View
                                                        Info</a>
                                                </td>
                                            @endif

                                            {{-- -------------------------- Dynamic condition between super admin and farmer -------------------------- --}}


                                            {{--                                            <td>--}}
                                            {{--                                                <a class="btn btn-outline-yellow" type="button"--}}
                                            {{--                                                   href="">Edit Info</a>--}}
                                            {{--                                            </td>--}}

                                            {{--                                            <td>Approved</td>--}}







                                            {{--  ------------------------------------------ Both insurance payment and claim status check ------------------------------------------ --}}

                                            {{--                                            @if($cattle->animal_type == "goat")--}}

                                            {{--                                                <td>Not applicable for type goat</td>--}}

                                            {{--                                            @else--}}
                                            {{--                                                @if(\App\Http\Controllers\Farmer\FarmerCattleListLogicController::insurance_detection($cattle->id) == true)--}}
                                            {{--                                                    @if(\App\Http\Controllers\Farmer\FarmerCattleListLogicController::claim_detection($cattle->id) == true)--}}
                                            {{--                                                        <td>--}}
                                            {{--                                                            <a href="{{ route('claim.index', $cattle->id) }}"--}}
                                            {{--                                                               class="btn btn-success">Claim</a>--}}

                                            {{--                                                        </td>--}}

                                            {{--                                                    @else--}}
                                            {{--                                                        <td>Claimed</td>--}}
                                            {{--                                                    @endif--}}
                                            {{--                                                @else--}}
                                            {{--                                                    <td>Not insured</td>--}}
                                            {{--                                                @endif--}}

                                            {{--                                            @endif--}}

                                            {{--  ------------------------------------------ Both insurance payment and claim status check ------------------------------------------ --}}


                                            <th class="text-success">{{ round(\App\Models\Farm_management\financial\IncomeAndSell::where('cattle_id',$cattle->id)->sum('amount')) }}
                                                /-
                                            </th>
                                            <th class="text-danger">{{ round(\App\Models\Farm_management\financial\Expense::where('cattle_id',$cattle->id)->sum('amount')) }}
                                                /-
                                            </th>
                                            <th class="{{ round(\App\Models\Farm_management\financial\IncomeAndSell::where('cattle_id',$cattle->id)->sum('amount')) - round(\App\Models\Farm_management\financial\Expense::where('cattle_id',$cattle->id)->sum('amount')) < 0 ? 'text-danger' : 'text-success' }}">
                                                {{ round(\App\Models\Farm_management\financial\IncomeAndSell::where('cattle_id',$cattle->id)->sum('amount')) - round(\App\Models\Farm_management\financial\Expense::where('cattle_id',$cattle->id)->sum('amount')) }}
                                                /-
                                            </th>

                                            <th>On Farm</th>

                                            {{-- --------------------------- Selling animal --------------------------- --}}

                                            <th>
                                                <a href="" class="btn btn-danger sell-animal-button"
                                                   data-cattle-id="{{ $cattle->id }}">Sell</a>


                                            </th>

                                            {{-- --------------------------- Selling animal --------------------------- --}}


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
