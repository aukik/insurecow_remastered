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
                                Accounts Profile Update - Company
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
                        <div class="card-header">Accounts Profile Update - Company</div>
                        <div class="card-body">


                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif


                            {{-- ---------------------------------------- Accounts Profile Update - Company ---------------------------------------- --}}




                            @if(auth()->user()->role == "s")
                                <form action="{{ route('sp_company_corporate_profile_update', $user->id) }}"
                                      method="post"
                            @else

                                <form action="{{ route('company_corporate_profile_update') }}" method="post"
                                      @endif

                                      enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    @method('put')


                                    @if($user->permission->c_insurance == 1)

                                        {{-- ------------------------------------ Options only viewable for company which can create packages ------------------------------------ --}}

                                        <div style="color: #0a3622; font-weight: bold">Accounts Information</div>
                                        <hr style="color: #0a3622; font-weight: bold">

                                        <!-- Form Row-->
                                        <div class="row gx-3 mb-3">

                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputLastName"
                                                >Account Info</label
                                                >
                                                <input
                                                    class="form-control"
                                                    id="inputLastName"
                                                    type="text"
                                                    placeholder=""
                                                    value="{{ $user->ac_info }}"
                                                    name="ac_info"
                                                />

                                                @error('ac_info')
                                                <div class="alert alert-danger" style="margin-top: 10px">Field Required
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputLastName"
                                                >Account</label
                                                >
                                                <input
                                                    class="form-control"
                                                    id="inputLastName"
                                                    type="text"
                                                    placeholder=""
                                                    value="{{ $user->account }}"
                                                    name="account"
                                                />

                                                @error('account')
                                                <div class="alert alert-danger" style="margin-top: 10px">Field Required
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row gx-3 mb-3">

                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputLastName"
                                                >Bank Name</label
                                                >
                                                <input
                                                    class="form-control"
                                                    id="inputLastName"
                                                    type="text"
                                                    placeholder=""
                                                    value="{{ $user->bank_name }}"
                                                    name="bank_name"
                                                />

                                                @error('bank_name')
                                                <div class="alert alert-danger" style="margin-top: 10px">Field Required
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputLastName"
                                                >Branch Name</label
                                                >
                                                <input
                                                    class="form-control"
                                                    id="inputLastName"
                                                    type="text"
                                                    placeholder=""
                                                    value="{{ $user->branch_name }}"
                                                    name="branch_name"
                                                />

                                                @error('branch_name')
                                                <div class="alert alert-danger" style="margin-top: 10px">Field Required
                                                </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row gx-3 mb-3">

                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputLastName"
                                                >Routing No</label
                                                >
                                                <input
                                                    class="form-control"
                                                    id="inputLastName"
                                                    type="text"
                                                    placeholder=""
                                                    value="{{ $user->routing_no }}"
                                                    name="routing_no"
                                                />

                                                @error('routing_no')
                                                <div class="alert alert-danger" style="margin-top: 10px">Field Required
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputLastName"
                                                >Instruction</label
                                                >
                                                <input
                                                    class="form-control"
                                                    id="inputLastName"
                                                    type="text"
                                                    placeholder=""
                                                    value="{{ $user->instruction }}"
                                                    name="instruction"
                                                />

                                                @error('instruction')
                                                <div class="alert alert-danger" style="margin-top: 10px">Field Required
                                                </div>
                                                @enderror
                                            </div>

                                        </div>

                                        {{-- ------------------------------------ Options only viewable for company which can create packages ------------------------------------ --}}

                                    @endif

                                    <div style="color: #0a3622; font-weight: bold">Profile Information</div>
                                    <hr style="color: #0a3622; font-weight: bold">

                                    <div class="row gx-3 mb-3">

                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputLastName"
                                            >Company Name</label
                                            >
                                            <input
                                                class="form-control"
                                                id="inputLastName"
                                                type="text"
                                                placeholder=""
                                                value="{{ $user->name }}"
                                                name="name"
                                            />

                                            @error('name')
                                            <div class="alert alert-danger" style="margin-top: 10px">Field Required
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputLastName"
                                            >Company Password Update <span
                                                    style="color: red">[ If required ]</span></label
                                            >
                                            <input
                                                class="form-control"
                                                id="inputLastName"
                                                type="text"
                                                placeholder=""
                                                value=""
                                                name="password"
                                            />

                                            @error('name')
                                            <div class="alert alert-danger" style="margin-top: 10px">Field Required
                                            </div>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="row gx-3 mb-3">
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputLastName"
                                            >Company Logo [ Types : jpeg,jpg,png ]</label
                                            >
                                            <input
                                                class="form-control"
                                                id="inputLastName"
                                                type="file"
                                                placeholder=""
                                                value=""
                                                name="company_logo"
                                            />

                                            @error('company_logo')
                                            <div class="alert alert-danger" style="margin-top: 10px">Field Required
                                            </div>
                                            @enderror
                                        </div>

                                    </div>


                                    <button class="btn btn-primary" type="submit">
                                        Save changes
                                    </button>
                                </form>

                                {{-- ---------------------------------------- Accounts Profile Update - Company ---------------------------------------- --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
