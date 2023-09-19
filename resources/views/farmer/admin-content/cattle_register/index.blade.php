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
                                Cattle Registration - Farmer
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
                        <div class="card-header">Cattle Registration</div>
                        <div class="card-body">

                            {{-- ---------------------------------------- Farmer Cow Registration ---------------------------------------- --}}

                            @if(session('register'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('register') }}
                                </div>
                            @endif

                            <form action="{{ route('cattle_register.store') }}" method="post"
                                  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <!-- Form Group (username)-->

                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName"
                                        >Cattle Name</label
                                        >
                                        <input
                                            class="form-control "
                                            id="inputLastName"
                                            type="text"
                                            placeholder=""
                                            value="{{ old('cattle_name') }}"
                                            name="cattle_name"
                                        />

                                        @error('cattle_name')
                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName"
                                        >Cattle Breed</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="text"
                                            placeholder=""
                                            value="{{ old('cattle_breed') }}"
                                            name="cattle_breed"
                                        />

                                        @error('cattle_breed')
                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName"
                                        >Age</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="text"
                                            placeholder=""
                                            value="{{ old('age') }}"
                                            name="age"
                                        />

                                        @error('age')
                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName"
                                        >Cattle Color</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="text"
                                            placeholder=""
                                            value="{{ old('cattle_color') }}"
                                            name="cattle_color"
                                        />

                                        @error('cattle_color')
                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                                        @enderror
                                    </div>


                                </div>

                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">

                                    <div class="col-md-4">
                                        <label class="small mb-1" for="inputLastName"
                                        >Cattle Weight</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="text"
                                            placeholder=""
                                            value="{{ old('weight') }}"
                                            name="weight"
                                        />

                                        @error('weight')
                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="col-md-4">
                                        <label class="small mb-1" for="inputLastName"
                                        >Cattle Type</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="text"
                                            placeholder=""
                                            value="{{ old('cattle_type') }}"
                                            name="cattle_type"
                                        />

                                        @error('weight')
                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label class="small mb-1" for="inputLastName"
                                        >Sum Insured</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="number"
                                            placeholder=""
                                            value="{{ old('sum_insured') }}"
                                            name="sum_insured"
                                        />

                                        @error('sum_insured')
                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{--                                <div class="row gx-3 mb-3">--}}
                                {{--                                    <!-- Form Group (organization name)-->--}}
                                {{--                                    <div class="col-md-4">--}}
                                {{--                                        <label class="small mb-1" for="inputOrgName"--}}
                                {{--                                        >NID Front</label--}}
                                {{--                                        >--}}
                                {{--                                        <input type="file" class="form-control" name="nid_front">--}}

                                {{--                                        @error('nid_front')--}}
                                {{--                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>--}}
                                {{--                                        @enderror--}}
                                {{--                                    </div>--}}

                                {{--                                    <!-- Form Group (organization name)-->--}}
                                {{--                                    <div class="col-md-4">--}}
                                {{--                                        <label class="small mb-1" for="inputOrgName"--}}
                                {{--                                        >NID Back</label--}}
                                {{--                                        >--}}
                                {{--                                        <input type="file" class="form-control" name="nid_back">--}}

                                {{--                                        @error('nid_back')--}}
                                {{--                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>--}}
                                {{--                                        @enderror--}}
                                {{--                                    </div>--}}

                                {{--                                    <!-- Form Group (organization name)-->--}}
                                {{--                                    <div class="col-md-4">--}}
                                {{--                                        <label class="small mb-1" for="inputOrgName"--}}
                                {{--                                        >Chairman Certification</label--}}
                                {{--                                        >--}}
                                {{--                                        <input type="file" class="form-control" name="chairman_certificate">--}}

                                {{--                                        @error('chairman_certificate')--}}
                                {{--                                        <div class="alert alert-danger" style="margin-top: 10px">Chairman certification--}}
                                {{--                                            required--}}
                                {{--                                        </div>--}}
                                {{--                                        @enderror--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}

                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (organization name)-->
                                    {{--                                    <div class="col-md-4">--}}
                                    {{--                                        <label class="small mb-1" for="inputOrgName"--}}
                                    {{--                                        >Loan / Investment documents</label--}}
                                    {{--                                        >--}}
                                    {{--                                        <input type="file" class="form-control" name="loan_investment">--}}

                                    {{--                                        @error('loan_investment')--}}
                                    {{--                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>--}}
                                    {{--                                        @enderror--}}
                                    {{--                                    </div>--}}


                                    <div class="col-md-4">
                                        <label class="small mb-1" for="inputOrgName"
                                        >Chairman Certification</label
                                        >
                                        <input type="file" class="form-control" name="chairman_certificate">

                                        @error('chairman_certificate')
                                        <div class="alert alert-danger" style="margin-top: 10px">Chairman certification
                                            required
                                        </div>
                                        @enderror
                                    </div>


                                    <!-- Form Group (organization name)-->
                                    <div class="col-md-4">
                                        <label class="small mb-1" for="inputOrgName"
                                        >Cattle Left Side</label
                                        >
                                        <input type="file" class="form-control" name="left_side">

                                        @error('left_side')
                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Form Group (organization name)-->
                                    <div class="col-md-4">
                                        <label class="small mb-1" for="inputOrgName"
                                        >Cattle Right Side</label
                                        >
                                        <input type="file" class="form-control" name="right_side">

                                        @error('right_side')
                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row gx-3 mb-3">


                                    {{--  -------------********************************* Muzzle part -------------********************************* --}}

                                    <div class="col-md-4">
                                        <label class="small mb-1" for="inputOrgName"
                                        >Muzzle Of Cow</label
                                        >
                                        <input type="file" class="form-control" name="muzzle_of_cow"
                                               onchange="fetchFileData()" id="fileInput">

                                        @error('muzzle_of_cow')
                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    {{--  -------------********************************* Muzzle part -------------********************************* --}}

                                    <!-- Form Group (organization name)-->
                                    <div class="col-md-4">
                                        <label class="small mb-1" for="inputOrgName"
                                        >Special Marks</label
                                        >
                                        <input type="file" class="form-control" name="special_marks">

                                        @error('special_marks')
                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <!-- Form Group (organization name)-->
                                    <div class="col-md-4">
                                        <label class="small mb-1" for="inputOrgName"
                                        >Cow With Owner</label
                                        >
                                        <input type="file" class="form-control" name="cow_with_owner">

                                        @error('cow_with_owner')
                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{--                                    <div class="col-md-4">--}}
                                    {{--                                        <label class="small mb-1" for="inputLastName"--}}
                                    {{--                                        >Current Price</label--}}
                                    {{--                                        >--}}
                                    {{--                                        <input--}}
                                    {{--                                            class="form-control"--}}
                                    {{--                                            id="inputLastName"--}}
                                    {{--                                            type="number"--}}
                                    {{--                                            placeholder=""--}}
                                    {{--                                            value="{{ old('current_price') }}"--}}
                                    {{--                                            name="current_price"--}}
                                    {{--                                        />--}}

                                    {{--                                        @error('current_price')--}}
                                    {{--                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>--}}
                                    {{--                                        @enderror--}}
                                    {{--                                    </div>--}}

                                </div>


                                <div class="row gx-3 mb-3">


                                    <!-- Form Group (organization name)-->


                                    {{--                                    <div class="col-md-4">--}}
                                    {{--                                        <label class="small mb-1" for="inputLastName"--}}
                                    {{--                                        >Bank Name Insured</label--}}
                                    {{--                                        >--}}
                                    {{--                                        <input--}}
                                    {{--                                            class="form-control"--}}
                                    {{--                                            id="inputLastName"--}}
                                    {{--                                            type="text"--}}
                                    {{--                                            placeholder=""--}}
                                    {{--                                            value="{{ old('bank_name_insured') }}"--}}
                                    {{--                                            name="bank_name_insured"--}}
                                    {{--                                        />--}}

                                    {{--                                        @error('bank_name_insured')--}}
                                    {{--                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>--}}
                                    {{--                                        @enderror--}}
                                    {{--                                    </div>--}}

                                    {{--                                    <div class="col-md-4">--}}
                                    {{--                                        <label class="small mb-1" for="inputLastName"--}}
                                    {{--                                        >Bank Account No</label--}}
                                    {{--                                        >--}}
                                    {{--                                        <input--}}
                                    {{--                                            class="form-control"--}}
                                    {{--                                            id="inputLastName"--}}
                                    {{--                                            type="text"--}}
                                    {{--                                            placeholder=""--}}
                                    {{--                                            value="{{ old('bank_account_no') }}"--}}
                                    {{--                                            name="bank_account_no"--}}
                                    {{--                                        />--}}

                                    {{--                                        @error('bank_account_no')--}}
                                    {{--                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>--}}
                                    {{--                                        @enderror--}}
                                    {{--                                    </div>--}}

                                </div>

                                {{--                                <p class="muzzle_checking_text" style="color: red">Muzzle Checking in progress</p>--}}
                                {{--                                <br><br>--}}

                                <button class="btn btn-primary cattle_register_button" type="submit">
                                    Register cattle
                                </button>

                            </form>

                            {{-- ---------------------------------------- Farmer Cow Registration ---------------------------------------- --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
