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


                            {{-- ----------------------------------------------- Sell Cattle ----------------------------------------------- --}}

                            {{--                            <h4>Animal  : {{ $animal }}</h4>--}}
                            <h5>Animal Name : {{ $animal->cattle_name }}</h5>
                            <h5>Animal Type : {{ $animal->animal_type }}</h5>
                            <h5>Animal Sum Insured : {{ $animal->sum_insured }} TK</h5>

                            <hr>


                            <form>
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
                                            name=""
                                            min="1"
                                            max="100"
                                            required
                                        />


                                        <div class="mt-3">
                                            <h2>Calculated cost : <span id="calculated_cost">100</span>Tk</h2>
                                        </div>

                                        <div class="mt-3">
                                            <input type="submit" class="btn btn-danger" value="Sell Animal">
                                        </div>

                                    </div>


                                </div>


                            </form>


                            {{-- ----------------------------------------------- Sell Cattle ----------------------------------------------- --}}


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
