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
                                        ><span style="color: red">*</span>
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
                                        ><span style="color: red">*</span>
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
                                        ><span style="color: red">*</span>
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
                                        ><span style="color: red">*</span>
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
                                        ><span style="color: red">*</span>
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
                                        ><span style="color: red">*</span>
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
                                        ><span style="color: red">*</span>
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
                                        >Farm Address</label
                                        ><span style="color: red">*</span>
                                        <textarea class="form-control"
                                                  name="farmer_address">{{ $profile->farmer_address }}</textarea>
                                    </div>
                                </div>


                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName"
                                        >Thana</label
                                        ><span style="color: red">*</span>
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
                                        ><span style="color: red">*</span>
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
                                        ><span style="color: red">*</span>
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
                                        >Division</label
                                        ><span style="color: red">*</span>
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="text"
                                            placeholder=""
                                            value="{{ $profile->division }}"

                                            name="division"
                                        />
                                    </div>
                                </div>


                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName"
                                        >District</label
                                        ><span style="color: red">*</span>
                                        {{--                                        <input--}}
                                        {{--                                            class="form-control"--}}
                                        {{--                                            id="inputLastName"--}}
                                        {{--                                            type="text"--}}
                                        {{--                                            placeholder=""--}}
                                        {{--                                            value="{{ $profile->district }}"--}}

                                        {{--                                            name="district"--}}
                                        {{--                                        />--}}


                                        {{--   -------------------------------------------- District update -------------------------------------------- --}}

                                        <select class="form-control" name="district">
                                            <option value="Bagerhat"
                                                    @if($profile->district == "Bagerhat") selected @endif>Bagerhat
                                            </option>
                                            <option value="Bandarban"
                                                    @if($profile->district == "Bandarban") selected @endif>Bandarban
                                            </option>
                                            <option value="Barguna"
                                                    @if($profile->district == "Barguna") selected @endif>Barguna
                                            </option>
                                            <option value="Barisal"
                                                    @if($profile->district == "Barisal") selected @endif>Barisal
                                            </option>
                                            <option value="Bhola" @if($profile->district == "Bhola") selected @endif>
                                                Bhola
                                            </option>
                                            <option value="Bogura (formerly Bogra)"
                                                    @if($profile->district == "Bogura (formerly Bogra)") selected @endif>
                                                Bogura (formerly Bogra)
                                            </option>
                                            <option value="Brahmanbaria"
                                                    @if($profile->district == "Brahmanbaria") selected @endif>
                                                Brahmanbaria
                                            </option>
                                            <option value="Chandpur"
                                                    @if($profile->district == "Chandpur") selected @endif>Chandpur
                                            </option>
                                            <option value="Chapai Nawabganj"
                                                    @if($profile->district == "Chapai Nawabganj") selected @endif>Chapai
                                                Nawabganj
                                            </option>
                                            <option value="Chattogram (Chittagong)"
                                                    @if($profile->district == "Chattogram (Chittagong)") selected @endif>
                                                Chattogram (Chittagong)
                                            </option>
                                            <option value="Chuadanga"
                                                    @if($profile->district == "Chuadanga") selected @endif>Chuadanga
                                            </option>
                                            <option value="Comilla (Cumilla)"
                                                    @if($profile->district == "Comilla (Cumilla)") selected @endif>
                                                Comilla (Cumilla)
                                            </option>
                                            <option value="Cox's Bazar"
                                                    @if($profile->district == "Cox's Bazar") selected @endif>Cox's Bazar
                                            </option>
                                            <option value="Dhaka" @if($profile->district == "Dhaka") selected @endif>
                                                Dhaka
                                            </option>
                                            <option value="Dinajpur"
                                                    @if($profile->district == "Dinajpur") selected @endif>Dinajpur
                                            </option>
                                            <option value="Faridpur"
                                                    @if($profile->district == "Faridpur") selected @endif>Faridpur
                                            </option>
                                            <option value="Feni" @if($profile->district == "Feni") selected @endif>
                                                Feni
                                            </option>
                                            <option value="Gaibandha"
                                                    @if($profile->district == "Gaibandha") selected @endif>Gaibandha
                                            </option>
                                            <option value="Gazipur"
                                                    @if($profile->district == "Gazipur") selected @endif>Gazipur
                                            </option>
                                            <option value="Gopalganj"
                                                    @if($profile->district == "Gopalganj") selected @endif>Gopalganj
                                            </option>
                                            <option value="Habiganj"
                                                    @if($profile->district == "Habiganj") selected @endif>Habiganj
                                            </option>
                                            <option value="Jamalpur"
                                                    @if($profile->district == "Jamalpur") selected @endif>Jamalpur
                                            </option>
                                            <option value="Jashore (Jessore)"
                                                    @if($profile->district == "Jashore (Jessore)") selected @endif>
                                                Jashore (Jessore)
                                            </option>
                                            <option value="Jhalokati"
                                                    @if($profile->district == "Jhalokati") selected @endif>Jhalokati
                                            </option>
                                            <option value="Jhenaidah"
                                                    @if($profile->district == "Jhenaidah") selected @endif>Jhenaidah
                                            </option>
                                            <option value="Joypurhat"
                                                    @if($profile->district == "Joypurhat") selected @endif>Joypurhat
                                            </option>
                                            <option value="Khagrachari"
                                                    @if($profile->district == "Khagrachari") selected @endif>Khagrachari
                                            </option>
                                            <option value="Khulna" @if($profile->district == "Khulna") selected @endif>
                                                Khulna
                                            </option>
                                            <option value="Kishoreganj"
                                                    @if($profile->district == "Kishoreganj") selected @endif>Kishoreganj
                                            </option>
                                            <option value="Kushtia"
                                                    @if($profile->district == "Kushtia") selected @endif>Kushtia
                                            </option>
                                            <option value="Lakshmipur"
                                                    @if($profile->district == "Lakshmipur") selected @endif>Lakshmipur
                                            </option>
                                            <option value="Lalmonirhat"
                                                    @if($profile->district == "Lalmonirhat") selected @endif>Lalmonirhat
                                            </option>
                                            <option value="Madaripur"
                                                    @if($profile->district == "Madaripur") selected @endif>Madaripur
                                            </option>
                                            <option value="Magura" @if($profile->district == "Magura") selected @endif>
                                                Magura
                                            </option>
                                            <option value="Manikganj"
                                                    @if($profile->district == "Manikganj") selected @endif>Manikganj
                                            </option>
                                            <option value="Meherpur"
                                                    @if($profile->district == "Meherpur") selected @endif>Meherpur
                                            </option>
                                            <option value="Moulvibazar"
                                                    @if($profile->district == "Moulvibazar") selected @endif>Moulvibazar
                                            </option>
                                            <option value="Munshiganj"
                                                    @if($profile->district == "Munshiganj") selected @endif>Munshiganj
                                            </option>
                                            <option value="Mymensingh"
                                                    @if($profile->district == "Mymensingh") selected @endif>Mymensingh
                                            </option>
                                            <option value="Naogaon"
                                                    @if($profile->district == "Naogaon") selected @endif>Naogaon
                                            </option>
                                            <option value="Narail" @if($profile->district == "Narail") selected @endif>
                                                Narail
                                            </option>
                                            <option value="Narayanganj"
                                                    @if($profile->district == "Narayanganj") selected @endif>Narayanganj
                                            </option>
                                            <option value="Narsingdi"
                                                    @if($profile->district == "Narsingdi") selected @endif>Narsingdi
                                            </option>
                                            <option value="Natore" @if($profile->district == "Natore") selected @endif>
                                                Natore
                                            </option>
                                            <option value="Netrokona"
                                                    @if($profile->district == "Netrokona") selected @endif>Netrokona
                                            </option>
                                            <option value="Nilphamari"
                                                    @if($profile->district == "Nilphamari") selected @endif>Nilphamari
                                            </option>
                                            <option value="Noakhali"
                                                    @if($profile->district == "Noakhali") selected @endif>Noakhali
                                            </option>
                                            <option value="Pabna" @if($profile->district == "Pabna") selected @endif>
                                                Pabna
                                            </option>
                                            <option value="Panchagarh"
                                                    @if($profile->district == "Panchagarh") selected @endif>Panchagarh
                                            </option>
                                            <option value="Patuakhali"
                                                    @if($profile->district == "Patuakhali") selected @endif>Patuakhali
                                            </option>
                                            <option value="Pirojpur"
                                                    @if($profile->district == "Pirojpur") selected @endif>Pirojpur
                                            </option>
                                            <option value="Rajbari"
                                                    @if($profile->district == "Rajbari") selected @endif>Rajbari
                                            </option>
                                            <option value="Rajshahi"
                                                    @if($profile->district == "Rajshahi") selected @endif>Rajshahi
                                            </option>
                                            <option value="Rangamati"
                                                    @if($profile->district == "Rangamati") selected @endif>Rangamati
                                            </option>
                                            <option value="Rangpur"
                                                    @if($profile->district == "Rangpur") selected @endif>Rangpur
                                            </option>
                                            <option value="Satkhira"
                                                    @if($profile->district == "Satkhira") selected @endif>Satkhira
                                            </option>
                                            <option value="Shariatpur"
                                                    @if($profile->district == "Shariatpur") selected @endif>Shariatpur
                                            </option>
                                            <option value="Sherpur"
                                                    @if($profile->district == "Sherpur") selected @endif>Sherpur
                                            </option>
                                            <option value="Sirajganj"
                                                    @if($profile->district == "Sirajganj") selected @endif>Sirajganj
                                            </option>
                                            <option value="Sunamganj"
                                                    @if($profile->district == "Sunamganj") selected @endif>Sunamganj
                                            </option>
                                            <option value="Sylhet" @if($profile->district == "Sylhet") selected @endif>
                                                Sylhet
                                            </option>
                                            <option value="Tangail"
                                                    @if($profile->district == "Tangail") selected @endif>Tangail
                                            </option>
                                            <option value="Thakurgaon"
                                                    @if($profile->district == "Thakurgaon") selected @endif>Thakurgaon
                                            </option>
                                            <option value="Jamalpur"
                                                    @if($profile->district == "Jamalpur") selected @endif>Jamalpur
                                            </option>
                                        </select>

                                        {{--   -------------------------------------------- District update -------------------------------------------- --}}

                                    </div>

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName"
                                        >Zip Code</label
                                        ><span style="color: red">*</span>
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
                                        ><span style="color: red">*</span>
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
                                        ><span style="color: red">*</span>
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
                                        ><span style="color: red">*</span>
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
                                        ><span style="color: red">*</span>
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


                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName"
                                        >Nationality</label
                                        ><span style="color: red">*</span>
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="text"
                                            placeholder=""

                                            value="{{ $profile->nationality }}"

                                            name="nationality"
                                        />
                                    </div>

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName"
                                        >Bank Name Insured</label
                                        ><span style="color: red">*</span>
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="text"
                                            placeholder=""

                                            value="{{ $profile->bank_name_insured }}"

                                            name="bank_name_insured"
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
                                        ><span style="color: red">*</span>
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                </div>


                                <div class="form-control">
                                    <img src="{{ asset('storage/'.$profile->nid_front) }}" style="width: 150px">
                                </div>

                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (organization name)-->
                                    <div class="col-md-12">
                                        <label class="small mb-1" for="inputOrgName"
                                        >NID Front</label
                                        ><span style="color: red">*</span>
                                        <input type="file" class="form-control" name="nid_front">
                                    </div>
                                </div>

                                <div class="form-control">
                                    <img src="{{ asset('storage/'.$profile->nid_back) }}" style="width: 150px">
                                </div>

                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (organization name)-->
                                    <div class="col-md-12">
                                        <label class="small mb-1" for="inputOrgName"
                                        >NID Back</label
                                        ><span style="color: red">*</span>
                                        <input type="file" class="form-control" name="nid_back">
                                    </div>
                                </div>


                                <div class="form-control">
                                    <img src="{{ asset('storage/'.$profile->loan_investment) }}" style="width: 150px">
                                </div>

                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (organization name)-->
                                    <div class="col-md-12">
                                        <label class="small mb-1" for="inputOrgName"
                                        >Loan Investment</label
                                        ><span style="color: red">*</span>
                                        <input type="file" class="form-control" name="loan_investment">
                                    </div>
                                </div>

                                <div class="form-control">
                                    <img src="{{ asset('storage/'.$profile->chairman_certificate) }}"
                                         style="width: 150px">
                                </div>

                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (organization name)-->
                                    <div class="col-md-12">
                                        <label class="small mb-1" for="inputOrgName"
                                        >Chairman Certificate</label
                                        ><span style="color: red">*</span>
                                        <input type="file" class="form-control" name="chairman_certificate">
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
