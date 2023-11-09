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
                                Farm Management - Budget and Forecasting
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
                        <div class="card-header">Farm Management - Budget and Forecasting</div>
                        <div class="card-body">

                            @if(session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif

                            {{-- ---------------------------------------- Farm Creation ---------------------------------------- --}}

                            <form action="{{ route('budget-and-forecasting.store') }}" method="post"
                                  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <!-- Form Group (username)-->


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

                                    <div class="col-md-6">
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-12">

                                                <label for="exampleFormControlSelect1" class="small mb-1">Budget
                                                    Name</label>

                                                <input type="text" class="form-control" id="exampleFormControlSelect1"
                                                       name="budget_name">
                                            </div>

                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-12">
                                                <label for="record_date">Start Date:</label>
                                                <input type="date" class="form-control" id="record_date"
                                                       name="start_date"
                                                       required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-12">
                                                <label for="description">End Date:</label>
                                                <input type="date" class="form-control" id="description"
                                                       name="end_date"
                                                       required>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-12">
                                                <label for="amount">Total Income:</label>
                                                <input type="number" step="0.01" class="form-control" id="total_income"
                                                       name="total_income"
                                                       required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-12">
                                                <label for="type">Total Expenses:</label>
                                                <input type="number" step="0.01" class="form-control" id="total_expense"
                                                       name="total_expenses"
                                                       required>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-12">
                                                <label for="type">Net Profit:</label>
                                                <input type="number" step="0.01" class="form-control" id="net_profit"
                                                       name="net_profit"
                                                       required>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <button class="btn btn-primary" type="submit">
                                    Add Budget and Financial Plan
                                </button>
                                <br><br>
                            </form>

                            {{-- ---------------------------------------- Farm Creation ---------------------------------------- --}}


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <script>
        // Function to calculate net profit
        function calculateNetProfit() {
            // Get values from input fields
            var totalIncome = parseFloat(document.getElementById('total_income').value) || 0;
            var totalExpense = parseFloat(document.getElementById('total_expense').value) || 0;

            // Calculate net profit
            var netProfit = totalIncome - totalExpense;

            // Display the result in the net profit input field
            document.getElementById('net_profit').value = netProfit.toFixed(2);
        }

        // Attach the function to the input fields' change event
        document.getElementById('total_income').addEventListener('input', calculateNetProfit);
        document.getElementById('total_expense').addEventListener('input', calculateNetProfit);
    </script>
@endsection
