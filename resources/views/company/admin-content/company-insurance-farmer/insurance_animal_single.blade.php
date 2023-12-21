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
                                Insurance For Animal - Company
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
                        <div class="card-header">Insurance For Animal - Company</div>
                        <div class="card-body">


                            @if(session('insured'))
                                <p class="alert alert-success">{{ session('insured') }}</p>
                            @endif
                            {{-- ---------------------------------------- Package Search ---------------------------------------- --}}


                            <form>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row gx-3 mb-3">

                                            <label class="small mb-1" for="inputLastName"
                                            >Select Farmer</label
                                            >

                                            <select class="form-control" id="farmer_list">
                                                <option disabled selected>Select Farmer</option>
                                                @foreach($farmer_list as $farmer)
                                                    <option value="{{ $farmer->id }}">{{ $farmer->name }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="row gx-3 mb-3">
                                            <label class="small mb-1" for="inputLastName"
                                            >Select Animal</label
                                            >
                                            <select class="form-control" id="animal_list"
                                                    name="cattle_info">
                                                <option disabled selected>Select Cattle Data</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">

                                        <label class="small mb-1" for="inputLastName"
                                        >Insurance Period</label
                                        >

                                        <input class="form-control" value="{{ $package->insurance_period }}" readonly>
                                    </div>

                                    <div class="col-md-6">

                                        <label class="small mb-1" for="inputLastName"
                                        >Cattle Sum Insured</label
                                        >

                                        <input class="form-control" readonly id="cattle_sum_insurance">
                                    </div>

                                </div>

                                <br>

                                <div class="row">
                                    <div class="col-md-6">

                                        <label class="small mb-1" for="inputLastName"
                                        >Insurance Price</label
                                        >

                                        <input class="form-control" readonly id="cattle_insurance_price">
                                    </div>
                                </div>

                                <br>

{{--                                <p>{{ $package }}</p>--}}

                                <button class="btn btn-primary" type="submit">
                                    Request For Insurance
                                </button>
                            </form>


                            {{-- ---------------------------------------- Package Search ---------------------------------------- --}}


                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- -------------------------------------------------------------- First input box script -------------------------------------------------------------- --}}

        <!-- Vanilla JavaScript code -->
        <script>
            // Wait for the document to be ready
            document.addEventListener('DOMContentLoaded', function () {
                // Get the select element
                var farmerList = document.getElementById('farmer_list');

                // Attach change event listener to the select element
                farmerList.addEventListener('change', function () {
                    // Get the selected option value
                    var selectedValue = farmerList.value;

                    // ---------------------------------------------- Farmer Id value ----------------------------------------------


                    // Make the AJAX request with the selectedValue as a parameter
                    window.axios.get(location.origin + "/company/farmers_cattle_list_filter/" + selectedValue)
                        .then(res => {
                            // Assuming res.data is the array of cattle objects
                            var cattleList = res.data.data;

                            // Get the select element
                            var selectElement = document.getElementById('animal_list');

                            // Clear existing options
                            selectElement.innerHTML = "";

                            // Create a new option element
                            var defaultOption = document.createElement('option');
                            defaultOption.value = ""; // You can set the value if needed
                            defaultOption.text = 'Select Cattle Data';
                            defaultOption.disabled = true;
                            defaultOption.selected = true;

                            // Append the new option to the select element
                            selectElement.appendChild(defaultOption);

                            // Create an option for each cattle in the response
                            cattleList.forEach(function (cattle) {

                                var option = document.createElement('option');
                                option.value = cattle.id; // Set the value of the option
                                option.text = cattle.cattle_name; // Set the text of the option
                                selectElement.appendChild(option); // Append the option to the select element
                            });
                        })
                        .catch(error => {
                            console.error('Error fetching cattle list:', error);
                        });

                    // ---------------------------------------------- Farmer Id value ----------------------------------------------

                });
            });
        </script>

        {{-- -------------------------------------------------------------- First input box script -------------------------------------------------------------- --}}

        {{-- -------------------------------------------------------------- second input box script -------------------------------------------------------------- --}}

        <script>

            let animal_list_select = document.querySelector("#animal_list");

            let cattle_sum_insurance = document.querySelector("#cattle_sum_insurance");
            let cattle_insurance_price = document.querySelector("#cattle_insurance_price");


            animal_list_select.addEventListener("change", function () {
                // Get the selected option
                let selectedOption = animal_list_select.options[animal_list_select.selectedIndex];

                // Log the selected data to the console
                // console.log("Selected Animal Data:", selectedOption.value);


                window.axios.get(location.origin + "/company/farmer_insurance_calculation/" + selectedOption.value + "/" + "{{ $package->id }}").then(res => {
                    console.log(res);

                    cattle_sum_insurance.value = res.data.sum_insured;
                    cattle_insurance_price.value = res.data.insurance_cost;
                });
            });

        </script>

        {{-- -------------------------------------------------------------- second input box script -------------------------------------------------------------- --}}

    </main>

@endsection
