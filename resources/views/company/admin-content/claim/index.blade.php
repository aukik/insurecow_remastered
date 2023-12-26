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
                                Claim Insurance - Farmer<span style="color: red">&nbsp</span>
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
                        <div class="card-header">Claim Insurance for Farmer - from company side<span
                                style="color: red"></span></div>
                        <div class="card-body">

                            {{-- ---------------------------------------- Farmer Cow Registration ---------------------------------------- --}}

                            @if(session('claim_success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('claim_success') }}
                                </div>
                            @elseif(session('claim_failed'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('claim_failed') }}
                                </div>
                            @elseif(session('error'))
                                <div class="alert alert-warning" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif



                            {{--  ------------------------------------------ Both insurance payment and claim status check ------------------------------------------ --}}

                            @if(\App\Http\Controllers\Farmer\FarmerCattleListLogicController::insurance_detection($cattle_info->id) == true)
                                @if(\App\Http\Controllers\Farmer\FarmerCattleListLogicController::claim_detection($cattle_info->id) == true)

                                    <form action="{{ route('cp.claim.store') }}" method="post"
                                          enctype="multipart/form-data">
                                        {{ csrf_field() }}


                                        <div class="row gx-3 mb-3">


                                            {{--  -------------********************************* Muzzle part -------------********************************* --}}

                                            <div class="col-md-12">
                                                <label class="small mb-1" for="inputOrgName"
                                                >Muzzle Of Cow [Insert the image of the cow muzzle]</label
                                                >
                                                <input type="file" class="form-control" name="muzzle_of_cow"
                                                       id="fileInput">

                                                @error('muzzle_of_cow')
                                                <div class="alert alert-danger"
                                                     style="margin-top: 10px">{{ $message }}</div>
                                                @enderror

                                            </div>


                                            <input type="hidden" class="form-control" name="muzzle_token"
                                                   value="{{ $cattle_info->muzzle_of_cow }}">

                                            <input type="hidden" class="form-control" name="cattle_id"
                                                   value="{{ $cattle_info->id }}">


                                            {{--  -------------********************************* Muzzle part -------------********************************* --}}


                                        </div>

                                        <button class="btn btn-primary cattle_register_button" type="submit">
                                            Claim Insurance
                                        </button>

                                    </form>

                                @else
                                    <p>Claimed</p>
                                @endif
                            @else
                                <p>Not insured</p>
                            @endif

                            {{--  ------------------------------------------ Both insurance payment and claim status check ------------------------------------------ --}}


                            <br>
                            @if(session('data'))

                                <div style="color: #0a3622; font-weight: bold">Claim Report - Success</div>
                                <hr style="color: #0a3622; font-weight: bold">

                                <div class="row">

                                    <div class="col-md-4">
                                        <p style="font-weight: bold">
                                            <span
                                                style="color: #0a3622">Farmer Name :</span> {{ \App\Models\User::find(session('data')->user_id)->name ?? "Name not found" }}
                                        </p>
                                    </div>

                                    <div class="col-md-4">
                                        <p style="font-weight: bold">
                                            <span
                                                style="color: #0a3622">Farmer Address :</span> {{ \App\Models\User::find(session('data')->user_id)->address ?? "Address not found" }}
                                        </p>
                                    </div>

                                    <div class="col-md-4">
                                        <p style="font-weight: bold">
                                            <span
                                                style="color: #0a3622">Farmer Phone No :</span> {{ \App\Models\User::find(session('data')->user_id)->phone ?? "Number not found" }}
                                        </p>
                                    </div>


                                    <div class="col-md-4">
                                        <p style="font-weight: bold">
                                            <span
                                                style="color: #0a3622">Cattle Name :</span> {{ session('data')->cattle_name }}
                                        </p>
                                    </div>

                                    <div class="col-md-4">
                                        <p style="font-weight: bold">
                                            <span
                                                style="color: #0a3622">Cattle Breed :</span> {{ session('data')->cattle_breed }}
                                        </p>
                                    </div>

                                    <div class="col-md-4">
                                        <p style="font-weight: bold">
                                            <span style="color: #0a3622">Cattle Age :</span> {{ session('data')->age }}
                                        </p>
                                    </div>

                                    <div class="col-md-4">
                                        <p style="font-weight: bold">
                                            <span
                                                style="color: #0a3622">Cattle Weight :</span> {{ session('data')->weight }}
                                        </p>
                                    </div>

                                    <div class="col-md-4">
                                        <p style="font-weight: bold">
                                            <span
                                                style="color: #0a3622">Cattle Type :</span> {{ session('data')->animal_type }}
                                        </p>
                                    </div>

                                    <div class="col-md-4">

                                    </div>

                                    <div class="col-md-4">
                                        <p style="font-weight: bold">
                                            <span style="color: #0a3622">Cattle with Owner :</span>
                                        </p>
                                        <img src="{{ asset('storage/'.session('data')->cow_with_owner) }}" alt=""
                                             style="width: 100px">
                                    </div>

                                    <div class="col-md-4">
                                        <p style="font-weight: bold">
                                            <span style="color: #0a3622">Cattle Left Side :</span>
                                        </p>
                                        <img src="{{ asset('storage/'.session('data')->left_side) }}" alt=""
                                             style="width: 100px">
                                    </div>

                                    <div class="col-md-4">
                                        <p style="font-weight: bold">
                                            <span style="color: #0a3622">Cattle Right Side :</span>
                                        </p>
                                        <img src="{{ asset('storage/'.session('data')->right_side) }}" alt=""
                                             style="width: 100px">
                                    </div>
                                </div>

                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
