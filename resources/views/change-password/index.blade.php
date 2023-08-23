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

                            {{-- ---------------------------------------- Register Company/NGO/Bank  ---------------------------------------- --}}

                            @if(session('password_success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('password_success') }}
                                </div>
                            @elseif(session('password_failed'))
                                <div class="alert alert-warning" role="alert">
                                    {{ session('password_failed') }}
                                </div>
                            @endif


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
                                            type="text"
                                            placeholder="Enter Package Name"
                                            value=""
                                            name="current_password"
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
                                            type="text"
                                            placeholder="Enter Package Name"
                                            value=""
                                            name="new_password"
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
                                            type="text"
                                            placeholder="Enter Package Name"
                                            value=""
                                            name="verify_password"
                                        />
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
