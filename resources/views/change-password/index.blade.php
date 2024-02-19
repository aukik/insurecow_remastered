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
                                Change password
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
                        <div class="card-header">Change Password page</div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-6">
                                    {{-- ---------------------------------------- Change Password View  ---------------------------------------- --}}

                                    @if(session('password_success'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('password_success') }}
                                        </div>
                                    @elseif(session('password_failed'))
                                        <div class="alert alert-warning" role="alert">
                                            {{ session('password_failed') }}
                                        </div>
                                    @endif

                                    <div style="color: #0a3622; font-weight: bold">Login Information Update</div>
                                    <hr style="color: #0a3622; font-weight: bold">


                                    <form action="{{ route('view.password.post') }}" method="post"
                                          enctype="multipart/form-data">
                                        {{ csrf_field() }}

                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-12">
                                                <label class="small mb-1" for="inputLastName"
                                                >Current Password</label
                                                >
                                                <input
                                                    class="form-control"
                                                    id="inputLastName"
                                                    type="password"
                                                    placeholder="Enter current password"
                                                    value=""
                                                    name="current_password"
                                                    required
                                                    autocomplete="off"
                                                />
                                            </div>
                                        </div>

                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-12">
                                                <label class="small mb-1" for="inputLastName"
                                                >New Password</label
                                                >
                                                <input
                                                    class="form-control"
                                                    id="inputLastName"
                                                    type="password"
                                                    placeholder="Enter new password"
                                                    value=""
                                                    name="new_password"
                                                    required
                                                    autocomplete="off"
                                                />
                                            </div>
                                        </div>

                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-12">
                                                <label class="small mb-1" for="inputLastName"
                                                >Confirm Password</label
                                                >
                                                <input
                                                    class="form-control"
                                                    id="inputLastName"
                                                    type="password"
                                                    placeholder="Enter new password again"
                                                    value=""
                                                    name="verify_password"
                                                    required
                                                    autocomplete="off"
                                                />
                                            </div>
                                        </div>


                                        <button class="btn btn-primary" type="submit">
                                            Save changes
                                        </button>
                                    </form>

                                    {{-- ---------------------------------------- Change Password View ---------------------------------------- --}}
                                </div>

                                <div class="col-md-6">

                                    <div style="color: #0a3622; font-weight: bold">Profile Information Update</div>
                                    <hr style="color: #0a3622; font-weight: bold">

                                    @if(session('success'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    <form action="{{ route('view.profile_info_update') }}" method="post"
                                          enctype="multipart/form-data">
                                        {{ csrf_field() }}

                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-12">
                                                <label class="small mb-1" for="inputLastName"
                                                >Address Update</label
                                                >
                                                <input
                                                    class="form-control"
                                                    id="inputLastName"
                                                    type="text"
                                                    placeholder=""
                                                    value="{{ auth()->user()->address ?? '' }}"
                                                    name="address"
                                                />
                                            </div>
                                        </div>


                                        <button class="btn btn-primary" type="submit">
                                            Save changes
                                        </button>
                                    </form>

                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
