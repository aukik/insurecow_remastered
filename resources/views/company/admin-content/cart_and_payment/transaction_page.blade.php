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
                                Transaction Page - Company
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
                        <div class="card-header">Transaction Page - Company</div>
                        <div class="card-body">


                            @if(session('register'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('register') }}
                                </div>
                            @endif


                                {{-- ---------------------------------------- Insurance company Information ---------------------------------------- --}}


                                <style>
                                    .insurance-info {
                                        border: 1px solid #ccc;
                                        border-radius: 5px;
                                        padding: 15px;
                                        margin: 15px 0;
                                    }

                                    .insurance-info h3 {
                                        color: #333;
                                    }

                                    .insurance-info ul {
                                        list-style-type: none;
                                        padding: 0;
                                    }

                                    .insurance-info li {
                                        margin-bottom: 10px;
                                    }
                                </style>


                                <div class="insurance-info">

                                    <label class="small mb-1" for="inputLastName">To,</label>

                                    <h3>Insurance Company Information</h3>
                                    <ul>
                                        <li><strong>Company
                                                Name:</strong> {{ \App\Models\User::find($insurance_request->company_id)->name }}
                                        </li>
                                        <li><strong>Account
                                                Info:</strong> {{ \App\Models\User::find($insurance_request->company_id)->ac_info }}
                                        </li>
                                        <li><strong>Bank
                                                Name:</strong> {{ \App\Models\User::find($insurance_request->company_id)->bank_name }}
                                        </li>
                                        <li><strong>Branch
                                                Name:</strong> {{ \App\Models\User::find($insurance_request->company_id)->branch_name }}
                                        </li>
                                        <li><strong>Account
                                                Number:</strong> {{ \App\Models\User::find($insurance_request->company_id)->account }}
                                        </li>
                                        <li><strong>Routing
                                                No:</strong> {{ \App\Models\User::find($insurance_request->company_id)->routing_no }}
                                        </li>
                                    </ul>
                                </div>


                                {{-- ---------------------------------------- Insurance company Information ---------------------------------------- --}}

                            <label class="small mb-1" for="inputLastName">From,</label>

                            {{-- ---------------------------------------- Cash Transaction  ---------------------------------------- --}}

                            @if($type_data == "cash")
                                <div>
                                    <h4>Cash Transaction</h4>
                                    <hr>

                                    <form action="{{ route('company_insurance_requests_data_add_attachment_update',$insurance_request) }}" method="post"
                                          enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        @method('put')

                                        <div class="row">


                                            <div class="col-md-6">
                                                <div class="row gx-3 mb-3">

                                                    <label class="small mb-1" for="inputLastName"
                                                    >Agent Name</label
                                                    >
                                                    <input
                                                        class="form-control"
                                                        id="inputLastName"
                                                        type="text"
                                                        placeholder="Enter Package Name"
                                                        value=""
                                                        name="cash_agent_name"
                                                    />
                                                </div>

                                            </div>

                                            <div class="col-md-6">
                                                <div class="row gx-3 mb-3">

                                                    <label class="small mb-1" for="inputLastName"
                                                    >Agent Branch Name</label
                                                    >
                                                    <input
                                                        class="form-control"
                                                        id="inputLastName"
                                                        type="text"
                                                        placeholder="Enter Package Name"
                                                        value=""
                                                        name="cash_agent_branch_name"
                                                    />
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="row gx-3 mb-3">

                                                    <label class="small mb-1" for="inputLastName"
                                                    >Agent ID</label
                                                    >
                                                    <input
                                                        class="form-control"
                                                        id="inputLastName"
                                                        type="text"
                                                        placeholder="Enter Package Name"
                                                        value=""
                                                        name="cash_agent_id"
                                                    />
                                                </div>
                                            </div>

{{--                                            <div class="col-md-6">--}}
{{--                                                <div class="row gx-3 mb-3">--}}

{{--                                                    <label class="small mb-1" for="inputLastName"--}}
{{--                                                    >Date</label--}}
{{--                                                    >--}}
{{--                                                    <input--}}
{{--                                                        class="form-control"--}}
{{--                                                        id="inputLastName"--}}
{{--                                                        type="date"--}}
{{--                                                        placeholder="Enter Package Name"--}}
{{--                                                        value=""--}}
{{--                                                        name=""--}}
{{--                                                    />--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

                                            <div class="col-md-6">
                                                <div class="row gx-3 mb-3">

                                                    <label class="small mb-1" for="inputLastName"
                                                    >Amount</label
                                                    >
                                                    <input
                                                        class="form-control"
                                                        id="inputLastName"
                                                        type="number"
                                                        placeholder=""
                                                        value=""
                                                        name="amount"
                                                    />
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="row gx-3 mb-3">

                                                    <label class="small mb-1" for="inputLastName"
                                                    >Phone No</label
                                                    >
                                                    <input
                                                        class="form-control"
                                                        id="inputLastName"
                                                        type="number"
                                                        placeholder="Enter Package Name"
                                                        value=""
                                                        name="cash_phone"
                                                    />
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="row gx-3 mb-3">

                                                    <label class="small mb-1" for="inputLastName"
                                                    >Attachment</label
                                                    >
                                                    <input
                                                        class="form-control"
                                                        id="inputLastName"
                                                        type="file"
                                                        placeholder=""
                                                        value=""
                                                        name="attachment"
                                                    />
                                                </div>
                                            </div>

{{--                                            <div class="col-md-6">--}}
{{--                                                <div class="row gx-3 mb-3">--}}

{{--                                                    <input--}}
{{--                                                        class="form-control"--}}
{{--                                                        id="inputLastName"--}}
{{--                                                        type="text"--}}
{{--                                                        placeholder="Transaction Type"--}}
{{--                                                        value="cash"--}}
{{--                                                        name="transaction_type"--}}
{{--                                                        readonly--}}
{{--                                                    />--}}

{{--                                                </div>--}}
{{--                                            </div>--}}

                                        </div>

                                        <button class="btn btn-primary" type="submit">
                                            Submit
                                        </button>
                                    </form>

                                </div>

                            @endif

                            {{-- ---------------------------------------- Cash Transaction ---------------------------------------- --}}


                            {{-- ---------------------------------------- Cheque Transaction  ---------------------------------------- --}}

                            @if($type_data == "cheque")

                                <div>
                                    <h4>Cheque Transaction</h4>
                                    <hr>

                                    <form action="{{ route('company_insurance_requests_data_add_attachment_update',$insurance_request) }}" method="post"
                                          enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        @method('put')

                                        <div class="row">


                                            <div class="col-md-6">
                                                <div class="row gx-3 mb-3">

                                                    <label class="small mb-1" for="inputLastName"
                                                    >Bank Name</label
                                                    >
                                                    <input
                                                        class="form-control"
                                                        id="inputLastName"
                                                        type="text"
                                                        placeholder=""
                                                        value=""
                                                        name="cheque_bank_name"
                                                    />
                                                </div>

                                            </div>

                                            <div class="col-md-6">
                                                <div class="row gx-3 mb-3">

                                                    <label class="small mb-1" for="inputLastName"
                                                    >Branch Name</label
                                                    >
                                                    <input
                                                        class="form-control"
                                                        id="inputLastName"
                                                        type="text"
                                                        placeholder=""
                                                        value=""
                                                        name="cheque_branch_name"
                                                    />
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="row gx-3 mb-3">

                                                    <label class="small mb-1" for="inputLastName"
                                                    >Amount</label
                                                    >
                                                    <input
                                                        class="form-control"
                                                        id="inputLastName"
                                                        type="number"
                                                        placeholder=""
                                                        value=""
                                                        name="amount"
                                                    />
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="row gx-3 mb-3">

                                                    <label class="small mb-1" for="inputLastName"
                                                    >Attachment</label
                                                    >
                                                    <input
                                                        class="form-control"
                                                        id="inputLastName"
                                                        type="file"
                                                        placeholder=""
                                                        value=""
                                                        name="attachment"
                                                    />
                                                </div>
                                            </div>

{{--                                            <div class="col-md-6">--}}
{{--                                                <div class="row gx-3 mb-3">--}}

{{--                                                    <input--}}
{{--                                                        class="form-control"--}}
{{--                                                        id="inputLastName"--}}
{{--                                                        type="text"--}}
{{--                                                        placeholder="Transaction Type"--}}
{{--                                                        value="cheque"--}}
{{--                                                        name="transaction_type"--}}
{{--                                                        readonly--}}
{{--                                                    />--}}

{{--                                                </div>--}}
{{--                                            </div>--}}


                                        </div>


                                        <button class="btn btn-primary" type="submit">
                                            Submit
                                        </button>
                                    </form>

                                </div>

                            @endif

                            {{-- ---------------------------------------- Cheque Transaction ---------------------------------------- --}}


                            {{-- ---------------------------------------- Bank Transaction  ---------------------------------------- --}}

                            @if($type_data == "bank")

                                <div>
                                    <h4>Bank Transaction</h4>
                                    <hr>

                                    <form action="{{ route('company_insurance_requests_data_add_attachment_update',$insurance_request) }}" method="post"
                                          enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        @method('put')

                                        <div class="row">


                                            <div class="col-md-6">
                                                <div class="row gx-3 mb-3">

                                                    <label class="small mb-1" for="inputLastName"
                                                    >Account Name</label
                                                    >
                                                    <input
                                                        class="form-control"
                                                        id="inputLastName"
                                                        type="text"
                                                        placeholder=""
                                                        value=""
                                                        name="bank_ac_name"
                                                    />
                                                </div>

                                            </div>

                                            <div class="col-md-6">
                                                <div class="row gx-3 mb-3">

                                                    <label class="small mb-1" for="inputLastName"
                                                    >Account Number</label
                                                    >
                                                    <input
                                                        class="form-control"
                                                        id="inputLastName"
                                                        type="text"
                                                        placeholder=""
                                                        value=""
                                                        name="bank_ac_number"
                                                    />
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="row gx-3 mb-3">

                                                    <label class="small mb-1" for="inputLastName"
                                                    >Amount</label
                                                    >
                                                    <input
                                                        class="form-control"
                                                        id="inputLastName"
                                                        type="number"
                                                        placeholder=""
                                                        value=""
                                                        name="amount"
                                                    />
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="row gx-3 mb-3">

                                                    <label class="small mb-1" for="inputLastName"
                                                    >Bank Name</label
                                                    >
                                                    <input
                                                        class="form-control"
                                                        id="inputLastName"
                                                        type="text"
                                                        placeholder=""
                                                        value=""
                                                        name="bank_name"
                                                    />
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="row gx-3 mb-3">

                                                    <label class="small mb-1" for="inputLastName"
                                                    >Transaction Number</label
                                                    >
                                                    <input
                                                        class="form-control"
                                                        id="inputLastName"
                                                        type="text"
                                                        placeholder=""
                                                        value=""
                                                        name="transaction_number"
                                                    />
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="row gx-3 mb-3">

                                                    <label class="small mb-1" for="inputLastName"
                                                    >Attachment</label
                                                    >
                                                    <input
                                                        class="form-control"
                                                        id="inputLastName"
                                                        type="file"
                                                        placeholder=""
                                                        value=""
                                                        name="attachment"
                                                    />
                                                </div>
                                            </div>

{{--                                            <div class="col-md-6">--}}
{{--                                                <div class="row gx-3 mb-3">--}}

{{--                                                    <input--}}
{{--                                                        class="form-control"--}}
{{--                                                        id="inputLastName"--}}
{{--                                                        type="text"--}}
{{--                                                        placeholder="Transaction Type"--}}
{{--                                                        value="bank"--}}
{{--                                                        name="transaction_type"--}}
{{--                                                        readonly--}}
{{--                                                    />--}}

{{--                                                </div>--}}
{{--                                            </div>--}}


                                        </div>


                                        <button class="btn btn-primary" type="submit">
                                            Submit
                                        </button>
                                    </form>

                                </div>

                            @endif
                            {{-- ---------------------------------------- Bank Transaction ---------------------------------------- --}}

                            {{-- ---------------------------------------- Digital Transaction ---------------------------------------- --}}

                                @if($type_data == "digital")

                                    <h4>Digital Transaction</h4>

                                    <form action="{{ route('company_pay') }}" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $insurance_request->id }}"
                                               name="insurance_request_id">
                                        <input type="hidden" value="{{ $insurance_request->cattle_id }}"
                                               name="cattle_id">
                                        <input type="hidden" value="{{ $insurance_request->package_id }}"
                                               name="package_id">
                                        <input type="hidden" value="{{ $insurance_request->company_id }}"
                                               name="company_id">
                                        <input type="hidden" value="{{ $insurance_request->insurance_requested_company_id }}"
                                               name="insurance_requested_company_id">
                                        <input type="hidden" step=".01"
                                               value="{{ $insurance_request->package_insurance_period }}"
                                               name="package_insurance_period">
                                        <input class="btn btn-success h3 text-white" type="submit"
                                               value="Buy">
                                    </form>
                                @endif


                            {{-- ---------------------------------------- Digital Transaction ---------------------------------------- --}}

                            <br>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
