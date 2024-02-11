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

                            {{-- --------------------------- session data --------------------------- --}}

                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if(session('warning'))
                                <div class="alert alert-warning">
                                    {{ session('warning') }}
                                </div>
                            @endif



                            {{-- --------------------------- session data --------------------------- --}}


                            <div class="card-body">

                                <table id="datatablesSimple">


                                    <thead>
                                    <tr>
                                        <td>Serial</td>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Applied Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    <?php $id = 0; ?>

                                    @foreach($users as $user)

                                        @if(\App\Models\User::permission_checkup($user))

                                            <tr>
                                                <td>{{ $id += 1 }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone }}</td>
                                                <td>{{ $user->created_at->format('d-m-Y') }}</td>
                                                <td>
                                                    <div class="badge bg-primary text-white rounded-pill">
                                                        Applied
                                                    </div>
                                                </td>
                                                <td>

                                                    <form action="{{ route('sp_delete_company_request') }}"
                                                          method="post">
                                                        {{ csrf_field() }}
                                                        @method('delete')
                                                        <input type="hidden" value="{{ $user->id }}" name="user_id">
                                                        <input type="submit" value="Delete" class="btn btn-danger">
                                                    </form>
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
