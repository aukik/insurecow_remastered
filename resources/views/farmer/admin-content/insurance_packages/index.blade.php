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

                            {{--                            <div class="card-body">--}}
                            {{--                                <table id="datatablesSimple">--}}
                            {{--                                    <thead>--}}
                            {{--                                    <tr>--}}
                            {{--                                        <th>Serial</th>--}}
                            {{--                                        <th>Package Name</th>--}}
                            {{--                                        <th>Company Name</th>--}}
                            {{--                                        <th>Company Logo</th>--}}
                            {{--                                        <th>Insurance Period</th>--}}
                            {{--                                        <th>Amount</th>--}}
                            {{--                                        <th>Package Status</th>--}}
                            {{--                                        <th>Action</th>--}}
                            {{--                                    </tr>--}}
                            {{--                                    </thead>--}}

                            {{--                                    <tbody>--}}
                            {{--                                    <?php $id = 0 ?>--}}
                            {{--                                    @foreach($packages as $package)--}}
                            {{--                                        <tr>--}}
                            {{--                                            <td>{{ $id += 1 }}</td>--}}
                            {{--                                            <td>{{ $package->package_name }}</td>--}}
                            {{--                                            <td>{{ \App\Models\User::whereId($package->user_id)->first()->name ?? null }}</td>--}}
                            {{--                                            <td><img--}}
                            {{--                                                    src="{{ asset('storage/'.\App\Models\FarmerProfile::whereId($package->user_id)->first()->image) }}"--}}
                            {{--                                                    alt="" style="width: 120px"></td>--}}
                            {{--                                            <td>{{ $package->insurance_period }}</td>--}}
                            {{--                                            <td>{{ $package->total_amount }}</td>--}}
                            {{--                                            <td>{{ $package->package_status }}</td>--}}
                            {{--                                            <td>--}}
                            {{--                                                <a href="" class="btn btn-primary">View Information</a>--}}
                            {{--                                            </td>--}}
                            {{--                                        </tr>--}}
                            {{--                                    @endforeach--}}
                            {{--                                    </tbody>--}}
                            {{--                                </table>--}}
                            {{--                            </div>--}}

                            {{-- ---------------------------------------- Package Data ---------------------------------------- --}}

                            {{-- ---------------------------------------- Package Search ---------------------------------------- --}}


                            <form action="{{ route('insurance.packages.post') }}" method="post"
                                  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <!-- Form Group (username)-->

                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->

                                    <!-- Form Group (last name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName"
                                        >Insurance Period</label
                                        >
                                        <input
                                            class="form-control @error('insurance_period') is-invalid @enderror"
                                            id="inputLastName"
                                            type="number"
                                            placeholder="Example : 0.5 = 6months, 1 = 1 year, 1.5= 1 year 6 months"
                                            value=""
                                            name="insurance_period"
                                            step="0.01"
                                        />

                                        @error('insurance_period')
                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName"
                                        >Search Insurance For</label
                                        >

                                        <select class="form-control" id="exampleFormControlSelect2" name="cattle_info">
                                            @foreach($cattle_list as $cattle)
                                                <option value="{{ $cattle->id }}">{{ $cattle->cattle_name }}</option>
                                            @endforeach
                                        </select>


                                        @error('cattle_info')
                                        <div class="alert alert-danger" style="margin-top: 10px">Unavailable information</div>
                                        @enderror

                                    </div>
                                </div>


                                <button class="btn btn-primary" type="submit">
                                    Search Package
                                </button>
                            </form>


                            {{-- ---------------------------------------- Package Search ---------------------------------------- --}}


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
