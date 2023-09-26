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
                                Farmer Profile Creation - Farmer
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

                    <div id="app">
                        <div class="card mb-4">
                            <div class="card-header">Farmer Profile Creation</div>
                            <div class="card-body">

                                {{-- ---------------------------------------- Farmer Profile Creation ---------------------------------------- --}}


                                <form action="{{ route('farmer_profile.store') }}" method="post"
                                      enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <!-- Form Group (username)-->

                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">

                                        <div class="col-md-4">
                                            <label class="small mb-1" for="inputLastName"
                                            >Fathers Name</label
                                            ><span style="color: red">*</span>
                                            <input
                                                class="form-control"
                                                id="inputLastName"
                                                type="text"
                                                placeholder=""
                                                value="{{ old('fathers_name') }}"
                                                name="fathers_name"

                                            />
                                        </div>

                                        <div class="col-md-4">
                                            <label class="small mb-1" for="inputLastName"
                                            >Mothers Name</label
                                            ><span style="color: red">*</span>
                                            <input
                                                class="form-control"
                                                id="inputLastName"
                                                type="text"
                                                placeholder=""
                                                value="{{ old('mothers_name') }}"
                                                name="mothers_name"
                                            />
                                        </div>

                                        <div class="col-md-4">
                                            <label class="small mb-1" for="inputLastName"
                                            >Present Address</label
                                            ><span style="color: red">*</span>
                                            <input
                                                class="form-control"
                                                id="inputLastName"
                                                type="text"
                                                placeholder=""
                                                value="{{ old('present_address') }}"
                                                name="present_address"
                                            />
                                        </div>

                                    </div>

                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">


                                        <div class="col-md-4">
                                            <label class="small mb-1" for="inputLastName"
                                            >Date of Birth</label
                                            ><span style="color: red">*</span>
                                            <input
                                                class="form-control"
                                                id="inputLastName"
                                                type="date"
                                                placeholder=""
                                                value="{{ old('dob') }}"
                                                name="dob"
                                            />
                                        </div>

                                        <div class="col-md-4">
                                            <label class="small mb-1" for="inputLastName"
                                            >NID</label
                                            ><span style="color: red">*</span>
                                            <input
                                                class="form-control"
                                                id="inputLastName"
                                                type="number"
                                                placeholder=""
                                                value="{{ old('nid') }}"
                                                name="nid"
                                            />
                                        </div>

                                        <div class="col-md-4">
                                            <label class="small mb-1" for="inputLastName"
                                            >Source of Income</label
                                            ><span style="color: red">*</span>
                                            <input
                                                class="form-control"
                                                id="inputLastName"
                                                type="text"
                                                placeholder=""
                                                value="{{ old('source_of_income') }}"
                                                name="source_of_income"
                                            />
                                        </div>
                                    </div>


                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">


                                        <div class="col-md-4">
                                            <label class="small mb-1" for="inputLastName"
                                            >Division</label
                                            ><span style="color: red">*</span>
                                            <div>
                                                <select class="form-control" name="division" id="division"
                                                        @change="onSelectDivision" v-model="selectedDivision">
                                                    <option value="" disabled selected>Select a division</option>
                                                    <option :value="item.division" v-for="item in division_data_array">
                                                        @{{ item.division }}
                                                    </option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-md-4">
                                            <label class="small mb-1" for="inputLastName"
                                            >District</label
                                            ><span style="color: red">*</span>

                                            <div>
                                                <select class="form-control" name="district" id="district"
                                                        @change="onSelectDistrict" v-model="selectedDistrict">
                                                    <option value="" disabled selected>Select a district</option>
                                                    <option :value="item2.district"
                                                            v-for="item2 in district_data_array">
                                                        @{{ item2.district }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="small mb-1" for="inputLastName"
                                            >Upazilla</label
                                            ><span style="color: red">*</span>


                                            <div>
                                                <select class="form-control" name="upazilla" id="upazilla"
                                                        @change="onSelectUpazilla">
                                                    <option value="" disabled selected>Select Upazilla</option>
                                                    <option :value="item3" v-for="item3 in upazilla_data_array">
                                                        @{{ item3 }}
                                                    </option>
                                                </select>
                                            </div>

                                        </div>


                                    </div>

                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">

                                        <div class="col-md-4">
                                            <label class="small mb-1" for="inputLastName"
                                            >Thana</label
                                            ><span style="color: red">*</span>
                                            <input
                                                class="form-control"
                                                id="inputLastName"
                                                type="text"
                                                placeholder=""
                                                value="{{ old('thana') }}"
                                                name="thana"
                                                v-model="thana"
                                            />
                                        </div>


                                        <div class="col-md-4">
                                            <label class="small mb-1" for="inputLastName"
                                            >Union</label
                                            ><span style="color: red">*</span>
                                            <input
                                                class="form-control"
                                                id="inputLastName"
                                                type="text"
                                                placeholder=""
                                                value="{{ old('union') }}"
                                                name="union"
                                                v-model="union"
                                            />
                                        </div>

                                        <div class="col-md-4">
                                            <label class="small mb-1" for="inputLastName"
                                            >Zip Code</label
                                            ><span style="color: red"></span>
                                            <input
                                                class="form-control"
                                                id="inputLastName"
                                                type="text"
                                                placeholder=""
                                                value="{{ old('zip_code') }}"
                                                name="zip_code"
                                            />
                                        </div>

                                    </div>


                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">


                                        <div class="col-md-4">
                                            <label class="small mb-1" for="inputLastName"
                                            >Bank Account No</label
                                            ><span style="color: red">*</span>
                                            <input
                                                class="form-control"
                                                id="inputLastName"
                                                type="text"
                                                placeholder=""
                                                value="{{ old('bank_account_no') }}"
                                                name="bank_account_no"
                                            />
                                        </div>
                                        <div class="col-md-4">
                                            <label class="small mb-1" for="inputLastName"
                                            >Farm Address</label
                                            ><span style="color: red">*</span>
                                            <textarea class="form-control"
                                                      name="farmer_address"
                                                      rows="1">{{ old('bank_account_no') }}</textarea>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="small mb-1" for="inputLastName"
                                            >Village</label
                                            ><span style="color: red">*</span>
                                            <input
                                                class="form-control"
                                                id="inputLastName"
                                                type="text"
                                                placeholder=""
                                                value="{{ old('village') }}"
                                                name="village"
                                            />
                                        </div>

                                    </div>


                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">


                                        <div class="col-md-4">
                                            <label class="small mb-1" for="inputLastName"
                                            >Loan Amount</label
                                            ><span style="color: red"></span>
                                            <input
                                                class="form-control"
                                                id="inputLastName"
                                                type="number"
                                                placeholder=""
                                                value="{{ old('loan_amount') }}"
                                                name="loan_amount"
                                            />
                                        </div>

                                        <div class="col-md-4">
                                            <label class="small mb-1" for="inputLastName"
                                            >No of Livestock</label
                                            ><span style="color: red">*</span>
                                            <input
                                                class="form-control"
                                                id="inputLastName"
                                                type="text"
                                                placeholder=""
                                                value="{{ old('num_of_livestock') }}"
                                                name="num_of_livestock"
                                            />
                                        </div>

                                        <div class="col-md-4">
                                            <label class="small mb-1" for="inputLastName"
                                            >Type of Livestock</label
                                            ><span style="color: red">*</span>
                                            <input
                                                class="form-control"
                                                id="inputLastName"
                                                type="text"
                                                placeholder=""
                                                value="{{ old('type_of_livestock') }}"
                                                name="type_of_livestock"
                                            />
                                        </div>


                                    </div>


                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">


                                        <div class="col-md-12">
                                            <label class="small mb-1" for="inputLastName"
                                            >Nationality</label
                                            ><span style="color: red">*</span>
                                            <input
                                                class="form-control"
                                                id="inputLastName"
                                                type="text"
                                                placeholder=""
                                                value="{{ old('nationality') }}"
                                                name="nationality"
                                            />
                                        </div>
                                    </div>


                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (organization name)-->
                                        <div class="col-md-4">
                                            <label class="small mb-1" for="inputOrgName"
                                            >Farmers Image</label
                                            ><span style="color: red">*</span>
                                            <input type="file" class="form-control" name="image">
                                        </div>

                                        <div class="col-md-4">
                                            <label class="small mb-1" for="inputOrgName"
                                            >Loan / Investment documents</label
                                            ><span style="color: red"></span>
                                            <input type="file" class="form-control" name="loan_investment">

                                            @error('loan_investment')
                                            <div class="alert alert-danger"
                                                 style="margin-top: 10px">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label class="small mb-1" for="inputLastName"
                                            >Bank Name Insured</label
                                            ><span style="color: red">*</span>
                                            <input
                                                class="form-control"
                                                id="inputLastName"
                                                type="text"
                                                placeholder=""
                                                value="{{ old('bank_name_insured') }}"
                                                name="bank_name_insured"
                                            />

                                            @error('bank_name_insured')
                                            <div class="alert alert-danger"
                                                 style="margin-top: 10px">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>


                                    <div class="row gx-3 mb-3">

                                        <div class="col-md-4">
                                            <label class="small mb-1" for="inputOrgName"
                                            >NID Front</label
                                            ><span style="color: red">*</span>
                                            <input type="file" class="form-control" name="nid_front">

                                            @error('nid_front')
                                            <div class="alert alert-danger"
                                                 style="margin-top: 10px">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Form Group (organization name)-->
                                        <div class="col-md-4">
                                            <label class="small mb-1" for="inputOrgName"
                                            >NID Back</label
                                            ><span style="color: red">*</span>
                                            <input type="file" class="form-control" name="nid_back">

                                            @error('nid_back')
                                            <div class="alert alert-danger"
                                                 style="margin-top: 10px">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Form Group (organization name)-->
                                        <div class="col-md-4">
                                            <label class="small mb-1" for="inputOrgName"
                                            >Chairman Certificate</label
                                            ><span style="color: red">*</span>
                                            <input type="file" class="form-control" name="chairman_certificate">

                                            @error('chairman_certificate')
                                            <div class="alert alert-danger"
                                                 style="margin-top: 10px">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <button class="btn btn-primary" type="submit">
                                        Save changes
                                    </button>
                                </form>

                                {{-- ---------------------------------------- Farmer Profile Creation ---------------------------------------- --}}

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </main>


    {{--    ----------------------------------- District division selection ----------------------------------- --}}

    <script>
        // axios.get('https://bdapis.com/api/v1.1/divisions/').then(el => {
        //         console.log(el.data.data);
        // });

        var app = new Vue({
            el: '#app',
            data: {
                division_data_array: [],
                selectedDivision: '',
                district_data_array: [],
                upazilla_data_array: [],
                selectedDistrict: '',
                thana: '',
                union: '',
            },

            methods: {
                divisions() {
                    axios.get('https://bdapis.com/api/v1.1/divisions/').then(el => {

                        this.division_data_array = el.data.data;
                    });
                },
                onSelectDivision(event) {
                    const selectedValue = event.target.value;
                    if (selectedValue) {
                        // Perform actions with the selected value
                        // console.log("Selected Division:", selectedValue);

                        axios.get('https://bdapis.com/api/v1.1/division/' + selectedValue).then(el => {
                            this.district_data_array = el.data.data;
                        });

                    } else {
                        // Handle the case when the user selects the default option
                        console.log("Please select a division");
                    }
                },

                onSelectDistrict(event) {
                    const selectedValue = event.target.value;
                    if (selectedValue) {

                        // console.log(this.selectedDivision);

                        axios.get('https://bdapis.com/api/v1.1/division/' + this.selectedDivision).then(el => {
                            el.data.data.forEach(data => {
                                if (data.district === this.selectedDistrict) {
                                    this.upazilla_data_array = data.upazilla;
                                }
                            });
                        });


                    } else {
                        // Handle the case when the user selects the default option
                        console.log("Please select a District");
                    }
                }, onSelectUpazilla(event) {
                    const selectedValue = event.target.value;

                    if (selectedValue) {

                        // console.log(selectedValue);

                        this.thana = selectedValue;
                        this.union = selectedValue;

                    } else {
                        // Handle the case when the user selects the default option
                        console.log("Please select a District");
                    }

                }


            },

            mounted() {
                this.divisions();
            }
        })

    </script>

    {{--    ----------------------------------- District division selection ----------------------------------- --}}

@endsection
