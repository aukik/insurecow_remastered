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
                                Claim Insurance - <span style="color: red">&nbsp;Under Construction</span>
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
                        <div class="card-header">Claim Insurance -<span
                                style="color: red">&nbsp;Under Construction</span></div>
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

                            <form action="{{ route('claim.store') }}" method="post"
                                  enctype="multipart/form-data">
                                {{ csrf_field() }}


                                <div class="row gx-3 mb-3">


                                    {{--  -------------********************************* Muzzle part -------------********************************* --}}

                                    <div class="col-md-12">
                                        <label class="small mb-1" for="inputOrgName"
                                        >Muzzle Of Cow [Insert the image of the cow muzzle]</label
                                        >
                                        <input type="file" class="form-control" name="muzzle_of_cow" id="fileInput">

                                        @error('muzzle_of_cow')
                                        <div class="alert alert-danger" style="margin-top: 10px">{{ $message }}</div>
                                        @enderror

                                    </div>


                                    <input type="hidden" class="form-control" name="muzzle_token"
                                           value="{{ $cattle_info->muzzle_of_cow }}">

                                    <input type="hidden" class="form-control" name="cattle_id"
                                           value="{{ $cattle_info->id }}">


                                    {{--  -------------********************************* Muzzle part -------------********************************* --}}


                                </div>

                                {{--                                <p class="muzzle_checking_text" style="color: red">Muzzle Checking in progress</p>--}}
                                {{--                                <br><br>--}}

                                <button class="btn btn-primary cattle_register_button" type="submit">
                                    Claim Insurance
                                </button>

                            </form>

                            {{-- ---------------------------------------- Farmer Cow Registration ---------------------------------------- --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
