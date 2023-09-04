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
                                History - Registered Cattle - Farmer
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
                        <div class="card-header">History - Registered Cattle</div>
                        <div class="card-body">

                            {{--                            <div class="card-header">Extended DataTables</div>--}}
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Cattle Name</th>
                                        {{--                                        <th>Owner Image</th>--}}
                                        <th>Weight</th>
                                        <th>Color</th>
                                        <th>Cow With Owner</th>
                                        <th>Price</th>
                                        <th>Insurance Status</th>
                                        <th>Action</th>
                                        <th>Claim <span style="color: red">[TEST]</span></th>

                                        {{--                                        <th>Insurance</th>--}}
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php $id = 0 ?>
                                    @foreach($cattle_list as $cattle)
                                        <tr>
                                            <td>{{ $id += 1 }}</td>
                                            <td>{{ $cattle->cattle_name }}</td>
                                            {{--                                            <td><img src="{{ asset('storage/'.auth()->user()->profile()->orderBy('id','desc')->first()->image) }}" alt="" style="width: 100px"></td>--}}
                                            <td>{{ $cattle->weight }}</td>
                                            <td>{{ $cattle->cattle_color }}</td>
                                            <td><img src="{{ asset('storage/'.$cattle->cow_with_owner) }}" alt=""
                                                     style="width: 100px"></td>
                                            <td>{{ $cattle->sum_insured }}</td>

                                            <td>{{ \App\Models\Order::order_verification($cattle->id) > 0 ? 'insured' : 'not insured' }}</td>

                                            <td>
                                                <button class="btn btn-success" type="button">View</button>
                                            </td>

                                            @if(\App\Models\Order::order_verification($cattle->id) > 0)
                                                <td>
                                                    <a href="{{ route('claim.index', $cattle->id) }}"
                                                       class="btn btn-danger"
                                                       type="button">Claim</a>
                                                </td>

                                            @else
                                                <td>Not Applicable</td>
                                            @endif


                                            {{--                                            <td><button class="btn btn-primary" type="button">Request</button></td>--}}

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
