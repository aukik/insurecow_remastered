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
                                Buy Insurance - Attachment Add - Company
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
                        <div class="card-header">Buy Insurance - Attachment Add - Company</div>
                        <div class="card-body">

                            {{-- ---------------------------------------- Register Company/NGO/Bank  ---------------------------------------- --}}

                            @if(session('register'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('register') }}
                                </div>
                            @endif


                            <form action="{{ route('company_insurance_requests_data_add_attachment_update', $insurance_request->id) }}" method="post"
                                  enctype="multipart/form-data">
                                @method('put')
                                {{ csrf_field() }}

                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName"
                                        >Add Attachment</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="file"
                                            placeholder=""
                                            value=""
                                            name="attachment"
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
