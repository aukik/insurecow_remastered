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
                                Insurance Packages - Farmer
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
                        <div class="card-header">Search Insurance Packages - Farmer</div>
                        <div class="card-body">

                            {{-- ---------------------------------------- Package Data ---------------------------------------- --}}

                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Package Name</th>
                                        <th>Company Name</th>
                                        {{--                                        <th>Company Logo</th>--}}
                                        <th>Insurance Period</th>
                                        <th>Insurance Coverage</th>

                                        <th>OF</th>
                                        <th>CTL</th>
                                        <th>Vat</th>

                                        <th>Price</th>

                                        <th>Package Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php $id = 0 ?>
                                    @foreach($packages as $package)
                                        <tr>
                                            <td>{{ $id += 1 }}</td>
                                            <td>{{ $package->package_name }}</td>
                                            <td>{{ \App\Models\User::whereId($package->user_id)->first()->name ?? null }}</td>
                                            {{--                                            <td><img--}}
                                            {{--                                                    src="{{ asset('storage/'.\App\Models\FarmerProfile::whereId($package->user_id)->first()->image) }}"--}}
                                            {{--                                                    alt="" style="width: 120px"></td>--}}
                                            <td>{{ $package->insurance_period }}</td>
                                            <td>
                                                @foreach (json_decode($package->coverage) as $item)
                                                    @if ($item === 'ac')
                                                        Accidental Coverage
                                                    @elseif($item === 'fl')
                                                        Flood Coverage
                                                    @elseif($item === 'er')
                                                        Earthquake Coverage
                                                    @endif

                                                    @if (!$loop->last)
                                                        ,
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{ $package->discount }}%</td>
                                            <td>{{ $package->rate }}%</td>
                                            <td>{{ $package->vat }}%</td>
                                            <td>{{ \App\Models\User::calculateTotalCost($cattle_info->sum_insured,$package->rate,$package->discount,$package->vat)  }}</td>
                                            <td>{{ $package->package_status }}</td>
                                            <td>
                                                <a href="{{ route('single.insurance.packages',[$package->id,$cattle_info->id]) }}"
                                                   class="btn btn-primary">View Package</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            {{-- ---------------------------------------- Package Data ---------------------------------------- --}}


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
