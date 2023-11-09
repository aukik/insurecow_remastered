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
                                Farm Management - Profit or loss calculation
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-4">

            <div class="card mb-4">
                <div class="card-header">Farm Management - Profit or loss calculation</div>
                <div class="card-body">
                    <form action="{{ route('profit-and-loss-report') }}" method="get">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row gx-3 mb-3">
                                    <label for="start_date">Start Date:</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row gx-3 mb-3">
                                    <label for="end_date">End Date:</label>
                                    <input type="date" class="form-control" id="end_date" name="end_date" required>
                                </div>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary">Generate Report</button>
                    </form>

                    <br>

                    @if (isset($startDate) && isset($endDate))
                        <p>Period: {{ $startDate }} - {{ $endDate }}</p>

                        <table class="table">
                            <thead>
                            <tr>
                                <th>Income</th>
                                <th>Expenses</th>
                                <th>Profit or Loss</th>
                                <th>Status</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <td>{{ $income }}</td>
                                <td>{{ $expenses }}</td>
                                <td>{{ $profitOrLoss }}</td>
                                @if ($profitOrLoss >= 0)
                                    <td>
                                        <div class="badge rounded-pill bg-success text-white">
                                            Profit
                                        </div>
                                    </td>
                                @else
                                    <td>
                                        <div class="badge rounded-pill bg-danger text-white">
                                            Loss
                                        </div>
                                    </td>
                                @endif


                            </tr>
                            </tbody>
                        </table>
                    @else
                        <p>Please select a start date and end date to generate a profit and loss report.</p>
                    @endif

                </div>
            </div>


        </div>
    </main>
@endsection
