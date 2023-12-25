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
                                @if(auth()->user()->role == "f")
                                    Farmer - Insurance Payment History
                                @else
                                    Company - Insurance Payment History
                                @endif

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
                        <div class="card-header">
                            @if(auth()->user()->role == "f")
                                Farmer - Insurance Payment History
                            @else
                                Company - Insurance Payment History
                            @endif

                        </div>
                        <div class="card-body">

                            {{--                            <div class="card-header">Extended DataTables</div>--}}
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Transaction ID</th>
                                        <th>Amount</th>
                                        <th>Currency</th>
                                        <th>cattle Info</th>
                                        <th>Farmer Name</th>
                                        <th>Insured to</th>
                                        <th>Status</th>
{{--                                        <th>Action</th>--}}

                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php $id = 0 ?>
                                    @foreach($insurance_history as $history)
                                        <tr>
                                            <td>{{ $id += 1 }}</td>
                                            <td>{{ $history->transaction_id }}</td>
                                            <td>{{ $history->amount }}</td>
                                            <td>{{ $history->currency }}</td>
                                            <td>{{ \App\Models\CattleRegistration::find($history->cattle_id)->cattle_name ?? "Animal data not found"}}
                                                - {{ \App\Models\CattleRegistration::find($history->cattle_id)->cattle_type ?? "Animal type not found"}}</td>
                                            <td>{{ \App\Models\User::find($history->user_id)->name ?? "Data Not Found" }}</td>
                                            <td>{{ \App\Models\User::find($history->company_id)->name ?? "Data Not Found"}}</td>
                                            <td>{{ $history->status }}</td>


{{--                                            <td>--}}
{{--                                                <button class="btn btn-success" type="button">View</button>--}}
{{--                                            </td>--}}
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
