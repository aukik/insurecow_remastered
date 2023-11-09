@extends('farm-management.admin-panel.index')

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
                                Farm Management - Income And Sells Records
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
                        <div class="card-header">Farm Management - Income And Sells Records</div>
                        <div class="card-body">

                            @if(session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif

                            {{-- ---------------------------------------- Farm Creation ---------------------------------------- --}}

                            <form action="{{ route('incomeAndSell.store') }}" method="post"
                                  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <!-- Form Group (username)-->


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-12">

                                                <label for="exampleFormControlSelect1" class="small mb-1">Animal
                                                    Name</label>

                                                <select class="form-select" id="exampleFormControlSelect1"
                                                        name="cattle_id">
                                                    @foreach($animal_data as $data)
                                                        <option
                                                            value="{{ $data->id }}">{{ $data->cattle_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-12">
                                                <label for="record_date">Record Date:</label>
                                                <input type="date" class="form-control" id="record_date"
                                                       name="record_date"
                                                       required>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-12">
                                                <label for="description">Description:</label>
                                                <input type="text" class="form-control" id="description"
                                                       name="description"
                                                       required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-12">
                                                <label for="amount">Amount:</label>
                                                <input type="number" step="0.01" class="form-control" id="amount"
                                                       name="amount"
                                                       required>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-12">
                                                <label for="type">Type:</label>
                                                <select class="form-control" id="type" name="type" required>
                                                    <option value="">Select Type</option>
                                                    <option value="income">Income</option>
                                                    <option value="sales">Sales</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <button class="btn btn-primary" type="submit">
                                    Add Health Information
                                </button>
                                <br><br>
                            </form>

                            {{-- ---------------------------------------- Farm Creation ---------------------------------------- --}}


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
