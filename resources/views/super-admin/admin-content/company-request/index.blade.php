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
                                Company Requests - Super Admin
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
                        <div class="card-header">Company Requests</div>
                        <div class="card-body">

                            {{--                            <div class="card-header">Extended DataTables</div>--}}
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Company Name</th>
                                        <th>Applied Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    @foreach($users as $user)

                                        @if($user->permission->c_insurance == 0 && $user->permission->c_without_insurance == 0)

                                            <tr>
                                                <td></td>
                                                <td>{{ $user->name }}</td>
                                                <td>Edinburgh</td>
                                                <td>61</td>
                                                <td>2011/04/25</td>
                                                <td>
                                                    <div class="badge bg-primary text-white rounded-pill">
                                                        Applied
                                                    </div>
                                                </td>
                                                <td>
                                                    {{--                                                <button--}}
                                                    {{--                                                    class="btn btn-datatable btn-icon btn-transparent-dark me-2"--}}
                                                    {{--                                                >--}}
                                                    {{--                                                    <i data-feather="more-vertical"></i>--}}
                                                    {{--                                                </button>--}}
                                                    <button
                                                        class="btn btn-datatable btn-icon btn-transparent-dark"
                                                    >
                                                        <i data-feather="trash-2"></i>
                                                    </button>
                                                </td>
                                            </tr>

                                        @endif



                                    @endforeach

                                    </tbody>
                                </table>
                            </div>

                            {{-- ---------------------------------------- Company Request Data ---------------------------------------- --}}



                            {{-- ---------------------------------------- Register Company/NGO/Bank ---------------------------------------- --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
