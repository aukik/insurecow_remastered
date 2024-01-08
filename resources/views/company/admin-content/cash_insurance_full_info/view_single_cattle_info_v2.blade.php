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
                                View Detailed Info - Company Insurance Request
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
                            View Detailed Info - Company Insurance Request

                        </div>

                        <div class="card-body">

                            {{-- -------------------------------------- Insurance Information -------------------------------------- --}}

                            <h4>Insurance Information</h4>
                            <hr>

                            <h5>Transaction Type
                                : {{ \Illuminate\Support\Str::ucfirst($insurance_request_info->transaction_type) }}</h5>
                            <hr>

                            @if($insurance_request_info->transaction_type == "cash")

                                {{--  --------------------- Cash portion --------------------- --}}

                                <div class="row">
                                    <div class="col-md-4">

                                        <div class="row gx-3 mb-3">

                                            <label class="small mb-1 fw-bold" for="inputLastName"
                                            >Agent Name</label
                                            ><span style="color: red"></span>
                                            <p>{{ $insurance_request_info->cash_agent_name ?? "Data Not Found"}}</p>
                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="row gx-3 mb-3">

                                            <label class="small mb-1 fw-bold" for="inputLastName"
                                            >Agent Branch Name</label
                                            ><span style="color: red"></span>
                                            <p>{{ $insurance_request_info->cash_agent_branch_name ?? "Data Not Found"}}</p>
                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="row gx-3 mb-3">

                                            <label class="small mb-1 fw-bold" for="inputLastName"
                                            >Agent Id</label
                                            ><span style="color: red"></span>
                                            <p>{{ $insurance_request_info->cash_agent_id ?? "Data Not Found"}}</p>
                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        <div class="row gx-3 mb-3">

                                            <label class="small mb-1 fw-bold" for="inputLastName"
                                            >Insurance Amount</label
                                            ><span style="color: red"></span>
                                            <p>{{ $insurance_request_info->amount." TK" ?? "Data Not Found"}}</p>
                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        <div class="row gx-3 mb-3">
                                            <label class="small mb-1 fw-bold" for="inputLastName"
                                            >Provided Phone No</label
                                            ><span style="color: red"></span>
                                            <p>{{ $insurance_request_info->cash_phone ?? "Data Not Found"}}</p>
                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="row gx-3 mb-3">

                                            <label class="small mb-1 fw-bold" for="inputLastName"
                                            >Attachment</label
                                            ><span style="color: red"></span>
                                            <a href="{{ asset('storage/'. $insurance_request_info->attachment)  }}">Attachment
                                                File</a>
                                        </div>

                                    </div>

                                </div>

                                {{--  --------------------- Cash portion --------------------- --}}

                            @elseif($insurance_request_info->transaction_type == "cheque")
                                {{--  --------------------- Cheque portion --------------------- --}}

                                <div class="row">
                                    <div class="col-md-4">

                                        <div class="row gx-3 mb-3">

                                            <label class="small mb-1 fw-bold" for="inputLastName"
                                            >Bank Name</label
                                            ><span style="color: red"></span>
                                            <p>{{ $insurance_request_info->cheque_bank_name ?? "Data Not Found"}}</p>
                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="row gx-3 mb-3">

                                            <label class="small mb-1 fw-bold" for="inputLastName"
                                            >Branch Name</label
                                            ><span style="color: red"></span>
                                            <p>{{ $insurance_request_info->cheque_branch_name ?? "Data Not Found"}}</p>
                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="row gx-3 mb-3">

                                            <label class="small mb-1 fw-bold" for="inputLastName"
                                            >insurance Amount</label
                                            ><span style="color: red"></span>
                                            <p>{{ $insurance_request_info->amount." TK" ?? "Data Not Found"}}</p>
                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="row gx-3 mb-3">

                                            <label class="small mb-1 fw-bold" for="inputLastName"
                                            >Attachment</label
                                            ><span style="color: red"></span>
                                            <a href="{{ asset('storage/'. $insurance_request_info->attachment)  }}">Attachment
                                                File</a>
                                        </div>

                                    </div>


                                </div>

                                {{--  --------------------- Cheque portion --------------------- --}}

                            @elseif($insurance_request_info->transaction_type == "bank")
                                {{--  --------------------- Bank portion --------------------- --}}

                                <div class="row">
                                    <div class="col-md-4">

                                        <div class="row gx-3 mb-3">

                                            <label class="small mb-1 fw-bold" for="inputLastName"
                                            >Bank Account No</label
                                            ><span style="color: red"></span>
                                            <p>{{ $insurance_request_info->bank_ac_number ?? "Data Not Found"}}</p>
                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="row gx-3 mb-3">

                                            <label class="small mb-1 fw-bold" for="inputLastName"
                                            >Bank Name</label
                                            ><span style="color: red"></span>
                                            <p>{{ $insurance_request_info->bank_name ?? "Data Not Found"}}</p>
                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="row gx-3 mb-3">

                                            <label class="small mb-1 fw-bold" for="inputLastName"
                                            >Transaction Number</label
                                            ><span style="color: red"></span>
                                            <p>{{ $insurance_request_info->transaction_number ?? "Data Not Found"}}</p>
                                        </div>

                                    </div>

                                    <div class="col-md-4">

                                        <div class="row gx-3 mb-3">

                                            <label class="small mb-1 fw-bold" for="inputLastName"
                                            >Insurance Amount</label
                                            ><span style="color: red"></span>
                                            <p>{{ $insurance_request_info->amount." TK" ?? "Data Not Found"}}</p>
                                        </div>

                                    </div>


                                    <div class="col-md-4">

                                        <div class="row gx-3 mb-3">

                                            <label class="small mb-1 fw-bold" for="inputLastName"
                                            >Attachment</label
                                            ><span style="color: red"></span>
                                            <a href="{{ asset('storage/'. $insurance_request_info->attachment)  }}">Attachment
                                                File</a>
                                        </div>

                                    </div>

                                </div>

                                {{--  --------------------- Cheque portion --------------------- --}}

                            @endif





                            {{-- -------------------------------------- Insurance Information -------------------------------------- --}}



                            {{-- -------------------------------------- Animal Information -------------------------------------- --}}

                            <h4>Animal Information</h4>
                            <hr>

                            <div class="row gx-3 mb-3">

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputLastName"
                                    >Animal Type</label
                                    ><span style="color: red"></span>
                                    <p>{{ $cattle->animal_type ?? "Data Not Found" }}</p>
                                </div>

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputLastName"
                                    >Cattle Name</label
                                    ><span style="color: red"></span>
                                    <p>{{ $cattle->cattle_name ?? "Data Not Found"}}</p>

                                </div>

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputLastName"
                                    >Cattle Breed</label
                                    ><span style="color: red"></span>

                                    <p>{{ $cattle->cattle_breed ?? "Data Not Found"}}</p>

                                </div>

                            </div>


                            <div class="row gx-3 mb-3">

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputLastName"
                                    >Animal Age</label
                                    ><span style="color: red"></span>
                                    <p>{{ $cattle->age ?? "Data Not Found"}} Years</p>
                                </div>

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputLastName"
                                    >Animal Color</label
                                    ><span style="color: red"></span>
                                    <p>{{ $cattle->cattle_color ?? "Data Not Found"}}</p>

                                </div>

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputLastName"
                                    >Animal Weight</label
                                    ><span style="color: red"></span>

                                    <p>{{ $cattle->weight ?? "Data Not Found"}} kg</p>

                                </div>

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputLastName"
                                    >Animal Price</label
                                    ><span style="color: red"></span>

                                    <p>{{ $cattle->sum_insured ?? "Data Not Found"}}</p>
                                </div>

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputLastName"
                                    >Cattle Unique ID</label
                                    ><span style="color: red"></span>

                                    <p>{{ pathinfo($cattle->muzzle_of_cow, PATHINFO_FILENAME)  }}</p>

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

                            {{-- -------------------------------------- Animal Information -------------------------------------- --}}

                            <br>

                            {{-- -------------------------------------- Package Information -------------------------------------- --}}

                            <h4>Package Information</h4>
                            <hr>

                            <div class="row gx-3 mb-3">

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputLastName"
                                    >Package Name</label
                                    ><span style="color: red"></span>
                                    <p>{{ $package->package_name ?? "Data Not Found" }}</p>
                                </div>

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputLastName"
                                    >Package Insurance Period</label
                                    ><span style="color: red"></span>
                                    <p>{{ $package->insurance_period ?? "Data Not Found" }}</p>

                                </div>

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputLastName"
                                    >Package Policy</label
                                    ><span style="color: red"></span>

                                    <p><a href="{{ asset('storage/'.$package->policy) }}"></a>Package Policy</p>

                                </div>

                            </div>

                            <div class="row gx-3 mb-3">

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputLastName"
                                    >Package CTL</label
                                    ><span style="color: red"></span>
                                    <p>{{ $package->rate ?? "Data Not Found" }}%</p>
                                </div>

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputLastName"
                                    >Package VAT</label
                                    ><span style="color: red"></span>
                                    <p>{{ $package->vat ?? "Data Not Found" }}%</p>

                                </div>

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputLastName"
                                    >Package OFF</label
                                    ><span style="color: red"></span>

                                    <p>{{ $package->discount ?? "Data Not Found" }}%</p>

                                </div>

                            </div>


                            {{-- -------------------------------------- Package Information -------------------------------------- --}}

                            {{-- -------------------------------------- Farmer Information -------------------------------------- --}}

                            <h4>Farmer Information</h4>
                            <hr>

                            <div class="row gx-3 mb-3">

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputLastName"
                                    >Farmer Name</label
                                    ><span style="color: red"></span>
                                    <p>{{ $farmer->name ?? "Data Not Found" }}</p>
                                </div>

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputLastName"
                                    >Farmer Phone No</label
                                    ><span style="color: red"></span>
                                    <p>{{ $farmer->phone ?? "Data Not Found"}}</p>
                                </div>

                                <div class="col-md-4">
                                    <label class="small mb-1 fw-bold" for="inputLastName"
                                    >Farmer Address</label
                                    ><span style="color: red"></span>
                                    <p>{{ $farmer->address ?? "Data Not Found"}}</p>

                                </div>


                            </div>


                            {{-- -------------------------------------- Farmer Information -------------------------------------- --}}

                            {{-- ------------------------------------------------------ Insurance Acception or Rejection ----------------------------------------------------- --}}

                            <hr>

                            @if($insurance_request_info->insurance_request_status == "pending")
                                <div>
                                    <a href="{{ route('company_insurance_acceptance',[$insurance_request_info->id,'a']) }}"
                                       class="btn btn-success">Accept</a>
                                    <a href="{{ route('company_insurance_acceptance',[$insurance_request_info->id,'r']) }}"
                                       class="btn btn-danger">Reject</a>
                                </div>
                            @endif




                            {{-- ------------------------------------------------------- Insurance Acception or Rejection ----------------------------------------------------- --}}


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
