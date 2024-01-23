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
                        <div class="card-header">Create Package - Company</div>
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
                                    <div class="col-md-6">
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

                                        @error('package_name')
                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                                        @enderror

                                    </div>

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName"
                                        >Specific Policy for Package [ PDF File ]</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="file"
                                            placeholder="Enter Package Name"
                                            value=""
                                            name="policy"
                                        />

                                        @error('policy')
                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row gx-3 mb-3">
                                    <div class="col-md-12">
                                        <label class="small mb-1" for="inputLastName"
                                        >Insurance Period</label
                                        >
                                        <select class="form-select" name="insurance_period">
                                            <option value="0.5">6 months</option>
                                            <option value="1">1 Year</option>
                                            <option value="1.5">1 Year 5 months</option>
                                            <option value="2">2 Years</option>
                                            <option value="2.5">2 Year 5 months</option>
                                            <option value="3">3 Years</option>
                                        </select>
                                    </div>

                                    @error('insurance_period')
                                    <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row gx-3 mb-3">

                                    <div class="col-md-12">
                                        <label class="small mb-1" for="inputLastName"
                                        >Coverage</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="text"
                                            placeholder="Enter coverage info"
                                            value=""
                                            step="0.1"
                                            name="coverage"
                                        />

                                        @error('coverage')
                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                                        @enderror
                                    </div>

{{--                                    <div class="col-md-12">--}}
{{--                                        <label class="small mb-1" for="inputLastName"--}}
{{--                                        >Coverage [ Can be selected multiple ]</label>--}}

{{--                                        <select class="form-control" id="exampleFormControlSelect2" name="coverage[]"--}}
{{--                                                multiple>--}}
{{--                                            <option value="ac">Accidental/Diseases Mortality</option>--}}
{{--                                            <option value="fl">Flood cyclonic coverage</option>--}}
{{--                                            <option value="er">Earthquake coverage</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
                                </div>


                                <div class="row gx-3 mb-3">
                                    <div class="col-md-4">
                                        <label class="small mb-1" for="inputLastName"
                                        >OFF %</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="number"
                                            placeholder="Enter discount rate"
                                            value=""
                                            name="discount"
                                        />

                                        @error('discount')
                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label class="small mb-1" for="inputLastName"
                                        >CTL %</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="number"
                                            placeholder="Enter Rate Percentage"
                                            value=""
                                            name="rate"
                                        />

                                        @error('rate')
                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label class="small mb-1" for="inputLastName"
                                        >Vat %</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="number"
                                            placeholder="Enter Vat Percentage"
                                            value=""
                                            name="vat"
                                        />

                                        @error('vat')
                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row gx-3 mb-3">
                                    <div class="col-md-12">
                                        <label class="small mb-1" for="inputLastName"
                                        >Quotation / Description About The Package</label
                                        >
                                        <textarea class="form-control textarea" rows="40" name="quotation"></textarea>

                                        @error('quotation')
                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                                        @enderror
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
