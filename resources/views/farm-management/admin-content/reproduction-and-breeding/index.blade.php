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
                                Farm Management - Food and Nutrition Information
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
                        <div class="card-header">Farm Management - Food and Nutrition Information</div>
                        <div class="card-body">


                            {{-- ---------------------------------------- Farm List ---------------------------------------- --}}

                            <hr style="color: #0a3622; font-weight: bold">


                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Cattle Name</th>
                                        <th>Scheduled Data</th>
                                        <th>Feed Consumption Record</th>

                                        <th>Delete Data</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php $id = 0 ?>
                                    @foreach($animal_data as $data)
                                        <tr>
                                            <td>{{ $id += 1 }}</td>
                                            <td>
                                                {{ auth()->user()->cattleRegister->where('id', $data->cattle_id)->first()->cattle_name ?? '<span style="color: red;">Cattle data not found</span>' }}
                                            </td>
                                            <td>{{ $data->schedule_date }}</td>
                                            <td><a href="{{ asset('storage/'.$data->feed_consumption_records) }}">View Record</a></td>

                                            <td>
                                                <form action="{{ route('feeding_and_nutrition.destroy', $data->id) }}" method="post">
                                                    {{ csrf_field() }}
                                                    @method('delete')
                                                    <input type="submit" value="Delete" class="btn btn-danger">
                                                </form>
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
