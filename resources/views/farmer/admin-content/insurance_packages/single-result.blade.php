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
                            {{--                            <img class="invoice-brand-img rounded-circle mb-4" src="assets/img/demo/demo-logo.svg" alt="" />--}}
                            Company Name

                            <div class="h2 text-white mb-0">{{ $company->name ?? null }}</div>
                        </div>
                        <div class="col-12 col-lg-auto text-center text-lg-end">
                            <!-- Invoice details-->
                            <div class="h3 text-white">Package Details</div>
                            Package Status : {{ $package->package_status ?? null }}
                            <br/>
                            Creation Date : {{ $package->created_at ?? null }}
                            <br><br>

                            {{-- ------------------------------------- Buy Insurance ------------------------------------------- --}}

                            <form action="{{ url('pay') }}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" value="{{ $cattle_info->id }}" name="cattle_id">
                                <input type="hidden" value="{{ $package->id }}" name="package_id">
                                <input type="hidden" value="{{ $company->id }}" name="company_id">
                                <input type="hidden" step=".01" value="{{ $package->insurance_period }}"
                                       name="package_insurance_period">
                                <input class="btn btn-success h3 text-white" type="submit" value="Buy Insurance">
                            </form>

                            {{-- ------------------------------------- Buy Insurance ------------------------------------------- --}}


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
                                <th class="text-end" scope="col">Package Details</th>
                            </tr>
                            </thead>
                            <tbody>

                            {{-- --------------------------- Rows --------------------------- --}}
                            <tr class="border-bottom">
                                <td>
                                    <div class="fw-bold">Package Name</div>
                                    {{--                                    <div class="small text-muted d-none d-md-block">-</div>--}}
                                </td>
                                <td class="text-end fw-bold"></td>
                                <td class="text-end fw-bold"></td>
                                <td class="text-end fw-bold">{{ $package->package_name ?? null }}</td>
                            </tr>
                            {{-- --------------------------- Rows --------------------------- --}}


                            {{-- --------------------------- Coverage --------------------------- --}}
                            <tr class="border-bottom">
                                <td>
                                    <div class="fw-bold">Package Coverage</div>
                                    {{--                                    <div class="small text-muted d-none d-md-block">-</div>--}}
                                </td>
                                <td class="text-end fw-bold"></td>
                                <td class="text-end fw-bold"></td>
                                <td class="text-end fw-bold">
                                    @foreach (json_decode($package->coverage) as $item)
                                        @if ($item === 'ac')
                                            Accidental Coverage
                                        @elseif($item === 'fl')
                                            Flood Coverage
                                        @elseif($item === 'er')
                                            Earthquake Coverage
                                        @endif

                                        @if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                            {{-- --------------------------- Coverage --------------------------- --}}

                            {{-- --------------------------- Insurane Period --------------------------- --}}
                            <tr class="border-bottom">
                                <td>
                                    <div class="fw-bold">Package Insurance Period</div>
                                    {{--                                    <div class="small text-muted d-none d-md-block">-</div>--}}
                                </td>
                                <td class="text-end fw-bold"></td>
                                <td class="text-end fw-bold"></td>
                                <td class="text-end fw-bold">{{ $package->insurance_period ?? null }} Years</td>
                            </tr>
                            {{-- --------------------------- Insurane Period --------------------------- --}}

                            {{-- --------------------------- Insurane Policy --------------------------- --}}
                            <tr class="border-bottom">
                                <td>
                                    <div class="fw-bold">Insurance Policy</div>
                                    {{--                                    <div class="small text-muted d-none d-md-block">-</div>--}}
                                </td>
                                <td class="text-end fw-bold"></td>
                                <td class="text-end fw-bold"></td>
                                <td class="text-end fw-bold">
                                    <a href="{{ asset('storage/'.$package->policy ?? null) }}">View insurance policy</a>
                                </td>
                            </tr>
                            {{-- --------------------------- Insurane Policy --------------------------- --}}

                            {{-- --------------------------- Discount --------------------------- --}}
                            <tr class="border-bottom">
                                <td>
                                    <div class="fw-bold">Discount [ OFF% ]</div>
                                    {{--                                    <div class="small text-muted d-none d-md-block">-</div>--}}
                                </td>
                                <td class="text-end fw-bold"></td>
                                <td class="text-end fw-bold"></td>
                                <td class="text-end fw-bold">{{ $package->discount ?? null }}</td>

                                </td>
                            </tr>
                            {{-- --------------------------- Discount --------------------------- --}}

                            {{-- --------------------------- Rate --------------------------- --}}
                            <tr class="border-bottom">
                                <td>
                                    <div class="fw-bold">Rate</div>
                                    {{--                                    <div class="small text-muted d-none d-md-block">-</div>--}}
                                </td>
                                <td class="text-end fw-bold"></td>
                                <td class="text-end fw-bold"></td>
                                <td class="text-end fw-bold">{{ $package->rate ?? null }}</td>
                                </td>
                            </tr>
                            {{-- --------------------------- Rate --------------------------- --}}

                            {{-- --------------------------- Vat --------------------------- --}}
                            <tr class="border-bottom">
                                <td>
                                    <div class="fw-bold">Vat</div>
                                    {{--                                    <div class="small text-muted d-none d-md-block">-</div>--}}
                                </td>
                                <td class="text-end fw-bold"></td>
                                <td class="text-end fw-bold"></td>
                                <td class="text-end fw-bold">{{ $package->vat ?? null }}</td>
                                </td>
                            </tr>
                            {{-- --------------------------- Vat --------------------------- --}}

                            {{-- --------------------------- Package Status --------------------------- --}}
                            <tr class="border-bottom">
                                <td>
                                    <div class="fw-bold">Package Status</div>
                                    {{--                                    <div class="small text-muted d-none d-md-block">-</div>--}}
                                </td>
                                <td class="text-end fw-bold"></td>
                                <td class="text-end fw-bold"></td>
                                <td class="text-end fw-bold">{{ $package->package_status ?? null }}</td>

                                </td>
                            </tr>
                            {{-- --------------------------- Package Status --------------------------- --}}

                            {{--                            <tr>--}}
                            {{--                                <td class="text-end pb-0" colspan="3">--}}
                            {{--                                    <div class="text-uppercase small fw-700 text-muted">Subtotal:</div>--}}
                            {{--                                </td>--}}
                            {{--                                <td class="text-end pb-0">--}}
                            {{--                                    <div class="h5 mb-0 fw-700">$,1925.00</div>--}}
                            {{--                                </td>--}}
                            {{--                            </tr>--}}
                            {{--                            <!-- Invoice tax column-->--}}
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
                                    <div class="text-uppercase small fw-700 text-muted">Total Insurance Amount:</div>
                                </td>
                                <td class="text-end pb-0">
                                    <div
                                        class="h5 mb-0 fw-700 text-green">{{ \App\Models\User::calculateTotalCost($cattle_info->sum_insured,$package->rate,$package->discount,$package->vat) ?? null }}
                                        TK
                                    </div>
                                </td>
                            </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer p-4 p-lg-5 border-top-0">
                    <div class="row">
                        <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <!-- Invoice - sent to info-->
                            <div class="small text-muted text-uppercase fw-700 mb-2">To</div>
                            <div class="h6 mb-1">Company Name</div>
                            <div class="small">{{ $company->name ?? null }}</div>
                            <div class="small">{{ $company->email ?? null }}</div>
                        </div>
                        <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <!-- Invoice - sent from info-->
                            <div class="small text-muted text-uppercase fw-700 mb-2">From</div>
                            <div class="h6 mb-0">User</div>
                            <div class="small">{{ auth()->user()->name ?? null }}</div>
                            <div class="small">{{ auth()->user()->email ?? null }}</div>
                        </div>
                        <div class="col-lg-6">
                            <!-- Invoice - additional notes-->
                            <div class="small text-muted text-uppercase fw-700 mb-2">Address</div>
                            <div class="small mb-0">
                                {{ $company->address ?? null }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
