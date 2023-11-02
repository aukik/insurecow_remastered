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
                                Farm Management - Food and Nutrition
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
                        <div class="card-header">Farm Management - Food and Nutrition</div>
                        <div class="card-body">

                            @if(session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif

                            {{-- ---------------------------------------- Farm Creation ---------------------------------------- --}}

                            <form action="{{ route('feeding_and_nutrition.store') }}" method="post"
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

                                                <label for="exampleFormControlSelect1" class="small mb-1">Scheduled
                                                    Date</label>

                                                <input
                                                    class="form-control"
                                                    id="inputLastName"
                                                    type="date"
                                                    placeholder="Last vaccination date"
                                                    value=""
                                                    name="schedule_date"
                                                />
                                            </div>

                                        </div>
                                    </div>


                                </div>

                                <div class="row">


                                    <div class="col-md-6">
                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group (last name)-->
                                            <div class="col-md-12">
                                                <label class="small mb-1" for="inputLastName"
                                                >Feeding Schedule</label
                                                >
                                                <input
                                                    class="form-control"
                                                    id="inputLastName"
                                                    type="text"
                                                    placeholder="Feeding Schedule"
                                                    value=""
                                                    name="feeding_schedule"
                                                />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group (last name)-->
                                            <div class="col-md-12">
                                                <label class="small mb-1" for="inputLastName"
                                                >Nutrition Plan</label
                                                >
                                                <input
                                                    class="form-control"
                                                    id="inputLastName"
                                                    type="text"
                                                    placeholder="Nutrition Plan"
                                                    value=""
                                                    name="nutrition_plans"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row mb-3">
                                            <div class="col-md-12">

                                                <label for="exampleFormControlSelect1" class="small mb-1">Feed Consumption Records [ PDF / Image file ]</label>

                                                <input
                                                    class="form-control"
                                                    id="inputLastName"
                                                    type="file"
                                                    placeholder=""
                                                    value=""
                                                    name="feed_consumption_records"
                                                />
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
