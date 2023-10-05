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
                                    {{ session('success') }}, <a href="{{ route('farm.index') }}">View Farms</a>
                                </div>
                            @endif

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

                                                @if(auth()->user()->role == "s")
                                                    <a class="btn btn-primary" type="button"
                                                       href="{{ route('sp.cattle.list.with_farm', $farm->id) }}">View
                                                        Cattle</a>
                                                @else
                                                    <a class="btn btn-primary" type="button"
                                                       href="{{ route('cattle.list.with_farm', $farm->id) }}">View
                                                        Cattle</a>
                                                @endif


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
