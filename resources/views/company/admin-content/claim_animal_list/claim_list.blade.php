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
                                Claim List - Company
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
                        <div class="card-header">Claim List - Company</div>
                        <div class="card-body">

                            {{--                            <div class="card-header">Extended DataTables</div>--}}
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Cattle Name</th>
                                        <th>Farmer Name</th>
                                        <th>Package Name</th>
                                        <th>Insured To</th>
                                        <th>Claimed Date</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    <?php $id = 0; ?>
                                    @foreach($claim_list as $data)
                                        <td>{{ $id += 1 }}</td>
                                        <td>{{ \App\Models\CattleRegistration::find($data->cattle_id)->cattle_name ?? "Animal data not found"}}</td>
                                        <td>{{ \App\Models\User::find(\App\Models\CattleRegistration::find($data->cattle_id)->user_id)->name ?? "Farmer data not found" }}</td>
                                        <td>{{ \App\Models\Package::find($data->package_id)->package_name ?? "Package Data not found" }}</td>
                                        <td>{{ \App\Models\User::find($data->company_id)->name ?? "Data Not Found" }}</td>
                                        <td>{{ $data->cattle_created_date }}</td>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
