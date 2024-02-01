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
                                Registered Companies - Super Admin
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
                        <div class="card-header">Registered Companies</div>
                        <div class="card-body">

                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Registered <br> Farmers</th>
                                        <th>Update accounts info</th>
                                    </tr>
                                    </thead>

                                    <tbody>


                                    <?php  $id = 0; ?>

                                    @foreach($users as $user)

                                        <tr>
                                            <td>{{ $id+=1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>
                                                <a href="{{ route('sp.registered_farmers', $user->id) }}"
                                                   class="btn btn-primary">View Farmers</a>
                                            </td>

                                            <td>
                                                <a href="{{ route('sp_company_corporate_profile', $user->id) }}"
                                                   class="btn btn-primary">Update Info</a>
                                            </td>


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
