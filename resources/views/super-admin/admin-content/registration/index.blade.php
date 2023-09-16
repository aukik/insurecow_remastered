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
                                Register Company/NGO/Bank/Individual Farmer - Super Admin
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
                        <div class="card-header">Register Company/NGO/Bank/MFI/Individual Farmer</div>
                        <div class="card-body">

                            {{-- ---------------------------------------- Register Company/NGO/Bank  ---------------------------------------- --}}

                            @if(session('register'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('register') }}
                                </div>
                            @endif

                            @if(session('pass_error'))
                                <div class="alert alert-warning" role="alert">
                                    {{ session('pass_error') }}
                                </div>
                            @endif


                            <form action="{{ route('sp_register_company_store') }}" method="post"
                                  enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="row" style="margin: 0; padding: 0">
                                    <div class="col-md-6">
                                        <div style="color: #0a3622; font-weight: bold">Login Information</div>
                                        <hr style="color: #0a3622; font-weight: bold">


                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group (first name)-->

                                            <!-- Form Group (last name)-->
                                            <div class="col-md-12">
                                                <label class="small mb-1" for="inputLastName"
                                                >Email Address</label
                                                >
                                                <input
                                                    class="form-control"
                                                    id="inputLastName"
                                                    type="email"
                                                    placeholder="Enter Phone Number"
                                                    value="{{ old('email') }}"
                                                    name="email"
                                                />
                                            </div>
                                        </div>


                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group (first name)-->

                                            <!-- Form Group (last name)-->
                                            <div class="col-md-12">
                                                <label class="small mb-1" for="inputLastName"
                                                >Password</label
                                                >
                                                <input
                                                    class="form-control"
                                                    id="inputLastName"
                                                    type="password"
                                                    placeholder="Enter Phone Number"
                                                    value="{{ old('password') }}"
                                                    name="password"
                                                />
                                            </div>
                                        </div>


                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group (first name)-->

                                            <!-- Form Group (last name)-->
                                            <div class="col-md-12">
                                                <label class="small mb-1" for="inputLastName"
                                                >Confirm Password</label
                                                >
                                                <input
                                                    class="form-control"
                                                    id="inputLastName"
                                                    type="password"
                                                    placeholder="Enter Phone Number"
                                                    value="{{ old('confirm_password') }}"
                                                    name="confirm_password"
                                                />
                                            </div>
                                        </div>

                                        <div class="row gx-3 mb-3">

                                            <div class="col-md-12">
                                                <label class="small mb-1" for="inputLastName"
                                                >Registered For</label>

                                                <select class="form-control" id="exampleFormControlSelect2" name="role">
                                                    <option value="c">Company</option>
                                                    <option value="b">Bank</option>
                                                    <option value="n">NGO</option>
                                                    <option value="m">MFI</option>
                                                    <option value="f">Farmer</option>
                                                </select>


                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div style="color: #0a3622; font-weight: bold">Organization Information</div>
                                        <hr style="color: #0a3622; font-weight: bold">


                                        <!-- Form Row-->
                                        <div class="row gx-3 mb-3">

                                            <div class="col-md-12">
                                                <label class="small mb-1" for="inputLastName"
                                                >Company Name</label
                                                >
                                                <input
                                                    class="form-control"
                                                    id="inputLastName"
                                                    type="text"
                                                    placeholder="Enter Company Name"
                                                    value="{{ old('name') }}"
                                                    name="name"
                                                />
                                            </div>
                                        </div>


                                        <div class="row gx-3 mb-3">

                                            <div class="col-md-12">
                                                <label class="small mb-1" for="inputLastName"
                                                >Phone</label
                                                >
                                                <input
                                                    class="form-control"
                                                    id="inputLastName"
                                                    type="text"
                                                    placeholder="Enter Phone Number"
                                                    value="{{ old('phone') }}"
                                                    name="phone"
                                                />
                                            </div>
                                        </div>


                                        <div class="row gx-3 mb-3">

                                            <div class="col-md-12">
                                                <label class="small mb-1" for="inputLastName"
                                                >Address</label
                                                >
                                                <input
                                                    class="form-control"
                                                    id="inputLastName"
                                                    type="text"
                                                    placeholder="Enter Phone Number"
                                                    value="{{ old('address') }}"
                                                    name="address"
                                                />
                                            </div>
                                        </div>



                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-12">
                                                <label class="small mb-1" for="inputOrgName"
                                                >Organization Image</label
                                                >
                                                <input type="file" class="form-control" name="company_logo">
                                            </div>
                                        </div>
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
