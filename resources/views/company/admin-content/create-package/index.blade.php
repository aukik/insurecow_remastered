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
                                Create Package - Company
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
                        <div class="card-header">Register Field Agent / Farmer - Company</div>
                        <div class="card-body">

                            {{-- ---------------------------------------- Register Company/NGO/Bank  ---------------------------------------- --}}

                            @if(session('register'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('register') }}
                                </div>
                            @endif


                            <form action="{{ route('package.store') }}" method="post"
                                  enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="row gx-3 mb-3">
                                    <div class="col-md-12">
                                        <label class="small mb-1" for="inputLastName"
                                        >Package Name</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="text"
                                            placeholder="Enter Package Name"
                                            value=""
                                            name="package_name"
                                        />
                                    </div>
                                </div>

                                <div class="row gx-3 mb-3">
                                    <div class="col-md-12">
                                        <label class="small mb-1" for="inputLastName"
                                        >Insurance Period</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="text"
                                            placeholder="Enter Insurance Period"
                                            value=""
                                            name="insurance_period"
                                        />
                                    </div>
                                </div>


                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->

                                    <!-- Form Group (last name)-->
                                    <div class="col-md-12">
                                        <label class="small mb-1" for="inputLastName"
                                        >Coverage</label>

                                        <select class="form-control" id="exampleFormControlSelect2" name="coverage">
                                            <option value="ac">Accidental/Diseases Mortality</option>
                                            <option value="fl">Flood cyclonic coverage</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row gx-3 mb-3">
                                    <div class="col-md-12">
                                        <label class="small mb-1" for="inputLastName"
                                        >Lowest Amount</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="text"
                                            placeholder="Enter Lowest Amount"
                                            value=""
                                            name="lowest_amount"
                                        />
                                    </div>
                                </div>

                                <div class="row gx-3 mb-3">
                                    <div class="col-md-12">
                                        <label class="small mb-1" for="inputLastName"
                                        >Highest Amount</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="text"
                                            placeholder="Enter Highest Amount"
                                            value=""
                                            name="highest_amount"
                                        />
                                    </div>
                                </div>


                                <div class="row gx-3 mb-3">
                                    <div class="col-md-12">
                                        <label class="small mb-1" for="inputLastName"
                                        >Quotation</label
                                        >
                                        <textarea class="form-control" rows="40" name="quotation"></textarea>

                                    </div>
                                </div>


                                <button class="btn btn-primary" type="submit">
                                    Save changes
                                </button>
                            </form>

                            {{-- ---------------------------------------- Register Company/NGO/Bank ---------------------------------------- --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
