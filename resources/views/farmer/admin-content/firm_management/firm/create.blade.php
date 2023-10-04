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
                                Farm Management - Farmer
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
                        <div class="card-header">Farm Management - Create / view farms</div>
                        <div class="card-body">

                            @if(session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif

                            {{-- ---------------------------------------- Farm Creation ---------------------------------------- --}}

                            <form action="{{ route('farm.store') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <!-- Form Group (username)-->

                                <div class="row gx-3 mb-3">


                                    <!-- Form Group (last name)-->
                                    <div class="col-md-12 pb-2">
                                        <label class="small mb-1" for="inputLastName"
                                        >Farm Type</label
                                        >
                                    </div>


                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="row gx-3 mb-3 align-items-center">
                                                <div class="col-auto">
                                                    <div class="form-check">

                                                        <input class="form-check-input" type="hidden"
                                                               name="cattle"
                                                               value="0">
                                                        <input class="form-check-input" type="checkbox"
                                                               id="exampleFormControlSelect1"
                                                               name="cattle" value="1"
                                                        >
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <label for="exampleFormControlSelect1">Cattle</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="row gx-3 mb-3 align-items-center">
                                                <div class="col-auto">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="hidden"
                                                               name="buffalo"
                                                               value="0">
                                                        <input class="form-check-input" type="checkbox"
                                                               id="exampleFormControlSelect1"
                                                               name="buffalo" value="1"
                                                        >
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <label for="exampleFormControlSelect1">Buffalo</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="row gx-3 mb-3 align-items-center">
                                                <div class="col-auto">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="hidden"
                                                               name="goat"
                                                               value="0">
                                                        <input class="form-check-input" type="checkbox"
                                                               id="exampleFormControlSelect1"
                                                               name="goat" value="1"
                                                        >
                                                    </div>
                                                </div>
                                                <div class="col-auto">
                                                    <label for="exampleFormControlSelect1">Goat</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col"></div>
                                    </div>


                                </div>



                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group (first name)-->

                                            <!-- Form Group (last name)-->
                                            <div class="col-md-12">
                                                <label class="small mb-1" for="inputLastName"
                                                >Farm Name</label
                                                >
                                                <input
                                                    class="form-control"
                                                    id="inputLastName"
                                                    type="text"
                                                    placeholder="Farm Name"
                                                    value=""
                                                    name="farm_name"
                                                />
                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group (last name)-->
                                            <div class="col-md-12">
                                                <label class="small mb-1" for="inputLastName"
                                                >Farm Address</label
                                                >
                                                <input
                                                    class="form-control"
                                                    id="inputLastName"
                                                    type="text"
                                                    placeholder="Farm Address"
                                                    value=""
                                                    name="farm_address"
                                                />
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!-- Form Row-->




                                <button class="btn btn-primary" type="submit">
                                    Add Firm
                                </button>
                                <br><br>
                            </form>

                            {{-- ---------------------------------------- Farm Creation ---------------------------------------- --}}

                            {{-- ---------------------------------------- Farm List ---------------------------------------- --}}

                            <hr style="color: #0a3622; font-weight: bold">

                            <div style="color: #0a3622; font-weight: bold">Number Of Firms</div>

                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Farm Name</th>
                                        <th>Farm Type [ cattle ]</th>
                                        <th>Farm Type [ buffalo ]</th>
                                        <th>Farm Type [ goat ]</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php $id = 0 ?>
                                    @foreach($farms as $farm)
                                        <tr>
                                            <td>{{ $id += 1 }}</td>
                                            <td>{{ $farm->farm_name }}</td>
                                            <td>{{ $farm->cattle == 1 ? 'Included' : 'Not Included' }}</td>
                                            <td>{{ $farm->buffalo == 1 ? 'Included' : 'Not Included' }}</td>
                                            <td>{{ $farm->goat == 1 ? 'Included' : 'Not Included' }}</td>
                                            <td>
                                                <a class="btn btn-primary" type="button" href="{{ route('cattle.list.with_farm', $farm->id) }}">View Cattle</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>


                            {{-- ---------------------------------------- Farm List ---------------------------------------- --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
