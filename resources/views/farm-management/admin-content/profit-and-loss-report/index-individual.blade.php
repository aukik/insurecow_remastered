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
                                Farm Management - Profit or loss calculation for individual animal
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-4">

            <div class="card mb-4">
                <div class="card-header">Farm Management - Profit or loss calculation for individual animal</div>
                <div class="card-body">
                    <form action="{{ route('profit-and-loss-report-individual') }}" method="get">


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

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-12">

                                        <label for="exampleFormControlSelect1" class="small mb-1">Animal
                                            Name</label>

                                        <select class="form-select" id="exampleFormControlSelect1"
                                                name="cattle_id">
                                            @foreach($animal_data as $data)
                                                <option
                                                    value="{{ $data->id }}">{{ $data->cattle_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary">Generate Report</button>
                    </form>

                    <br>

                    @if (isset($startDate) && isset($endDate) && isset($animal_information_name) && isset($income_data) && isset($expenses_data))

                        <p><span
                                style="color: red">Report For :</span> {{ $animal_information_name->first()->cattle_name }}
                        </p>

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

                        <hr>

                        <br>
                        {{--  ------------------------- Income Structure ------------------------- --}}

                        <h4>Income Data Report</h4>

                        <table class="table">
                            <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Record Date</th>
                                <th>Description</th>
                                <th>Amount</th>
                            </tr>
                            </thead>

                            <tbody>

                                <?php $id1 = 0 ?>

                            @foreach($income_data as $data)
                                <tr>
                                    <td>{{ $id1 += 1 }}</td>

                                    <td>{{ $data->record_date }}</td>
                                    <td>{{ $data->description }}</td>
                                    <td>{{ $data->amount }}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>


                        {{--  ------------------------- Income Structure ------------------------- --}}


                        <br><br>
                        {{--  ------------------------- Expense Structure ------------------------- --}}

                        <h4>Expense Data Report</h4>

                        <table class="table">
                            <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Expense Date</th>
                                <th>Description</th>
                                {{--                                <th>item_name</th>--}}
                                <th>Amount</th>
                            </tr>
                            </thead>

                            <tbody>

                                <?php $id2 = 0 ?>


                            @foreach($expenses_data as $data)
                                <tr>
                                    <td>{{ $id2 += 1 }}</td>
                                    <td>{{ $data->expense_date }}</td>
                                    <td>{{ $data->description }}</td>
                                    {{--                                <td>{{ $data->item_name }}</td>--}}
                                    <td>{{ $data->amount }}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>


                        {{--  ------------------------- Expense Structure ------------------------- --}}

                    @else
                        <p>Please select a start date and end date to generate a profit and loss report.</p>
                    @endif

                </div>
            </div>


        </div>
    </main>
@endsection
