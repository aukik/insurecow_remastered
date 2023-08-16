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
                                User History - Company
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
                        <div class="card-header">User History</div>
                        <div class="card-body">

                            {{--                            <div class="card-header">Extended DataTables</div>--}}
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Role</th>
                                        <th>Registered At</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>

                                    <tbody>


                                    @foreach($users as $user)

                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>
                                                @if ($user->role == 'f')
                                                    {{ "Farmer"  }}
                                                @elseif($user->role == 'fa')
                                                    {{ "Field Agent" }}
                                                @endif
                                            </td>
                                            <td>{{ $user->created_at->format('d-m-y') }}</td>

                                            <td>
                                                {{--                                            <button--}}
                                                {{--                                                class="btn btn-datatable btn-icon btn-transparent-dark me-2"--}}
                                                {{--                                            >--}}
                                                {{--                                                <i data-feather="more-vertical"></i>--}}
                                                {{--                                            </button>--}}
                                                <button
                                                    class="btn btn-datatable btn-icon btn-transparent-dark"
                                                >
                                                    <i data-feather="trash-2"></i>
                                                </button>
                                            </td>
                                        </tr>

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
