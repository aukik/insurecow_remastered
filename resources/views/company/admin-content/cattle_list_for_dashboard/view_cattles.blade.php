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
                                Registered Cattle
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
                        <div class="card-header">Cattle List</div>
                        <div class="card-body">


                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Animal Name</th>
                                        <th>Farmer Name</th>
                                        <th>Sum Insured</th>
                                        <th>Animal with owner</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php $id = 0 ?>
                                    @foreach($cattle_list as $data)
                                        <tr>
                                            <td>{{ $id+=1 }}</td>
                                            <td>{{ $data->cattle_name ?? "Animal data not found"}}</td>
                                            <td>{{ \App\Models\User::find($data->user_id)->name ?? "Data Not Found" }}</td>
                                            <td>{{ $data->sum_insured ?? "Data not found" }}/-</td>
                                            <td><img src="{{ asset('storage/'.$data->cow_with_owner) }}" alt="Data not found" style="width: 130px"></td>
                                        </tr>
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
