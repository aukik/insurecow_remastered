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
                                Farmer Profile Update - Farmer
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

                    @if(session('update'))
                        <div class="alert alert-success" role="alert">{{ session('update') }}</div>

                    @endif

                    <div class="card mb-4">
                        <div class="card-header">Farmer Profile Creation</div>
                        <div class="card-body">

                            {{-- ---------------------------------------- Farmer Profile Creation ---------------------------------------- --}}


                            <form action="{{ route('farmer_profile.update', $profile->id) }}" method="post"
                                  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @method('put')
                                <!-- Form Group (username)-->

                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName"
                                        >Fathers Name</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="text"
                                            placeholder=""
                                            value="{{ $profile->fathers_name }}"
                                            name="fathers_name"

                                        />
                                    </div>

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName"
                                        >Mothers Name</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="text"
                                            placeholder=""
                                            value="{{ $profile->mothers_name }}"
                                            name="mothers_name"
                                        />
                                    </div>
                                </div>

                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName"
                                        >Present Address</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="text"
                                            placeholder=""
                                            value="{{ $profile->present_address }}"
                                            name="present_address"
                                        />
                                    </div>

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName"
                                        >Date of Birth</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="date"
                                            placeholder=""
                                            value="{{ $profile->dob }}"

                                            name="dob"
                                        />
                                    </div>
                                </div>

                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName"
                                        >NID</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="number"
                                            placeholder=""
                                            value="{{ $profile->nid }}"

                                            name="nid"
                                        />
                                    </div>

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName"
                                        >Source of Income</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="text"
                                            placeholder=""
                                            value="{{ $profile->source_of_income }}"

                                            name="source_of_income"
                                        />
                                    </div>
                                </div>

                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">

                                    <div class="col-md-12">
                                        <label class="small mb-1" for="inputLastName"
                                        >Bank Account No</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="text"
                                            placeholder=""
                                            value="{{ $profile->bank_account_no }}"

                                            name="bank_account_no"
                                        />
                                    </div>

                                </div>


                                <div class="row gx-3 mb-3">

                                    <div class="col-md-12">
                                        <label class="small mb-1" for="inputLastName"
                                        >Farmer Address</label
                                        >
                                        <textarea class="form-control"
                                                  name="farmer_address">{{ $profile->farmer_address }}</textarea>
                                    </div>
                                </div>


                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName"
                                        >Thana</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="text"
                                            placeholder=""
                                            value="{{ $profile->thana }}"

                                            name="thana"
                                        />
                                    </div>

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName"
                                        >Upazilla</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="text"
                                            placeholder=""
                                            value="{{ $profile->upazilla }}"

                                            name="upazilla"
                                        />
                                    </div>
                                </div>

                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName"
                                        >Union</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="text"
                                            placeholder=""
                                            value="{{ $profile->union }}"

                                            name="union"
                                        />
                                    </div>

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName"
                                        >City</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="text"
                                            placeholder=""
                                            value="{{ $profile->city }}"

                                            name="city"
                                        />
                                    </div>
                                </div>


                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName"
                                        >District</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="text"
                                            placeholder=""
                                            value="{{ $profile->district }}"

                                            name="district"
                                        />
                                    </div>

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName"
                                        >Zip Code</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="text"
                                            placeholder=""
                                            value="{{ $profile->zip_code }}"

                                            name="zip_code"
                                        />
                                    </div>
                                </div>


                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName"
                                        >Village</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="text"
                                            placeholder=""

                                            value="{{ $profile->village }}"

                                            name="village"
                                        />
                                    </div>

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName"
                                        >Loan Amount</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="number"
                                            placeholder=""

                                            value="{{ $profile->loan_amount }}"

                                            name="loan_amount"
                                        />
                                    </div>
                                </div>

                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName"
                                        >No of Livestock</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="text"
                                            placeholder=""

                                            value="{{ $profile->num_of_livestock }}"

                                            name="num_of_livestock"
                                        />
                                    </div>

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName"
                                        >Type of Livestock</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="text"
                                            placeholder=""

                                            value="{{ $profile->type_of_livestock }}"

                                            name="type_of_livestock"
                                        />
                                    </div>
                                </div>


                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">

{{--                                    <div class="col-md-6">--}}
{{--                                        <label class="small mb-1" for="inputLastName"--}}
{{--                                        >Sum Insured</label--}}
{{--                                        >--}}
{{--                                        <input--}}
{{--                                            class="form-control"--}}
{{--                                            id="inputLastName"--}}
{{--                                            type="text"--}}
{{--                                            placeholder=""--}}

{{--                                            value="{{ $profile->sum_insured }}"--}}

{{--                                            name="sum_insured"--}}
{{--                                        />--}}
{{--                                    </div>--}}

                                    <div class="col-md-12">
                                        <label class="small mb-1" for="inputLastName"
                                        >Nationality</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="text"
                                            placeholder=""

                                            value="{{ $profile->nationality }}"

                                            name="nationality"
                                        />
                                    </div>
                                </div>

                                <div class="form-control">
                                    <img src="{{ asset('storage/'.$profile->image) }}" style="width: 150px">
                                </div>

                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (organization name)-->
                                    <div class="col-md-12">
                                        <label class="small mb-1" for="inputOrgName"
                                        >Farmer Image</label
                                        >
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                </div>


                                <button class="btn btn-primary" type="submit">
                                    Update changes
                                </button>
                            </form>

                            {{-- ---------------------------------------- Farmer Profile Creation ---------------------------------------- --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
