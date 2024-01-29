@extends('super-admin.admin-panel.index')

@section('content')

    <main>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-4">
            <!-- Invoice-->
            <div class="card invoice">
                <div class="card-header p-4 p-md-5 border-bottom-0 bg-gradient-primary-to-secondary text-white-50">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-12 col-lg-auto mb-5 mb-lg-0 text-center text-lg-start">
                            <!-- Invoice branding-->
                            {{--                            <img class="invoice-brand-img rounded-circle mb-4"--}}
                            {{--                                 src="{{ asset('assets/img/demo/demo-logo.svg') }}"--}}
                            {{--                                 alt=""/>--}}
                            <div
                                class="h2 text-white mb-0">{{ \App\Models\User::find($insurance_request->company_id)->name ?? "Company name not found" }}</div>
                            {{--                            Web Design &amp; Development--}}
                        </div>
                        <div class="col-12 col-lg-auto text-center text-lg-end">
                            <!-- Invoice details-->
                            <div class="h3 text-white">Invoice</div>
                            #{{ $insurance_request->id }}
                            <br/>
                            {{ $insurance_request->created_at }}
                        </div>
                    </div>
                </div>
                <div class="card-body p-4 p-md-5">
                    <!-- Invoice table-->
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <thead class="border-bottom">
                            <tr class="small text-uppercase text-muted">
                                <th scope="col">Description</th>
                                <th class="text-end" scope="col"></th>
                                <th class="text-end" scope="col"></th>
                                <th class="text-end" scope="col">Info</th>
                            </tr>
                            </thead>
                            <tbody>


                            {{-- --------------------------------------------------------- Package Name --------------------------------------------------------- --}}

                            <!-- Invoice item 1-->
                            <tr class="border-bottom">
                                <td>
                                    <div class="fw-bold">Package Name</div>
                                <td class="text-end fw-bold"></td>
                                <td class="text-end fw-bold"></td>
                                <td class="text-end fw-bold">{{ \App\Models\Package::find($insurance_request->package_id)->package_name ?? "Package name not found" }}</td>
                            </tr>

                            {{-- --------------------------------------------------------- Package Name --------------------------------------------------------- --}}


                            @if($insurance_request->insurance_request_type == "single")

                                {{-- --------------------------------------------------------- Cattle Name --------------------------------------------------------- --}}

                                <!-- Invoice item 2-->
                                <tr class="border-bottom">
                                    <td>
                                        <div class="fw-bold">Cattle Name</div>
                                    </td>
                                    <td class="text-end fw-bold"></td>
                                    <td class="text-end fw-bold"></td>
                                    <td class="text-end fw-bold">{{ \App\Models\CattleRegistration::find($insurance_request->cattle_id)->cattle_name ?? "Cattle name not found" }}</td>
                                </tr>

                                {{-- --------------------------------------------------------- Cattle Name --------------------------------------------------------- --}}

                                {{-- --------------------------------------------------------- Cattle Sum Insured --------------------------------------------------------- --}}

                                <!-- Invoice item 2-->
                                <tr class="border-bottom">
                                    <td>
                                        <div class="fw-bold">Cattle Sum Insured</div>
                                    </td>
                                    <td class="text-end fw-bold"></td>
                                    <td class="text-end fw-bold"></td>
                                    <td class="text-end fw-bold">{{ \App\Models\CattleRegistration::find($insurance_request->cattle_id)->sum_insured ?? "Cattle sum insured" }}
                                        TK
                                    </td>
                                </tr>

                                {{-- --------------------------------------------------------- Cattle Sum Insured --------------------------------------------------------- --}}

                                {{-- --------------------------------------------------------- Farmer Name --------------------------------------------------------- --}}

                                <!-- Invoice item 2-->
                                <tr class="border-bottom">
                                    <td>
                                        <div class="fw-bold">Farmer Name</div>
                                    </td>
                                    <td class="text-end fw-bold"></td>
                                    <td class="text-end fw-bold"></td>
                                    <td class="text-end fw-bold">{{ \App\Models\User::find($insurance_request->user_id)->name ?? "Farmer name not found" }}</td>
                                </tr>

                                {{-- --------------------------------------------------------- Farmer Name --------------------------------------------------------- --}}

                            @endif

                            {{-- --------------------------------------------------------- Insurance Requested By --------------------------------------------------------- --}}

                            <tr class="border-bottom">
                                <td>
                                    <div class="fw-bold">Insurance Requested By</div>
                                </td>
                                <td class="text-end fw-bold"></td>
                                <td class="text-end fw-bold"></td>
                                <td class="text-end fw-bold">{{ \App\Models\User::find($insurance_request->insurance_requested_company_id)->name ?? "Insurance requested by company not found" }}</td>
                            </tr>

                            {{-- --------------------------------------------------------- Farmer Name --------------------------------------------------------- --}}

                            {{-- --------------------------------------------------------- Insured Requested To --------------------------------------------------------- --}}

                            <tr class="border-bottom">
                                <td>
                                    <div class="fw-bold">Insurance Requested To</div>
                                </td>
                                <td class="text-end fw-bold"></td>
                                <td class="text-end fw-bold"></td>
                                <td class="text-end fw-bold">{{ \App\Models\User::find($insurance_request->company_id)->name ?? "Insurance requested to company not found" }}</td>
                            </tr>

                            {{-- --------------------------------------------------------- Insured Requested To --------------------------------------------------------- --}}

                            {{-- --------------------------------------------------------- Insured Policy --------------------------------------------------------- --}}

                            <tr class="border-bottom">
                                <td>
                                    <div class="fw-bold">Insurance Policy</div>
                                </td>
                                <td class="text-end fw-bold"></td>
                                <td class="text-end fw-bold"></td>
                                <td class="text-end fw-bold"><a
                                        href="{{ asset('storage/'.\App\Models\Package::find($insurance_request->package_id)->policy) }}">Policy
                                        File</a></td>
                            </tr>

                            {{-- --------------------------------------------------------- Insured Policy --------------------------------------------------------- --}}

                            {{-- --------------------------------------------------------- Rate --------------------------------------------------------- --}}

                            <tr class="border-bottom">
                                <td>
                                    <div class="fw-bold">Premium Rate</div>
                                </td>
                                <td class="text-end fw-bold"></td>
                                <td class="text-end fw-bold"></td>
                                <td class="text-end fw-bold">{{ \App\Models\Package::find($insurance_request->package_id)->rate ?? "Package rate not found" }}
                                    %
                                </td>
                            </tr>

                            {{-- --------------------------------------------------------- Rate --------------------------------------------------------- --}}

                            {{-- --------------------------------------------------------- Vat --------------------------------------------------------- --}}

                            <tr class="border-bottom">
                                <td>
                                    <div class="fw-bold">Premium Vat</div>
                                </td>
                                <td class="text-end fw-bold"></td>
                                <td class="text-end fw-bold"></td>
                                <td class="text-end fw-bold">{{ \App\Models\Package::find($insurance_request->package_id)->vat ?? "Package vat not found" }}
                                    %
                                </td>
                            </tr>

                            {{-- --------------------------------------------------------- Vat --------------------------------------------------------- --}}

                            {{-- --------------------------------------------------------- Off --------------------------------------------------------- --}}

                            <tr class="border-bottom">
                                <td>
                                    <div class="fw-bold">Premium Off</div>
                                </td>
                                <td class="text-end fw-bold"></td>
                                <td class="text-end fw-bold"></td>
                                <td class="text-end fw-bold">{{ \App\Models\Package::find($insurance_request->package_id)->discount ?? "Package vat not found" }}
                                    %
                                </td>
                            </tr>

                            {{-- --------------------------------------------------------- Off --------------------------------------------------------- --}}


                            <!-- Invoice subtotal-->
                            {{--                            <tr>--}}
                            {{--                                <td class="text-end pb-0" colspan="3">--}}
                            {{--                                    <div class="text-uppercase small fw-700 text-muted"></div>--}}
                            {{--                                </td>--}}
                            {{--                                <td class="text-end pb-0">--}}
                            {{--                                    <div class="h5 mb-0 fw-700">$,1925.00</div>--}}
                            {{--                                </td>--}}
                            {{--                            </tr>--}}

                            <!-- Invoice tax column-->
                            {{--                            <tr>--}}
                            {{--                                <td class="text-end pb-0" colspan="3">--}}
                            {{--                                    <div class="text-uppercase small fw-700 text-muted">Tax (7%):</div>--}}
                            {{--                                </td>--}}
                            {{--                                <td class="text-end pb-0">--}}
                            {{--                                    <div class="h5 mb-0 fw-700">$134.75</div>--}}
                            {{--                                </td>--}}
                            {{--                            </tr>--}}
                            <!-- Invoice total-->

                            <tr>
                                <td class="text-end pb-0" colspan="3">
                                    <div class="text-uppercase small fw-700 text-muted">Insurance Cost:</div>
                                </td>
                                <td class="text-end pb-0">
                                    <div class="h5 mb-0 fw-700 text-green">{{ $insurance_request->insurance_cost }}TK
                                    </div>
                                </td>
                            </tr>


                            <tr>
                                <td class="text-end pb-0" colspan="3">
                                    <div class="text-uppercase small fw-700 text-muted"></div>
                                </td>
                                <td class="text-end pb-0">
                                    <br>
                                    {{--                                    <a href="{{ route('company_insurance_transaction_view',[$insurance_request->id,'cash']) }}"><button class="btn btn-primary">Cash Transaction</button></a>--}}
                                    {{--                                    <a href="{{ route('company_insurance_transaction_view',[$insurance_request->id,'cheque']) }}"><button class="btn btn-success">Cheque Transaction</button></a>--}}
                                    {{--                                    <a href="{{ route('company_insurance_transaction_view',[$insurance_request->id,'bank']) }}"><button class="btn btn-danger">Bank Transaction</button></a>--}}
                                    {{--                                    <a href=""><button class="btn btn-warning">Digital Transaction</button></a>--}}

                                    {{-- ------------------------------------------ style css for btn options ------------------------------------------ --}}

                                    <style>
                                        select {
                                            padding: 12px;
                                            border: 1px solid #007bff; /* Bootstrap btn-primary border color */
                                            border-radius: 4px;
                                            background-color: #007bff; /* Bootstrap btn-primary background color */
                                            color: #fff; /* Bootstrap btn-primary text color */
                                            outline: none;
                                            cursor: pointer;
                                        }

                                        /* Style for Hover and Active States */
                                        select:hover, select:active {
                                            border-color: #6c757d;
                                        }

                                        option {
                                            background-color: white;
                                            color: #000; /* Set the color of options to black or any other color you prefer */
                                        }
                                    </style>

                                    {{-- ------------------------------------------ style css for btn options ------------------------------------------ --}}

                                    {{-- ------------------------------------------ Transaction type selection code ------------------------------------------ --}}

                                    <select onchange="location = this.value;">
                                        <option selected disabled>Select Transaction Type</option>
                                        <option
                                            value="{{ route('company_insurance_transaction_view', [$insurance_request->id, 'cash']) }}">
                                            Cash Transaction
                                        </option>
                                        <option
                                            value="{{ route('company_insurance_transaction_view', [$insurance_request->id, 'cheque']) }}">
                                            Cheque Transaction
                                        </option>
                                        <option
                                            value="{{ route('company_insurance_transaction_view', [$insurance_request->id, 'bank']) }}">
                                            Bank Transaction
                                        </option>
{{--                                        <option--}}
{{--                                            value="{{ route('company_insurance_transaction_view', [$insurance_request->id, 'digital']) }}">--}}
{{--                                            Digital Transaction--}}
{{--                                        </option>--}}
                                    </select>

                                    {{-- ------------------------------------------ Transaction type selection code ------------------------------------------ --}}

                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer p-4 p-lg-5 border-top-0">
                    <div class="row">

                        <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <!-- Invoice - sent from info-->
                            <div class="small text-muted text-uppercase fw-700 mb-2">From</div>
                            <div
                                class="h6 mb-0">{{ \App\Models\User::find($insurance_request->insurance_requested_company_id)->name ?? "Company name not found" }}</div>
                            {{--                            <div class="small">5678 Company Rd.</div>--}}
                            {{--                            <div class="small">Yorktown, MA 39201</div>--}}
                        </div>

                        <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <!-- Invoice - sent to info-->
                            <div class="small text-muted text-uppercase fw-700 mb-2">To</div>
                            <div
                                class="h6 mb-1">{{ \App\Models\User::find($insurance_request->company_id)->name ?? "Company name not found" }}</div>
                            {{--                            <div class="small">1234 Company Dr.</div>--}}
                            {{--                            <div class="small">Yorktown, MA 39201</div>--}}
                        </div>

                        {{--                        <div class="col-lg-6">--}}
                        {{--                            <!-- Invoice - additional notes-->--}}
                        {{--                            <div class="small text-muted text-uppercase fw-700 mb-2">Note</div>--}}
                        {{--                            <div class="small mb-0">Payment is due 15 days after receipt of this invoice. Please make--}}
                        {{--                                checks or money orders out to Company Name, and include the invoice number in the memo.--}}
                        {{--                                We appreciate your business, and hope to be working with you again very soon!--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}

                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
