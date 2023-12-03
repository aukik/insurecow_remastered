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
                                Register Field Agent / Farmer - Company
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

                            {{-- ---------------------------------------- Register Field Agent / Farmer - Company  ---------------------------------------- --}}

                            @if(session('register'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('register') }}
                                </div>
                            @endif


                            <form action="{{ route('farmer_register.store') }}" method="post"
                                  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <!-- Form Group (username)-->

                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">

                                    <div class="col-md-4">
                                        <label class="small mb-1" for="inputLastName"
                                        >Full Name</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="text"
                                            placeholder="Enter Company Name"
                                            value=""
                                            name="name"
                                        />

                                        @error('name')
                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                                        @enderror

                                    </div>


                                    <div class="col-md-4">
                                        <label class="small mb-1" for="inputLastName"
                                        >Phone</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="text"
                                            placeholder="Enter Phone Number"
                                            value=""
                                            name="phone"
                                        />

                                        @error('phone')
                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="small mb-1" for="inputLastName"
                                        >Email Address</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="email"
                                            placeholder="Enter Email Address"
                                            value=""
                                            name="email"
                                        />
                                        @error('email')
                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>


                                <div class="row gx-3 mb-3">

                                    <div class="col-md-4">
                                        <label class="small mb-1" for="inputLastName"
                                        >Password</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="password"
                                            placeholder="Enter Password"
                                            value=""
                                            name="password"
                                        />
                                        @error('password')
                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label class="small mb-1" for="inputLastName"
                                        >Address</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="text"
                                            placeholder="Enter Address"
                                            value=""
                                            name="address"
                                        />
                                        @error('address')
                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label class="small mb-1" for="inputLastName"
                                        >Farmer / Agent Identification ID</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="text"
                                            placeholder="Enter Agent Employee ID"
                                            value=""
                                            name="agent_employee_id"
                                        />
                                        @error('agent_employee_id')
                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>


                                <div class="row gx-3 mb-3">

                                    <div class="col-md-4">
                                        <label class="small mb-1" for="inputLastName"
                                        >Register As</label>

                                        <select class="form-control" id="exampleFormControlSelect2" name="role">
                                            <option selected disabled>Select a role</option>
                                            <option value="f">Farmer</option>
{{--                                            <option value="fa">Field Agent</option>--}}
                                        </select>


                                        @error('role')
                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="small mb-1" for="inputOrgName"
                                        >Person Image</label
                                        >
                                        <input type="file" class="form-control" name="company_logo">

                                        @error('company_logo')
                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <button class="btn btn-primary" type="submit">
                                    Save changes
                                </button>
                            </form>

                            {{-- ---------------------------------------- Register Field Agent / Farmer - Company ---------------------------------------- --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
