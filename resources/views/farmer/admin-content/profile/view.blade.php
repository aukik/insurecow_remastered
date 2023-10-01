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
                            Farmer Profile - View Info

                            <a href="{{ route('farmer_profile.edit', auth()->user()->id) }}" class="btn btn-primary">Update
                                Profile</a>
                        </div>

                        <div class="card-body">

                            <div class="row gx-3 mb-3">

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputLastName"
                                    >Fathers Name</label
                                    ><span style="color: red"></span>
                                    <p>{{ $profile->fathers_name }}</p>
                                </div>

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputLastName"
                                    >Mothers Name</label
                                    ><span style="color: red"></span>
                                    <p>{{ $profile->mothers_name }}</p>

                                </div>

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputLastName"
                                    >Present Address</label
                                    ><span style="color: red"></span>

                                    <p>{{ $profile->present_address }}</p>

                                </div>

                            </div>

                            <div class="row gx-3 mb-3">

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputLastName"
                                    >Date of Birth</label
                                    ><span style="color: red"></span>


                                    <p>{{ $profile->dob }}</p>

                                </div>

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputLastName"
                                    >NID</label
                                    ><span style="color: red"></span>

                                    <p>{{ $profile->nid }}</p>
                                </div>

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputLastName"
                                    >Source of Income</label
                                    ><span style="color: red"></span>

                                    <p>{{ $profile->source_of_income }}</p>
                                </div>
                            </div>

                            <div class="row gx-3 mb-3">

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputLastName"
                                    >Division</label
                                    ><span style="color: red"></span>

                                    <p>{{ $profile->division }}</p>
                                </div>

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputLastName"
                                    >District</label
                                    ><span style="color: red"></span>

                                    <p>{{ $profile->district }}</p>

                                </div>

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputLastName"
                                    >Upazilla</label
                                    ><span style="color: red"></span>

                                    <p>{{ $profile->upazilla }}</p>
                                </div>

                            </div>

                            <div class="row gx-3 mb-3">

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputLastName"
                                    >Thana</label
                                    ><span style="color: red"></span>

                                    <p>{{ $profile->thana }}</p>
                                </div>

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputLastName"
                                    >Upazilla</label
                                    ><span style="color: red"></span>

                                    <p>{{ $profile->thana }}</p>
                                </div>

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputLastName"
                                    >Union</label
                                    ><span style="color: red"></span>

                                    <p>{{ $profile->union }}</p>
                                </div>

                            </div>

                            <div class="row gx-3 mb-3">

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputLastName"
                                    >Bank Account No</label
                                    ><span style="color: red"></span>


                                    <p>{{ $profile->bank_account_no }}</p>
                                </div>
                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputLastName"
                                    >Village</label
                                    ><span style="color: red"></span>

                                    <p>{{ $profile->village }}</p>
                                </div>

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputLastName"
                                    >Farm Address</label
                                    ><span style="color: red"></span>


                                    <p>{{ $profile->farmer_address }}</p>
                                </div>


                            </div>

                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputLastName"
                                    >Loan Amount</label
                                    ><span style="color: red"></span>

                                    <p>{{ $profile->loan_amount }}</p>
                                </div>

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputLastName"
                                    >Zip Code</label
                                    ><span style="color: red"></span>

                                    <p>{{ $profile->zip_code }}</p>
                                </div>

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputLastName"
                                    >No of Livestock</label
                                    ><span style="color: red"></span>


                                    <p>{{ $profile->num_of_livestock }}</p>
                                </div>
                            </div>

                            <div class="row gx-3 mb-3">

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputLastName"
                                    >Type of Livestock</label
                                    ><span style="color: red"></span>

                                    <p>{{ $profile->type_of_livestock }}</p>
                                </div>

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputLastName"
                                    >Nationality</label
                                    ><span style="color: red"></span>

                                    <p>{{ $profile->nationality }}</p>
                                </div>

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputLastName"
                                    >Bank Name Insured</label
                                    ><span style="color: red"></span>

                                    <p>{{ $profile->bank_name_insured }}</p>
                                </div>
                            </div>

                            <div class="row gx-3 mb-3">

                                <div class="col-md-4">

                                    <label class="small mb-1 fw-bold" for="inputOrgName"
                                    >Profile Image</label
                                    >
                                    <div class="form-control">
                                        <img src="{{ asset('storage/'.$profile->image) }}"
                                             style="width: 150px; max-height: 90px">
                                    </div>


                                </div>

                                <div class="col-md-4">

                                    <label class="small mb-1 fw-bold" for="inputOrgName"
                                    >NID Front</label
                                    >
                                    <div class="form-control">
                                        <img src="{{ asset('storage/'.$profile->nid_front) }}"
                                             style="width: 150px; max-height: 90px">
                                    </div>

                                </div>

                                <div class="col-md-4">

                                    <label class="small mb-1 fw-bold" for="inputOrgName"
                                    >NID Back</label
                                    >
                                    <div class="form-control">
                                        <img src="{{ asset('storage/'.$profile->nid_back) }}"
                                             style="width: 150px; max-height: 90px">
                                    </div>
                                </div>
                            </div>


                            <div class="row gx-3 mb-3">
                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputOrgName"
                                    >Loan Investment</label
                                    >
                                    <div class="form-control">

                                        @if(!$profile->loan_investment == null)
                                            <img src="{{ asset('storage/'.$profile->loan_investment) }}"
                                                 style="width: 150px; max-height: 90px">
                                        @else
                                            <p style="padding: 27px 0; color: red">Loan Investment file is not
                                                uploaded</p>
                                        @endif

                                    </div>

                                </div>
                                <div class="col-md-4">

                                    <label class="small mb-1 fw-bold" for="inputOrgName"
                                    >Chairman Certificate</label
                                    >

                                    <div class="form-control">


                                        @if(!$profile->loan_investment == null)
                                            <img src="{{ asset('storage/'.$profile->chairman_certificate) }}"
                                                 style="width: 150px; max-height: 90px">
                                        @else
                                            <p style="padding: 27px 0; color: red">Chairman certificate file is not
                                                uploaded</p>
                                        @endif

                                        {{--                                        <img src="{{ asset('storage/'.$profile->chairman_certificate) }}"--}}
                                        {{--                                             style="width: 150px; max-height: 90px">--}}
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
