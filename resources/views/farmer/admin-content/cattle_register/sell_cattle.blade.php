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
                                Sell Animal - Farmer
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
                        <div class="card-header">Sell Animal</div>
                        <div class="card-body">


                            @if(\App\Models\Farm_management\sell\Sell_animal_information::where('cattle_id',$animal->id)->count() < 1)
                                <div>

                                    {{-- ----------------------------------------------- Sell Cattle ----------------------------------------------- --}}

                                    {{--                            <h4>Animal  : {{ $animal }}</h4>--}}
                                    <h5>Animal Name : {{ $animal->cattle_name }}</h5>
                                    <h5>Animal Type : {{ $animal->animal_type }}</h5>
                                    <h5>Animal Sum Insured : {{ $animal->sum_insured }} TK</h5>

                                    <hr>


                                    <form action="{{ route('farmer_animal_sell') }}" method="post"
                                          enctype="multipart/form-data">
                                        {{ csrf_field() }}

                                        <div class="row">

                                            <div class="col-md-4">
                                                <label class="small mb-1" for="inputLastName"
                                                >Enter Percentage</label
                                                ><span style="color: red">*</span>

                                                <input
                                                    class="form-control "
                                                    id="sell_percentage"
                                                    type="number"
                                                    placeholder=""
                                                    value=""
                                                    name="selling_percentage"
                                                    min="1"
                                                    max="100"
                                                    required
                                                    pattern="[1-9][0-9]?|100"
                                                    oninput="validateInput()"
                                                />


                                                <div class="mt-3">
                                                    <h2>Calculated cost : <span id="calculated_cost">0</span>Tk</h2>
                                                </div>


                                                <input type="hidden" id="calculated_input" name="selling_cost">
                                                <input type="hidden" name="cattle_id" value="{{ $animal->id }}">

                                                <div class="mt-3">
                                                    <input type="submit" class="btn btn-danger" value="Sell Animal">
                                                </div>


                                            </div>


                                        </div>


                                    </form>

                                    <script>
                                        function calculateCost() {
                                            // Get the input value
                                            var sellPercentage = parseFloat(document.getElementById('sell_percentage').value);

                                            // Check if the input is a valid number
                                            if (!isNaN(sellPercentage)) {
                                                // Assuming $animal->sum_insured is predefined
                                                var sumInsured = {{ $animal->sum_insured }}; // Replace 100 with $animal->sum_insured

                                                // Calculate the cost
                                                var calculatedCost = sumInsured + (sumInsured * (sellPercentage / 100));

                                                // Update the calculated cost display
                                                document.getElementById('calculated_cost').innerText = calculatedCost.toFixed(0);

                                                // Populate the input with the calculated cost
                                                document.getElementById('calculated_input').value = calculatedCost.toFixed(0);
                                            } else {
                                                // If input is not a valid number, display default value or handle as needed
                                                document.getElementById('calculated_cost').innerText = "0"; // Display default value
                                                document.getElementById('calculated_input').value = ""; // Clear input value
                                            }
                                        }

                                        function validateInput() {
                                            var sellPercentageInput = document.getElementById('sell_percentage');
                                            // Replace any non-numeric characters or numbers out of range with an empty string
                                            sellPercentageInput.value = sellPercentageInput.value.replace(/[^0-9]/g, '');

                                            // Ensure the value is within the range of 1 to 100
                                            var sellPercentage = parseInt(sellPercentageInput.value);
                                            if (sellPercentage < 1) {
                                                sellPercentageInput.value = '1';
                                            } else if (sellPercentage > 100) {
                                                sellPercentageInput.value = '100';
                                            }

                                            // Now, you can proceed with the calculation
                                            calculateCost();
                                        }
                                    </script>


                                    {{-- ----------------------------------------------- Sell Cattle ----------------------------------------------- --}}


                                </div>
                            @else
                                <div class="alert alert-danger">
                                    Animal already sold
                                </div>
                            @endif





                        </div>


                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
