@extends('super-admin.admin-panel.index')

@section('content')
    <main>
        <header
            class="page-header page-header-compact page-header-light border-bottom bg-white mb-4"
        >
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div
                        class="row pt-3"
                    >
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="page-header-icon">
                                    <i data-feather="user"></i>
                                </div>
                                Farmer Profile - View Info - Farmer
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
                        {{--                        <div class="card-header">--}}
                        {{--                            Farmer Profile - View Info--}}
                        {{--                        </div>--}}

                        <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
                            Cattle Info - Farmer

                        </div>

                        <div class="card-body">

                            <div class="row gx-3 mb-3">

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputLastName"
                                    >Animal Type</label
                                    ><span style="color: red"></span>
                                    <p>{{ $cattle->animal_type }}</p>
                                </div>

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputLastName"
                                    >Cattle Name</label
                                    ><span style="color: red"></span>
                                    <p>{{ $cattle->cattle_name }}</p>

                                </div>

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputLastName"
                                    >Cattle Breed</label
                                    ><span style="color: red"></span>

                                    <p>{{ $cattle->cattle_breed }}</p>

                                </div>

                            </div>
                            <div class="row gx-3 mb-3">

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputLastName"
                                    >Animal Age</label
                                    ><span style="color: red"></span>
                                    <p>{{ $cattle->age }}</p>
                                </div>

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputLastName"
                                    >Animal Color</label
                                    ><span style="color: red"></span>
                                    <p>{{ $cattle->cattle_color }}</p>

                                </div>

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputLastName"
                                    >Animal Weight</label
                                    ><span style="color: red"></span>

                                    <p>{{ $cattle->weight }}</p>

                                </div>

                            </div>

                            <div class="row gx-3 mb-3">

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputLastName"
                                    >Animal Age</label
                                    ><span style="color: red"></span>
                                    <p>{{ $cattle->age }}</p>
                                </div>

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputLastName"
                                    >Animal Color</label
                                    ><span style="color: red"></span>
                                    <p>{{ $cattle->cattle_color }}</p>

                                </div>

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputLastName"
                                    >Animal Weight</label
                                    ><span style="color: red"></span>

                                    <p>{{ $cattle->weight }}</p>

                                </div>

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputLastName"
                                    >Animal Price</label
                                    ><span style="color: red"></span>

                                    <p>{{ $cattle->sum_insured }}</p>

                                </div>
                            </div>


                            <div class="row gx-3 mb-3">

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputOrgName"
                                    >Animal Left Side</label
                                    >
                                    <div class="form-control">
                                        <img src="{{ asset('storage/'.$cattle->left_side) }}"
                                             style="width: 150px; max-height: 90px">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputOrgName"
                                    >Animal Right Side</label
                                    >
                                    <div class="form-control">
                                        <img src="{{ asset('storage/'.$cattle->right_side) }}"
                                             style="width: 150px; max-height: 90px">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputOrgName"
                                    >Animal Special Marks</label
                                    >
                                    <div class="form-control">
                                        <img src="{{ asset('storage/'.$cattle->special_marks) }}"
                                             style="width: 150px; max-height: 90px">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputOrgName"
                                    >Animal With Owner</label
                                    >
                                    <div class="form-control">
                                        <img src="{{ asset('storage/'.$cattle->cow_with_owner) }}"
                                             style="width: 150px; max-height: 90px">
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
