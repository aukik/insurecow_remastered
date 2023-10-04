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
                                Registered Cattle - Farmer
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
                        <div class="card-header">Registered Cattle</div>
                        <div class="card-body">


                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Animal Name</th>

                                        <th>Animal Weight</th>
                                        <th>Animal Color</th>

                                        <th>Animal Price</th>

                                        <th>View</th>
                                        <th>Edit</th>
                                        <th>Approval Status</th>
                                        {{--                                        <th>Animal Claim</th>--}}

                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php $id = 0 ?>
                                    @foreach($cattle_list as $cattle)
                                        <tr>
                                            <td>{{ $id += 1 }}</td>
                                            <td>{{ $cattle->cattle_name }}</td>

                                            <td>{{ $cattle->weight }}</td>
                                            <td>{{ $cattle->cattle_color }}</td>

                                            <td>{{ $cattle->sum_insured }}</td>


                                            <td>
                                                <a class="btn btn-outline-primary" type="button"
                                                   href="{{ route('cattle.list.single',$cattle->id)  }}">View Info</a>
                                            </td>

                                            <td>
                                                <a class="btn btn-outline-yellow" type="button"
                                                   href="">Edit Info</a>
                                            </td>

                                            <td>Approved</td>
                                            {{--                                            <td>--}}

                                            {{--                                                <a href="{{ route('claim.index', $cattle->id) }}"--}}
                                            {{--                                                   class="btn btn-danger">Claim</a>--}}
                                            {{--                                            </td>--}}

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
