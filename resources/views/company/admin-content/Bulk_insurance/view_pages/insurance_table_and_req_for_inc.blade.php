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
                                Bulk Insurance - Company
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
                        <div class="card-header">Bulk Insurance - Company</div>
                        <div class="card-body">


                            @if(session('success'))
                                <p class="alert alert-success">{{ session('success') }}</p>
                            @endif


                            {{--  ------------------------- Expense Structure ------------------------- --}}

                            <h4>Cattle List - For Insurance</h4>
                            <hr>

                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Cattle Name</th>
                                    <th>Farmer Name</th>
                                    <th>Sum Insured</th>
                                    <th>Insured Cost</th>
                                </tr>
                                </thead>

                                <tbody>


                                <?php $id = 0; ?>
                                <?php $total_sum_of_insurance = 0 ?>


                                @foreach($cattle_data as $data)

                                    <tr style="font-weight: bold">
                                        <td>{{ $id += 1 }}</td>
                                        <td>{{ $data->cattle_name }}</td>
                                        <td>{{ \App\Models\User::find($data->user_id)->name ?? "Name not found" }}</td>
                                        <td>{{ $data->sum_insured }}/-</td>

                                        <td style="color: green">{{ $insurance_val = round(\App\Models\User::calculateTotalCost($data->sum_insured,$package->rate,$package->discount,$package->vat)) ?? 0 }}/-
                                        </td>

                                            <?php $total_sum_of_insurance += $insurance_val ?>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>


                            <p style="font-weight: bold; color: green">Total Insurance Cost : {{ $total_sum_of_insurance }}/-</p>


                            <form action="{{ route('company.request_for_bulk_insurance') }}" method="post">
                                {{ csrf_field() }}

                                {{--  ---------------- cattle data ---------------- --}}

                                <input type="hidden" value="{{ $cattle_checkbox_data }}" name="cattle_checkbox_data"><br>

                                {{--  ---------------- farmer data ---------------- --}}

                                <input type="hidden" value="{{ $farmer_checkbox_data }}" name="farmer_checkbox_data"><br>

                                {{--  ---------------- Insruance Cost ---------------- --}}

                                <input type="hidden" value="{{ $total_sum_of_insurance }}" name="insurance_cost"><br>

                                {{--  ---------------- Package Id ---------------- --}}

                                <input type="hidden" value="{{ $package->id }}" name="package_id"><br>


                                <input type="submit" class="btn btn-success" value="Request for insurance">


                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>


    </main>

@endsection
