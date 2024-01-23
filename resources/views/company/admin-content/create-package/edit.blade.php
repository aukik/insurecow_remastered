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
                                Update Package - Company
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
                        <div class="card-header">Update Package - Company</div>
                        <div class="card-body">

                            {{-- ---------------------------------------- Register Company/NGO/Bank  ---------------------------------------- --}}

                            @if(session('register'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('register') }}
                                </div>
                            @endif


                            <form action="{{ route('package.update', $package->id) }}" method="post"
                                  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @method('put')

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
                                            value="{{ $package->package_name }}"
                                            name="package_name"
                                        />
                                    </div>


                                </div>

                                <div class="row gx-3 mb-3">


                                    <div class="col-md-12">
                                        <label class="small mb-1" for="inputLastName"
                                        >Specific Policy for Package [ Upload if it needs to update ]</label
                                        >

                                        &nbsp; <a href="{{ asset('storage/'.$package->policy)  }}" style="color : red">View
                                            Uploaded Policy</a>

                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="file"
                                            placeholder="Enter Package Name"
                                            name="policy"
                                        />
                                    </div>
                                </div>

                                <div class="row gx-3 mb-3">
                                    <div class="col-md-12">
                                        <label class="small mb-1" for="inputLastName"
                                        >Insurance Period</label
                                        >
{{--                                        <input--}}
{{--                                            class="form-control"--}}
{{--                                            id="inputLastName"--}}
{{--                                            type="number"--}}
{{--                                            placeholder="Enter Insurance Period"--}}
{{--                                            value="{{ $package->insurance_period  }}"--}}
{{--                                            name="insurance_period"--}}
{{--                                            step="0.01"--}}
{{--                                        />--}}

                                        <select class="form-select" name="insurance_period">
                                            <option value="0.5" @if($package->insurance_period == 0.5) selected @endif>6 months</option>
                                            <option value="1" @if($package->insurance_period == 1) selected @endif>1 Year</option>
                                            <option value="1.5" @if($package->insurance_period == 1.5) selected @endif>1 Year 5 months</option>
                                            <option value="2" @if($package->insurance_period == 2) selected @endif>2 Years</option>
                                            <option value="2.5" @if($package->insurance_period == 2.5) selected @endif>2 Year 5 months</option>
                                            <option value="3" @if($package->insurance_period == 3) selected @endif>3 Years</option>
                                        </select>
                                    </div>


                                </div>

                                <div class="row gx-3 mb-3">


{{--                                    <div class="col-md-12">--}}
{{--                                        <label class="small mb-1" for="inputLastName"--}}
{{--                                        >Coverage [ Can be selected multiple ]</label>--}}

{{--                                        <select class="form-control" id="exampleFormControlSelect2" name="coverage[]"--}}
{{--                                                multiple>--}}
{{--                                            <option value="ac"--}}
{{--                                                    @if (in_array('ac', json_decode($package->coverage))) selected @endif>--}}
{{--                                                Accidental/Diseases Mortality--}}
{{--                                            </option>--}}
{{--                                            <option value="fl"--}}
{{--                                                    @if (in_array('fl', json_decode($package->coverage))) selected @endif>--}}
{{--                                                Flood cyclonic coverage--}}
{{--                                            </option>--}}
{{--                                            <option value="er"--}}
{{--                                                    @if (in_array('er', json_decode($package->coverage))) selected @endif>--}}
{{--                                                Earthquake coverage--}}
{{--                                            </option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}

                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <label class="small mb-1" for="inputLastName"
                                            >Coverage</label
                                            >
                                            <input
                                                class="form-control"
                                                id="inputLastName"
                                                type="text"
                                                placeholder="Enter coverage info"
                                                value="{{ $package->coverage }}"
                                                step="0.1"
                                                name="coverage"
                                            />
                                        </div>
                                    </div>
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
                                            value="{{ $package->discount  }}"
                                            name="discount"
                                        />
                                    </div>

                                    <div class="col-md-4">
                                        <label class="small mb-1" for="inputLastName"
                                        >Rate [CTL] %</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="number"
                                            placeholder="Enter Rate Percentage"
                                            value="{{ $package->rate  }}"
                                            name="rate"
                                        />
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
                                            value="{{ $package->vat  }}"
                                            name="vat"
                                        />
                                    </div>
                                </div>


                                <div class="row gx-3 mb-3">
                                    <div class="col-md-12">
                                        <label class="small mb-1" for="inputLastName"
                                        >Quotation / Description About The Package</label
                                        >
                                        <textarea class="form-control textarea" rows="40"
                                                  name="quotation">{!!  $package->quotation  !!}</textarea>

                                    </div>
                                </div>


                                <button class="btn btn-primary" type="submit">
                                    Update changes
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
