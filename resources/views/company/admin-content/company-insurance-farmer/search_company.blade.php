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
                                Search Insurance Packages - Company
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
                        <div class="card-header">Search Insurance Packages - Company</div>
                        <div class="card-body">


                            <style>
                                .fixed-height-image {
                                    height: 200px; /* Set the desired fixed height for the images */
                                    width: auto; /* Let the width adjust automatically to maintain the aspect ratio */
                                    max-width: 100%; /* Ensure the image doesn't exceed the container width */
                                }
                            </style>

                            @if(session('insured'))
                                <p class="alert alert-success">{{ session('insured') }}</p>
                            @endif
                            {{-- ---------------------------------------- Package Search ---------------------------------------- --}}


                            <div class="row">

                                @foreach($companies as $company)
                                    <div class="col-md-3">
                                        <div class="card" style="width: auto;">

                                            <img class="card-img-top fixed-height-image"
                                                 src="{{ asset('storage/'. ($company->company_logo ? $company->company_logo : 'https://wallpapers.com/images/featured/flower-pictures-unpxbv1q9kxyqr1d.jpg')) }}"
                                                 alt="Image not found">

                                            <div class="card-body">
                                                <h5 class="card-title">{{ $company->name }}</h5>
                                                {{--                                                <p class="card-text">Email : {{ $company->email }}</p>--}}
                                                {{--                                                <p class="card-text">Phone : {{ $company->phone }}</p>--}}


                                                <form action="{{ route('company.insurance_search_post') }}"
                                                      method="get"
                                                      enctype="multipart/form-data">
                                                    <!-- Form Group (username)-->


                                                    <!-- Form Row-->
                                                    <div class="row gx-3 mb-3">
                                                        <!-- Form Group (first name)-->

                                                        <input type="hidden" name="company_id"
                                                               value="{{ $company->id }}">

                                                    </div>


                                                    <button class="btn btn-primary" type="submit">
                                                        Search Package
                                                    </button>
                                                </form>

                                                {{--                                                <a href="#" class="btn btn-primary">Search Package</a>--}}
                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                            </div>


                            {{-- ---------------------------------------- Package Search ---------------------------------------- --}}


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
