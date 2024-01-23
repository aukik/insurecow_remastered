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
                                Bulk Insurance Request - Company
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
                        <div class="card-header">Bulk Insurance Request - Company</div>
                        <div class="card-body">



                            @if(session('success'))
                                <p class="alert alert-success">{{ session('success') }}</p>
                            @endif


                            <form action="{{ route('company.bulk_view_post') }}" method="post">
                                {{ csrf_field() }}

                                <div class="row">

                                    <div class="col-md-8">

                                        <div style="color: #0a3622; font-weight: bold">Please choose Farmers or animals for insurance</div>
                                        <hr style="color: #0a3622; font-weight: bold">

                                        {{--  -------------------- checkbox for animals and farmers --------------------  --}}

                                        <div>

                                            {{-- -------------------------------------------------------------- Total farmer list -------------------------------------------------------------- --}}

                                            <div class="row gx-3 mb-3 align-items-center">
                                                <div class="col-auto">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               id="check_all_checkbox_id"
                                                               name=""
                                                               value=""
                                                        >
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <label for="exampleFormControlSelect1">Check All</label>
                                                </div>
                                            </div>


                                            @foreach($modified_farmer_list as $farmer)
                                                <div class="row gx-3 mb-3 align-items-center">
                                                    <div class="col-auto">
                                                        <div class="form-check">
                                                            <input class="form-check-input farmer-checkbox"
                                                                   type="checkbox"
                                                                   id="farmer_checkbox_{{$farmer->id}}"
                                                                   name="farmer_checkbox[]"
                                                                   value="{{$farmer->id}}"
                                                            >
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <label
                                                            for="exampleFormControlSelect1">{{ $farmer->name }}</label>
                                                    </div>
                                                </div>

                                                {{-- ------------------------------- Cattle info -------------------------------  --}}

                                                <div class="row gx-3 mb-3 align-items-center cattle-info"
                                                     style="padding-left: 30px">
                                                    @foreach(\App\Models\CattleRegistration::where('user_id', $farmer->id)->get() as $cattle)

                                                        @php
                                                            $insured = \App\Models\Insured::where('cattle_id', $cattle->id)->orderBy('id', 'desc')->first();
                                                        @endphp

                                                        @if(!$insured || $insured->package_expiration_date < now())

                                                            <div class="row gx-3 mb-3 align-items-center"
                                                                 id="cattle_checkbox_div">
                                                                <div class="col-auto">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input cattle-checkbox"
                                                                               type="checkbox"
                                                                               id="cattle_checkbox_{{$cattle->id}}"
                                                                               name="cattle_checkbox[]"
                                                                               value="{{ $cattle->id }}"
                                                                        >
                                                                    </div>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <label
                                                                        for="exampleFormControlSelect1">{{ "Cattle Name: ".$cattle->cattle_name . " - Sum Insured: ".$cattle->sum_insured ."/-"}}</label>
                                                                </div>
                                                            </div>

                                                        @endif
                                                    @endforeach
                                                </div>

                                                {{-- ------------------------------- Cattle info -------------------------------  --}}

                                            @endforeach




                                            {{-- -------------------------------------------------------------- Total farmer list -------------------------------------------------------------- --}}

                                        </div>

                                        {{--  -------------------- checkbox for animals and farmers --------------------  --}}
                                    </div>

                                    <div class="col-md-4">
                                        {{--  -------------------- checkbox for animals and farmers --------------------  --}}
                                        <style>
                                            #insurance_cost_submit_block {
                                                display: none;
                                            }
                                        </style>

                                        <div id="insurance_cost_submit_block">


                                            <div style="color: #0a3622; font-weight: bold">Please click here to view Insurance Information</div>
                                            <hr style="color: #0a3622; font-weight: bold">


                                            <input type="hidden" name="package_id" value="{{ $package->id }}">
                                            <input type="submit" value="View Calculation" class="btn btn-success">
                                        </div>


                                        {{--  -------------------- checkbox for animals and farmers --------------------  --}}
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script>

            {{--  ----------------------- All checkbox will be checked or unchecked ----------------------- --}}

            // Your existing JavaScript code for farmer and cattle checkboxes

            // Add event listener for "Check All" checkbox
            const checkAllCheckbox = document.getElementById('check_all_checkbox_id');
            checkAllCheckbox.addEventListener('change', function () {
                // Set the state of all farmer checkboxes
                farmerCheckboxes.forEach(farmerCheckbox => {
                    farmerCheckbox.checked = this.checked;
                });

                // Set the state of all cattle checkboxes
                cattleCheckboxes.forEach(cattleCheckbox => {
                    cattleCheckbox.checked = this.checked;
                });

                updateInsuranceCostSubmitBlockDisplay();
            });


            {{--  ----------------------- All checkbox will be checked or unchecked ----------------------- --}}

            {{--  ----------------------- Iteration  ----------------------- --}}


            // Get all farmer and cattle checkboxes
            const farmerCheckboxes = document.querySelectorAll('.farmer-checkbox');
            const cattleCheckboxes = document.querySelectorAll('.cattle-checkbox');

            const insurance_cost_submit_block = document.querySelector('#insurance_cost_submit_block');

            farmerCheckboxes.forEach(farmerCheckbox => {
                farmerCheckbox.addEventListener('change', function () {
                    // Get the corresponding cattle info div
                    const cattleInfo = this.closest('.row').nextElementSibling;

                    // Set all cattle checkboxes inside the cattle info div to the state of the farmer checkbox
                    const cattleCheckboxesInsideInfo = cattleInfo.querySelectorAll('.cattle-checkbox');
                    cattleCheckboxesInsideInfo.forEach(cattleCheckbox => {
                        cattleCheckbox.checked = this.checked;
                    });

                    // Update the display of insurance_cost_submit_block
                    updateInsuranceCostSubmitBlockDisplay();
                });
            });

            // Add event listener for cattle checkboxes
            cattleCheckboxes.forEach(cattleCheckbox => {
                cattleCheckbox.addEventListener('change', function () {
                    // Get the corresponding farmer checkbox
                    const farmerCheckbox = this.closest('.cattle-info').previousElementSibling.querySelector('.farmer-checkbox');

                    // If any cattle checkbox is checked, check the corresponding farmer checkbox
                    farmerCheckbox.checked = Array.from(cattleCheckboxes).some(cattle => cattle.checked);

                    // Update the display of insurance_cost_submit_block
                    updateInsuranceCostSubmitBlockDisplay();
                });
            });

            // Function to update the display of insurance_cost_submit_block
            function updateInsuranceCostSubmitBlockDisplay() {
                const anyCheckboxChecked = Array.from(farmerCheckboxes).some(farmer => farmer.checked) || Array.from(cattleCheckboxes).some(cattle => cattle.checked);
                insurance_cost_submit_block.style.display = anyCheckboxChecked ? 'block' : 'none';
            }
        </script>

    </main>

@endsection
